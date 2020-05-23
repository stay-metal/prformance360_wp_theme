<?php

    function _themename_customize_register($wp_customize) {
        // Footer section
        $wp_customize->add_section('_themename_sidebar_options', array(
            'title' => esc_html('Настройки Sidebar'),
            'description' => 'Здесь можно изменить некоторые настройки sidebar',
        ));

        $theme_colors = array();
        $theme_colors[] = array(
            'slug'=>'color_section_name',
            'default' => '#000000',
            'label' => esc_html('Цвет фона боковой колонки')
          );        

        foreach( $theme_colors as $color ) {

        }
                
        
        // Footer section
        $wp_customize->add_section('_themename_footer_options', array(
            'title' => esc_html('Настройки Footer'),
            'description' => 'Здесь можно изменить некоторые настройки секции footer',
        ));
        // Footer email field
        $wp_customize->add_setting('_themename_info_email', array(
            'default' => '',
            'sanitize_callback' => 'sanitize_email'
        ));
        $wp_customize->add_control('_themename_info_email', array(
            'type' => 'text',
            'label' => esc_html('Email редакции'),
            'section' => '_themename_footer_options'
        ));
        //Footer logo
        $wp_customize->add_setting('_themename_footer_logo', array(
            'default' => '',
        ));
        $wp_customize->add_control(
            new WP_Customize_Image_Control(
                $wp_customize,
                '_themename_footer_logo',
                array(
                    'label'      => esc_html('Логотип в footer'),
                    'section' => '_themename_footer_options'
                )
            )
        );

        //Homepage settings
        $wp_customize->add_setting('_themename_slider_cat_id', array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field'
        ));

        $wp_customize->add_control('_themename_slider_cat_id', array(
            'type' => 'text',
            'label' => esc_html('Id категории для слайдера'),
            'section' => 'static_front_page'
        ));

        //Homepage settings
        $wp_customize->add_setting('_themename_slider_max_number_of_posts', array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field'
        ));

        $wp_customize->add_control('_themename_slider_max_number_of_posts', array(
            'type' => 'text',
            'label' => esc_html('Максимальное количество постов для слайдера'),
            'section' => 'static_front_page'
        ));

        
    }

    add_action('customize_register', '_themename_customize_register');