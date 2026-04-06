<?php
/**
 * Template Name: Contact Page
 *
 * @package Mechanical_PM
 */

get_header();

while ( have_posts() ) :
  the_post();
  ?>

  <div class="mp-page-header">
    <div>
      <p class="mp-kicker">Get in touch</p>
      <h1><?php the_title(); ?></h1>
    </div>
    <p class="mp-page-header-desc">
      Questions about a project? Want to discuss an opportunity? Reach out directly.
    </p>
  </div>

  <div class="about-content">

    <div class="about-section">
      <h2>Contact Information</h2>
      <p>The best way to reach me is via email or LinkedIn. I typically respond within 24-48 hours.</p>

      <div style="margin-top: 32px;">
        <p style="font-size: 14px; color: #9C9890; letter-spacing: 0.1em; text-transform: uppercase; margin-bottom: 8px;">Email</p>
        <p style="font-size: 17px; color: #1C1C1A; margin-bottom: 24px;">
          <a href="mailto:zack@mechanicalpm.com" style="color: #B07C3A; text-decoration: none;">zack@mechanicalpm.com</a>
        </p>

        <p style="font-size: 14px; color: #9C9890; letter-spacing: 0.1em; text-transform: uppercase; margin-bottom: 8px;">LinkedIn</p>
        <p style="font-size: 17px; color: #1C1C1A; margin-bottom: 24px;">
          <a href="https://www.linkedin.com/in/zacklancaster" target="_blank" rel="noopener noreferrer" style="color: #B07C3A; text-decoration: none;">linkedin.com/in/zacklancaster</a>
        </p>

        <p style="font-size: 14px; color: #9C9890; letter-spacing: 0.1em; text-transform: uppercase; margin-bottom: 8px;">Location</p>
        <p style="font-size: 17px; color: #1C1C1A;">Las Vegas, NV</p>
      </div>
    </div>

    <?php if ( is_plugin_active( 'contact-form-7/wp-contact-form-7.php' ) ) : ?>
      <div class="about-section">
        <h2>Send a Message</h2>
        <?php
        // If Contact Form 7 is active, you can add the shortcode here
        // Replace [contact-form-7 id="123"] with your actual form ID
        the_content();
        ?>
      </div>
    <?php else : ?>
      <div class="about-section">
        <?php the_content(); ?>
      </div>
    <?php endif; ?>

    <div class="project-highlight" style="margin-top: 48px;">
      <h3>Areas of Focus</h3>
      <ul>
        <li>Healthcare mechanical systems</li>
        <li>Large-scale commercial projects</li>
        <li>Entertainment and sports venues</li>
        <li>Complex HVAC coordination</li>
        <li>Project management consulting</li>
      </ul>
    </div>

  </div>

<?php
endwhile;

get_footer();
?>
