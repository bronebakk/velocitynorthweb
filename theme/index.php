&lt;?php get_header(); ?&gt;

&lt;div class=&quot;vn-section&quot;&gt;
  &lt;div class=&quot;vn-container&quot;&gt;
    &lt;?php if ( have_posts() ) : ?&gt;
      &lt;?php while ( have_posts() ) : the_post(); ?&gt;
        &lt;article class=&quot;vn-card&quot; style=&quot;padding: 2rem; margin-bottom: 1.5rem;&quot;&gt;
          &lt;h2 class=&quot;vn-heading-md&quot;&gt;&lt;a href=&quot;&lt;?php the_permalink(); ?&gt;&quot;&gt;&lt;?php the_title(); ?&gt;&lt;/a&gt;&lt;/h2&gt;
          &lt;div class=&quot;vn-text-muted-sm&quot;&gt;&lt;?php the_excerpt(); ?&gt;&lt;/div&gt;
        &lt;/article&gt;
      &lt;?php endwhile; ?&gt;
    &lt;?php else : ?&gt;
      &lt;p class=&quot;vn-text-muted&quot;&gt;No content found.&lt;/p&gt;
    &lt;?php endif; ?&gt;
  &lt;/div&gt;
&lt;/div&gt;

&lt;?php get_footer(); ?&gt;
