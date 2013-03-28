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
<header>
  <h3 class="page-title">
    <?php if ( is_category() ) {
          printf( __( 'Category Archives: %s', 'omague' ), '<span>' . single_cat_title( '', false ) . '</span>' );
      } elseif ( is_tag() ) {
          printf( __( 'Tag Archives: %s', 'omague' ), '<span>' . single_tag_title( '', false ) . '</span>' );
      } elseif ( is_author() ) {
          the_post();
          printf( __( 'Author Archives: %s', 'omague' ), '<span class="vcard"><a class="url fn n" href="' . get_author_posts_url( get_the_author_meta( "ID" ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' );
          rewind_posts();
      } elseif ( is_day() ) {
          printf( __( 'Daily Archives: %s', 'omague' ), '<span>' . get_the_date() . '</span>' );
      } elseif ( is_month() ) {
          printf( __( 'Monthly Archives: %s', 'omague' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );
      } elseif ( is_year() ) {
          printf( __( 'Yearly Archives: %s', 'omague' ), '<span>' . get_the_date( 'Y' ) . '</span>' );
      } else {
         _e( 'Archives', 'omague' );
      } ?>
  </h3>
  <?php
    if ( is_category() ) { $category_description = category_description();
      if ( ! empty( $category_description ) )
        echo apply_filters( 'category_archive_meta', '<div class="taxonomy-description">' . $category_description . '</div>' );
    } elseif ( is_tag() ) { $tag_description = tag_description();
	  if ( ! empty( $tag_description ) )
        echo apply_filters( 'tag_archive_meta', '<div class="taxonomy-description">' . $tag_description . '</div>' );
    }
  ?>
</header>
   <section class=kosong></section>
     <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
       <article id="post-<?php the_ID(); ?>" <?php post_class("archive-page"); ?>>
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
