<?php 
/**
 * @package OmaGue
 * @since OmaGue 0.1
 */
?>
<div class="sidebar">
<div class="jarakgrid">
 <?php if (!dynamic_sidebar('Single1')) : ?>
 <?php get_search_form();?>
 <?php endif; ?>
 <?php if (!dynamic_sidebar('Single2')) : ?>
 <?php endif; ?>
 <?php if (!dynamic_sidebar('Single3')) : ?>
 <?php endif; ?>
</div>
</div>