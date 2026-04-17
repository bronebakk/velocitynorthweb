<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>
  <article class="vn-page">
    <div class="entry-content">
      <?php the_content(); ?>
    </div>
  </article>
<?php endwhile; ?>

<?php get_footer(); ?>
