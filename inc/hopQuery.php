<?php 
if(!defined('ABSPATH')){
    exit;
}

class hopQuery{
    public static $headings = [];
    public function __construct(){
        add_action('parse_query', [$this, 'parse_query']);
        add_action('pre_get_posts', [$this, 'modify_search']);
    }

    public function modify_search($query){
    if (is_admin() || !$query->is_main_query() || !$query->is_search()) {
        return;
    }

    $query->set('post_type', array('post'));
        
    }

    public function parse_query(){
        if(is_page('blog')){
            add_action('pre_get_posts', [$this, 'loadBlog']);
            
        }

        if(is_page('about')){
            add_filter('the_content', [$this, 'content_filters']);
        }
    }

    public function content_filters($content){
            ob_start();
            ?>
            <div class="signature"
            style="background-image: url('<?php echo esc_url(THEME_URI . '/images/signature.png');?>');
                  background-size:cover;
                  background-position:center;
                  height:20vh;
                  width:100%;"
            >

            </div>


            <?php

            $img = ob_get_clean();
            return $content . $img;
    }

    public static function add_toc_headings($content) {

    libxml_use_internal_errors(true);

    $dom = new DOMDocument();
    $dom->loadHTML('<?xml encoding="utf-8" ?>' . $content);

    $headings = [];
    $tags = ['h1', 'h2', 'h3'];

    foreach ($tags as $tag) {

        $elements = $dom->getElementsByTagName($tag);

        foreach ($elements as $index => $el) {

            $text = trim($el->textContent);
            $id = sanitize_title($text) . '-' . $index;


            $el->setAttribute('id', $id);


            $headings[] = [
                'tag'  => $tag,
                'text' => $text,
                'id'   => $id
            ];
        }
    }

    $modified = $dom->saveHTML();

    // store structured headings
    self::$headings = $headings;

    return $modified;
}
   public static function displayToc() {
    $headings = self::$headings;

    if (empty($headings)) {
        return '';
    }

    $output = '';
    $count = 1;

    foreach ($headings as $head) {

        $id = esc_attr($head['id']);
        $text = esc_html($head['text']);

        $output .= '
            <li>
                <a href="#' . $id . '">
                    <span class="toc-num">' . str_pad($count, 2, '0', STR_PAD_LEFT) . '</span>
                    <span class="toc-text">' . $text . '</span>
                </a>
            </li>
        ';

        $count++;
    }

    self::$headings = [];

    return $output;
}
    public static function get_reading_time($post_id = null) {
        $post_id = $post_id ?: get_the_ID();
        $content = get_post_field('post_content', $post_id);

        $word_count = str_word_count(strip_tags($content));
        $minutes = ceil($word_count / 200);

        return $minutes;
    }

    public function loadBlog(){
        if(is_page('blog')){
            add_action('FormatFeatured', [$this, 'formatFeatured']);
            add_action('FormatRecent', [$this, 'formatRecent']);
        }
    }

    public function formatFeatured(){
        $query = new WP_Query([
            'post_type' => 'post',
            'meta_query' => [
                [
                    'key' => '_is_featured',
                    'value' => 1,
                    'compare' => '='
                ]
            ],
            'post_per_page' => 1

        ]);

        if($query->have_posts()){
            while($query->have_posts()){
                $query->the_post();
                $thumbnail = get_the_post_thumbnail_url( get_the_ID(), 'full' );
                $categories = get_the_category( get_the_ID() );
                ob_start();
                ?>

                <section class="featured">
                <div class="featured-image"
                style="background-image:url('<?php echo $thumbnail; ?>');
                background-size:cover;
                background-position:center;
                "
                
                >
                    
               <div class="featured-tag-overlay">Featured Post</div>
                </div>
                <div class="featured-content reveal">
                    <div class="post-meta">
                    <span class="post-category"><?php echo $categories[0]->name; ?></span>
                    <span class="post-date"><?php echo get_the_date(); ?></span>
                    </div>
                    <h2><?php echo get_the_title(); ?></h2>
                    <p><?php echo get_the_excerpt(); ?></p>
                    <a href="<?php echo get_the_permalink(); ?>" class="read-link">Read Article</a>
                </div>
                </section>



                <?php
                echo ob_get_clean();
            }
        }


        
    }

    public function formatRecent(){
        $query = new WP_Query([
            'post_type' => 'post',

            'meta_query' => [
                [
                    'key'     => '_is_featured',
                    'value'   => [1],
                    'compare' => 'NOT IN'
                ]
            ],

            'posts_per_page' => 3
        ]);

        if($query->have_posts()){
            while($query->have_posts()){
                $query->the_post();
                $thumbnail = get_the_post_thumbnail_url( get_the_ID(), 'full' );
                $cats = get_the_category( get_the_ID() );

                ob_start();
                ?>
                <article class="blog-card reveal visible">
                    <div class="card-image"

                    style="background-image: url('<?php echo $thumbnail; ?>');"
                    background-size:cover;
                    background-position:center;     
                    >
                        
                    </div>
                    <div class="card-content">
                        <div class="card-meta">
                        <span class="card-category"><?php echo $cats[0]->name ; ?></span>
                        <span class="card-date"><?php echo get_the_date( ); ?></span>
                        </div>
                        <h3><?php echo get_the_title(); ?></h3>
                        <p>
                            <?php echo get_the_excerpt(  ); ?> 
                        </p>
                        <div class="card-footer">
                        <span class="read-time"><?php echo self::get_reading_time(get_the_ID()); ?> min</span>
                        <a href="<?php echo get_the_permalink(); ?>" class="card-link">Read</a>
                        </div>
                    </div>
                    </article>








                <?php


            }
        }


    }

    public static function returnMostRead($count = 5, $format = false){
        $args = [
            'post_type' => 'post',
            'meta_key' => 'views',
            'orderby' => 'meta_value_num',
            'order' => 'DESC',
            'LIMIT' => $count

        ];

        $query = new WP_Query($args);
        if($query->have_posts()){
            $counter = 0;
            $array = [];
            while($query->have_posts()){
                $query->the_post();
                $cat = get_the_category( get_the_ID() );

                if(!$format){
                    
                ob_start();

                ?>
                <a href="<?php echo get_the_permalink() ?>" class="post-list-item reveal">
                    <div class="post-num">0 <?php echo $counter; ?></div>
                    <div class="post-list-info">
                    <div class="post-list-cat"><?php echo $cat[0]->name; ?> · <?php echo get_the_date(); ?></div>
                    <h4><?php echo get_the_title(); ?></h4>
                    <p>
                        <?php echo get_the_excerpt(  ); ?>
                    </p>
                    </div>
                </a>
                <?php

                echo ob_get_clean();
                $counter++;

                }
                else { 
                    $array[] = [
                        'title' => get_the_title(),
                        'cat' => $cat[0]->name,
                        'link' => get_the_permalink()
                    ];

                    addtoLog(json_encode($array, JSON_PRETTY_PRINT));
                }
                    
                }

                return $array;
                
            }

        return [];
    }

    public static function returnCats(){
        $categories = get_categories();
        foreach($categories as $category){
            if($category->name === 'Uncategorized'){
                continue;
            }
        
            ?>
              <a href="<?php echo get_category_link($category->term_id); ?>" class="topic-item">
                <span class="topic-name"><?php echo $category->name; ?></span>
                <span class="topic-count"><?php echo $category->count; ?></span>
             </a>


            <?php
          
        }
    }
    

    
}

new hopQuery();