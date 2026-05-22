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
        add_action('save_post' ,[$this, 'save_featured']);
    }

    public function save_featured($post_id){
        $value = isset($_POST['is_featured']) ? 1 : 0;
        update_post_meta($post_id, '_is_featured', $value);


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

        add_meta_box(
            'featured_post',
            'Featured Post',
            function($post){
                $value = get_post_meta($post->ID, '_is_featured', true);
                echo '<label>';
                echo '<input type="checkbox" name="is_featured" value="1" ' . checked($value, 1, false) . ' />';
                echo ' Mark as Featured';
                echo '</label>';
            },
            'post'
        );
    }

    public function register_scripts(){
        register_post_type('note', [
            'label' => 'Notes',
            'public' => true,
            'show_in_menu' => true,
            'show_in_rest' => true,
            'publicly_queryable' => false,
            'has_archive' => false,
            'supports' => [
                'title', 
                'editor'
            ],
            'menu_icon' => 'dashicons-media-text'
        ]);

        register_post_type('project', [
            'label' => 'Projects',
            'public' => true,
            'show_in_menu' => true,
            'show_in_rest' => true,
            'publicly_queryable' => true, 
            'has_archive' => false,
            'supports' => [
                'title', 
                'excerpt',
                'thumbnail',
                'editor'
            ],
            "menu_con" => 'dashicons-media-text'
        ]);
        add_rewrite_rule(
                '^contactform/?$',
                'index.php?contactform=1',
                'top'
        );


        add_rewrite_rule(
            '^filterItem/?$',
            'index.php?filterItem=1',
            'top'
        );

        add_rewrite_rule(
            '^get/?$',
            'index.php?get=1',
            'top'
        );
        add_filter('query_vars', function($vars){
            $vars[] = 'contactform';
            $vars[] =  'filterItem';
            $vars[] = 'get';
            //addtoLog(json_encode($vars, JSON_PRETTY_PRINT));
            return $vars;
            
        });

       
        wp_register_style('style', get_stylesheet_uri());
        wp_register_style('form', STYLES_URI . '/form.css');
        wp_register_style('blog', STYLES_URI . '/blog.css');
        wp_register_style('404', STYLES_URI . '/404.css');
        wp_register_style('single', STYLES_URI . '/single.css');
        wp_register_script(
                    'tsparticles',
                    'https://cdn.jsdelivr.net/npm/tsparticles@3/tsparticles.bundle.min.js',
                    [],
                    null,
                    true
        );
        wp_register_style('archive', STYLES_URI . '/archive.css');
        wp_register_style('single-all', STYLES_URI . '/single-all.css');  
        wp_register_style('projects', STYLES_URI . '/projects.css'); 
        wp_register_script('archive', SCRIPTS_URI . '/archive.js');
        wp_register_script('index', SCRIPTS_URI . '/index.js', ['tsparticles'], null, true);
        wp_register_script('form', SCRIPTS_URI . '/form.js', [], null, true);
        wp_register_script('blog', SCRIPTS_URI . '/blog.js' , [], null, true);
        wp_register_script('single', SCRIPTS_URI . '/single.js', [], null, true);
        wp_register_script('projects', SCRIPTS_URI . '/projects.js', [], null, true);
        wp_register_script('all', SCRIPTS_URI . '/all.js', [], null, true);
       
    }

    public function note_callback($post){
        $value = get_post_meta($post->ID, 'note_step', true);
        echo '<input type="text" name="note_step" value="' . esc_attr($value) . '" style="width:100%;" />';

    }

    public function enqueue_scripts(){
        wp_enqueue_style('style');
        wp_enqueue_script('all');
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
            wp_add_inline_script( 
                'form', 
                'const nonce = ' . $nonce .  ';', 
                'before' );
        }

        if(is_page('blog')){
            wp_enqueue_style('blog');
            wp_enqueue_script('blog');
            $nonce = wp_create_nonce('filter_nonce');
            addtoLog("Nonce created" . $nonce);
            $url   = home_url('/filterItem');
            addtoLog('Url added for blog' . $url);

            wp_add_inline_script(
                'blog',
                'const nonce = ' . json_encode($nonce) . ';',
                'before'
            );

            wp_add_inline_script(
                'blog',
                'const url = ' . json_encode($url) . ';',
                'before'
            );
        }
            if ( is_singular('post') ) {

                wp_enqueue_style('single');

                $nonce = wp_create_nonce('single_nonce');

                wp_enqueue_script('single');

                wp_add_inline_script(
                    'single',
                    'const nonce = ' . wp_json_encode($nonce) . ';',
                    'after'
                );
            }
            if(is_singular('project')){
                 wp_enqueue_style('single-all');
            }
        if(is_404()){
            wp_enqueue_style('404');

        }

        if(is_page() && !is_page('blog') && !is_page('projects')){
            wp_enqueue_style('single-all');
        }

        if(is_page('projects')){
            wp_enqueue_style('projects');
            wp_enqueue_script('projects');
        }

        if(is_archive()){
            wp_enqueue_style('archive');
            wp_enqueue_script('archive');
        }
    }

    public function setupDefaults(){
        global $wpdb;
        // create the table for the forms - and then another class to handle form submissions
        add_theme_support( 'title-tag' );
        add_theme_support('post-thumbnails');
        add_theme_support('alignwide');
        add_theme_support('post-formats', ['video']);
        add_theme_support('editor-styles');
        add_post_type_support( 'post', 'excerpt' );
        register_nav_menus([
            'primary' => 'Primary Menu'
        ]);

         global $wpdb;

        $table_4 = $wpdb->prefix . "most_read";
        $charset_collate = $wpdb->get_charset_collate();

        require_once ABSPATH . 'wp-admin/includes/upgrade.php';

        $sql4 = "CREATE TABLE {$table_4} (

            id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,

            post_id BIGINT UNSIGNED NOT NULL,

            views BIGINT UNSIGNED DEFAULT 0,

            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

            PRIMARY KEY (id),

            KEY post_id (post_id),

            CONSTRAINT fk_most_read_post
                FOREIGN KEY (post_id)
                REFERENCES {$wpdb->posts}(ID)
                ON DELETE CASCADE

        ) $charset_collate;";

        dbDelta($sql4);
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
        if(get_query_var('filterItem')){
            $nonce = $_GET['nonce'] ?? '';
            $value = $_GET['value'] ?? '';
            if (!isset($_GET['nonce'], $_GET['value'])) {
                wp_send_json_error('Missing parameters');
            }
            $query = new WP_Query([
                'post_type'      => 'post',
                'category_name' => sanitize_text_field( $value ),
                'posts_per_page' => 6,
                'orderby'        => 'date',
                'order'          => 'DESC'
            ]);
           $data = [];

            foreach ($query->posts as $post) {

                $data[] = [
                    'title'        => $post->post_title,
                    'excerpt'      => $post->post_excerpt,
                    'permalink'    => get_permalink($post->ID),
                    'readtime'     => hopQuery::get_reading_time($post->ID),
                    'date'         => $post->post_date,
                    'category'     => $value,
                    'thumbnail_url'=> get_the_post_thumbnail_url($post->ID, 'full')
                ];
            }

            wp_send_json($data);
            // set transient with this data for 12 hours each time and then delete 
            // do this for each value that is filtered and searched
            
        }

        if (get_query_var('get')) {
                // if httprefferrer not single.js exit;
                global $wpdb;

                $id = isset($_POST['id']) ? intval($_POST['id']) : 0;

                if (isset($_POST['action']) && $_POST['action'] === 'update_views') {

                    $table = $wpdb->prefix . 'most_read';

                    $exists = $wpdb->get_var(
                        $wpdb->prepare(
                            "SELECT COUNT(*) FROM $table WHERE post_id = %d",
                            $id
                        )
                    );

                    if ($exists > 0) {
                        $wpdb->query(
                            $wpdb->prepare(
                                "UPDATE $table SET views = views + 1 WHERE post_id = %d",
                                $id 
                            )
                        );
                    } else {
                        $wpdb->insert(
                            $table,
                            [
                                'post_id' => $id,
                                'views' => 1
                            ]
                        );
                    }

                    wp_send_json_success(['message' => 'row updated successfully']);
                }
}
    }
}

new Boot();