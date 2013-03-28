<?php
/**
 * @package OmaGue
 * @since OmaGue 0.1
 */
?>
<aside class=dh4>
<section class=jarakgrid>
 <?php if (!dynamic_sidebar('Footer1')) : ?>
  <h3><?php _e( 'Recent Posts', 'omague' ); ?></h3>
   <ul>
    <?php query_posts('showposts=5'); ?>
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <li><a href="<?php the_permalink() ?>"><?php the_title() ?> </a>
    <?php endwhile; endif; ?>
   </ul>
 <?php endif; ?>
</section>
</aside>
<aside class=dh4>
<section class=jarakgrid>    
  <?php if (!dynamic_sidebar('Footer2')) : ?>
   <h3><?php _e( 'Random Post', 'omague' ); ?></h3>
    <ul><?php $rand_posts = get_posts('numberposts=5&orderby=rand'); foreach( $rand_posts as $post ) : ?>
      <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
    <?php endforeach; ?>
    </ul>
  <?php endif; ?>
</section>
</aside>
<aside class=dh4>
<section class=jarakgrid>
 <?php if (!dynamic_sidebar('Footer3')) : ?>
  <h3><?php _e( 'Popular Posts', 'omague' ); ?></h3>
   <ul><?php query_posts('orderby=comment_count&posts_per_page=5'); if (have_posts()) : while (have_posts()) : the_post();?>
     <li><a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
   <?php endwhile; endif; wp_reset_query(); ?>
   </ul>
 <?php endif; ?>
</section>
</aside>
