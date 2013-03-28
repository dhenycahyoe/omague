<?php 
/**
 * @package OmaGue
 * @since OmaGue 0.1
 */
get_header(); ?>
</head>
<body <?php body_class(); ?>>
<section id=wraper>
<section id=main>
<?php get_template_part( 'header', 'content' ); ?>
<section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<article class=content-single>
 <div class=jarakgrid>
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <h1 class="post-title"><?php the_title(); ?></h1>
     <div class=post-meta><?php edit_post_link( __( '(Edit)', 'omague' ), ' ', ' ' ); ?></div>
     <?php the_content(); ?>
   <?php endwhile; else: ?>
     <?php _e('Sorry, no posts matched your criteria', 'omague'); ?>
  <?php endif; ?>
 </div>
</article>
</section>
<div class=kosong></div>
<section class="dhoma navsingle">
 <section class=dh12>
  <?php omague_content_nav(); ?>
 </section>
</section>
<div class=bersih></div>
<footer class=footer-single>
<section class="dhoma navigasi">
 <section class=dh8>
   <nav id=breadcrumb><?php echo omague_breadcrumb(); ?></nav>
 </section>
 <section class=dh4>
   <p class=postview><?php _e( 'Posted on :', 'omague' ); ?> <?php the_time(get_option('date_format')); ?>
 </section>
</section>
<section class="dhoma infoadmin">
 <section class="dh12 author-info">
  <?php echo get_avatar( get_the_author_meta('user_email'), '80', '' ); ?>
   <h5><?php _e( 'Author:', 'omague' ); ?> <?php the_author_posts_link(); ?></h5>
   <p><?php the_author_meta('description'); ?></p>
 </section>
</section>
<section class="dhoma navigasi">
 <?php if ( of_get_option('omague_showhidden_sosmed') ) { ?>
  <section class="dh12 dhenysosial">
   <ul class="no-list social-list">
    <li><?php _e( 'Join To', 'omague' ); ?>
    <li><a target="_blank" href="<?php echo of_get_option('omague_feedburner_username', '#'); ?>" title="<?php _e( 'RSS Feed', 'omague' ); ?>" class="social-rss"></a>
    <li><a target="_blank" href="<?php echo of_get_option('omague_fb_username', '#'); ?>" title="<?php _e( 'Add on Facebook', 'omague' ); ?>" class="social-facebook"></a>
    <li><a target="_blank" href="<?php echo of_get_option('omague_twitter_username', '#'); ?>" title="<?php _e( 'Follow on Twitter', 'omague' ); ?>" class="social-twitter"></a>
    <li><a target="_blank" href="<?php echo of_get_option('omague_gplus_username', '#'); ?>" title="<?php _e( 'Google Plus', 'omague' ); ?>" class="social-google"></a>
   </ul>
  </section>
 <?php } ?>
</section>
</footer>
<section id=koment class=dhoma>
 <section class="dh8 koment">
	<?php if ( comments_open() || '0' != get_comments_number() )
		comments_template( '', true ); ?>
 </section>
 <aside class=dh4>
  <?php get_sidebar('single'); ?>
 </aside>
</section>
</section>
</section>
<section class=fotr>
<section class=efekgaris></section>
<aside class="dhoma sidebar-page">
<?php get_sidebar('page'); ?>
</aside>
<?php get_footer(); ?>
