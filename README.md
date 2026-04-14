# Al Tamayoz Medical Rehabilitation System

A web-based clinic and medical rehabilitation management system for Al Tamayoz. It handles patients, appointments, clinical assessments, billing, and Saudi e-invoicing (ZATCA), with role-based access and a public-facing blog and contact pages.

## Live Site

**Production:** [https://altamayozmed.com/](https://altamayozmed.com/)

---

## What This Project Does

- **Clinic & staff management** — Manage clinics and view staff per clinic.
- **Patient management** — Register and manage patients, case numbers, and patient-related data.
- **Appointments** — Schedule and track doctor appointments (including today’s view and visit status).
- **Clinical assessments & reports** — Support for:
  - Speech/language: Dysarthria checklist, dysfluency, dysphagia, voice evaluation, nasality protocol
  - Physiotherapy and occupational therapy assessments
  - Everyday living tasks, treatment plans of care, follow-up reports
  - DLD sheet reports, fee score reports, and other clinical documentation
- **Billing** — Create, edit, view, and manage bills; mark returns.
- **ZATCA e-invoicing** — Saudi ZATCA-compliant e-invoicing integration.
- **ZACAT form** — Public ZACAT form (create, submit, list).
- **Dashboard** — Permission-protected dashboard (e.g. “عرض لوحة التحكم”) for staff.
- **Roles & permissions** — Role-based access control (Spatie Laravel Permission).
- **Public website** — Home page (blog), About Us, Contact Us (form + submit).
- **User accounts** — Auth (Laravel Breeze), profile, and permission-aware routes.

---

## Documentation

- Controllers and credentials guide: `docs/controllers-and-credentials.md`

---

## Tech Stack

- **Backend:** PHP 8.2, Laravel 11
- **Frontend:** Vite, Vue (optional), Alpine.js, Tailwind CSS, Flowbite
- **Notable packages:** Spatie Laravel Permission, Spatie Laravel Settings, Salla ZATCA, Maatwebsite Excel, Hashids, PHP QR Code, phpseclib

---

## Getting Started

1. Clone the repo and install dependencies:
   ```bash
   composer install
   npm install
   ```
2. Copy `.env.example` to `.env`, set your app key, database, and any ZATCA/mail config.
3. Run migrations (and seeders if needed):
   ```bash
   php artisan migrate
   ```
4. Build assets and run the app:
   ```bash
   npm run build
   php artisan serve
   ```
   For development with hot reload and queue:
   ```bash
   composer run dev
   ```

---

## License

MIT (as per Laravel skeleton).
