<?php
/**
 * Template Name: PMA Broker Template
 *
 * This template is a variant "child" template. Based on "index", it is SOLELY for use by the "pma-broker" Portal. It
 * should be functionally IDENTICAL to the baseline "pma" template. It does NOT use the R7 Core Header and Footer, using
 * instead its own embedded versions, and the "Loop" has been disabled and removed from the page as the content is
 * called directly. Additionally the wp_sidebar() and wp_footer() calls are commented out to strip down the page.
 *
 * Other changes:
 * - REMOVED PHP $header_image Logic from PORTAL template
 * - REPURPOSED ".site-branding" DIV to hold Franchise Logo for template (removed title & description)
 *
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
    <?php echo '<link media="all" type="text/css" href="'. get_template_directory_uri() .'/style-pma-portal01.css" rel="stylesheet">'; ?>
</head>

<body <?php body_class(); ?>>
<?php do_action( 'before' ); ?>

<header id="masthead" class="site-header" role="banner">
    <div id="topbar" class="container">
        <p>A Rhino7 Franchise Portal</p>
    </div>
    <div class="container">

        <div class="row">
            <div class="site-header-inner col-12">
                <div class="site-branding">
                    <?php echo '<img src="'. get_template_directory_uri() .'/presentations/pma/pma_tp1_grfx_logo_sm.png" >' ;?>
                </div>
                <div class="portal-nav">
                    This is the Portal Nav Box
                </div>
            </div>
        </div>
    </div><!-- .container -->
</header><!-- #masthead -->

<?php if( substr(strrchr(home_url($wp->request),"/"),1,strlen( strrchr( home_url($wp->request),"/" ) ) ) == 'pma-broker') : ?>
<nav class="site-navigation">
    <div class="container">
        <div class="row">
            <div class="site-navigation-inner col-12">
                <div class="navbar">
                    <!-- .navbar-toggle is used as the toggle for collapsed navbar content -->
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Your site title as branding in the menu -->
                    <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>

                    <!-- The WordPress Menu goes here -->
                    <?php wp_nav_menu(
                        array(
                            'theme_location' => 'primary',
                            'container_class' => 'nav-collapse collapse navbar-responsive-collapse',
                            'menu_class' => 'nav navbar-nav',
                            'fallback_cb' => '',
                            'menu_id' => 'main-menu',
                            'walker' => new wp_bootstrap_navwalker()
                        )
                    ); ?>

                </div><!-- .navbar -->
            </div>
        </div>
    </div><!-- .container -->
</nav><!-- .site-navigation -->
<?php endif; ?>

<div class="main-content">
    <div class="container">
        <div class="row">

            <div class="sidebar col-12 col-lg-4">
                <?php //if( substr(strrchr(home_url($wp->request),"/"),1,strlen( strrchr( home_url($wp->request),"/" ) ) ) != 'pma-broker') : ?>
                    <?php wp_nav_menu( array('menu' => 'pma-broker' )); ?>
                <?php //endif; ?>

                <?php // add the class "panel" below here to wrap the sidebar in Bootstrap style ;) ?>
                <!--<div class="sidebar-padder">

                    <?php do_action( 'before_sidebar' ); ?>
                    <?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>

                        <aside id="search" class="widget widget_search">
                            <?php get_search_form(); ?>
                        </aside>

                        <aside id="archives" class="widget widget_archive">
                            <h3 class="widget-title"><?php _e( 'Archives', 'R7core' ); ?></h3>
                            <ul>
                                <?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
                            </ul>
                        </aside>

                        <aside id="meta" class="widget widget_meta">
                            <h3 class="widget-title"><?php _e( 'Meta', 'R7core' ); ?></h3>
                            <ul>
                                <?php wp_register(); ?>
                                <li><?php wp_loginout(); ?></li>
                                <?php wp_meta(); ?>
                            </ul>
                        </aside>

                    <?php endif; ?>

                </div>--><!-- close .sidebar-padder -->

            </div><!-- close .sidebar -->

            <div class="main-content-inner col-12 col-lg-8">

                <div id="primary" class="content-area">
                    <div id="content" class="site-content" role="main">

                        <?php pods_content(); ?>

                        <?php /* The loop */ ?>
                        <?php //while ( have_posts() ) : the_post(); ?>
                            <?php //get_template_part( 'content', get_post_format() ); ?>
                            <?php //comments_template(); ?>
                        <?php //endwhile; ?>

                    </div><!-- #content -->
                </div><!-- #primary -->

                <?php //get_sidebar(); ?>

            </div><!-- close .*-inner (main-content or sidebar, depending if sidebar is used) -->
        </div><!-- close .row -->
    </div><!-- close .container -->
</div><!-- close .main-content -->

<footer id="colophon" class="site-footer" role="contentinfo">
    <div class="container">
        <div class="row">
            <div class="site-footer-inner col-12">

                <div class="site-info">
                    <?php do_action( 'R7core_credits' ); ?>
                    <a href="http://wordpress.org/" title="<?php esc_attr_e( 'A Semantic Personal Publishing Platform', 'R7core' ); ?>" rel="generator"><?php printf( __( 'Proudly powered by %s', 'R7core' ), 'WordPress' ); ?></a>
                    <span class="sep"> | </span>
                    <?php printf( __( 'Theme: %1$s by %2$s.', 'R7core' ), 'R7core', '<a href="http://underscores.me/" rel="designer">Underscores.me</a>' ); ?>
                </div><!-- close .site-info -->

            </div>
        </div>
    </div><!-- close .container -->
</footer><!-- close #colophon -->

<?php //wp_footer(); ?><br /><br /><br />

</body>
</html>