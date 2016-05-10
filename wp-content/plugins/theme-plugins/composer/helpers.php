<?php

/**
 *
 * Aspect Ratio
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if( ! function_exists( 'rs_aspect_ratio' ) ) {
  function rs_aspect_ratio( $ratio = '' ) {
    $ratio  = explode( ':', $ratio );
    $ratio  = intVal( $ratio[1] / $ratio[0] * 100 );
    return $ratio;
  }
}

/**
 * 
 * Check Exploadble
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if( ! function_exists('is_explodable' ) ) {
  function is_explodable( $page_name ) {
    return (strpos($page_name, ',') === false ) ? false : true;
  }  
}

/**
 *
 * Walker Category
 * @since 1.0.0
 * @version 1.1.0
 *
 */
class Walker_Portfolio_List_Categories extends Walker_Category {

  function start_el( &$output, $category, $depth = 0, $args = array(), $current_object_id = 0 ) {

    $has_children = get_term_children( $category->term_id, 'portfolio-category' );

    if( empty( $has_children ) ) {
      $cat_name = esc_attr( $category->name );
      $cat_name = apply_filters( 'list_cats', $cat_name, $category );
      $link     = '<li><a href="#" data-filter=".'. strtolower( $category->slug ) .'">';
      $link    .= $cat_name;
      $link    .= '</a></li>';
      $output  .= $link;
    }

  }

  function end_el( &$output, $page, $depth = 0, $args = array() ) {}

}

/**
*
* @return array of icon
* @param  none
* returns array of icons
*
**/
if(!function_exists('rs_get_icons')) {
  function rs_get_icons() {
    $icons = array('adjust','anchor','archive','arrows','arrows-h','arrows-v','asterisk','automobile','ban','bank','bar-chart-o','barcode','bars','beer','bell','bell-o','bolt','bomb','book','bookmark','bookmark-o','briefcase','bug','building','building-o','bullhorn','bullseye','cab','calendar','calendar-o','camera','camera-retro','car','caret-square-o-down','caret-square-o-left','caret-square-o-right','caret-square-o-up','certificate','check','check-circle','check-circle-o','check-square','check-square-o','child','circle','circle-o','circle-o-notch','circle-thin','clock-o','cloud','cloud-download','cloud-upload','code','code-fork','coffee','cog','cogs','comment','comment-o','comments','comments-o','compass','credit-card','crop','crosshairs','cube','cubes','cutlery','dashboard','database','desktop','dot-circle-o','download','edit','ellipsis-h','ellipsis-v','envelope','envelope-o','envelope-square','eraser','exchange','exclamation','exclamation-circle','exclamation-triangle','external-link','external-link-square','eye','eye-slash','fax','female','fighter-jet','file-archive-o','file-audio-o','file-code-o','file-excel-o','file-image-o','file-movie-o','file-pdf-o','file-photo-o','file-picture-o','file-powerpoint-o','file-sound-o','file-video-o','file-word-o','file-zip-o','film','filter','fire','fire-extinguisher','flag','flag-checkered','flag-o','flash','flask','folder','folder-o','folder-open','folder-open-o','frown-o','gamepad','gavel','gear','gears','gift','glass','globe','graduation-cap','group','hdd-o','headphones','heart','heart-o','history','home','image','inbox','info','info-circle','institution','key','keyboard-o','language','laptop','leaf','legal','lemon-o','level-down','level-up','life-bouy','life-ring','life-saver','lightbulb-o','location-arrow','lock','magic','magnet','mail-forward','mail-reply','mail-reply-all','male','map-marker','meh-o','microphone','microphone-slash','minus','minus-circle','minus-square','minus-square-o','mobile','mobile-phone','money','moon-o','mortar-board','music','navicon','paper-plane','paper-plane-o','paw','pencil','pencil-square','pencil-square-o','phone','phone-square','photo','picture-o','plane','plus','plus-circle','plus-square','plus-square-o','power-off','print','puzzle-piece','qrcode','question','question-circle','quote-left','quote-right','random','recycle','refresh','reorder','reply','reply-all','retweet','road','rocket','rss','rss-square','search','search-minus','search-plus','send','send-o','share','share-alt','share-alt-square','share-square','share-square-o','shield','shopping-cart','sign-in','sign-out','signal','sitemap','sliders','smile-o','sort','sort-alpha-asc','sort-alpha-desc','sort-amount-asc','sort-amount-desc','sort-asc','sort-desc','sort-down','sort-numeric-asc','sort-numeric-desc','sort-up','space-shuttle','spinner','spoon','square','square-o','star','star-half','star-half-empty','star-half-full','star-half-o','star-o','suitcase','sun-o','support','tablet','tachometer','tag','tags','tasks','taxi','terminal','thumb-tack','thumbs-down','thumbs-o-down','thumbs-o-up','thumbs-up','ticket','times','times-circle','times-circle-o','tint','toggle-down','toggle-left','toggle-right','toggle-up','trash-o','tree','trophy','truck','umbrella','university','unlock','unlock-alt','unsorted','upload','user','users','video-camera','volume-down','volume-off','volume-up','warning','wheelchair','wrench','file','file-o','file-text','file-text-o','bitcoin','btc','cny','dollar','eur','euro','gbp','inr','jpy','krw','rmb','rouble','rub','ruble','rupee','try','turkish-lira','usd','won','yen','align-center','align-justify','align-left','align-right','bold','chain','chain-broken','clipboard','columns','copy','cut','dedent','files-o','floppy-o','font','header','indent','italic','link','list','list-alt','list-ol','list-ul','outdent','paperclip','paragraph','paste','repeat','rotate-left','rotate-right','save','scissors','strikethrough','subscript','superscript','table','text-height','text-width','th','th-large','th-list','underline','undo','unlink','angle-double-down','angle-double-left','angle-double-right','angle-double-up','angle-down','angle-left','angle-right','angle-up','arrow-circle-down','arrow-circle-left','arrow-circle-o-down','arrow-circle-o-left','arrow-circle-o-right','arrow-circle-o-up','arrow-circle-right','arrow-circle-up','arrow-down','arrow-left','arrow-right','arrow-up','arrows-alt','caret-down','caret-left','caret-right','caret-up','chevron-circle-down','chevron-circle-left','chevron-circle-right','chevron-circle-up','chevron-down','chevron-left','chevron-right','chevron-up','hand-o-down','hand-o-left','hand-o-right','hand-o-up','long-arrow-down','long-arrow-left','long-arrow-right','long-arrow-up','backward','compress','eject','expand','fast-backward','fast-forward','forward','pause','play','play-circle','play-circle-o','step-backward','step-forward','stop','youtube-play','adn','android','apple','behance','behance-square','bitbucket','bitbucket-square','codepen','css3','delicious','deviantart','digg','dribbble','dropbox','drupal','empire','facebook','facebook-square','flickr','foursquare','ge','git','git-square','github','github-alt','github-square','gittip','google','google-plus','google-plus-square','hacker-news','html5','instagram','joomla','jsfiddle','linkedin','linkedin-square','linux','maxcdn','openid','pagelines','pied-piper','pied-piper-alt','pied-piper-square','pinterest','pinterest-square','qq','ra','rebel','reddit','reddit-square','renren','skype','slack','soundcloud','spotify','stack-exchange','stack-overflow','steam','steam-square','stumbleupon','stumbleupon-circle','tencent-weibo','trello','tumblr','tumblr-square','twitter','twitter-square','vimeo-square','vine','vk','wechat','weibo','weixin','windows','wordpress','xing','xing-square','yahoo','youtube','youtube-square','ambulance','h-square','hospital-o','medkit','stethoscope','user-md');
    return array_combine($icons, $icons);
  }  
}

