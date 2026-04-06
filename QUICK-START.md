# Quick Start Guide - Adding Your First Project

## 1. Create Project Taxonomies

### Add Project Sectors
1. Go to **Projects > Sectors**
2. Add these terms:
   - **Healthcare**
   - **Commercial**
   - **Entertainment**

### Add Project Locations
1. Go to **Projects > Locations**
2. Add these terms:
   - **Las Vegas, NV**
   - **Miami, FL**

## 2. Create Navigation Menu

1. Go to **Appearance > Menus**
2. Create a new menu called **"Primary Menu"**
3. Add these pages/links:
   - **Home** - Custom Link: `/`
   - **Projects** - Custom Link: `/projects`
   - **Insights** - Custom Link: `/insights` (or `/blog`)
   - **Applied A.I.** - Custom Link: `/applied-ai`
     - Click the arrow to expand
     - Add CSS class: `accent`
   - **Contact** - Custom Link: `/contact`
4. Assign menu to **Primary Menu** location
5. Save Menu

## 3. Configure WordPress Settings

### Permalinks
1. Go to **Settings > Permalinks**
2. Select **Post name**
3. Save Changes

### Reading Settings
1. Go to **Settings > Reading**
2. **Homepage displays:** Select "A static page"
3. **Homepage:** Leave as default (will use front-page.php)
4. Save Changes

## 4. Create Your First Project

### Go to Projects > Add New

**Title:** Allegiant Stadium

**Content (optional):**
You can add any additional description here.

### Set Featured Image
Click "Set featured image" and upload: `images/raiders-stadium.jpg`

### Fill in Project Details (ACF Fields)

**Basic Info:**
- **Location:** Las Vegas, NV
- **Year Completed:** 2020
- **Total Project Value:** $1.9B
- **Project Size:** 1.8M sq ft
- **Project Scope:** $1.9B total | Harris Company | 1.8M sq ft

**Companies:**
- **General Contractor:** Harris Company
- **Mechanical Contractor:** (leave blank or fill in)

**Role:**
- **Role Title:** Mechanical PM, Dry-Side
- **Role Description:** Ductwork, grease duct, FCUs, air handlers, PCUs

**Content:**
- **Project Overview:**
  ```
  Allegiant Stadium is a $1.9 billion, 1.8 million square foot domed stadium in Las Vegas, home of the Raiders. The mechanical scope on the dry-side alone was a substantial undertaking: ductwork, grease duct, fan coil units, air handlers, and process cooling units throughout the bowl and concourse levels.

  The upper bowl ductwork ran up to 108 inches in diameter using oval fabric duct. This system specification had never been executed at this scale in the U.S.
  ```

- **Key Challenge:**
  ```
  Fabric duct at 108" diameter has essentially no precedent in U.S. construction. The manufacturer, the GC, and the design team were all navigating unfamiliar territory at the same time. Maintaining schedule while working through submittal revisions, lead times, and field fit conditions meant staying well ahead of the install sequence.
  ```

- **In the Field:**
  ```
  At peak construction, Allegiant Stadium had thousands of workers on site across dozens of subcontractors. The mechanical dry-side scope had to weave through structural steel, electrical rough-in, and architectural finishes on an aggressive schedule. Most of the challenge wasn't the ductwork itself. It was sequencing and communication.
  ```

- **Outcome:**
  ```
  The dry-side mechanical scope was completed in 2020. The fabric duct installation remains the largest of its kind in the United States. The stadium opened to full capacity for the 2020 NFL season.
  ```

**Featured Tag:** Landmark

**Mechanical Scope Items:** Click "Add Scope Item" for each:
- Ductwork (up to 108" diameter)
- Oval fabric duct system
- Grease duct
- Fan coil units (FCUs)
- Air handlers
- Process cooling units (PCUs)

**Project Gallery:**
Upload 2-3 additional images from the `images/` folder

**Quote/Testimonial:**
- **Quote Text:** Zack did a tremendous job on a very challenging project. He is a very capable project manager that I would undoubtedly work with again.
- **Quote Author:** Chris Dusivitch
- **Quote Author Title:** Bovis Lend Lease

### Assign Taxonomies

On the right sidebar:
- **Project Sectors:** Check "Entertainment"
- **Project Locations:** Check "Las Vegas, NV"

### Publish!

Click **Publish** button.

## 5. Create Standard Pages

### About Page
1. Go to **Pages > Add New**
2. **Title:** About
3. **Template:** Select "About Page" from the Template dropdown (right sidebar)
4. **Content:** Add any additional content about your background
5. **Publish**

### Contact Page
1. Go to **Pages > Add New**
2. **Title:** Contact
3. **Template:** Select "Contact Page" from the Template dropdown
4. **Content:** (Optional) Add Contact Form 7 shortcode if you've created a form
5. **Publish**

## 6. View Your Site!

Visit http://localhost:8000 to see:
- ✅ Homepage with featured projects
- ✅ Projects archive at `/projects`
- ✅ Individual project detail pages
- ✅ About page
- ✅ Contact page
- ✅ Working navigation
- ✅ Filtering on projects page

## 7. Add More Projects

Repeat step 4 with these projects:

### Baptist Hospital East Energy Center
- Location: Miami, FL
- Year: 2020
- Value: $80M
- GC: Bovis Lend Lease
- Sector: Healthcare
- Image: `images/baptist-energy-center.jpg`

### Memorial Regional Hospital ED Expansion
- Location: Miami, FL
- Sector: Healthcare
- GC: Sundt
- Image: `images/west-kendall-hospital.jpg`

---

## Troubleshooting

**Projects not showing up?**
- Make sure you published them (not just drafted)
- Check that permalinks are set to "Post name"

**ACF fields not appearing?**
- Make sure ACF plugin is activated
- The fields should appear automatically under post editor

**Images not displaying?**
- Upload images to Media Library
- Set as Featured Image for each project

**Navigation not working?**
- Go to Appearance > Menus
- Make sure menu is assigned to "Primary Menu" location

**404 errors on projects?**
- Go to Settings > Permalinks
- Click Save Changes (flushes rewrite rules)

---

## Next Steps

1. ✅ Add all remaining projects
2. ✅ Create blog posts for Insights section
3. ✅ Test all pages and functionality
4. ✅ Optimize images for web
5. ✅ Set up Contact Form 7 form
6. ✅ Configure SEO with Yoast
7. ✅ Export for production deployment

---

**Theme Version:** 1.0.0
**Last Updated:** 2026-04-06
