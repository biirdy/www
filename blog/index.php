
<?php
/**
 * Front to the WordPress application. This file doesn't do anything, but loads
 * wp-blog-header.php which does and tells WordPress to load the theme.
 *
 * @package WordPress
 */

/**
 * Tells WordPress to load the WordPress theme and output it.
 *
 * @var bool
 */
define('WP_USE_THEMES', true);

require_once( dirname(__FILE__) . '/wp-load.php' );

wp();

include('bootstrap-comments.php');

/*add_filter( 'comment_form_default_fields', 'bootstrap3_comment_form_fields' );
function bootstrap3_comment_form_fields( $fields ) {
    $commenter = wp_get_current_commenter();
    
    $req      = get_option( 'require_name_email' );
    $aria_req = ( $req ? " aria-required='true'" : '' );
    $html5    = current_theme_supports( 'html5', 'comment-form' ) ? 1 : 0;
    
    $fields   =  array(
        'author' => '<div class="form-group comment-form-author">' . '<label for="author">' . __( 'Name' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
                    '<input class="form-control" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></div>',
        'email'  => '<div class="form-group comment-form-email"><label for="email">' . __( 'Email' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
                    '<input class="form-control" id="email" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></div>',
        'url'    => '<div class="form-group comment-form-url"><label for="url">' . __( 'Website' ) . '</label> ' .
                    '<input class="form-control" id="url" name="url" ' . ( $html5 ? 'type="url"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></div>'        
    );
    
    return $fields;
}

add_filter( 'comment_form_defaults', 'bootstrap3_comment_form' );
function bootstrap3_comment_form( $args ) {
    $args['comment_field'] = '<div class="form-group comment-form-comment">
            <label for="comment">' . _x( 'Comment', 'noun' ) . '</label> 
            <textarea class="form-control" id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea>
        </div>';
    $args['class_submit'] = 'btn btn-default'; // since WP 4.1
    
    return $args;
}

add_filter('comment_class', 'bootstrap3_comment_class');
function bootstrap3_comment_class($classes){
	array_push($classes, "panel", "panel-default", "panel-body");
	return $classes;
}

add_filter('comment_reply_link', 'bootstrap3_reply_link_class');
function bootstrap3_reply_link_class($class){
	$class = str_replace("class='comment-reply-link", "class='comment-reply-link btn btn-default", $class);
	return $class;
}*/


?>

<html lang="en"><head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="decription" content="Jamie Bird Blog">
        <meta name="author" content="Jamie Bird">

        <title>Jamie Bird Portfolio</title>
        
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">

        <link href="http://jamie-bird.com/blog/css/index.css" rel="stylesheet">
</head>

<body>

	<!-- Nav bar-->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container-fluid">

        <!-- Nav bar header -->
        <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                <a class="navbar-brand" href="../index.html#">Jamie Bird</a>
        </div>

        <!-- Nav bar body -->
        <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav"><li><a href="../index.html#bio-con">Bio</a></li>
                <li><a href="../index.html#research-con">Research</a></li>
                <li><a href="../index.html#projects-con">Projects</a></li>
                <li><a href="../index.html#teaching-con">Teaching</a></li>
                <li><a href="index.php">Blog</a></li>
        </div>

        </div>
        </nav>

	<div class="container main-body">
	
	<h1>Jamie Bird - Attempt to write things down</h1>

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

		<div class="container panel panel-default panel-body post">

	 	<!-- Display the Title as a link to the Post's permalink. -->
 		<h2><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>

 		<!-- Display the date (November 16th, 2009 format) and a link to other posts by this posts author. -->
 		<small><?php the_time('F jS, Y'); ?> by <?php the_author_posts_link(); ?></small>


 		<!-- Display the Post's content in a div box. -->
 		<div class="entry">
 			<?php the_content(); ?>
 		</div>

 		<!-- Display a comma separated list of the Post's Categories. -->
 		<p class="postmetadata"><?php _e( 'Posted in' ); ?> <?php the_category( ', ' ); ?></p>

		<?php comments_template(); ?>
		
		</div> <!-- closes the first div box -->

 	<?php endwhile; else : ?>

 		<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>

 	<?php endif; ?>
	
	<p>Jamie Bird&copy;. Powered by <a href="https://wordpress.org/">WordPress</a></p>
	
	</div>


	<nav class="navbar navbar-default navbar-fixed-bottom">
        <div class="container">
                <p class="navbar-text navbar-left">D30 InfoLab, Lancaster University, Lancaster, LA1 4WA</p>
                <p class="navbar-text navbar-right"><a href="mailto:j.bird1@lancaster.ac.uk" class="navbar-link">j.bird1@lancaster.ac.uk</a></p>
                <p class="navbar-text navbar-right"><a href="https://twitter.com/THAT_JAMIE" class="navbar-link">Twitter</a></p>
                <p class="navbar-text navbar-right"><a href="https://github.com/biirdy" class="navbar-link">Github</a></p>
        </div>
        </nav>

	<script src="https://code.jquery.com/jquery-2.1.3.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
<body/>

</html>
