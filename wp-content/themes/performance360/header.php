<!DOCTYPE html>
<html <?php language_attributes();?>>
<head>
    <meta charset="<?php bloginfo( "charset" ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head();?>
</head>
<body <?php body_class(); ?>>
    <header role="banner">  
            <div class="c-header">
                <div class="o-container">
                    <div class="o-row u-flex u-flex-wrap-reverse">
                        <div class="o-row__column o-row__column--span-12 o-row__column--span-4@medium u-flex">    
                        <div class= "c-header__mobile-menu">
                        <label class="c-header__hamburger"><span class="c-header__hamburger-navicon"></span></label>
                            </div>  
                            <div class="c-header__logo">
                                <?php if(has_custom_logo()) { 
                                    the_custom_logo();
                                    } else { ?>
                                <a class="c-header__blogname" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html(bloginfo('name')); ?></a>
                                    <?php } ?>
                            </div>
                            <div class= "c-header__soc">
                            <?php get_template_part( 'template-parts/navigation/soc_navigation' ); ?>
                            </div>
                            <div class="c-header__search-mobile">
                                <?php get_template_part( 'template-parts/header/mob_searchform' ); ?>                  
                            </div>
                        </div>
                        <div class="o-row__column o-row__column--span-12 o-row__column--span-8@medium u-no-margin-medium c_header__menu_100width">
                            <div class="c-header__menu">
                            <?php get_template_part( 'template-parts/navigation/top_navigation' ); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>      
    </header>
    <?php get_template_part( 'template-parts/navigation/main_navigation' ); ?>
    <div id="content">