/**
 *
 * Set WPAUTOP for shortcode output
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if( ! function_exists( 'rs_set_wpautop' ) ) {
  function rs_set_wpautop( $content, $force = true ) {
    if ( $force ) {
      $content = wpautop( preg_replace( '/<\/?p\>/', "\n", $content ) . "\n" );
    }
    return do_shortcode( shortcode_unautop( $content ) );
  }
}

/**
 *
 * Get Bootstrap Col
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if( ! function_exists( 'rs_get_bootstrap_col' ) ) {
  function rs_get_bootstrap_col( $width = '' ) {
    $width = explode('/', $width);
    $width = ( $width[0] != '1' ) ? $width[0] * floor(12 / $width[1]) : floor(12 / $width[1]);
    return  $width;
  }
}

/**
 *
 * Animations
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'rs_get_animations' ) ) {
  function rs_get_animations() {

    $animations = array(
      '',
      'fadeIn',
      'fadeInLeft',
      'fadeInRight',
      'fadeInUp',
      'fadeInDown',
      'bounce',
      'flash',
      'pulse',
      'shake',
      'swing',
      'tada',
      'wobble',
      'bounceIn',
      'bounceInLeft',
      'bounceInRight',
      'bounceInUp',
      'bounceInDown',
    );

    $animations = apply_filters( 'rs_animations', $animations );
    return $animations;

  }
}

/**
 *
 * Valid PX
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if( ! function_exists( 'rs_validpx' ) ) {
  function rs_validpx( $num ) {
    return ( is_numeric( $num ) ) ? $num . 'px' : $num;
  }
}

/**
 *
 * element values post, page, categories
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'rs_element_values' ) ) {
  function rs_element_values(  $type = '', $query_args = array() ) {
 
    $options = array();
     
    switch( $type ) {
     
      case 'pages':
      case 'page':
      $pages = get_pages( $query_args );

      if ( !empty($pages) ) {
        foreach ( $pages as $page ) {
          $options[$page->post_title] = $page->ID;
        }
      }
      break;
       
      case 'posts':
      case 'post':
      $posts = get_posts( $query_args );

      if ( !empty($posts) ) {
        foreach ( $posts as $post ) {
          $options[$post->post_title] = lcfirst($post->post_title);
        }
      }
      break;
       
      case 'tags':
      case 'tag':

      $tags = get_terms( $query_args['taxonomies'], $query_args['args'] );
        if ( !empty($tags) ) {
          foreach ( $tags as $tag ) {
            $options[$tag->name] = $tag->term_id;
        }
      }
      break;
       
      case 'categories':
      case 'category':      

      $categories = get_categories( $query_args );
      if ( !empty($categories) ) {
        foreach ( $categories as $category ) {
          $options[$category->name] = $category->term_id;
        }
      }
      break;
       
      case 'custom':
      case 'callback':

      if( is_callable( $query_args['function'] ) ) {
        $options = call_user_func( $query_args['function'], $query_args['args'] );
      }

      break;
     
    }
   
    return $options;
    
  }
}