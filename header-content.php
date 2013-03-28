<?php
/**
 * @package OmaGue
 * @since OmaGue 0.1
 */
?>
<header>
<section class="dhoma header">
<section class=head>
<hgroup class=site-info>
<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></a></h1>
<h3><?php bloginfo( 'description' ); ?></h3>
</hgroup>
</section>
</section>
<section class="dhoma">
<?php wp_nav_menu( array( 
'theme_location' => 'primary', 
'container' => 'nav', 
'container_class' => 'main-nav',
'menu_id' => 'nav',
'fallback_cb' => 'omague_default_menu' ) ); ?>
</header>
