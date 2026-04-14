# Controllers and User Credentials Guide

This guide documents the main controllers used by the system and explains how user accounts and login credentials are managed.

## Authentication and Credentials

The project uses Laravel Breeze authentication (`routes/auth.php`) with:

- Login: `GET/POST /login`
- Register: `GET/POST /register`
- Forgot password: `GET/POST /forgot-password`
- Reset password: `GET/POST /reset-password/{token}`
- Logout: `POST /logout`

### Important credential notes

- There is **no active default seeded user** in `database/seeders/DatabaseSeeder.php` at the moment.
- A sample admin account exists only as commented code:
  - Email: `admin@gmail.com`
  - Password: `admin`
  - Role: `ادمن`
- For production and team safety, create accounts through:
  - the register screen, or
  - the Users management UI (`UserController@store`) where passwords are hashed.

### First admin setup (recommended)

1. Create a user account.
2. Ensure role `ادمن` exists (via role management or seeding).
3. Assign `ادمن` role to the user.
4. Log in with that account to access admin-protected features.

## Controller Documentation

## Public and Website Controllers

- `BlogController`
  - Public pages: home/blog list, single blog, gallery, about page.
  - Admin pages (permission: `التحكم بالموقع`): blog CRUD and site settings pages.
- `MessageController`
  - Public contact form display/submit.
  - Admin contact inbox and message read/delete actions (permission: `رسائل التواصل`).
- `ZacatFormController`
  - Public ZACAT form create/store/list.

## Core Admin and Staff Controllers

- `DashboardController`
  - Dashboard entry point (permission: `عرض لوحة التحكم`).
- `UserController`
  - User CRUD, search/pagination, and role updates.
  - Passwords are hashed in create/update flows.
- `RolesController`, `PermissionsController`, `PrivilegeController`
  - Role/permission management and user privilege assignment.
- `DepartmentController`
  - Department CRUD (permission: `إدارة الاقسام`).
- `ServiceController`
  - Service CRUD (permission: `إدارة الخدمات`).
- `ClinicController`
  - Clinic management, clinic staff display, and appointment generation/index helpers.
- `AppointmentController`
  - Appointment creation flows, doctor/day filtering, booking/status updates, visit marking.
- `VacationController`
  - Staff vacation requests and admin approval/status actions.
- `SearchController`
  - Dynamic search endpoint.

## Patient and Clinical Documentation Controllers

- `PatientsController`
  - Patient CRUD, export, disease assignment.
- `ReportController`
  - Core report create/show/store/edit/update/delete.
- `FollowUpReportController`
  - Follow-up report create/store/show/edit/update/delete.

Specialized clinical/report controllers (all follow create/store/show/edit/update/delete patterns):

- `FeeScoreReportController`
- `DldSheetReportController`
- `ProtocolVoiceEvaluationController`
- `ChecklistForDysarthriaEvaluationController`
- `DysfluencySheetController`
- `CaseNumberController`
- `DysphagiaAssessmentController`
- `ProtocolOfNasalityEvaluationController`
- `EverydayLivingTasksController`
- `OccupationalTherapyController`
- `AdultsPhysiotherapyAssessmentController`
- `PhysiotherapyAssessmentController`
- `TreatmentPlanOfCareController`

## Finance and Compliance Controllers

- `BillingController`
  - Billing CRUD-like actions, listing/viewing, return marking.
- `ZatcaController`
  - ZATCA integration endpoints (reporting invoice, CSR/certificate, compliance invoice).

## Auth/Profile Controllers

- `AuthenticatedSessionController`
  - Login form, authenticate, logout.
- `RegisteredUserController`
  - User self-registration.
- `PasswordResetLinkController`, `NewPasswordController`
  - Password reset link and reset completion.
- `PasswordController`, `ConfirmablePasswordController`
  - Password update and password confirmation.
- `EmailVerificationPromptController`, `VerifyEmailController`, `EmailVerificationNotificationController`
  - Email verification flows.
- `ProfileController`
  - Profile edit/update/delete for authenticated users.

## Route Access Model (High Level)

- Public routes: website pages, contact form, ZACAT form, some billing endpoints.
- Auth-only routes: profile, vacations, and most internal operations.
- Permission-protected routes: dashboard, users, patients, reports, services, departments, blogs settings, contacts.
- Admin-only routes: role/permission resources and some vacation/user role updates (`AdminMiddleware`).

## Quick Maintenance Tips

- Keep route permissions and controller actions aligned.
- Avoid hardcoded credentials; use env vars/seeding for local development only.
- If adding a new controller, document:
  - route prefix,
  - required permission,
  - key methods/actions,
  - expected role(s).
