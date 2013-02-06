<?php 

/**
 * ArcticIceTheme is a custom Theme class for the Arctic Ice theme.
 * 
 */ 


/**
 * A custom theme for Arctic Ice output
 */ 
class ArcticIceTheme extends Theme
{
	public function action_init_theme( $theme )
	{
		// Apply Format::autop() to post content...
		Format::apply( 'autop', 'post_content_out' );
		// Apply Format::autop() to comment content...
		Format::apply( 'autop', 'comment_content_out' );
		// Apply Format::tag_and_list() to post tags...
		Format::apply( 'tag_and_list', 'post_tags_out' );
		// Only uses the <!--more--> tag, with the 'more' as the link to full post
		Format::apply_with_hook_params( 'more', 'post_content_out', 'more' );
		// Creates an excerpt option. echo $post->content_excerpt;
		Format::apply( 'autop', 'post_content_excerpt');
		Format::apply_with_hook_params( 'more', 'post_content_excerpt', ' Read more...', 60, 1 );

		// Apply Format::nice_date() to post date...
		Format::apply( 'nice_date', 'post_pubdate_out', 'F j, Y' );
		Format::apply( 'nice_date', 'post_pubdate_datetime', 'c');
		// Apply Format::nice_time() to post date...
		//Format::apply( 'nice_time', 'post_pubdate_out', 'g:ia' );
		// Apply Format::nice_date() to comment date
		Format::apply( 'nice_date', 'comment_date_out', 'F j, Y g:ia');
	}

	public function action_template_header( $theme )
	{
		// Add the stylesheets to the stack for output
		Stack::add( 'template_stylesheet', array( Site::get_url( 'theme') . '/style.css', 'screen') );
		Stack::add( 'template_stylesheet', array( Site::get_url( 'theme') . '/print.css', 'print') );

		Stack::add( 'template_header_javascript', 'jquery' );
/*
		$script = <<< HEADER_JS
function showMenu (event) {
    if (menu.is(":visible"))
        menu.slideUp({complete:function(){$(this).css('display','')}});
    else
        menu.slideDown();
}

var header = undefined;
var menu = undefined;
var menuButton = undefined;
$(document).ready(function(){
//    header = $("header");
    headerMenu= $("nav.sitemenu");
    menu = $(".sitemenu ol");
    menuButton = $("<div class='menu-button'><a href='#'>Menu</a></div>");
    menuButton.click(showMenu);
//    header.append(menuButton);
headerMenu.append(menuButton);
});

HEADER_JS;
		Stack::add( 'template_header_javascript',  $script, 'select-menu', array('jquery') );
*/
	}

	public function theme_title( $theme )
	{
		$out = '';
		if( $theme->request->display_entry || $theme->request->display_page && isset( $theme->post ) ) {
			$out = $theme->post->title . ' - ';
		}
		else if( $theme->request->display_entries_by_tag && isset( $theme->posts ) ) {
			$out = $theme->tag . ' - ';
		}
		$out .= Options::get( 'title' );
		return $out;
	}

	public function theme_next_post_link( $theme )
	{
		$next_link = '';
		if( isset( $theme->post ) ) {
			$next_post = $theme->post->ascend();
			if( ( $next_post instanceOf Post ) ) {
				$next_link = '<a href="' . $next_post->permalink. '" title="' . $next_post->title .'" >' . '&laquo; ' .$next_post->title . '</a>';
			}
		}

		return $next_link;
	}

	public function theme_prev_post_link( $theme )
	{
		$prev_link = '';

		if( isset( $theme->post ) ) {
		$prev_post = $theme->post->descend();
		if( ( $prev_post instanceOf Post) ) {
			$prev_link= '<a href="' . $prev_post->permalink. '" title="' . $prev_post->title .'" >' . $prev_post->title . ' &raquo;' . '</a>';
		}
		}
		return $prev_link;
	}

	public function theme_commenter_link( $comment )
	{
		$link = '';
		if( strlen( $comment->url ) && $comment->url != 'http://' ) {
			$link = '<a href="' . $comment->url . '" >' . $comment->name . '</a>';
		}

		return $link;
	}

	public function theme_feed_site( $theme )
	{
		return URL::get( 'atom_feed', array( 'index' => '1' ) );
	}

	public function theme_comment_form( $theme )
	{
		$theme->post->comment_form()->out();
	}

	public function theme_all_entries( $theme )
	{
		$out = '';
		$posts = Posts::get( array( 'content_type' => 'entry', 'status' => 'published', 'nolimit' => 1 ) );
		foreach( $posts as $post ) {
			$out .= "<p><a href=\"{$post->permalink}\" rel=\"bookmark\" title=\"{$post->title}\">{$post->title}</a> ( {$post->comments->approved->count} )</p>";
		}
		return $out;
	}

	public function action_form_comment( $form, $post, $context )
	{
		$form->cf_content->cols = 57;
		$form->cf_commenter->size = 50;
		$form->cf_email->size = 50;
		$form->cf_url->size = 50;
	}

}

?>
