<?php
/**
 * Projects Archive Template
 *
 * @package Mechanical_PM
 */

get_header();
?>

<div class="mp-page-header">
  <div>
    <p class="mp-kicker">Projects portfolio</p>
    <h1>The work,<br><em>in detail.</em></h1>
  </div>
  <p class="mp-page-header-desc">
    A range of mechanical projects, from hospital energy centers to billion-dollar stadiums. Each one is different. The problems, the teams, the constraints. Here's how some of them went.
  </p>
</div>

<div class="mp-filters">
  <span class="mp-filter-label">Filter</span>
  <button class="mp-filter-btn active" data-filter="all">All</button>
  <button class="mp-filter-btn" data-filter="healthcare">Healthcare</button>
  <button class="mp-filter-btn" data-filter="commercial">Commercial</button>
  <button class="mp-filter-btn" data-filter="entertainment">Entertainment</button>
</div>

<div class="mp-projects-section">

  <?php
  if ( have_posts() ) :
    while ( have_posts() ) :
      the_post();

      // Get ACF fields
      $location = get_field( 'location' );
      $year = get_field( 'year_completed' );
      $value = get_field( 'project_value' );
      $size = get_field( 'project_size' );
      $gc = get_field( 'general_contractor' );
      $role = get_field( 'role_title' );
      $role_desc = get_field( 'role_description' );
      $key_challenge = get_field( 'key_challenge' );
      $featured_tag = get_field( 'featured_tag' );

      // Get taxonomy terms
      $sectors = get_the_terms( get_the_ID(), 'project_sector' );
      $sector_name = ( $sectors && ! is_wp_error( $sectors ) ) ? $sectors[0]->name : '';
      $sector_slug = ( $sectors && ! is_wp_error( $sectors ) ) ? $sectors[0]->slug : '';
      ?>

      <div class="mp-project-row" data-sector="<?php echo esc_attr( $sector_slug ); ?>">
        <div class="mp-project-row-photo">
          <?php if ( has_post_thumbnail() ) : ?>
            <?php the_post_thumbnail( 'project-row' ); ?>
          <?php else : ?>
            <div class="mp-photo-grid"></div>
          <?php endif; ?>
        </div>
        <div class="mp-project-row-content">
          <div>
            <div class="mp-project-row-top">
              <div>
                <p class="mp-project-row-meta">
                  <?php
                  $meta_parts = array();
                  if ( $location ) $meta_parts[] = $location;
                  if ( $year ) $meta_parts[] = $year;
                  if ( $sector_name ) $meta_parts[] = $sector_name;
                  echo esc_html( implode( ' | ', $meta_parts ) );
                  ?>
                </p>
                <p class="mp-project-row-name"><?php the_title(); ?></p>
                <p class="mp-project-row-scope">
                  <?php
                  $scope_parts = array();
                  if ( $value ) $scope_parts[] = $value;
                  if ( $gc ) $scope_parts[] = $gc;
                  if ( $size ) $scope_parts[] = $size;
                  echo esc_html( implode( ' | ', $scope_parts ) );
                  ?>
                </p>
              </div>
              <?php if ( $featured_tag ) : ?>
                <span class="mp-project-row-tag"><?php echo esc_html( $featured_tag ); ?></span>
              <?php endif; ?>
            </div>
            <div class="mp-project-row-body">
              <div>
                <p class="mp-detail-label">Role</p>
                <p class="mp-detail-value">
                  <?php echo esc_html( $role ? $role : 'Mechanical Project Manager' ); ?>
                  <?php if ( $role_desc ) : ?>
                    . <?php echo esc_html( $role_desc ); ?>
                  <?php endif; ?>
                </p>
              </div>
              <?php if ( $key_challenge ) : ?>
                <div>
                  <p class="mp-detail-label">Key challenge</p>
                  <p class="mp-detail-value"><?php echo esc_html( $key_challenge ); ?></p>
                </div>
              <?php endif; ?>
            </div>
          </div>
          <div class="mp-project-row-footer">
            <span class="mp-role-tag">
              General Contractor: <?php echo esc_html( $gc ? $gc : 'N/A' ); ?>
            </span>
            <a href="<?php the_permalink(); ?>" class="mp-view-link">View project</a>
          </div>
        </div>
      </div>

    <?php
    endwhile;
  else :
    ?>
    <p style="padding: 60px 48px;">No projects found.</p>
  <?php
  endif;
  ?>

</div>

<div class="mp-stats-bar">
  <div class="mp-stat">
    <p class="mp-stat-num">$35M</p>
    <p class="mp-stat-label">Largest single project</p>
  </div>
  <div class="mp-stat">
    <p class="mp-stat-num">15+</p>
    <p class="mp-stat-label">Years experience</p>
  </div>
  <div class="mp-stat">
    <p class="mp-stat-num">6</p>
    <p class="mp-stat-label">General contractors</p>
  </div>
  <div class="mp-stat">
    <p class="mp-stat-num">2</p>
    <p class="mp-stat-label">Primary sectors</p>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const filterButtons = document.querySelectorAll('.mp-filter-btn');
  const projectRows = document.querySelectorAll('.mp-project-row');

  filterButtons.forEach(button => {
    button.addEventListener('click', function() {
      // Update active state
      filterButtons.forEach(btn => btn.classList.remove('active'));
      this.classList.add('active');

      // Get filter value
      const filter = this.getAttribute('data-filter');

      // Filter projects
      projectRows.forEach(row => {
        if (filter === 'all') {
          row.style.display = '';
        } else {
          const sector = row.getAttribute('data-sector');
          row.style.display = sector === filter ? '' : 'none';
        }
      });
    });
  });
});
</script>

<?php get_footer(); ?>
