# WordPress Migration Plan - Mechanical PM Portfolio

## Overview
This document outlines the complete plan for migrating the Mechanical PM static HTML portfolio to WordPress.

---

## 1. Theme Structure

### Custom Theme: `mechanical-pm-theme`

**Directory Structure:**
```
wp-content/themes/mechanical-pm-theme/
├── style.css                    # Main stylesheet with WP headers
├── functions.php                # Theme functions and setup
├── header.php                   # Site header with navigation
├── footer.php                   # Site footer
├── index.php                    # Fallback template
├── front-page.php              # Homepage template
├── page.php                     # Default page template
├── single-project.php          # Single project detail page
├── archive-project.php         # Projects listing page
├── page-about.php              # About page template
├── page-contact.php            # Contact page template
├── inc/
│   ├── custom-post-types.php   # Register custom post types
│   └── acf-fields.php          # ACF field definitions (if using ACF)
├── template-parts/
│   ├── navigation.php          # Main navigation
│   ├── project-card.php        # Project card component
│   └── project-row.php         # Project row component
└── assets/
    ├── css/
    ├── js/
    └── images/
```

---

## 2. Content Architecture

### Custom Post Types

#### Projects CPT
- **Slug:** `project`
- **Supports:** title, editor, thumbnail, excerpt
- **Hierarchical:** false
- **Public:** true
- **Has Archive:** true (projects page)
- **Rewrite:** `/projects/{post-name}`

### Taxonomies

#### Project Sector
- **Slug:** `project_sector`
- **Terms:** Healthcare, Commercial, Entertainment
- **Hierarchical:** false (tags style)

#### Project Location
- **Slug:** `project_location`
- **Terms:** Las Vegas NV, Miami FL, etc.
- **Hierarchical:** false

---

## 3. Custom Fields (ACF)

### Project Fields

**Project Details:**
- `location` - Text
- `year_completed` - Number (4 digits)
- `project_value` - Text (e.g., "$1.9B")
- `project_size` - Text (e.g., "1.8M sq ft")
- `project_scope` - Text (short description)

**Companies & Contractors:**
- `general_contractor` - Text
- `mechanical_contractor` - Text
- `client` - Text (optional)

**Role Information:**
- `role_title` - Text (e.g., "Mechanical PM, Dry-Side")
- `role_description` - Textarea

**Project Content:**
- `key_challenge` - Textarea
- `project_overview` - WYSIWYG Editor
- `field_notes` - WYSIWYG Editor
- `outcome` - WYSIWYG Editor

**Project Metadata:**
- `featured_tag` - Text (e.g., "Landmark", "Healthcare")
- `scope_items` - Repeater
  - `scope_item` - Text
- `project_gallery` - Gallery (additional project images)
- `quote_text` - Textarea (optional testimonial)
- `quote_author` - Text
- `quote_title` - Text

---

## 4. Standard WordPress Pages

| Page Name | Slug | Template | Purpose |
|-----------|------|----------|---------|
| Home | `/` | front-page.php | Homepage with featured projects |
| Projects | `/projects` | archive-project.php | All projects listing |
| About | `/about` | page-about.php | About Zack |
| Contact | `/contact` | page-contact.php | Contact form |
| Insights | `/insights` | archive.php | Blog posts |
| Applied A.I. | `/applied-ai` | page.php | Standard page |

---

## 5. Required Plugins

### Essential
1. **Advanced Custom Fields (ACF) PRO** - Custom fields for projects
   - License required for production
   - Free version works for development

### Recommended
2. **Contact Form 7** or **WPForms Lite** - Contact page functionality
3. **Yoast SEO** or **Rank Math** - SEO optimization
4. **Enable Media Replace** - Easy image updates
5. **Regenerate Thumbnails** - Image size management

### Development Only
6. **Query Monitor** - Debugging and performance
7. **WP Migrate DB** - Database sync between environments

---

## 6. Implementation Phases

### Phase 1: Environment Setup ✓
- [x] Set up Docker environment
- [ ] Install WordPress
- [ ] Install required plugins
- [ ] Configure basic settings

### Phase 2: Theme Foundation
- [ ] Create theme directory structure
- [ ] Set up style.css with WordPress headers
- [ ] Build header.php with wp_head() and wp_nav_menu()
- [ ] Build footer.php with wp_footer()
- [ ] Create functions.php with theme support
- [ ] Register navigation menus
- [ ] Enqueue styles and scripts

