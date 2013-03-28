<?php 
/**
 * @package OmaGue
 * @since OmaGue 0.1
 */
?>
<div id="search">
<form method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
<input type="text" class="field" name="s" id="s"  placeholder="<?php esc_attr_e( 'Search &hellip;', 'omague' ); ?>"  />
<input class="submit btn" type="submit" value="<?php esc_attr_e( 'Search', 'omague' ); ?>" />
</form>
</div>
