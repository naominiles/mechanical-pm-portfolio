# WordPress Setup Guide - Mechanical PM

## Current Status ✓

- [x] Docker environment running
- [x] WordPress container active on http://localhost:8000
- [x] MySQL database configured
- [x] Custom theme created
- [x] Migration plan documented

---

## Next Steps

### 1. Complete WordPress Installation

1. Open http://localhost:8000 in your browser
2. Select language: **English**
3. Click "Let's go!" and then "Run the installation"
4. Fill in site information:
   - **Site Title:** Mechanical PM
   - **Username:** (your choice - remember this!)
   - **Password:** (your choice - remember this!)
   - **Email:** (your email)
5. Click "Install WordPress"

### 2. Activate the Theme

1. Login to WordPress admin: http://localhost:8000/wp-admin
2. Go to **Appearance > Themes**
3. Find "Mechanical PM" theme
4. Click **Activate**

### 3. Install Required Plugins

Go to **Plugins > Add New** and install:

1. **Advanced Custom Fields** (Free version for now)
   - Search for "Advanced Custom Fields"
   - Install and activate

2. **Contact Form 7** (optional, for contact page)
   - Search for "Contact Form 7"
   - Install and activate

### 4. Set Up Navigation Menu

1. Go to **Appearance > Menus**
2. Create a new menu called "Primary Menu"
3. Add pages:
   - Home (link to `/`)
   - Projects (link to `/projects`)
   - Insights (link to `/insights` or `/blog`)
   - Applied A.I. (link to `/applied-ai`) - Add custom CSS class: `accent`
   - Contact (link to `/contact`)
4. Assign to **Primary Menu** location
5. Save

### 5. Configure Settings

#### Permalinks
1. Go to **Settings > Permalinks**
2. Select **Post name**
3. Save (this enables clean URLs)

#### Reading Settings
1. Go to **Settings > Reading**
2. Set homepage to display: **A static page**
3. Homepage: Create a page called "Home" (or it will use front-page.php automatically)

### 6. Create Project Taxonomies

Go to **Projects > Sectors** and add:
- Healthcare
- Commercial
- Entertainment

Go to **Projects > Locations** and add:
- Las Vegas, NV
- Miami, FL

### 7. Set Up ACF Fields

1. Go to **ACF > Field Groups**
2. Click **Add New**
3. Title: "Project Details"
4. Add these fields:

**Basic Info:**
- Location (Text)
- Year Completed (Number, 4 digits)
- Project Value (Text, e.g., "$1.9B")
- Project Size (Text, e.g., "1.8M sq ft")
- Project Scope (Text, short description)

**Companies:**
- General Contractor (Text)
- Mechanical Contractor (Text)

**Role:**
- Role Title (Text, e.g., "Mechanical PM, Dry-Side")

**Content:**
- Key Challenge (Textarea)

5. Set Location Rules: **Post Type is equal to Project**
6. Publish

### 8. Create Your First Project

1. Go to **Projects > Add New**
2. Title: "Allegiant Stadium"
3. Set Featured Image: Upload raiders-stadium.jpg from `/images` folder
4. Fill in ACF fields:
   - Location: Las Vegas, NV
   - Year: 2020
   - Project Value: $1.9B
   - Project Size: 1.8M sq ft
   - General Contractor: Harris Company
   - Role Title: Mechanical PM, Dry-Side
5. Add to Sectors: Entertainment
6. Add to Locations: Las Vegas, NV
7. Publish

### 9. Upload Profile Photo

1. Create an "About" page or
2. Copy `zackary-lancaster.png` to `wp-content/themes/mechanical-pm-theme/assets/images/`

### 10. Test the Site

Visit http://localhost:8000 to see your homepage with:
- Hero section
- Featured projects (will show your first project)
- Bio section
- Footer

---

## File Structure Reference

```
/Users/coop/Documents/Zack Lancaster/
├── docker-compose.yml          # Docker configuration
├── WORDPRESS_MIGRATION_PLAN.md # Complete migration strategy
├── README-DOCKER.md            # Docker commands reference
├── SETUP-GUIDE.md             # This file
├── wordpress/                  # WordPress installation (auto-created)
└── wp-content/
    └── themes/
        └── mechanical-pm-theme/
            ├── style.css       # Main stylesheet
            ├── functions.php   # Theme functions
            ├── header.php      # Header template
            ├── footer.php      # Footer template
            ├── index.php       # Default template
            ├── front-page.php  # Homepage
            └── inc/
                └── custom-post-types.php  # Projects CPT
```

---

## Important URLs

- **WordPress Site:** http://localhost:8000
- **WordPress Admin:** http://localhost:8000/wp-admin
- **Projects Archive:** http://localhost:8000/projects (after creating projects)

---

## Docker Management

**Stop WordPress:**
```bash
docker-compose down
```

**Start WordPress:**
```bash
docker-compose up -d
```

**View Logs:**
```bash
docker-compose logs -f wordpress
```

**Reset Everything (WARNING: Deletes database):**
```bash
docker-compose down -v
rm -rf wordpress/
```

---

## What's Already Built

✅ Custom theme with all original styles
✅ Projects custom post type
✅ Project taxonomies (Sector, Location)
✅ Homepage template matching original design
✅ Navigation system
✅ Footer with contractors list

## What's Next to Build

- [ ] Projects archive page template (archive-project.php)
- [ ] Single project detail template (single-project.php)
- [ ] About page template (page-about.php)
- [ ] Contact page template (page-contact.php)
- [ ] Import remaining project data
- [ ] Add filtering to projects page
- [ ] Responsive design testing

---

## Need Help?

Refer to:
- `WORDPRESS_MIGRATION_PLAN.md` for complete strategy
- `README-DOCKER.md` for Docker commands
- WordPress Codex: https://codex.wordpress.org/

---

**Created:** 2026-04-06
**WordPress Version:** Latest (via Docker)
**Theme Version:** 1.0.0
