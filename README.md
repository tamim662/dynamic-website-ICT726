# MindGlow Therapy — ICT726 Assignment 3 Website

This is a static, from-scratch website built with **HTML5**, **CSS3**, and a little **JavaScript** — no frameworks or templates.

## How requirements are met

- **Homepage**: `index.html` with business title and short intro paragraph; creative hero image and CTAs.  
- **Contact page**: `contact.html` includes email/social links and a validated HTML5 form with JS feedback (demo).  
- **Additional pages**: `services.html`, `resources.html` (media gallery), `testimonials.html`.  
- **Media**: multiple images (SVG) plus an audio sample. The **Resources** page is the dedicated media gallery with interactive thumbnails that open a modal.  
- **Header/Nav/Footer**: consistent across pages; clear nav; appropriate footer.  
- **HTML5 semantics**: header/nav/main/section/article/footer/figure/figcaption/details/summary.  
- **CSS**: external stylesheet at `assets/css/styles.css` (only one). Uses rounded corners, gradients, shadows, transitions, transforms.  
- **JavaScript**: `assets/js/main.js` for gallery modal, filters, form validation, and UI behavior.  
- **Responsiveness**: CSS media queries; tested at ~560px and ~900px breakpoints.  
- **Accessibility**: alt text, skip link, ARIA roles/labels, `aria-live` status region, keyboard-close modal, color contrast considered.

## Local preview

Open `index.html` in your browser. All assets are local.

## Host it (GitHub Pages)

1. Create a repo and push the `mindglow-website` folder.  
2. In **Settings → Pages**, select branch `main` (or `master`) and `/` root.  
3. Wait for deployment and visit the URL.

## Host it (Netlify)

1. Drag-and-drop the `mindglow-website` folder onto Netlify, or link the repo.  
2. Netlify will deploy it as a static site.

> Note: The contact form is a demo only; no data is sent to a server.