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
        $links = ['Facebook', 'LinkedIn', 'Github'];

       $links = [
            'facebook' => 'Facebook',
            'linkedin' => 'LinkedIn',
            'github'   => 'Github'
        ];

        foreach ($links as $key => $label) {

            $setting_id = 'hop_' . $key;

            $wp_customize->add_setting($setting_id, array(
                'default'           => '',
                'sanitize_callback' => 'esc_url_raw'
            ));

            $wp_customize->add_control($setting_id . '_control', array(
                'label'    => $label,
                'section'  => 'hero_section',
                'settings' => $setting_id,
                'type'     => 'url'
            ));
        }
    }

}

new hopCustomize();