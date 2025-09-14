# MindGlow – Dynamic Web Application

## About MindGlow
MindGlow is a dynamic PHP–MySQL web application designed to provide therapy resources, self-help tools, and a supportive environment for users.  

The project began as a **static website** and has been transformed into a **full-stack web application** with user authentication, database integration, and admin moderation. Its primary aim is to demonstrate how accessible, standards-compliant, and secure web applications can be built with open-source technologies.

---

## ✨ Key Features

###  User Authentication
- Register, log in, and log out securely.
- Role-based access control: **admin** vs. **member**.
- Passwords stored securely using PHP’s `password_hash()`.

### 🗄 Database Integration
- Built on **MySQL** with four main tables:
  - `users`, `resources`, `testimonials`, `contacts`
- Full **CRUD operations** for resources and testimonials.
- Form submissions saved directly to the database with server-side validation.

###  Dynamic Web Design
- Responsive frontend using **HTML5, CSS3, and JavaScript**.
- Reusable design from the original static frontend.
- Interactive UI: resource filtering, modal previews, live form messages.

### ♿ Web Standards & Accessibility
- Semantic HTML structure with `<header>`, `<main>`, `<footer>`.
- ARIA roles (`role="dialog"`, `aria-modal`, skip links, status regions).
- Optimized SVG images and audio files for performance.

###  SEO Optimization
- Semantic heading structure (H1/H2).
- Meta titles and descriptions per page.
- Sitemap and robots.txt included.
- Keyword-focused content for therapy and wellness topics.

###  Privacy & Security
- Secure session management with CSRF tokens.
- Input validation on both client and server side.
- Admin moderation for user-submitted testimonials.
- Privacy notice included on contact form to ensure transparency.

---

##  Example Pages
- **Home** – introduction & resources highlights.
- **Services** – overview of counseling services.
- **Resources** – gallery of articles, videos, podcasts with modal previews.
- **Testimonials** – submit and view approved stories.
- **Contact** – secure form with privacy notice.
- **Admin Dashboard** – manage resources & approve testimonials.

---

##  Getting Started
1. Clone or unzip the project.
2. Import `data/schema.sql` into MySQL.
3. Update `includes/config.php` with your DB credentials.
4. Run with PHP built-in server:
   ```bash
   php -S 127.0.0.1:8080 -t mindglow-dynamic
