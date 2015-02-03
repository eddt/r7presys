<?php
/**
 * Template Name: AAP Template
 *
 * This template is a variant "child" template. Based on "index", it is SOLELY for use by the "aap" Portal. It does NOT
 * use the R7 Core Header and Footer, using instead its own embedded versions, and the "Loop" has been disabled and
 * removed from the page as the content is called directly. Additionally the wp_sidebar() and wp_footer() calls are
 * commented out to strip down the page.
 *
 * Other changes:
 * - REMOVED PHP $header_image Logic from PORTAL template
 * - REPURPOSED ".site-branding" DIV to hold Franchise Logo for template (removed title & description)
 * - Menu name: AAP
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title( '|', true, 'right' ); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php wp_head(); ?>

    <?php echo '<link media="all" type="text/css" href="'. get_template_directory_uri() .'/style-aap-portal01.css" rel="stylesheet">'; ?>
</head>
<body <?php body_class(); ?>>
<?php do_action( 'before' ); ?>
<header id="masthead" class="site-header" role="banner">
    <div id="topbar" class="container">
        <span style="float:left; font-size:16px; font-weight:bold; color:#fff; margin-top:8px;">A <span style="color:#000; font-style:italic;">Rhino7</span> Franchise Portal</span>
        <span style="float:right; font-size:16px; font-weight:bold; color:#fff; margin-top:8px;">919.977.9517 | <a href="mailto:info@r7fdc.com" style="color:#fff;">Email</a></span>
    </div>
    <div class="container aap-header">
        <div class="row">
            <?php if ( substr(strrchr(home_url($wp->request),"/"),1,strlen( strrchr( home_url($wp->request),"/" ) ) ) == 'aap') : ?>
                <div class="site-branding col-6 col-lg-4"><?php //content deleted ?></div>
                <div class="portal-nav col-6 col-lg-8"><?php //content deleted ?></div>
            <?php else : ?>
                <div class="site-branding col-12 col-lg-8"> </div>
            <?php endif; ?>
        </div>
    </div><!-- .container -->
</header><!-- #masthead -->




<br />
<?php wp_footer(); ?>
</body>
</html>