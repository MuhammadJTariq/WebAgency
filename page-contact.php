<?php get_header(); ?>



<?php

try {
    part_get('qf');
}
catch(Exception $e){
    echo $e->getMessage();
}


?>




<?php get_footer(); ?>