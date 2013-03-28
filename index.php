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
<section class="dhoma">
 <section class="dh8 article">
  <section class=jarakgrid>
   <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
     <article id="post-<?php the_ID(); ?>" <?php post_class("homepage"); ?>>
       <h2><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'omague' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
       <?php the_excerpt(); ?>
     </article>
   <?php endwhile; else: ?>
     <?php _e('Sorry, no posts matched your criteria', 'omague'); ?>
   <?php endif; ?>
   <nav id=pagenavi><?php omague_pagenavi();?></nav>
  </section>
 </section>
 <aside class=dh4>
  <?php get_sidebar(); ?>
 </aside>
</section>
</section>
</section>
<section class=fotr>
<?php get_footer(); ?>
