<?php 

class hopCustomize{

    public function __construct(){
        add_action('customize_register', [$this, 'customize_register_theme']);
    }

    public function customize_register_theme($wp_customize){
        $wp_customize->add_section('hero_section', array(
            'title' => 'Hero Settings', 
            'priority' => 30
        ));


        $wp_customize->add_setting('hero_heading', array(
            'default' => "your website. built right. built to work.",
            'sanitize_callback' => 'sanitize_text_field'
        ));

        $wp_customize->add_control('hero_heading', array(
            'label' => 'Hero Heading',
            'section' => 'hero_section', 
            'type' => 'textarea'
        ));


    }

}