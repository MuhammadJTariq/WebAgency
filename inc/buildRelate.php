<?php 


class buildRelate{
    public function __construct(){

    }

    public static function relatedPosts($post_id, $tags = [], $categories = []) {
    if (!empty($categories)) {

        $category_ids = array();

        foreach ($categories as $category) {
            if (is_object($category)) {
                $category_ids[] = $category->term_id;
            } else {
                $category_ids[] = $category;
            }
        }

        $args = array(
            'category__in'   => $category_ids,
            'post__not_in'   => array($post_id),
            'posts_per_page' => 3,
        );

        $query = new WP_Query($args);

        if ($query->have_posts()) {

            while ($query->have_posts()) {
                $query->the_post();

                $categories = get_the_category();
                $name = !empty($categories) ? $categories[0]->name : '';

                ob_start();
                ?>

                <a href="<?php echo get_the_permalink(); ?>" class="related-item">
                    <div class="related-cat">
                        <?php echo esc_html($name); ?> · <?php echo get_the_date(); ?>
                    </div>

                    <div class="related-title">
                        <?php echo get_the_title(); ?>
                    </div>
                </a>

                <?php
                echo ob_get_clean();
            }

            wp_reset_postdata();
        }
    }

    if(!empty($tags)){
        $tag_ids = array();
        
        foreach($tags as $tag){
            $tag_ids[] = $tag->term_id;

        }

        $args = array(
            'tag__in' => $tag_ids,
            'post__not_in' => array($post_id),
            'posts_per_page' => 3,
        );

        $tagQuery = new WP_Query($args);
        if($tagQuery->haveposts()){
            while($tagQuery->have_posts()){
                $tagQuery->the_post();
                $tags = get_the_tags();
                $name = $tags[0]->name;
                ob_start();
                ?>
                <a href="<?php echo get_the_permalink(); ?>" class="more-card">
                    <div class="more-card-cat"><span><?php echo $name; ?></span><span><?php echo get_the_date('F j'); ?></span></div>
                    <h3><?php echo get_the_title(); ?></h3>
                    <p>
                        <?php echo get_the_excerpt( ); ?>
                    </p>
                </a>
                <?php
    

            }
        }
    }


    }
}


new buildRelate();