<?php 
/**
 * @package OmaGue
 * @since OmaGue 0.1
 */
get_header(); ?>
<meta http-equiv="refresh" content="3; url=<?php echo esc_url( home_url( '/' ) ); ?>" /></meta>
</head>
<body <?php body_class(); ?>>
<section id=wraper>
<?php get_template_part( 'header', 'content' ); ?>
<section class=dhoma>
 <article class=dh12 id=main>
   <h1 class=hasatu><?php _e( 'Error 404 - Page not found', 'omague' ); ?></h1>
  <section class=errore>
    <p><?php _e( 'The page you are looking for does not exist or has been deleted. <br> This page will be automatically transferred to the home page in 3 Seconds', 'omague' ); ?></p>
  </section>
 </article> 
</section>
</section>
<section class=fotr>
<?php get_footer(); ?>
