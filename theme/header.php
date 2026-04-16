&lt;!DOCTYPE html&gt;
&lt;html &lt;?php language_attributes(); ?&gt;&gt;
&lt;head&gt;
  &lt;meta charset=&quot;&lt;?php bloginfo( &#039;charset&#039; ); ?&gt;&quot;&gt;
  &lt;meta name=&quot;viewport&quot; content=&quot;width=device-width, initial-scale=1.0&quot;&gt;
  &lt;?php wp_head(); ?&gt;
&lt;/head&gt;
&lt;body &lt;?php body_class(); ?&gt;&gt;
&lt;?php wp_body_open(); ?&gt;

&lt;header class=&quot;vn-site-header&quot;&gt;
  &lt;div class=&quot;vn-container&quot;&gt;
    &lt;nav class=&quot;vn-nav&quot;&gt;
      &lt;a href=&quot;&lt;?php echo esc_url( home_url( &#039;/&#039; ) ); ?&gt;&quot; class=&quot;vn-logo&quot;&gt;
        &lt;span class=&quot;vn-logo-text&quot;&gt;&amp;gt; VELOCITY&lt;span style=&quot;color: var(--color-primary);&quot;&gt;NORTH_&lt;/span&gt;&lt;/span&gt;
      &lt;/a&gt;
      &lt;?php
      wp_nav_menu( array(
        &#039;theme_location&#039; =&gt; &#039;primary&#039;,
        &#039;container&#039;      =&gt; false,
        &#039;menu_class&#039;     =&gt; &#039;vn-nav-links&#039;,
        &#039;fallback_cb&#039;    =&gt; &#039;velocitynorth_fallback_menu&#039;,
      ) );
      ?&gt;
    &lt;/nav&gt;
  &lt;/div&gt;
&lt;/header&gt;

&lt;main class=&quot;vn-main&quot;&gt;

&lt;?php
function velocitynorth_fallback_menu() {
  echo &#039;&lt;ul class=&quot;vn-nav-links&quot;&gt;&#039;;
  echo &#039;&lt;li&gt;&lt;a href=&quot;&#039; . esc_url( home_url( &#039;/&#039; ) ) . &#039;&quot;&gt;Home&lt;/a&gt;&lt;/li&gt;&#039;;
  echo &#039;&lt;li&gt;&lt;a href=&quot;&#039; . esc_url( home_url( &#039;/about/&#039; ) ) . &#039;&quot;&gt;About&lt;/a&gt;&lt;/li&gt;&#039;;
  echo &#039;&lt;li&gt;&lt;a href=&quot;&#039; . esc_url( home_url( &#039;/services/&#039; ) ) . &#039;&quot;&gt;Services&lt;/a&gt;&lt;/li&gt;&#039;;
  echo &#039;&lt;li&gt;&lt;a href=&quot;&#039; . esc_url( home_url( &#039;/contact/&#039; ) ) . &#039;&quot; class=&quot;vn-btn-outline&quot; style=&quot;padding: 0.5rem 1rem; font-size: 0.75rem;&quot;&gt;Contact&lt;/a&gt;&lt;/li&gt;&#039;;
  echo &#039;&lt;/ul&gt;&#039;;
}
?&gt;