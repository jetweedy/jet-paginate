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

function jetPaginate_prepExcerpt($content) {
//    $content = strip_shortcodes( $content );
    $words = explode(" ", $content);
//    if (count($words) > 20) {
//        array_splice($words, 20);
//    }
    $content = implode(" ", $words) . "...";
	$content = preg_replace("/<div class=\\\"link-more\\\">.*?<\/div>/", "", $content);
    $content .= "<div class=\"link-more\"><a href=\"".get_permalink(get_the_ID())."\">Read More</a></div>";
    $content = do_shortcode($content);
    return $content;
} 
add_filter('the_excerpt', 'jetPaginate_prepExcerpt');


function jet_paginate( $atts, $content ){
    
    $next = "Next";
    $prev = "Previous";
    
    $jetp = isset($_GET['jetp']) ? intval($_GET['jetp']) : 0;
    
    if ($jetp > -1) {
        $x = preg_split("/\[jet-page.*?\]/", $content);
        if (isset($atts['prev']))
            $prev = $atts['prev'];
        if (isset($atts['next']))
            $next = $atts['next'];
        if (count($x) > $jetp) {
            $output = "";
            $output .= "<div class='jet-paginate-nav'>";
            if ($jetp > 0) {
                $output .= "<a class='jet-paginate-prev jet-paginate-link' href='?jetp=".($jetp-1)."'>&#8592; ".$prev."</a>";
            }
            if ($jetp < (count($x)-1)) {
                $output .= "<a class='jet-paginate-next jet-paginate-link' href='?jetp=".($jetp+1)."'>".$next." &#8594;</a>";
            }
            $output .= "</div>";
            $output .= $x[$jetp];
            $output .= "<div class='jet-paginate-nav'>";
            if ($jetp > 0) {
                $output .= "<a class='jet-paginate-prev jet-paginate-link' href='?jetp=".($jetp-1)."'>&#8592; ".$prev."</a>";
            }
            if ($jetp < (count($x)-1)) {
                $output .= "<a class='jet-paginate-next jet-paginate-link' href='?jetp=".($jetp+1)."'>".$next." &#8594;</a>";
            }
            $output .= "</div>";
            $output = do_shortcode($output);
            return $output;
        } else {
            $content = do_shortcode($content);
            return $content;
        }
    } else {
        $content = do_shortcode($content);
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
