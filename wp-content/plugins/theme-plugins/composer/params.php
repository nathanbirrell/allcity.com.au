<?php
/**
  * WPBakery Visual Composer Extra Params
  *
  * @package VPBakeryVisualComposer
  *
 */
  
  // Multiple Select
// ----------------------------------------------------------------------------------
  function vc_efa_chosen($settings, $value) {


    $css_option = vc_get_dropdown_option( $settings, $value );
    $value = explode( ',', $value );
    
    $output  = '<select name="'. $settings['param_name'] .'" data-placeholder="'. $settings['placeholder'] .'" multiple="multiple" class="wpb_vc_param_value wpb_chosen chosen wpb-input wpb-efa-select '. $settings['param_name'] .' '. $settings['type'] .' '. $css_option .'" data-option="'. $css_option .'">';

    foreach ( $settings['value'] as $values => $option ) {
      $selected = ( in_array( $option, $value ) ) ? ' selected="selected"' : '';
      $output .= '<option value="'. $option .'"'. $selected .'>'.htmlspecialchars( $values ).'</option>';
    }

    $output .= '</select>' . "\n";
     
    return $output;  
  }

  add_shortcode_param('vc_efa_chosen', 'vc_efa_chosen');


// create icon style attribute
function icon_settings_field($settings, $value) {
  $dependency = vc_generate_dependencies_attributes($settings);
  $param_name = isset($settings['param_name']) ? $settings['param_name'] : '';
  $type       = isset($settings['type']) ? $settings['type'] : '';
  $class      = isset($settings['class']) ? $settings['class'] : '';
  $icons      = json_decode(file_get_contents(RS_ROOT .'/composer/fa-icons.json'));

  $output = '<input type="hidden" name="'.$param_name.'" class="wpb_vc_param_value '.$param_name.' '.$type.' '.$class.'" value="'.$value.'" id="trace"/>
      <div class="icon-preview"><i class=" fa fa-'.$value.'"></i></div>';
  $output .='<input class="search" type="text" placeholder="Search" />';
  $output .='<div id="icon-dropdown" >';
  $output .= '<ul class="icon-list">';
  $n = 1;
  foreach($icons->icons as $icon) {
    $selected = ($icon == $value) ? 'class="selected"' : '';
    $id = 'icon-'.$n;
    $output .= '<li '.$selected.' data-icon="'.$icon.'"><i class="icon fa fa-'.$icon.'"></i><label class="icon">'.$icon.'</label></li>';
    $n++;
  }
  $output .='</ul>';
  $output .='</div>';
  $output .= '<script type="text/javascript">
      jQuery(document).ready(function(){
        jQuery(".search").keyup(function(){
       
          // Retrieve the input field text and reset the count to zero
          var filter = jQuery(this).val(), count = 0;
       
          // Loop through the icon list
          jQuery(".icon-list li").each(function(){
       
            // If the list item does not contain the text phrase fade it out
            if (jQuery(this).text().search(new RegExp(filter, "i")) < 0) {
              jQuery(this).fadeOut();
            } else {
              jQuery(this).show();
              count++;
            }
          });
        });
      });

      jQuery("#icon-dropdown li").click(function() {
        jQuery(this).attr("class","selected").siblings().removeAttr("class");
        var icon = jQuery(this).attr("data-icon");
        jQuery("#trace").val(icon);
        jQuery(".icon-preview").html("<i class=\'icon fa fa-"+icon+"\'></i>");
      });
  </script>';
  return $output;
}

add_shortcode_param('icon', 'icon_settings_field');