<?php
/**
 * @package OmaGue
 * @since OmaGue 0.1
 */
?>
<div class="dhoma header">
<div class="head">
<header class="site-info">
<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
<h3><?php bloginfo( 'description' ); ?></h3>
</header>
</div>
</div>
<div class="dhoma">
<?php wp_nav_menu( array( 
'theme_location' => 'primary', 
'container' => 'nav', 
'container_class' => 'main-nav',
'menu_id' => 'nav',
'fallback_cb' => 'omague_default_menu' ) ); ?>
</div>