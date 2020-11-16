<?php
/**
 * @package JET Paginate
 * @version 1.0.0
 */
/*
Plugin Name: JET Paginate
Plugin URI: 
Description: Easy pagination markup in posts
Author: Jonathan Tweedy
Version: 1.0.0
Author URI: https://jonathantweedy.com
*/

function jet_paginate( $atts, $content ){
    
    $next = "Next";
    $prev = "Previous";
    
    $jetp = isset($_GET['jetp']) ? intval($_GET['jetp']) : 0;
    $x = explode("[jet-page]", $content);
    
    if (isset($atts['prev']))
        $prev = $atts['prev'];
    if (isset($atts['next']))
        $next = $atts['next'];
    
    if (count($x) > $jetp) {
        $output = "";
        if ($jetp > 0) {
            $output .= "<div class='jet-paginate-nav' id='jet-paginate-prev'><a href='?jetp=".($jetp-1)."'>&#8592; ".$prev."</a></div>";
        }
        $output .= $x[$jetp];
        if ($jetp < (count($x)-1)) {
            $output .= "<div class='jet-paginate-nav' id='jet-paginate-next'><a href='?jetp=".($jetp+1)."'>".$next." &#8594;</a></div>";
        }
        return $output;
    } else {
        return $content;
    }

}
add_shortcode( 'jet-paginate', 'jet_paginate' );

/*
function jet_paginate_content_filter( $content ) {
    global $nextText;
    global $prevText;
    $jetp = isset($_GET['jetp']) ? intval($_GET['jetp']) : 0;
    $x = explode("[jet-page]", $content);
    if (count($x) > $jetp) {
//        $pl = get_permalink();
//        print $pl . "<hr />";
//        $ps = get_option( 'permalink_structure' );
//        print $ps . "<hr />";
        $output = "";
        if ($jetp > 0) {
            $output .= "<div class='jet-paginate-nav' id='jet-paginate-prev'><a href='?jetp=".($jetp-1)."'>&#8592; ".$GLOBALS['jet-paginate-prevText']."</a></div>";
        }
        $output .= $x[$jetp];
        if ($jetp < (count($x)-1)) {
            $output .= "<div class='jet-paginate-nav' id='jet-paginate-next'><a href='?jetp=".($jetp+1)."'>".$GLOBALS['jet-paginate-nextText']." &#8594;</a></div>";
        }
        return $output;
    } else {
        return $content;
    }
}
add_filter( 'the_content', 'jet_paginate_content_filter' );
*/
