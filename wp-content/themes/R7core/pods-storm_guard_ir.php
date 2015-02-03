<?php
/**
 * Template Name: Storm Guard IR Template
 *
 * This template is a variant "child" template. Based on "index", it is SOLELY for use by the "sgr" Portal. It does NOT
 * use the R7 Core Header and Footer, using instead its own embedded versions, and the "Loop" has been disabled and
 * removed from the page as the content is called directly. Additionally the wp_sidebar() and wp_footer() calls are
 * commented out to strip down the page.
 *
 * Other changes:
 * - REMOVED PHP $header_image Logic from PORTAL template
 * - REPURPOSED ".site-branding" DIV to hold Franchise Logo for template (removed title & description)
 * - Menu name: PMA
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
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <?php echo '<link media="all" type="text/css" href="'. get_template_directory_uri() .'/style-sgr-portal01.css" rel="stylesheet">'; ?>
</head>
<body <?php body_class(); ?>>
<?php do_action( 'before' ); ?>
<header id="masthead" class="site-header" role="banner">
    <div id="topbar">
        <div class="container"><span style="float:left; font-size:16px; font-weight:bold; color:#fff; margin-top:8px;">A <span style="color:#000; font-style:italic;">Rhino7</span> Franchise Portal</span>
        <span style="float:right; font-size:16px; font-weight:bold; color:#fff; margin-top:8px;">919.977.9517 | <a href="mailto:sgrinfo@r7fdc.com" style="color:#fff;">Email</a></span>
        </div>
    </div>
    <div class="container sgr-header">

        <div class="row">

            <?php if ( substr(strrchr(home_url($wp->request),"/"),1,strlen( strrchr( home_url($wp->request),"/" ) ) ) == 'storm-guard-insurance-restoration') : ?>

                <div class="site-branding col-6 col-lg-4">
                    <a href="<?php echo site_url(); ?>/storm-guard-insurance-restoration">
                        <?php echo '<img src="'. get_template_directory_uri() .'/presentations/sgr/sgr_tp1_grfx_logo_sm.png" >' ;?>
                    </a>
                </div>

                <div class="portal-nav col-6 col-lg-8">
                    <div class="head-menu-button" style="display:inline;">
                        <img src="<?php echo get_template_directory_uri();?>/presentations/sgr/sgr_tp1_grfx_home_menu_btn.png" style="cursor: pointer; display: inline-block;" >
                        <?php wp_nav_menu( array('menu' => 'storm_guard_ir',
                            'container'       => 'div',
                            'container_class' => 'head-menu',
                            'menu_class'      => 'dropdown',
                            'depth' => 3
                        ) ); ?>
                        <script>
                            jQuery('.head-menu').css('visibility', 'hidden');
                            jQuery('.head-menu-button').mouseenter(function() {
                                jQuery('.head-menu').css('visibility', 'visible');
                            });
                            jQuery('.head-menu-button').mouseleave(function() {
                                jQuery('.head-menu').css('visibility', 'hidden');
                            });
                            jQuery(function(){
                                jQuery("ul.dropdown li").hover(function(){
                                    jQuery(this).addClass("hover");
                                    jQuery('ul:first',this).css('visibility', 'visible');
                                }, function(){
                                    jQuery(this).removeClass("hover");
                                    jQuery('ul:first',this).css('visibility', 'hidden');
                                });
                            });
                        </script>
                    </div>
                </div>

            <?php else : ?>
                <div class="site-branding col-12 col-lg-8"> </div>
            <?php endif; ?>
        </div>
    </div><!-- .container -->
</header><!-- #masthead -->

<?php if( substr(strrchr(home_url($wp->request),"/"),1,strlen( strrchr( home_url($wp->request),"/" ) ) ) == 'storm-guard-insurance-restoration') : ?>
    <nav class="site-navigation">
        <div class="container sgr-nav">
            <div class="carousel slide" id="myCarousel"><!-- BEGIN Slideshow Carousel -->
                <div class="carousel-inner">
                    <div class="item active">
                        <img alt="" src="<?php echo get_template_directory_uri();?>/presentations/sgr/sgr_tp1_grfx_slide01.jpg">
                    </div>
                    <div class="item">
                        <img alt="" src="<?php echo get_template_directory_uri();?>/presentations/sgr/sgr_tp1_grfx_slide02.jpg">
                    </div>
                    <div class="item">
                        <img alt="" src="<?php echo get_template_directory_uri();?>/presentations/sgr/sgr_tp1_grfx_slide03.jpg">
                    </div>
                    <div class="item">
                        <img alt="" src="<?php echo get_template_directory_uri();?>/presentations/sgr/sgr_tp1_grfx_slide04.jpg">
                    </div>
                </div>
                <a data-slide="prev" href="#myCarousel" class="left carousel-control">‹</a>
                <a data-slide="next" href="#myCarousel" class="right carousel-control">›</a>
            </div><img alt="" src="<?php echo get_template_directory_uri();?>/presentations/sgr/sgr_tp1_grfx_home_shdw.png" style="width:100%; position:relative; display:block;">
            <script>
                jQuery('.carousel').carousel({ interval: 8000 });
            </script><!-- Slideshow Carousel -->
        </div><!-- .container -->
    </nav><!-- .site-navigation -->
<?php endif; ?>

<div class="main-content">
    <div class="container sgr-content">
        <div class="row">

            <?php if( substr(strrchr(home_url($wp->request),"/"),1,strlen( strrchr( home_url($wp->request),"/" ) ) ) != 'storm-guard-insurance-restoration') : ?>
            <div class="sidebar col-12 col-sm-5 col-lg-4">
                    <a href="<?php echo site_url(); ?>/storm-guard-insurance-restoration">
                        <?php echo '<img src="'. get_template_directory_uri() .'/presentations/sgr/sgr_tp1_grfx_logo_sm.png" >' ;?>
                    </a>
                    <div class="nav-inst" style="font-size:12px; margin-top:10px; font-weight:bold;">To view information, simply click on each main topic page, and then each of the subpage topics in each section.</div>
                    <div class="navbar">
                        <!-- .navbar-toggle is used as the toggle for collapsed navbar content -->
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                        <!-- The WordPress Menu goes here -->
                        <?php wp_nav_menu(
                            array(
                                'menu' => 'storm_guard_ir',
                                'theme_location' => 'primary',
                                'container_class' => 'nav-collapse collapse navbar-responsive-collapse',
                                'menu_class' => 'nav nav-pills nav-stacked',
                                'fallback_cb' => '',
                                'walker' => new wp_bootstrap_navwalker()
                            )
                        ); ?>
                        <script>
                            jQuery(function(){
                                jQuery("li.menu-item").hover(function(){
                                    jQuery(this).addClass("hover");
                                    jQuery('ul:first',this).css('display', 'inline');
                                }, function(){
                                    jQuery(this).removeClass("hover");
                                    jQuery('ul:first',this).css('display', 'none');
                                });
                            });
                        </script>
                    </div><!-- .navbar -->
            </div><!-- close .sidebar -->
            <div class="main-content-inner col-12 col-sm-7 col-lg-8">
            <?php else : ?>
            <div class="main-content-inner col-12">
            <?php endif; ?>

                <div id="primary" class="content-area">
                    <div id="content" class="site-content" role="main">
                        <?php /**
                         * pods_content() used only for welcome page, custom loop to enable password feature
                         * Changed get_template_part value from get_post_format() to get_post_type to allow
                         * for all custom types to work as long as a content-[type].php file exists, or it
                         * will default to content.php
                         */ ?>
                        <?php if ( substr(strrchr(home_url($wp->request),"/"),1,strlen( strrchr( home_url($wp->request),"/" ) ) ) == 'storm-guard-insurance-restoration') : ?>
                            <?php pods_content(); ?>
                        <?php else : ?>
                            <?php /* The loop */ ?>
                            <?php while ( have_posts() ) : the_post(); ?>
                                <?php
                                if ( ! post_password_required() ) {
                                    the_post_thumbnail('full');
                                    if ( has_post_thumbnail() ) {
                                        echo '<img alt="" src="'. get_template_directory_uri().'/presentations/sgr/sgr_tp1_grfx_home_shdw.png" style="width:100%; position:relative; display:block;">';
                                    }
                                }
                                ?>
                                <?php get_template_part( 'content', get_post_type() ); ?>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div><!-- #content -->
                </div><!-- #primary -->

            </div><!-- close .*-inner (main-content or sidebar, depending if sidebar is used) -->
        </div><!-- close .row -->
    </div><!-- close .container -->
