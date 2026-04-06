<?php
/**
 * Homepage Template
 *
 * @package Mechanical_PM
 */

get_header();
?>

<section class="mp-hero">
  <p class="mp-kicker">Mechanical Project Manager | Las Vegas, NV</p>
  <h1>Complex projects.<br>Straightforward work.</h1>
  <p class="mp-hero-sub">
    What I do, what I've built, and how I think about the work. No sales pitch.
  </p>
</section>

<div class="mp-divider"></div>

<section class="mp-section">
  <p class="mp-section-label">Selected projects</p>
  <div class="mp-projects">

    <?php
    // Get featured projects
    $featured_projects = mechanical_pm_get_featured_projects( 3 );

    if ( $featured_projects->have_posts() ) :
      while ( $featured_projects->have_posts() ) :
        $featured_projects->the_post();

        // Get ACF fields
        $location = get_field( 'location' );
        $year = get_field( 'year_completed' );
        $value = get_field( 'project_value' );
        $size = get_field( 'project_size' );
        $gc = get_field( 'general_contractor' );
        $role = get_field( 'role_title' );

        // Get taxonomy terms
        $sectors = get_the_terms( get_the_ID(), 'project_sector' );
        $sector_name = ( $sectors && ! is_wp_error( $sectors ) ) ? $sectors[0]->name : '';
        ?>

        <div class="mp-project-card">
          <div class="mp-project-thumb">
            <?php if ( has_post_thumbnail() ) : ?>
              <?php the_post_thumbnail( 'project-card' ); ?>
            <?php else : ?>
              <div class="mp-project-thumb-lines"></div>
            <?php endif; ?>
          </div>
          <p class="mp-project-label"><?php echo esc_html( $location ); ?> | <?php echo esc_html( $year ); ?></p>
          <p class="mp-project-name"><?php the_title(); ?></p>
          <p class="mp-project-meta">
            <?php
            $meta_parts = array();
            if ( $value ) $meta_parts[] = $value;
            if ( $size ) $meta_parts[] = $size;
            if ( $gc ) $meta_parts[] = $gc;
            echo esc_html( implode( ' | ', $meta_parts ) );
            ?>
          </p>
          <?php if ( $role ) : ?>
            <p class="mp-project-role"><?php echo esc_html( $role ); ?></p>
          <?php endif; ?>
        </div>

      <?php
      endwhile;
      wp_reset_postdata();
    endif;
    ?>

  </div>
  <a href="<?php echo esc_url( get_post_type_archive_link( 'project' ) ); ?>" class="mp-portfolio-link">View full portfolio</a>
</section>

<div class="mp-divider"></div>

<section class="mp-section">
  <div class="mp-two-col">

    <div>
      <p class="mp-section-label">Innovation &amp; Insights</p>
      <p style="font-size:14px; color:#5C5C58; margin-bottom:28px; line-height:1.7;">
        Notes on field problem solving, process, and what actually happens on large mechanical projects.
      </p>
      <ul class="mp-insights-list">
        <?php
        $recent_posts = new WP_Query( array(
          'posts_per_page' => 3,
          'post_type' => 'post',
        ) );

        if ( $recent_posts->have_posts() ) :
          while ( $recent_posts->have_posts() ) :
            $recent_posts->the_post();
            ?>
            <li>
              <p class="mp-insight-date"><?php echo get_the_date( 'F Y' ); ?></p>
              <p class="mp-insight-title">
                <a href="<?php the_permalink(); ?>" style="color: inherit; text-decoration: none;">
                  <?php the_title(); ?>
                </a>
              </p>
            </li>
          <?php
          endwhile;
          wp_reset_postdata();
        else :
          ?>
          <li>
            <p class="mp-insight-date">Link to writing</p>
            <p class="mp-insight-title">Article title goes here</p>
          </li>
          <li>
            <p class="mp-insight-date">Link to writing</p>
            <p class="mp-insight-title">Article title goes here</p>
          </li>
          <li>
            <p class="mp-insight-date">Link to writing</p>
            <p class="mp-insight-title">Article title goes here</p>
          </li>
        <?php endif; ?>
      </ul>
    </div>

    <div>
      <p class="mp-section-label">Focus areas</p>
      <ul class="mp-focus-list">
        <li><span class="mp-focus-dot"></span>Project execution</li>
        <li><span class="mp-focus-dot"></span>Field problem solving</li>
        <li><span class="mp-focus-dot"></span>Process improvement</li>
        <li><span class="mp-focus-dot"></span>Team development</li>
        <li><span class="mp-focus-dot"></span>Client relationships</li>
      </ul>
    </div>

  </div>
</section>

<div class="mp-bio">
  <div class="mp-bio-photo">
    <?php
    // Look for the profile photo in the theme directory
    $profile_photo = get_template_directory_uri() . '/assets/images/zackary-lancaster.png';
    ?>
    <img src="<?php echo esc_url( $profile_photo ); ?>" alt="Zack Lancaster">
  </div>
  <div>
    <h2>Zack Lancaster</h2>
    <p class="mp-bio-title">Mechanical Project Manager</p>
    <p>
      I've managed mechanical projects up to $35M across healthcare, commercial, and large-scale entertainment construction.
      The work is specific, demanding, and rarely goes exactly as planned. That's the part I find most interesting.
    </p>
    <a href="<?php echo esc_url( home_url( '/about' ) ); ?>" class="mp-bio-link">About</a>
  </div>
</div>

<?php get_footer(); ?>
