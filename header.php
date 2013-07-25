<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Boilerplate
 * @since Boilerplate 1.0
 */
?><!DOCTYPE html>
<!--[if lt IE 7 ]><html <?php language_attributes(); ?> class="no-js ie ie6 lte7 lte8 lte9"><![endif]-->
<!--[if IE 7 ]><html <?php language_attributes(); ?> class="no-js ie ie7 lte7 lte8 lte9"><![endif]-->
<!--[if IE 8 ]><html <?php language_attributes(); ?> class="no-js ie ie8 lte8 lte9"><![endif]-->
<!--[if IE 9 ]><html <?php language_attributes(); ?> class="no-js ie ie9 lte9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<title><?php
			wp_title( '|', true, 'right' );
		?></title>
		<?php
			function remove_returns($snip){
				$snip = str_replace("\n", '', $snip); // remove new lines
				$snip = str_replace("\r", '', $snip);
				return $snip;
			}

			if (is_home()){
				echo '<meta name="description" content="'.get_field('meta_desc', 'option').'" />';
			} else if (is_archive()){
				echo '<meta name="description" content="Upstatement '.post_type_archive_title('', false).'" />';
			} else if (is_singular()){
				$post = get_post(get_the_ID());
				echo '<meta name="description" content="'.(substr(remove_returns(strip_tags($post->post_content)), 0, 255)).'" />';
			}
		?>
		
		<link rel="profile" href="http://gmpg.org/xfn/11" />
		<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
		<!--[if lt IE 9]><script src="/wp-content/themes/blades/js/libs/respond.src.js"></script><![endif]-->
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

		<link rel="shortcut icon" href="/favicon.ico">
		<link rel="apple-touch-icon-precomposed" sizes="57x57" href="/apple-touch-icon-57x57.png">
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="/apple-touch-icon-72x72.png">
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="/apple-touch-icon-114x114.png">
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="/apple-touch-icon-144x144.png">
		<link rel="apple-touch-icon-precomposed" href="/apple-touch-icon.png">

		<meta name="application-name" content="Upstatement"/> 
		<meta name="msapplication-TileColor" content="#0d0824"/> 
		<meta name="msapplication-TileImage" content="/wp-content/themes/blades/images/upstatement-win-8-tile.png"/>

		<!-- Symbolset Social Icons -->
		<link href="/wp-content/themes/blades/_css/ss-social.css" rel="stylesheet" />
		<link href="/wp-content/themes/blades/_css/ss-standard.css" rel="stylesheet" />

		<script src="/wp-content/themes/blades/js/ss-social.js"></script>
		<script src="/wp-content/themes/blades/js/ss-standard.js"></script>

		<meta name="avgthreatlabs-verification" content="b1b863e854ceddae55fed62b5bfa43983854dd35" />
		<!-- Google Webfont Loader -->
		<!-- More info here: https://developers.google.com/webfonts/docs/webfont_loader -->
		<script type="text/javascript">
		  WebFontConfig = {
		  	typekit: { id: 'lzk6wqe' }
		  };
		  (function() {
		    var wf = document.createElement('script');
		    wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
		        '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
		    wf.type = 'text/javascript';
		    wf.async = 'true';
		    var s = document.getElementsByTagName('script')[0];
		    s.parentNode.insertBefore(wf, s);
		  })();
		</script>


<?php
		/* We add some JavaScript to pages with the comment form
		 * to support sites with threaded comments (when in use).
		 */
		if ( is_singular() && get_option( 'thread_comments' ) )
			wp_enqueue_script( 'comment-reply' );

		/* Always have wp_head() just before the closing </head>
		 * tag of your theme, or you will break many plugins, which
		 * generally use this hook to add elements to <head> such
		 * as styles, scripts, and meta tags.
		 */
		wp_head();
?>
	</head>
	<body <?php body_class(); ?>>
		<header class="hdr">
			<div class="wrapper">
				<h1 class="hdr-logo" role="banner">
					<a class="hdr-logo-img" href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
				</h1>
				<nav id="access" class="hdr-nav" role="navigation">
					<?php /* Our navigation menu.  If one isn't filled out, wp_nav_menu falls back to wp_page_menu.  The menu assiged to the primary position is the one used.  If none is assigned, the menu with the lowest ID is used.  */ ?>
					<?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary' ) ); ?>
				</nav><!-- #access -->
			</div><!-- wrapper -->
		</header><!-- header -->

		<section id="content" role="main">