</div><!-- close .main-content -->

<footer id="colophon" class="site-footer" role="contentinfo">
    <div class="sgr-footer">
        <div class="container">
            <div class="site-footer-inner col-12">

                <div class="site-info">
                    <div class="sgr-footer-box col-12 col-sm-6 col-lg-5">
                        <?php echo '<img src="'. get_template_directory_uri() .'/presentations/sgr/sgr_tp1_grfx_logo_foot.png" >' ;?><br />
                        <div style="padding-left:30px;">
                            Rhino7 Franchise Development Corporation, Inc.<br />
                            431 Keisler Dr<br />
                            Ste. 201<br />
                            Cary, NC 27518<br />
                            <!--315 S. Salem St.<br />
                            Suite 200-A<br />
                            Apex, NC 27502-->
                        </div>
                    </div>
                    <div class="sgr-footer-box col-12 col-sm-6 col-lg-7" style="text-align:right;">
                        <br /><br />
                        <a href="http://r7fdc.com" target="_blank" style="color:#FFF;">Rhino7 Website</a><span class="sep"> | </span>
                        <a href="http://blog.r7fdc.com" target="_blank" style="color:#FFF;">Rhino7 News</a><span class="sep"> | </span>
                        <a href="mailto:sgrinfo@r7fdc.com" style="color:#FFF;">Email</a><span class="sep"> | </span>
                        919.977.9517<br /><br />
                        <a href="https://www.facebook.com/Rhino7FranchiseDevelopmentCorporation" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/sg_facebook.png"></a>
                        <a href="https://twitter.com/rhino7franchise" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/sg_twitter.png"></a>
                        <a href="http://www.linkedin.com/company/rhino7" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/sg_linkedin.png"></a>
                        <?php do_action( 'R7core_credits' ); ?>
                    </div>
                </div><!-- close .site-info -->

            </div>
        </div>
    </div><!-- close .container -->
</footer><!-- close #colophon -->
<?php wp_footer(); ?>
</body>
</html>