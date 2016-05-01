// the semi-colon before the function invocation is a safety
// net against concatenated scripts and/or other plugins
// that are not closed properly.
;(function ( $, window, document, undefined ) {
  'use strict';

  var Shortcodes = vc.shortcodes;

    window.RSSliderView = window.VcColumnView.extend({
    events:{
      'click > .controls .column_add':'addDirectlyElement',
      'click > .wpb_element_wrapper > .vc_empty-container':'addDirectlyElement',
      'click > .controls .column_delete':'deleteShortcode',
      'click > .controls .column_edit':'editElement',
      'click > .controls .column_clone':'clone',
    },
    addDirectlyElement:function ( e ) {
      e.preventDefault();
      var slider = Shortcodes.create({shortcode:'rs_slider_item', parent_id:this.model.id});
      return slider;
    },
    setDropable:function () {},
    dropButton:function ( event, ui ) {},
  });


  //
  // ATTS
  // -------------------------------------------------------------------------
  _.extend(vc.atts, {
    vc_efa_chosen:{
      parse:function ( param ) {
        var value = this.content().find('.wpb_vc_param_value[name=' + param.param_name + ']').val();
        return ( value ) ? value.join(',') : '';
      }
    },
  });

})( jQuery, window, document );
