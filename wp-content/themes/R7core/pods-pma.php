<?php
/**
 * Template Name: PMA Template
 *
 * This template is a variant "child" template. Based on "index", it is SOLELY for use by the "pma" Portal. It does NOT
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

    <?php echo '<link media="all" type="text/css" href="'. get_template_directory_uri() .'/style-pma-portal01.css" rel="stylesheet">'; ?>
</head>
<body <?php body_class(); ?>>
<?php do_action( 'before' ); ?>
<header id="masthead" class="site-header" role="banner">
    <div id="topbar" class="container">
        <span style="float:left; font-size:16px; font-weight:bold; color:#fff; margin-top:8px;">A <span style="color:#000; font-style:italic;">Rhino7</span> Franchise Portal</span>
        <span style="float:right; font-size:16px; font-weight:bold; color:#fff; margin-top:8px;">919.977.9517 | <a href="mailto:pmainfo@r7fdc.com" style="color:#fff;">Email</a></span>
    </div>
    <div class="container pma-header">

        <div class="row">

        <?php if ( substr(strrchr(home_url($wp->request),"/"),1,strlen( strrchr( home_url($wp->request),"/" ) ) ) == 'pma') : ?>
            <div class="site-branding col-6 col-lg-4"><?php //content deleted ?></div>
            <div class="portal-nav col-6 col-lg-8"><?php //content deleted ?></div>
        <?php else : ?>
            <div class="site-branding col-12 col-lg-8"> </div>
        <?php endif; ?>

        </div>
    </div><!-- .container -->
</header><!-- #masthead -->

<?php if( substr(strrchr(home_url($wp->request),"/"),1,strlen( strrchr( home_url($wp->request),"/" ) ) ) == 'pma') : ?>
    <nav class="site-navigation">
        <div class="container pma-nav">

            <div class="carousel slide" id="myCarousel"><!-- BEGIN Slideshow Carousel -->
                <div class="carousel-inner">
                    <div class="item active">
                        <img alt="" src="<?php echo get_template_directory_uri();?>/presentations/pma/pma_tp1_grfx_slide01.jpg">
                    </div>
                    <div class="item">
                        <img alt="" src="<?php echo get_template_directory_uri();?>/presentations/pma/pma_tp1_grfx_slide02.jpg">
                    </div>
                    <div class="item">
                        <img alt="" src="<?php echo get_template_directory_uri();?>/presentations/pma/pma_tp1_grfx_slide03.jpg">
                    </div>
                </div>
                <a data-slide="prev" href="#myCarousel" class="left carousel-control">‹</a>
                <a data-slide="next" href="#myCarousel" class="right carousel-control">›</a>
            </div><img alt="" src="<?php echo get_template_directory_uri();?>/presentations/pma/pma_tp1_grfx_home_shdw.png" style="width:100%; position:relative; display:block;">
            <script>
                jQuery('.carousel').carousel({ interval: 8000 });
            </script><!-- Slideshow Carousel -->

        </div><!-- .container -->
    </nav><!-- .site-navigation -->
<?php endif; ?>

<div class="main-content">
    <div class="container pma-content">
        <div class="row">

            <div class="sidebar col-12 col-sm-5 col-lg-4">

                <div class="site-branding col-12">
                    <a href="<?php echo site_url(); ?>/pma">
                        <?php echo '<img src="'. get_template_directory_uri() .'/presentations/pma/pma_tp1_grfx_logo_sm.png" >' ;?>
                    </a>
                </div>

            <?php //if( substr(strrchr(home_url($wp->request),"/"),1,strlen( strrchr( home_url($wp->request),"/" ) ) ) != 'pma') : ?>

                <div class="sidebar-navmenu">
                    <!-- .navbar-toggle is used as the toggle for collapsed navbar content -->

                    <div class="sidebar-navmenu-button">
                        <b>Menu</b>
                        <img src="<?php echo get_template_directory_uri();?>/presentations/sgr/sgr_tp1_grfx_home_menu_btn.png" style="cursor: pointer; display: inline-block;" id="sidebar-navmenu-btn">
                    </div>

                    <!-- The WordPress Menu goes here -->
                    <?php wp_nav_menu(
                        array(
                            'menu' => 'pma',
                            'theme_location' => 'primary',
                            'container_class' => 'sidebar-vertical',
                            'menu_class' => 'tree-sidebar-nav sidebar-nav',
                            'container'       => 'div',
                            'depth' => 3
                        )
                    ); ?>
                    <script type="application/javascript">
                        jQuery(function(){
                            jQuery(".sidebar-navmenu-button").click(function() {
                                jQuery(".sidebar-vertical").toggle();
                            });
                            var MenuTree = {
                                collapse: function(element) {
                                    element.slideToggle(100);
                                },
                                walk: function() {
                                    jQuery('li > ul').each(function() {
                                        var parent_li = jQuery(this).parent('li');
                                        parent_li.prepend('<span></span>');
                                    });
                                    jQuery('span', '.tree-sidebar-nav').each(function() {
                                        var $a = jQuery(this);
                                        var $li = $a.parent();
                                        if ($a.nextAll('ul')) {
                                            var $ul = $a.nextAll('ul');
                                            $a.click(function(e) {
                                                MenuTree.collapse($ul);
                                                $a.toggleClass('active');
                                            });
                                        }
                                        if ($li.hasClass('current-menu-item')) {
                                            MenuTree.collapse($ul);
                                        }
                                        if ($li.hasClass('current-menu-parent') || $li.hasClass('current-menu-ancestor') ) {
                                            MenuTree.collapse($ul);
                                        }
                                    });
                                }
                            };
                            MenuTree.walk();
                        });
                    </script>
                </div><!-- .navbar -->

            <?php //else : ?>
                <?php //echo '<img src="'. get_template_directory_uri() .'/presentations/pma/pma_tp1_grfx_home_sb_img1.png" >' ;?>
            <?php //endif; ?>

            </div><!-- close .sidebar -->

            <div class="main-content-inner col-12 col-sm-7 col-lg-8">

                <div id="primary" class="content-area col-lg-10 col-offset-1">
                    <div id="content" class="site-content" role="main">
                        <?php /**
                         * pods_content(); - removed, and a custom loop established for password functions
                         * Changed get_template_part value from get_post_format() to get_post_type to allow
                         * for all custom types to work as long as a content-[type].php file exists, or it
                         * will default to content.php
                         */ ?>
                        <?php if ( substr(strrchr(home_url($wp->request),"/"),1,strlen( strrchr( home_url($wp->request),"/" ) ) ) == 'pma') : ?>
                            <?php pods_content(); ?>
                        <?php else : ?>
                            <?php /* The loop */ ?>
                            <?php while ( have_posts() ) : the_post(); ?>
                                <?php
                                if ( ! post_password_required() ) {
                                    the_post_thumbnail('full');
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
    <div class="container pma-footer">
        <div class="row">
            <div class="site-footer-inner col-12">

                <div class="site-info">
                    <div class="pma-footer-box col-12 col-sm-5 col-lg-4">
                        <?php echo '<img src="'. get_template_directory_uri() .'/presentations/pma/pma_tp1_grfx_logo_foot.png" >' ;?><br />
                        Rhino7 Franchise Development Corporation, Inc.<br />
                        431 Keisler Dr.<br />
                        Ste. 201<br />
                        Cary, NC 27518<br />
                        <!--315 S. Salem St.<br />
                        Suite 200-A<br />
                        Apex, NC 27502-->
                    </div>
                    <div class="pma-footer-box col-10 col-sm-5 col-lg-6 col-offset-1">
                        <br /><br />
                        <a href="http://r7fdc.com" target="_blank" style="color:#666;">Rhino7 Website</a><span class="sep"> | </span>
                        <a href="http://blog.r7fdc.com" target="_blank" style="color:#666;">Rhino7 News</a><span class="sep"> | </span>
                        <a href="mailto:pmainfo@r7fdc.com" style="color:#666;">Email</a><span class="sep"> | </span>
                        919.977.9517<br /><br />
                        <a href="https://www.facebook.com/Rhino7FranchiseDevelopmentCorporation" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/facebook.png"></a>
                        &nbsp; &nbsp;
                        <a href="https://twitter.com/rhino7franchise" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/twitter.png"></a>
                        &nbsp; &nbsp;
                        <a href="http://www.linkedin.com/company/rhino7" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/linkedin.png"></a>
                        <?php do_action( 'R7core_credits' ); ?>
                    </div>
                </div><!-- close .site-info -->

            </div>
        </div>
    </div><!-- close .container -->
</footer><!-- close #colophon -->
<br />
<?php wp_footer(); ?>
</body>
</html>