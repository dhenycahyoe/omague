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
  <nav id=breadcrumb><?php echo omague_breadcrumb(); ?></nav>
  <header><h3 class="page-title"><?php printf( __( 'Search Results for: %s', 'omague' ), '<span>' . get_search_query() . '</span>' ); ?></h3></header>
  <section class=kosong></section>
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  <article id="post-<?php the_ID(); ?>" <?php post_class("search-page"); ?>>
   <h2><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'omague' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
    <div class=post-meta><?php _e( 'Posted on :', 'omague' ); ?> <?php the_time(get_option('date_format')); ?> | 
     <?php $categories_list = get_the_category_list( __( ', ', 'omague' ) ); if ( $categories_list ) :?>
      <span class="cat-links"><?php _e( 'Category :', 'omague' ); ?> <?php echo $categories_list; ?></span>
     <?php endif; // End if categories ?> | 
     <?php $tags_list = get_the_tag_list( '', __( ', ', 'omague' ) ); if ( $tags_list ) : ?>
      <span class="tags-links"><?php _e( 'Tags :', 'omague' ); ?> <?php echo $tags_list; ?></span>
     <?php endif; // End if $tags_list ?>  
    </div>
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
