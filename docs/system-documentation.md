# Al Tamayoz Medical Rehabilitation System — Full Documentation

This document describes **project features**, the **permission model** (Spatie Laravel Permission), **how each role is intended to behave**, **user flows**, and how **routes, middleware, and UI** interact.

---

## Table of contents

1. [How access control works](#how-access-control-works)
2. [Complete permission catalog](#complete-permission-catalog)
3. [Roles and typical flows](#roles-and-typical-flows)
4. [Reference: role ↔ permission matrix (commented seeder)](#reference-role--permission-matrix-commented-seeder)
5. [Project features (functional areas)](#project-features-functional-areas)
6. [Route access summary](#route-access-summary)
7. [Credentials and account lifecycle](#credentials-and-account-lifecycle)
8. [Implementation notes and gaps](#implementation-notes-and-gaps)

---

## How access control works

### Layers

| Layer | Mechanism | What it does |
|--------|-----------|--------------|
| **Guest** | No session | Public pages (home, blog, contact, ZACAT form, some billing URLs — see notes). |
| **Authenticated** | `auth` middleware | Profile, vacations (request), logout. |
| **Permission** | `PermissionMiddleware` + Spatie `hasPermissionTo` | User must have **at least one** of the named permissions (single permission per route group in this app). |
| **Admin role** | `AdminMiddleware` | Only users with role **`ادمن`** reach admin-only routes (roles CRUD, permissions CRUD, vacation admin, user role patch). |

### Important behaviors

- **Dashboard** (`/dashboard`) requires permission **`عرض لوحة التحكم`** (not only `auth`).
- **Login** (`App\Http\Requests\Auth\LoginRequest`): after valid credentials, if **`is_active`** is false, the user is logged out and sees an error (accounts can be deactivated; role **`مفصول`** sets `is_active` to false in `UserController::updateRole`).
- **Direct permissions**: `PrivilegeController` can grant/revoke permissions per user and sync with roles; effective access is **role permissions + direct permissions** (Spatie).
- **Sidebar** (`resources/views/layouts/sidebarmenu.blade.php`) uses `@can('…')` and `@role('ادمن')` — menu items match permissions; some items also depend on role (e.g. vacation admin vs staff).
- **`PermissionMiddleware`** contains a check for role name **`admin`** (English). The application uses **`ادمن`** (Arabic) for administrators. That branch is effectively **unused**; denied users are redirected to `vacations.index` with an error.

---

## Complete permission catalog

Permissions are **Arabic string names** stored in Spatie’s `permissions` table. Below: permission name, typical use, and where it is enforced.

| # | Permission (Arabic) | Enforced on routes (middleware) | UI (`@can`) / notes |
|---|---------------------|----------------------------------|---------------------|
| 1 | **عرض لوحة التحكم** | `GET /dashboard` | Dashboard link |
| 2 | **عرض قائمة الموظفين** | `GET /users`, `GET /users/{user}` | Staff list |
| 3 | **إضافة موظف** | `POST /users` | Create staff (form `users/create` is not wrapped in this middleware — see gaps) |
| 4 | **تعديل موطف** | `PUT /users/{user}`, `GET …/edit`, `DELETE /users/{id}` | Edit/delete staff |
| 5 | **عرض قائمة المرضى** | *(no route middleware in `web.php`)* | Patients link in sidebar |
| 6 | **إضافة مريض** | `POST /patients` | Add patient |
| 7 | **تعديل مريض** | `GET/PUT` patient edit | Edit patient |
| 8 | **حذف مريض** | `DELETE /patients/{patient}` | Delete patient |
| 9 | **إدارة الصلاحيات** | `/manage-privileges` | User privilege management |
| 10 | **إدارة المواعيد** | Booked appointments, status, `appointments` index | Appointments management |
| 11 | **إضافة عيادة** | Full `clinics` resource + generate appointments | Clinics; **`أخصائي`** is redirected to their clinic staff view in `ClinicController` |
| 12 | **إدارة الاقسام** | `/departments` CRUD | Departments |
| 13 | **إدارة الخدمات** | `/services` CRUD | Services |
| 14 | **التحكم بالموقع** | Admin blogs, settings, gallery, about | Website CMS |
| 15 | **رسائل التواصل** | `/contacts`, messages CRUD | Contact messages |
| 16 | **عرض التقارير** | Large group: clinical reports, assessments, templates | All specialized report routes under this permission |
| 17 | **إدارة الفواتير** | *(not applied in `web.php` to `/billing`)* | Sidebar only — billing routes are **not** behind this middleware |

**Typo in codebase:** permission **`تعديل موطف`** is spelled with ط (intended: **تعديل موظف**). Routes and code use the same spelling; permissions must match **exactly** in the database.

---

## Roles and typical flows

Roles are Spatie **roles** (e.g. `roles.name`). The codebase references at least:

| Role (Arabic) | Meaning / use |
|---------------|----------------|
| **ادمن** | Full system administration: `AdminMiddleware` routes, vacation approval, roles/permissions resources, `UserController::updateRole` (only if current user is `ادمن`). `RolesSeeder` assigns **`Permission::all()`** to `ادمن` when that seeder runs. |
| **مفصول** | Terminated: changing a user to this role sets **`is_active`** to **false** → cannot log in. |
| **أخصائي** | Specialist: `ClinicController` redirects to **own clinic** staff page; cannot open another clinic’s staff view; billing views check `أخصائي` or `طبيب` for some fields. |
| **طبيب** | Doctor: referenced in billing Blade templates alongside `أخصائي`. |
| **مشرف**, **الموارد البشرية**, **الاستقبال** | Appear in **commented** `DatabaseSeeder` as intended business roles (see matrix below). |

### Flow: **ادمن (Admin)**

1. Log in (must be `is_active`).
2. Sees dashboard if permission **`عرض لوحة التحكم`** is granted (typically yes for admin).
3. Can open **طلبات الاجازة** (`vacations.admin`), **صلاحيات الأدوار** (`roles`, `permissions` resources), patch user roles (`users.updateRole`).
4. Manages vacations, roles, permissions, and any permission granted to their account.

### Flow: **Staff member (permission-driven)**

1. Log in.
2. Sidebar shows only items for permissions they have (`@can`).
3. **Vacations:** non-admins see **طلب أجازة** (`vacations.index`, create, store); admins see **طلبات الاجازة** instead.
4. **أخصائي** with **`إضافة عيادة`:** opening **العيادات** goes to `clinics.showstaff` for **their** `clinic_id`, not the full clinic list.

### Flow: **مفصول**

1. Admin sets role to **مفصول** → `is_active` becomes false.
2. On next login attempt, credentials may succeed briefly then `LoginRequest` logs them out with “account is locked”.

### Flow: **New user (registration)**

- `RegisteredUserController` creates a user with name, email, password; **no role** is assigned in code — an admin must assign a role and permissions (or use privilege management).

---

## Reference: role ↔ permission matrix (commented seeder)

`DatabaseSeeder` contains a **commented** historical design: permission IDs **1–17** and roles **1–6**. Below is the **decoded intent** (permission **name** per role). Use this as a **reference** for how departments might configure roles in production; live data may differ.

**Permission IDs → names**

1. عرض قائمة الموظفين  
2. إضافة موظف  
3. عرض قائمة المرضى  
4. إضافة مريض  
5. إدارة الفواتير  
6. إدارة المواعيد  
7. عرض التقارير  
8. إضافة عيادة  
9. إدارة الاقسام  
10. إدارة الخدمات  
11. إدارة الصلاحيات  
12. رسائل التواصل  
13. التحكم بالموقع  
14. حذف مريض  
15. تعديل مريض  
16. تعديل موطف  
17. عرض لوحة التحكم  

**Roles**

1. ادمن  
2. مفصول  
3. مشرف  
4. أخصائي  
5. الموارد البشرية  
6. الاستقبال  

**Intended assignments (from commented `$rolePermissions` pairs `[permission_id, role_id]`)**

- **ادمن (1):** All listed permissions (full set from the pairs where role_id = 1).  
- **مفصول (2):** No permission rows in that array — effectively **no access**.  
- **مشرف (3):** Staff/patient/appointment/financial/clinical/CMS-related subset (employees, patients, billing, appointments, reports, clinics, departments, services, contact messages, edit patient, dashboard).  
- **أخصائي (4):** **عرض التقارير**, **إضافة عيادة** (minimal; aligns with clinic-bound specialist).  
- **الموارد البشرية (5):** **عرض قائمة الموظفين**, **إضافة موظف**.  
- **الاستقبال (6):** Reception-oriented set: staff list/add, patient list, billing, appointments, reports, dashboard (as in seeder pairs).

---

## Project features (functional areas)

### Public / marketing

- Home and blog listing, single post, gallery, about page  
- Contact form and message submission  
- ZACAT form (create, submit, list)  
- Additional blog routes (`/blogs`, `/blogs/{id}`, `/gallery`)

### Authentication and profile

- Register, login, logout, password reset, email verification (Breeze)  
- Profile edit, update, delete account  
- Session regeneration on login

### Organization structure

- **Departments** — CRUD (permission: إدارة الاقسام)  
- **Clinics** — CRUD, appointments generation, staff per clinic, specialist redirect  
- **Services** — CRUD (permission: إدارة الخدمات)

### People

- **Users (staff)** — list, show, create, edit, delete, role update (admin), HR-style fields  
- **Patients** — list, show, export, create, edit, delete, diseases  
- **Privileges** — per-user permission toggles (`PrivilegeController`)

### Scheduling

- Appointments: create flows (by patient, client, dashboard), store, booked list, status updates, clinic appointment index  
- Doctor views: appointments, today, patients  
- Visit flag update  
- Vacations: staff requests; admin approval (`ادمن`)

### Clinical documentation and reports

Requires **`عرض التقارير`** for the route group, including:

- General reports (`ReportController`)  
- Fee score, DLD sheet  
- Voice evaluation, dysarthria checklist, dysfluency  
- Case number  
- Dysphagia, nasality protocol  
- Everyday living tasks, occupational therapy  
- Adults physiotherapy, physiotherapy assessment  
- Treatment plan of care  

### Follow-up reports

- `FollowUpReportController` routes at root-level paths (`/create`, `/{report}`, etc.) — **not** inside the `عرض التقارير` middleware group in `routes/web.php`

### Billing and compliance

- Billing: create, list, show, edit, update, return  
- **ZATCA** API-style routes under `/zatca` (reporting invoice, CSR, certificate, compliance)

### Website CMS

- Blog admin, main image, gallery, about content (permission: **التحكم بالموقع**)

### Contact administration

- Inbox, read toggle, delete (permission: **رسائل التواصل**)

### Search and utilities

- Dynamic search endpoint  
- Success page after some flows

---

## Route access summary

| Area | Middleware / access |
|------|---------------------|
| `/dashboard` | Permission: عرض لوحة التحكم |
| Profile | `auth` |
| Vacations (staff) | `auth` |
| Vacations admin, `roles`, `permissions`, `PATCH users/{id}/role` | `auth` + **AdminMiddleware** (`ادمن`) |
| Services, users, patients (mutations), privileges, appointments mgmt, clinics, departments, blogs admin, contacts, all clinical report routes | `auth` + **PermissionMiddleware** (specific permission per group) |
| Billing (`/billing/*`) | **No** `PermissionMiddleware` in `web.php` (rely on deployment / future hardening) |
| Many patient list/show routes | **No** `auth` in `web.php` for `patients` index/export/show — **verify** in deployment |
| ZATCA | No auth in route file — typically protect at network/API layer |
| Follow-up | No permission middleware on those routes in `web.php` |
| Public | `/`, contact, ZACAT, blogs, etc. |

---

## Credentials and account lifecycle

- **No active default user** is seeded in `DatabaseSeeder` (admin creation is commented).  
- Commented example: `admin@gmail.com` / `admin` with role `ادمن` — **not** active unless you uncomment and seed.  
- **Creating production users:** use registration + admin role assignment, or `UserController@store` with password hashing.  
- **Termination:** assign role **مفصول** → account deactivated for login.

---

## Implementation notes and gaps

1. **Billing:** Sidebar uses **`@can('إدارة الفواتير')`** but **`web.php` does not** attach that permission to `/billing` routes — document for security audits.  
2. **Patients:** Several patient routes are outside `auth` in `web.php` — confirm whether intentional (kiosk) or should be locked down.  
3. **PermissionMiddleware** `admin` role name does not match **`ادمن`**.  
4. **Users create** route `GET /users/create` is not inside the same middleware as `POST /users` — rely on views/links not exposing create without permission.  
5. **Spelling:** **تعديل موطف** vs “موظف” — keep DB and code consistent.  
6. **RolesSeeder:** Ensures **`ادمن`** has all permissions **at seed time**; new permissions added later need to be assigned to roles again.

---

## Related files (for maintainers)

- Routes: `routes/web.php`, `routes/auth.php`  
- Middleware: `app/Http/Middleware/PermissionMiddleware.php`, `AdminMiddleware.php`  
- Login rules: `app/Http/Requests/Auth/LoginRequest.php`  
- Menu: `resources/views/layouts/sidebarmenu.blade.php`  
- Seeders: `database/seeders/RolesSeeder.php`, `DatabaseSeeder.php`  
