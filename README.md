
# MindGlow Therapy — Dynamic Website (PHP + MySQL)

This package converts the provided static site into a dynamic web app with authentication, role-based admin, CRUD for resources, testimonial submission with moderation, validated contact form, privacy notice, accessibility hooks, and basic SEO files.

## Quick start

1. Create a MySQL database (default name `mindglow_db`) and import `data/schema.sql`.
2. Ensure PHP 8.1+ with PDO MySQL. Update credentials in `includes/config.php` if needed (`DB_*` env vars or file).
3. Copy this folder to your PHP server (XAMPP/MAMP/LAMP or hosting).
4. Visit `/auth/login.php` and sign in with:
   - Email: `admin@mindglow.example`
   - Password: `admin123` (please change in DB for production)
5. Admin dashboard: `/admin/index.php` to manage resources and approve testimonials.

## Features mapped to ICT726 A4
- User auth & roles (admin/member), secure password hashing, sessions, CSRF.
- Database schema with proper types and relationships.
- CRUD: resources (admin), testimonials (submit + approve), contacts (logs).
- Web standards & accessibility: semantic HTML, ARIA roles preserved, skip links.
- Validation & error handling server-side + client-side hints.
- SEO: semantic headings, meta description, canonical, robots.txt, sitemap.xml.
- Privacy & security: privacy notice, input validation, prepared statements, role-based access.

## Notes
- Assets/images are placeholders; reuse your originals by copying into `assets/images/`.
- Feel free to integrate additional pages; templates in `partials/` keep markup consistent.
