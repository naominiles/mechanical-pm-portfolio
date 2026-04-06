<?php
/**
 * Template Name: About Page
 *
 * @package Mechanical_PM
 */

get_header();

while ( have_posts() ) :
  the_post();
  ?>

  <div class="about-hero">
    <div class="about-hero-bg"></div>
    <div class="about-hero-content">
      <div class="about-photo">
        <?php
        $profile_photo = get_template_directory_uri() . '/assets/images/zackary-lancaster.png';
        ?>
        <img src="<?php echo esc_url( $profile_photo ); ?>" alt="Zackary Lancaster">
      </div>
      <div class="about-hero-text">
        <h1>Zack Lancaster</h1>
        <p class="subtitle">Mechanical Project Manager | Las Vegas, NV</p>
        <p>Over 15 years of experience managing mechanical projects ranging from $200K to $35M across healthcare, commercial, and large-scale entertainment construction.</p>
      </div>
    </div>
  </div>

  <div class="about-content">

    <div class="about-section">
      <h2>Background</h2>
      <p>I started with a bachelor's degree in construction engineering, graduating cum laude. Throughout my career, I've prioritized teamwork, operational efficiency, and client satisfaction. I've managed projects of varying scales and complexities by working closely with subcontractors, general contractors, superintendents, architects, and engineers to achieve project milestones.</p>
    </div>

    <div class="about-section">
      <h2>Key expertise</h2>
      <ul class="about-list">
        <li>Effective communication with superintendents and foremen, implementing systems to enhance labor productivity and reduce costs</li>
        <li>Coordinating projects with subcontractors, engineers, and general contractors to meet project schedules</li>
        <li>Managing project control systems, including budget creation, scheduling, expense and labor hour tracking, and payment approvals</li>
        <li>Estimating and preparing change orders for scopes of work</li>
        <li>Soliciting and evaluating bids from material suppliers and subcontractors, and awarding contracts</li>
        <li>Collaborating with estimators to develop comprehensive scopes of work for subcontractors and vendors</li>
        <li>Overseeing submittal preparation, review, and tracking processes</li>
        <li>Conducting thorough site visits and inspections to ensure project success and exceed customer expectations</li>
      </ul>
    </div>

    <div class="project-highlight">
      <h3>Notable projects</h3>
      <ul>
        <?php
        // Get featured projects dynamically
        $featured_projects = new WP_Query( array(
          'post_type' => 'project',
          'posts_per_page' => 5,
          'orderby' => 'date',
          'order' => 'DESC',
        ) );

        if ( $featured_projects->have_posts() ) :
          while ( $featured_projects->have_posts() ) :
            $featured_projects->the_post();
            $location = get_field( 'location' );
            ?>
            <li>
              <?php the_title(); ?><?php if ( $location ) : ?>, <?php echo esc_html( $location ); ?><?php endif; ?>
            </li>
          <?php
          endwhile;
          wp_reset_postdata();
        else :
          ?>
          <li>Raiders Football Stadium, Las Vegas, NV</li>
          <li>West Kendall Baptist Hospital, Miami, FL</li>
          <li>Baptist Hospital of Miami ED Addition</li>
          <li>Baptist Hospital of Miami East Energy Center</li>
          <li>Kendall Regional Medical Center</li>
        <?php endif; ?>
      </ul>
      <p style="margin-top: 20px; font-size: 14px; color: #5C5C58;">
        See the full portfolio <a href="<?php echo esc_url( get_post_type_archive_link( 'project' ) ); ?>" style="color: #B07C3A; text-decoration: none;">here</a>.
      </p>
    </div>

    <div class="about-section">
      <?php the_content(); ?>
    </div>

    <div class="personal-section">
      <h3>Personal interests</h3>
      <p>Beyond professional work, I enjoy spending quality time with family and friends, exploring new destinations through travel, participating in CrossFit competitions, and remodeling my 1950s mid-century home in the vibrant Arts District.</p>
    </div>

    <div class="cta-section">
      <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="cta-link">Get in touch</a>
    </div>

  </div>

<?php
endwhile;

get_footer();
?>
