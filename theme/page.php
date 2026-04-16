&lt;?php get_header(); ?&gt;

&lt;?php while ( have_posts() ) : the_post(); ?&gt;
  &lt;article class=&quot;vn-page&quot;&gt;
    &lt;div class=&quot;entry-content&quot;&gt;
      &lt;?php the_content(); ?&gt;
    &lt;/div&gt;
  &lt;/article&gt;
&lt;?php endwhile; ?&gt;

&lt;?php get_footer(); ?&gt;
