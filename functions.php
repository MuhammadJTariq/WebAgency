<?php 

define('THEME_DIR', get_template_directory());
define('THEME_URI', get_template_directory_uri());

define('SCRIPTS_URI', THEME_URI . '/assets/scripts');
define('STYLES_URI', THEME_URI . '/assets/styles');
define('IMAGES', THEME_URI . '/assets/images');
define('DEBUG', THEME_DIR . '/debug/debug.log');
function addtoLog($value){
    $path = DEBUG;
    file_put_contents($path,  $value, FILE_APPEND);

}



$dir = scandir(THEME_DIR . '/inc');
foreach ($dir as $file) {
    if ($file === '.' || $file === '..') {
        continue;
    }

    $path = THEME_DIR . '/inc/' . $file;

    if (is_file($path) && pathinfo($path, PATHINFO_EXTENSION) === 'php') {
        include_once $path;
    }
}




function part_get($file){
    $path = THEME_DIR . '/parts/' . $file . '.php';
    if(file_exists($path)){
        include $path;
    }
    else {
        throw new Exception("This Part Could Not be Located");
    }

}