### Phase 3: Custom Post Types & Taxonomies
- [ ] Register Projects CPT in custom-post-types.php
- [ ] Register project_sector taxonomy
- [ ] Register project_location taxonomy
- [ ] Create ACF field groups
- [ ] Add all custom fields for projects

### Phase 4: Template Development
- [ ] front-page.php - Homepage
  - Hero section
  - Featured projects grid (3 items)
  - Insights preview
  - Bio section
- [ ] archive-project.php - Projects listing
  - Filter buttons (All, Healthcare, Commercial, Entertainment)
  - Project rows with images
  - Stats bar
- [ ] single-project.php - Project detail
  - Hero image with overlay
  - Sidebar with specs
  - Main content area
  - Photo gallery
  - Related projects
- [ ] page-about.php - About page
  - Hero with photo
  - Background content
  - Project highlights
- [ ] page-contact.php - Contact form

### Phase 5: Components & Template Parts
- [ ] Create reusable navigation component
- [ ] Create project card component (grid style)
- [ ] Create project row component (list style)
- [ ] Create general contractor strip component
- [ ] Create footer component

### Phase 6: Content Migration
- [ ] Import project images to media library
- [ ] Create all project posts
- [ ] Populate ACF fields for each project
- [ ] Create standard pages (About, Contact, etc.)
- [ ] Set up navigation menu
- [ ] Configure homepage to use front-page.php

### Phase 7: Styling & Polish
- [ ] Convert existing CSS to WordPress theme
- [ ] Ensure responsive design works
- [ ] Test all page templates
- [ ] Cross-browser testing
- [ ] Performance optimization

### Phase 8: Testing & Launch
- [ ] Test all functionality
- [ ] Test contact forms
- [ ] SEO setup (meta descriptions, titles)
- [ ] Create sitemap
- [ ] Final QA pass
- [ ] Deploy to production

---

## 7. Key WordPress Functions to Implement

### projects Query (Homepage)
```php
$featured_projects = new WP_Query(array(
    'post_type' => 'project',
    'posts_per_page' => 3,
    'orderby' => 'date',
    'order' => 'DESC'
));
```

### Filtered Projects Query
```php
$args = array(
    'post_type' => 'project',
    'posts_per_page' => -1,
    'tax_query' => array(
        array(
            'taxonomy' => 'project_sector',
            'field' => 'slug',
            'terms' => $_GET['sector'] // healthcare, commercial, entertainment
        )
    )
);
```

### ACF Field Output
```php
// Get custom fields
$location = get_field('location');
$year = get_field('year_completed');
$value = get_field('project_value');
$gc = get_field('general_contractor');
```

---

## 8. Navigation Structure

### Primary Menu
- Home (`/`)
- Projects (`/projects`)
- Insights (`/insights`)
- Applied A.I. (`/applied-ai`) - **Accent color**
- Contact (`/contact`)

---

## 9. Docker Setup

### Services
- **WordPress** (latest)
- **MySQL 8.0**
- **phpMyAdmin** (optional, for database management)

### Ports
- WordPress: `http://localhost:8000`
- phpMyAdmin: `http://localhost:8080`

### Volumes
- `./wordpress` - WordPress files
- `./db_data` - MySQL database
- `./themes/mechanical-pm-theme` - Custom theme (mapped)

---

## 10. Development Workflow

1. **Local Development**: Docker environment
2. **Version Control**: Git repository
3. **Theme Development**: Direct file editing in `wp-content/themes/mechanical-pm-theme`
4. **Database Sync**: Export/import via WP Migrate DB or WP-CLI
5. **Deployment**:
   - Theme files via Git/FTP
   - Database via migration plugin
   - Media library via rsync or plugin

---

## 11. Success Criteria

- [ ] All pages match original HTML design
- [ ] Projects are manageable via WordPress admin
- [ ] Filtering works on projects page
- [ ] Contact form functions properly
- [ ] Mobile responsive
- [ ] Fast page load times (<2s)
- [ ] SEO optimized
- [ ] Easy for client to update content

---

## 12. Future Enhancements

- Custom Gutenberg blocks for reusable components
- AJAX filtering on projects page (no page reload)
- Project search functionality
- Related projects algorithm
- Case study PDF downloads
- Analytics integration
- Newsletter signup integration

---

## Notes

- Keep existing design system intact (fonts, colors, spacing)
- Maintain same URL structure where possible
- Ensure all images are optimized before upload
- Set up 301 redirects if URLs change
- Create staging environment for client review
- Document custom fields for client reference

---

**Last Updated:** 2026-04-06
