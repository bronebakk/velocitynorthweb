&lt;/main&gt;

&lt;footer class=&quot;vn-footer&quot;&gt;
  &lt;div class=&quot;vn-container&quot;&gt;
    &lt;div class=&quot;vn-footer-grid&quot;&gt;
      &lt;div&gt;
        &lt;p class=&quot;vn-logo-text&quot; style=&quot;margin-bottom: 1rem;&quot;&gt;&amp;gt; VELOCITY&lt;span style=&quot;color: var(--color-primary);&quot;&gt;NORTH_&lt;/span&gt;&lt;/p&gt;
        &lt;p class=&quot;vn-text-muted-sm&quot;&gt;Data-driven growth for serious businesses.&lt;br&gt;Performance marketing, analytics, and technology consulting.&lt;/p&gt;
      &lt;/div&gt;
      &lt;div&gt;
        &lt;h4 class=&quot;vn-label-sm&quot; style=&quot;margin-bottom: 0.75rem;&quot;&gt;Navigation&lt;/h4&gt;
        &lt;ul class=&quot;vn-footer-links&quot;&gt;
          &lt;li&gt;&lt;a href=&quot;&lt;?php echo esc_url( home_url( &#039;/&#039; ) ); ?&gt;&quot;&gt;Home&lt;/a&gt;&lt;/li&gt;
          &lt;li&gt;&lt;a href=&quot;&lt;?php echo esc_url( home_url( &#039;/about/&#039; ) ); ?&gt;&quot;&gt;About&lt;/a&gt;&lt;/li&gt;
          &lt;li&gt;&lt;a href=&quot;&lt;?php echo esc_url( home_url( &#039;/services/&#039; ) ); ?&gt;&quot;&gt;Services&lt;/a&gt;&lt;/li&gt;
          &lt;li&gt;&lt;a href=&quot;&lt;?php echo esc_url( home_url( &#039;/contact/&#039; ) ); ?&gt;&quot;&gt;Contact&lt;/a&gt;&lt;/li&gt;
        &lt;/ul&gt;
      &lt;/div&gt;
      &lt;div&gt;
        &lt;h4 class=&quot;vn-label-sm&quot; style=&quot;margin-bottom: 0.75rem;&quot;&gt;Contact&lt;/h4&gt;
        &lt;p class=&quot;vn-text-dim&quot;&gt;Gothenburg &amp;amp; Oslo&lt;/p&gt;
        &lt;p class=&quot;vn-text-dim&quot;&gt;&lt;a href=&quot;mailto:contact@velocitynorth.com&quot; style=&quot;color: var(--color-text-dim);&quot;&gt;contact@velocitynorth.com&lt;/a&gt;&lt;/p&gt;
        &lt;p class=&quot;vn-text-dim&quot;&gt;+47 90 63 96 37&lt;/p&gt;
        &lt;p class=&quot;vn-text-dim&quot;&gt;+46 70 422 7777&lt;/p&gt;
      &lt;/div&gt;
    &lt;/div&gt;
    &lt;div class=&quot;vn-footer-bottom&quot;&gt;
      &lt;p class=&quot;vn-text-dim&quot; style=&quot;font-size: 0.75rem;&quot;&gt;&amp;copy; &lt;?php echo date( &#039;Y&#039; ); ?&gt; Velocity North. All rights reserved.&lt;/p&gt;
    &lt;/div&gt;
  &lt;/div&gt;
&lt;/footer&gt;

&lt;style&gt;
  /* Header */
  .vn-site-header {
    position: sticky;
    top: 0;
    z-index: 100;
    background: rgba(18, 18, 18, 0.95);
    backdrop-filter: blur(10px);
    border-bottom: 1px solid var(--color-border);
    padding: 1rem 0;
  }
  .vn-nav {
    display: flex;
    justify-content: space-between;
    align-items: center;
  }
  .vn-logo { text-decoration: none; }
  .vn-logo-text {
    font-family: &#039;Aldrich&#039;, sans-serif;
    font-size: 1.125rem;
    color: var(--color-text);
    letter-spacing: 0.05em;
  }
  .vn-nav-links {
    list-style: none;
    display: flex;
    gap: 2rem;
    align-items: center;
    margin: 0;
    padding: 0;
  }
  .vn-nav-links a {
    font-family: &#039;Aldrich&#039;, sans-serif;
    font-size: 0.8125rem;
    text-transform: uppercase;
    letter-spacing: 0.1em;
    color: var(--color-text-muted);
    text-decoration: none;
    transition: color 0.2s ease;
  }
  .vn-nav-links a:hover {
    color: var(--color-primary);
    text-decoration: none;
  }
  /* Remove WP menu item wrapper styles */
  .vn-nav-links li { list-style: none; }
  .vn-nav-links .sub-menu { display: none; }

  /* Footer */
  .vn-footer {
    background: var(--color-bg-darker);
    border-top: 1px solid var(--color-border);
    padding: 4rem 0 2rem;
  }
  .vn-footer-grid {
    display: grid;
    grid-template-columns: 2fr 1fr 1fr;
    gap: 3rem;
    margin-bottom: 3rem;
  }
  .vn-footer-links {
    list-style: none;
    padding: 0;
    margin: 0;
  }
  .vn-footer-links li { margin-bottom: 0.5rem; }
  .vn-footer-links a {
    color: var(--color-text-dim);
    font-size: 0.875rem;
    text-decoration: none;
  }
  .vn-footer-links a:hover { color: var(--color-primary); }
  .vn-footer-bottom {
    border-top: 1px solid var(--color-border);
    padding-top: 1.5rem;
    text-align: center;
  }

  /* Main content area */
  .vn-main { position: relative; z-index: 1; }

  @media (max-width: 768px) {
    .vn-nav { flex-direction: column; gap: 1rem; }
    .vn-nav-links { gap: 1rem; flex-wrap: wrap; justify-content: center; }
    .vn-footer-grid { grid-template-columns: 1fr; gap: 2rem; }
  }
&lt;/style&gt;

&lt;?php wp_footer(); ?&gt;
&lt;/body&gt;
&lt;/html&gt;
