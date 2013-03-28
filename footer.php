<?php 
/**
 * @package OmaGue
 * @since OmaGue 0.1
 */
?>
<footer class="dhoma">
 <hgroup id=footer>
   <h6><?php _e( 'Copyright &copy;', 'omague' ); ?> <?php echo date('Y'); ?> <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h6> 
   <h6><?php printf( __('Powered by <a href="http://wordpress.org/" title="%1$s" rel="generator">%2$s</a> | <a href="http://omague.com/" title="%3$s" rel="designer">%4$s Themes</a>', 'omague'), esc_attr( 'A Semantic Personal Publishing Platform'), 'WordPress', esc_attr( 'OmaGue Themes by. Deny E.Wicahyo'),'OmaGue'); ?></h6> 
 </hgroup>
</footer>
</section>
<?php wp_footer(); ?>
</body>
</html>
