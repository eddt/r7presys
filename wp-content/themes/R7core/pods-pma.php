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
        <span style="float:left; font-size:16px; font-weight:bold; color:#fff; margin-top:8px;">A <span style="color:#000; font-style:italic;">Rhino7</span> Franchise Portal</span>
        <span style="float:right; font-size:16px; font-weight:bold; color:#fff; margin-top:8px;">919.589.9999 | <a href="mailto:pmainfo@r7fdc.com" style="color:#fff;">Email</a></span>
    </div>
    <div class="container pma-header">

        <div class="row">
                <div class="site-branding col-6 col-lg-4">
                    <?php echo '<img src="'. get_template_directory_uri() .'/presentations/pma/pma_tp1_grfx_logo_sm.png" >' ;?>
                </div>
                <?php if ( substr(strrchr(home_url($wp->request),"/"),1,strlen( strrchr( home_url($wp->request),"/" ) ) ) == 'pma') : ?>
                <div class="portal-nav col-6 col-lg-8">
                    <img class="head-menu-button" src="<?php echo get_template_directory_uri();?>/presentations/pma/pma_tp1_grfx_home_menu_btn.png" style="cursor: pointer; display: inline-block;" >
                    <?php wp_nav_menu( array('menu' => 'pma',
                        'container'       => 'div',
                        'container_class' => 'head-menu hidden',
                        'menu_class'      => 'dropdown',
                        'depth' => 2
                    ) ); ?>
                    <script>
                        jQuery('.head-menu-button').click(function() {
                            jQuery('.head-menu').toggleClass('hidden');
                        });

                        jQuery(function(){
                            jQuery("ul.dropdown li").hover(function(){
                                jQuery(this).addClass("hover");
                                jQuery('ul:first',this).css('visibility', 'visible');
                            }, function(){
                                jQuery(this).removeClass("hover");
                                jQuery('ul:first',this).css('visibility', 'hidden');
                            });
                            jQuery("ul.dropdown li ul li:has(ul)").find("a:first").append(" &raquo; ");
                        });
                    </script>

                </div>
                <?php else : ?>
                 <div class="site-branding col-12 col-lg-8">
                     <?php echo '<img src="'. get_template_directory_uri() .'/presentations/pma/pma_tp1_grfx_sub_head_img1.png" >' ;?>
                 </div>
                <?php endif; ?>
        </div>
    </div><!-- .container -->
</header><!-- #masthead -->

<?php if( substr(strrchr(home_url($wp->request),"/"),1,strlen( strrchr( home_url($wp->request),"/" ) ) ) == 'pma') : ?>
    <nav class="site-navigation">
        <div class="container pma-nav">

            <div class="carousel slide" id="myCarousel"><!-- BEGIN Slideshow Carousel -->
                <div class="carousel-inner">
                    <div class="item">
                        <img alt="" src="<?php echo get_template_directory_uri();?>/presentations/pma/pma_tp1_grfx_slide01.png">
                    </div>
                    <div class="item active">
                        <img alt="" src="<?php echo get_template_directory_uri();?>/presentations/pma/pma_tp1_grfx_slide02.png">
                    </div>
                    <div class="item">
                        <img alt="" src="<?php echo get_template_directory_uri();?>/presentations/pma/pma_tp1_grfx_slide03.png">
                    </div>
                </div>
                <a data-slide="prev" href="#myCarousel" class="left carousel-control">‹</a>
                <a data-slide="next" href="#myCarousel" class="right carousel-control">›</a>
            </div>
            <script>
                jQuery('.carousel').carousel({ interval: 7000 });
            </script><!-- Slideshow Carousel -->

        </div><!-- .container -->
    </nav><!-- .site-navigation -->
<?php endif; ?>

<div class="main-content">
    <div class="container pma-content">
        <div class="row">

            <div class="sidebar col-12 col-lg-4">
                <?php if( substr(strrchr(home_url($wp->request),"/"),1,strlen( strrchr( home_url($wp->request),"/" ) ) ) != 'pma') : ?>
                <?php wp_nav_menu( array('menu' => 'pma',
                    'container'       => 'div',
                    'container_class' => 'side-menu',
                    'menu_class'      => 'ddside',
                    'depth' => 2
                ) ); ?>
                <script>
                    jQuery(function(){
                        jQuery("ul.ddside li").hover(function(){
                            jQuery(this).addClass("hover");
                            jQuery('ul:first',this).css('visibility', 'visible');
                        }, function(){
                            jQuery(this).removeClass("hover");
                            jQuery('ul:first',this).css('visibility', 'hidden');
                        });
                    });
                </script>
                <?php else : ?>
                    <?php echo '<img src="'. get_template_directory_uri() .'/presentations/pma/pma_tp1_grfx_home_sb_img1.png" >' ;?>
                <?php endif; ?>
            </div><!-- close .sidebar -->

            <div class="main-content-inner col-12 col-lg-8">

                <div id="primary" class="content-area">
                    <div id="content" class="site-content" role="main">
                        <?php pods_content(); ?>
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
                    <div class="pma-footer-box">
                        <?php echo '<img src="'. get_template_directory_uri() .'/presentations/pma/pma_tp1_grfx_logo_foot.png" >' ;?><br />
                        Rhino7 Franchise Development Corporation, Inc.<br />
                        315 S. Salem St.<br />
                        Suite 200-A<br />
                        Apex, NC 27502
                    </div>
                    <div class="pma-footer-box">
                        <br /><br />
                        <a href="http://r7fdc.com" target="_blank" style="color:#666;">Rhino7 Website</a><span class="sep"> | </span>
                        <a href="http://blog.r7fdc.com" target="_blank" style="color:#666;">Rhino7 News</a><span class="sep"> | </span>
                        <a href="mailto:pmainfo@r7fdc.com" style="color:#666;">Email</a><span class="sep"> | </span>
                        919.589.9999<br /><br />
                        <a href="https://www.facebook.com/Rhino7FranchiseDevelopmentCorporation" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/48x48-facebook.png"></a>
                        &nbsp; &nbsp;
                        <a href="https://twitter.com/rhino7franchise" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/48x48-twitter.png"></a>

                    <?php do_action( 'R7core_credits' ); ?>

                    </div>
                </div><!-- close .site-info -->

            </div>
        </div>
    </div><!-- close .container -->
</footer><!-- close #colophon -->
<br />

</body>
</html>