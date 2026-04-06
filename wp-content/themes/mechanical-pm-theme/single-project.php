<?php
/**
 * Single Project Template
 *
 * @package Mechanical_PM
 */

get_header();

while ( have_posts() ) :
  the_post();

  // Get ACF fields
  $location = get_field( 'location' );
  $year = get_field( 'year_completed' );
  $value = get_field( 'project_value' );
  $size = get_field( 'project_size' );
  $gc = get_field( 'general_contractor' );
  $mc = get_field( 'mechanical_contractor' );
  $role = get_field( 'role_title' );
  $role_desc = get_field( 'role_description' );
  $key_challenge = get_field( 'key_challenge' );
  $overview = get_field( 'project_overview' );
  $field_notes = get_field( 'field_notes' );
  $outcome = get_field( 'outcome' );
  $featured_tag = get_field( 'featured_tag' );
  $scope_items = get_field( 'scope_items' );
  $quote_text = get_field( 'quote_text' );
  $quote_author = get_field( 'quote_author' );
  $quote_title = get_field( 'quote_title' );
  $gallery = get_field( 'project_gallery' );

  // Get taxonomy terms
  $sectors = get_the_terms( get_the_ID(), 'project_sector' );
  $sector_name = ( $sectors && ! is_wp_error( $sectors ) ) ? $sectors[0]->name : '';
  ?>

  <div class="mp-breadcrumb">
    <a href="<?php echo esc_url( get_post_type_archive_link( 'project' ) ); ?>">Projects</a>
    <span class="mp-breadcrumb-sep">/</span>
    <span class="mp-breadcrumb-current"><?php the_title(); ?></span>
  </div>

  <div class="mp-hero-image">
    <?php if ( has_post_thumbnail() ) : ?>
      <?php the_post_thumbnail( 'project-hero' ); ?>
    <?php else : ?>
      <div class="mp-hero-grid"></div>
    <?php endif; ?>
    <div class="mp-hero-overlay">
      <div>
        <p class="mp-hero-label">
          <?php
          $meta_parts = array();
          if ( $location ) $meta_parts[] = $location;
          if ( $year ) $meta_parts[] = $year;
          if ( $sector_name ) $meta_parts[] = $sector_name;
          echo esc_html( implode( ' | ', $meta_parts ) );
          ?>
        </p>
        <p class="mp-hero-title"><?php the_title(); ?></p>
      </div>
      <?php if ( $featured_tag ) : ?>
        <span class="mp-hero-tag"><?php echo esc_html( $featured_tag ); ?></span>
      <?php endif; ?>
    </div>
  </div>

  <div class="mp-content">

    <div class="mp-main">

      <?php if ( $overview || has_excerpt() ) : ?>
        <p class="mp-section-label">Overview</p>
        <h2><?php echo has_excerpt() ? get_the_excerpt() : 'Project Overview'; ?></h2>
        <?php if ( $overview ) : ?>
          <?php echo wpautop( $overview ); ?>
        <?php else : ?>
          <?php the_content(); ?>
        <?php endif; ?>
      <?php endif; ?>

      <?php if ( $key_challenge ) : ?>
        <div class="mp-challenge-block">
          <p class="mp-challenge-label">Key challenge</p>
          <p><?php echo esc_html( $key_challenge ); ?></p>
        </div>
      <?php endif; ?>

      <?php if ( $field_notes ) : ?>
        <p class="mp-section-label">In the field</p>
        <?php echo wpautop( $field_notes ); ?>
      <?php endif; ?>

      <?php if ( $gallery && is_array( $gallery ) ) : ?>
        <div class="mp-photo-grid-2col">
          <?php foreach ( array_slice( $gallery, 0, 2 ) as $image ) : ?>
            <div class="mp-photo-thumb">
              <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" style="width: 100%; height: 100%; object-fit: cover;">
            </div>
          <?php endforeach; ?>
        </div>
        <?php if ( isset( $gallery[0]['caption'] ) && $gallery[0]['caption'] ) : ?>
          <p class="mp-photo-caption"><?php echo esc_html( $gallery[0]['caption'] ); ?></p>
        <?php endif; ?>
      <?php endif; ?>

      <?php if ( $quote_text ) : ?>
        <div class="mp-pull-quote">
          <p>"<?php echo esc_html( $quote_text ); ?>"</p>
          <?php if ( $quote_author ) : ?>
            <cite>
              <?php echo esc_html( $quote_author ); ?>
              <?php if ( $quote_title ) : ?>
                , <?php echo esc_html( $quote_title ); ?>
              <?php endif; ?>
            </cite>
          <?php endif; ?>
        </div>
      <?php endif; ?>

      <?php if ( $outcome ) : ?>
        <div class="mp-divider-thin"></div>
        <p class="mp-section-label">Outcome</p>
        <?php echo wpautop( $outcome ); ?>
      <?php endif; ?>

    </div>

    <div class="mp-sidebar">

      <?php if ( $value ) : ?>
        <div class="mp-spec-block">
          <p class="mp-spec-label">Total project value</p>
          <p class="mp-spec-value large"><?php echo esc_html( $value ); ?></p>
        </div>
        <div class="mp-spec-divider"></div>
      <?php endif; ?>

      <?php if ( $location ) : ?>
        <div class="mp-spec-block">
          <p class="mp-spec-label">Location</p>
          <p class="mp-spec-value"><?php echo esc_html( $location ); ?></p>
        </div>
      <?php endif; ?>

      <?php if ( $year ) : ?>
        <div class="mp-spec-block">
          <p class="mp-spec-label">Completed</p>
          <p class="mp-spec-value"><?php echo esc_html( $year ); ?></p>
        </div>
      <?php endif; ?>

      <?php if ( $size ) : ?>
        <div class="mp-spec-block">
          <p class="mp-spec-label">Size</p>
          <p class="mp-spec-value"><?php echo esc_html( $size ); ?></p>
        </div>
      <?php endif; ?>

      <?php if ( $mc ) : ?>
        <div class="mp-spec-block">
          <p class="mp-spec-label">Mechanical contractor</p>
          <p class="mp-spec-value"><?php echo esc_html( $mc ); ?></p>
        </div>
      <?php endif; ?>

      <?php if ( $gc ) : ?>
        <div class="mp-spec-block">
          <p class="mp-spec-label">General contractor</p>
          <p class="mp-spec-value"><?php echo esc_html( $gc ); ?></p>
        </div>
      <?php endif; ?>

      <?php if ( $role ) : ?>
        <div class="mp-spec-block">
          <p class="mp-spec-label">Role</p>
          <p class="mp-spec-value"><?php echo esc_html( $role ); ?></p>
        </div>
      <?php endif; ?>

      <?php if ( $scope_items && is_array( $scope_items ) ) : ?>
        <div class="mp-spec-divider"></div>
        <p class="mp-spec-label">Mechanical scope</p>
        <ul class="mp-scope-list">
          <?php foreach ( $scope_items as $item ) : ?>
            <?php if ( isset( $item['scope_item'] ) && $item['scope_item'] ) : ?>
              <li><span class="mp-scope-dot"></span><?php echo esc_html( $item['scope_item'] ); ?></li>
            <?php endif; ?>
          <?php endforeach; ?>
        </ul>
      <?php endif; ?>

      <?php
      // Get related projects (same sector, exclude current)
      $related_args = array(
        'post_type' => 'project',
        'posts_per_page' => 2,
        'post__not_in' => array( get_the_ID() ),
        'orderby' => 'rand',
      );

      if ( $sectors && ! is_wp_error( $sectors ) ) {
        $related_args['tax_query'] = array(
          array(
            'taxonomy' => 'project_sector',
            'field' => 'term_id',
            'terms' => $sectors[0]->term_id,
          ),
        );
      }

      $related_projects = new WP_Query( $related_args );

      if ( $related_projects->have_posts() ) :
        ?>
        <div class="mp-nav-projects">
          <p class="mp-nav-proj-label">Other projects</p>
          <?php
          while ( $related_projects->have_posts() ) :
            $related_projects->the_post();
            $rel_location = get_field( 'location' );
            $rel_sectors = get_the_terms( get_the_ID(), 'project_sector' );
            $rel_sector_name = ( $rel_sectors && ! is_wp_error( $rel_sectors ) ) ? $rel_sectors[0]->name : '';
            ?>
            <a href="<?php the_permalink(); ?>" style="text-decoration: none; color: inherit;">
              <div class="mp-nav-proj-item">
                <p class="mp-nav-proj-sector">
                  <?php
                  $rel_meta = array();
                  if ( $rel_sector_name ) $rel_meta[] = $rel_sector_name;
                  if ( $rel_location ) $rel_meta[] = $rel_location;
                  echo esc_html( implode( ' | ', $rel_meta ) );
                  ?>
                </p>
                <p class="mp-nav-proj-name"><?php the_title(); ?></p>
              </div>
            </a>
          <?php
          endwhile;
          wp_reset_postdata();
          ?>
        </div>
      <?php endif; ?>

    </div>

  </div>

<?php
endwhile;

get_footer();
?>
