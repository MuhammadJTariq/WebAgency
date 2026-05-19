<?php 
if(!defined('ABSPATH')){
    exit;
}

class hopQuery{

    public function __construct(){
        add_action('pre_get_posts', [$this, 'loadBlog']);
        //add_action('parse_query', [$this, 'loadBlog']);
    }

    public function loadBlog(){
        if(is_page('blog')){
            add_action('returnPosts');
        }
    }

    
}