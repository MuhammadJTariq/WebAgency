<?php 

if(!defined('ABSPATH')){
    exit;
}


class boot{

    public function __construct(){
        add_action('init', [$this, 'register_scripts']);
        add_action('wp_enqueue_scripts', [$this, 'enqueue_scripts']);
        add_action('after_setup_theme', [$this, 'setupDefaults']);
        add_action('after_switch_theme', [$this, 'switchTheme']);
        add_action('template_redirect', [$this, 'intercept_submission']);
        add_action('add_meta_boxes', [$this, 'add_meta']);
        add_action('save_post_note', [$this, 'save_note']);
    }

    public function save_note($post_id){
        if(isset($_POST['note_step'])){
            update_post_meta(
                $post_id, 
                'note_step', 
                sanitize_text_field( $_POST['note_step'] )
            );
        }
    }

    public function add_meta(){
        add_meta_box(
            'note_step',
            'Add the Step Info',
            [$this, 'note_callback'],
            'note', 
            'normal',
            'default'
        );
    }

    public function register_scripts(){
        register_post_type('note', [
            'label' => 'Notes',
            'public' => true,
            'show_in_menu' => true,
            'show_in_rest' => true,
            'publicly_queryable' => false,
            'supports' => [
                'title', 
                'editor'
            ],
            'menu_icon' => 'dashicons-media-text'
        ]);
        add_rewrite_rule(
                '^contactform/?$',
                'index.php?contactform=1',
                'top'
        );
        add_filter('query_vars', function($vars){
            $vars[] = 'contactform';
            //addtoLog(json_encode($vars, JSON_PRETTY_PRINT));
            return $vars;
            
        });
        wp_register_style('style', get_stylesheet_uri());
        wp_register_style('form', STYLES_URI . '/form.css');
        wp_register_style('404', STYLES_URI . '/404.css');
        wp_register_script('index', SCRIPTS_URI . '/index.js', [], null, true);
        wp_register_script('form', SCRIPTS_URI . '/form.js', [], null, true);
    }

    public function note_callback($post){
        $value = get_post_meta($post->ID, 'note_step', true);
        echo '<input type="text" name="note_step" value="' . esc_attr($value) . '" style="width:100%;" />';

    }

    public function enqueue_scripts(){
        wp_enqueue_style('style');
        if(is_home()){
            $query = new WP_Query([
                'post_type' => 'note',
            ]);

            $array = [];

            if ($query->have_posts()) {
                while ($query->have_posts()) {
                    $query->the_post();
                    $meta = get_post_meta(get_the_ID(), 'note_step', true);

                    $array[] = [
                        'title'   => get_the_title(),
                        'content' => get_the_content(),
                        'step' => $meta
                    ];
                }
            }

            wp_reset_postdata();

            $send = wp_json_encode($array);

            wp_enqueue_script('index');

            wp_add_inline_script(
                'index',
                'const notesData = ' . $send . ';',
                'before'
            );
            wp_deregister_style('global-styles-inline-css');
        }
        if(is_page('contact')){
            wp_enqueue_style('form');
            $nonce = wp_create_nonce('form_nonce');
            wp_enqueue_script('form');
            wp_add_inline_script( 'form', 'const nonce = ' . $nonce .  '', 'before' );
        }
        if(is_404()){
            wp_enqueue_style('404');

        }
    }

    public function setupDefaults(){
        global $wpdb;
        // create the table for the forms - and then another class to handle form submissions
        add_theme_support( 'title-tag' );
        add_theme_support('post-thumbnails');
        add_theme_support('alignwide');
        add_post_type_support( 'post', 'excerpt' );
        register_nav_menus([
            'primary' => 'Primary Menu'
        ]);
    }

    public function switchTheme(){
        flush_rewrite_rules();
    }

    public function intercept_submission(){
        if(get_query_var('contactform')){
            addtoLog("contact form intercepted");
            echo "Hello World";
            exit;
        }
    }
}

new Boot();