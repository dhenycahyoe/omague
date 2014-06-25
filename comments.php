<?php 
/**
 * @package OmaGue
 * @since OmaGue 0.1
 */
if ( post_password_required() )
	return; ?>
<div id="comments">
 <?php if ( have_comments() ) : ?>
  <section class="tombolkomentar"><a href="#respond">
    <?php printf( _n( 'One Comment on &ldquo;%2$s&rdquo;', '<span>%1$s Comments</span> on &ldquo;%2$s&rdquo;', get_comments_number(), 'omague' ),
       number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' ); ?>
    <?php if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
      <p class="nocomments"><?php _e( 'Comments are closed.', 'omague' ); ?></p></a>
    <?php endif; ?>
  </section>
  <div class="kosong"></div>
  <ul class="commentlist">
    <?php wp_list_comments( array( 'callback' => 'omague_comment' ) ); ?>
  </ul><!-- .commentlist -->
    <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
  <nav id="pagenavi"><?php paginate_comments_links(); ?></nav>
		<?php endif; ?>			
 <?php endif; // have_comments() ?>
 <?php if (comments_open()): // The comment form 
   $req = get_option( 'require_name_email' );
   $aria_req = ( $req ? " aria-required='true'" : '' );
   $fields =  array(
    'author'	=>	'<p><input type="text" class="txt" placeholder="'.esc_attr( 'Name ( required )' ).'" name="author"'. $aria_req .' /><label>Nama</label>',
    'email'		=>	'<p><input type="text" class="txt" placeholder="'.esc_attr( 'Email ( required )' ).'" name="email"'. $aria_req .' /><label>Email</label>',
    'url'		=>	'<p><input type="text" class="txt" placeholder="'.esc_attr( 'Website' ).'" name="url"'. $aria_req .' /><label>Website</label>'
   );
   $args = array(
    'title_reply'          => 	__( 'Leave a Reply', 'omague' ),
    'comment_notes_before' =>	 '',
    'comment_field'        => 	'<p><textarea name="comment" id="comment" class="animasibox" rows="10" placeholder="'.esc_attr( 'Your Comments' ).'"></textarea>',
    'label_submit'         =>	 __( 'Submit','omague' ),
    'comment_notes_after'  => 	'',
    'fields'               => 	apply_filters( 'comment_form_default_fields', $fields )
   );
 comment_form($args);  
 endif; ?>
</div><!-- #comments --> 	