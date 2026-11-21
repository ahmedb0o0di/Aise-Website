# Astra Intelligence Services — Laravel 13 & Filament Admin CMS

A high-performance, full-stack Laravel 13 application and Filament CMS dashboard built specifically for **Astra Intelligence Services Egypt**.

---

## 🚀 Quick Start Guide

### 1. Requirements
- **PHP**: 8.2 or 8.3 (tested with PHP 8.3.30)
- **Composer**: 2.x
- **MySQL**: 8.x (Laragon MySQL default)

### 2. Environment Configuration
The `.env` file is pre-configured for your local MySQL environment:

```env
APP_NAME="Astra Intelligence"
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=astra_db
DB_USERNAME=root
DB_PASSWORD=

FILESYSTEM_DISK=public
```

### 3. Database Migration & Seeding
If you ever want to re-seed fresh demo data:
```bash
php artisan migrate:fresh --seed
```

### 4. Running the Application
Ensure MySQL is running (e.g. via Laragon), then start the local development server:
```bash
php artisan serve
```
Visit:
- **Public Website**: [http://localhost:8000](http://localhost:8000)
- **Admin Dashboard**: [http://localhost:8000/admin](http://localhost:8000/admin)

---

## 🔐 Admin Dashboard Credentials

- **URL**: `http://localhost:8000/admin`
- **Email**: `admin@astra.com`
- **Password**: `password`

---

## 🎛️ Managed Website Sections

The Filament Admin Panel provides complete CRUD management over all 15 components of the website:

| Section / Model | Dashboard Path | Description |
| :--- | :--- | :--- |
| **Site Settings** | `/admin/site-settings` | Global branding, dark/light logos, emails, phone numbers, addresses, social channels, and section copy. |
| **Hero Stats** | `/admin/hero-stats` | Real-time animated counter figures (e.g. 250+ Projects, 98% Satisfaction, 12+ Years). |
| **Feature Cards** | `/admin/features` | The 4 core value proposition cards on the homepage (icons, titles, descriptions). |
| **Rolling Ticker** | `/admin/ticker-items` | Animated continuous marquee banner items. |
| **Showreel Items** | `/admin/showreel-items` | Showcase video marquee tags and highlight labels. |
| **Services** | `/admin/services` | All 11 digital services with tags, icons, full modal case studies, and included sub-services. |
| **Portfolio Projects** | `/admin/portfolio-projects` | Filterable project showcase with category associations and deep modal breakdowns. |
| **Portfolio Categories**| `/admin/portfolio-categories` | Dynamic filter categories (Branding, Social Media, Web Design, SEO). |
| **Team Members** | `/admin/team-members` | Specialist profiles, roles, headshots, bios, and social links (LinkedIn, Twitter, Dribbble). |
| **Pricing Plans** | `/admin/pricing-plans` | Tiered plans (Starter, Pro, Enterprise) with monthly/yearly switcher and repeater feature lists. |
| **Client Testimonials** | `/admin/testimonials` | Client reviews with star ratings (1-5), feedback quotes, company titles, and avatars. |
| **FAQs** | `/admin/faqs` | Searchable collapsible accordion questions and answers. |
| **Articles & News** | `/admin/articles` | Blog posts with rich text editor, categories, author credits, and publication dates. |
| **Contact Inquiries** | `/admin/contact-messages` | Incoming leads from the contact form with unread badges and complete project requirements. |
| **Newsletter Subscribers**| `/admin/subscribers` | Email subscriber collection from the footer newsletter form. |

---

## 🌐 Public Website Routes

- `/` — **Homepage** (Dynamic Hero, Ticker, Features, About, Services, Showreel, Portfolio, Team, Pricing, Testimonials, FAQ, News, Contact Form, Bottom CTA)
- `/about` — **About Us**
- `/services` — **Services Catalog**
- `/portfolio` — **Portfolio Showcase**
- `/team` — **Our Team**
- `/pricing` — **Pricing & Plans**
- `/blog` — **Blog & News**
- `/contact` — **Contact Us**
- `POST /contact` — **AJAX Lead Submission**
- `POST /newsletter` — **AJAX Newsletter Subscription**
