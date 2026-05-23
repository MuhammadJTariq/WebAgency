<?php 


class BuildCache {
    private $timeStamp;
    private $array = ['Hello World How are you guys doing', "I am doing good thanks for asking"];
    public function __construct(){
        $this->timeStamp = floor(time() / 60 + 1);
        $this->checkPath();
    }

    public function checkPath(){
        return;
    
    }

}
/*
$values = new BuildCache();

$path = THEME_DIR . '/inc/' . 'cache.txt';  

$data = serialize($values);

file_put_contents($path, $data . "\n", FILE_APPEND);

$values = file_get_contents($path);

$user = unserialize($values);

*/