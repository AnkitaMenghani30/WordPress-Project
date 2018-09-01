
<?php
function efs_get_slider(){
 
$slider= '<div class="flexslider">
      <ul class="slides">';
 
    $efs_query= "post_type=slider-image";
    query_posts($efs_query);
     
     
    if (have_posts()) : while (have_posts()) : the_post(); 
        $img= get_the_post_thumbnail( $post->ID, 'large' );
         
        $slider.='<li>'.$img.'</li>';
             
    endwhile; endif; wp_reset_query();
 
 
    $slider.= '</ul>
    </div>';
     
    return $slider;
}
 
 
/**add the shortcode for the slider- for use in editor**/
 
function efs_insert_slider($atts, $content=null){
 
$slider= efs_get_slider();
 
return $slider;
 
}
 
 
add_shortcode('ef_slider', 'efs_insert_slider');
 
 
 
/**add template tag- for use in themes**/
 
function efs_slider(){
 
    print efs_get_slider();
}

?>