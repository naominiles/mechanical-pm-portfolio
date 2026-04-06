<?php
/**
 * The main template file
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

<?php
// Get recent posts
if ( have_posts() ) :
?>
  <section class="mp-section">
    <p class="mp-section-label">Recent Updates</p>

    <div class="mp-insights-list">
      <?php
      while ( have_posts() ) :
        the_post();
        ?>
        <li>
          <p class="mp-insight-date"><?php echo get_the_date(); ?></p>
          <p class="mp-insight-title">
            <a href="<?php the_permalink(); ?>" style="color: inherit; text-decoration: none;">
              <?php the_title(); ?>
            </a>
          </p>
        </li>
      <?php endwhile; ?>
    </div>
  </section>
<?php
endif;
?>

<?php get_footer(); ?>
