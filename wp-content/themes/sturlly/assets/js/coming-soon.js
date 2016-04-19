;(function ( $, window, document, undefined ) {
    'use_strict';
    var _selector = $('#counter');
    var _year = _selector.data('year');
    var _month = _selector.data('month');
    var _day = _selector.data('day');
    _selector.countdown(_year+'/'+_month+'/'+_day+' 12:00:00').on('update.countdown',function(event){var $this = $(this).html(event.strftime('' + '<div class="counter-container"><div class="counter-box first"><div class="number">%-D</div><span>Day%!d<span></div>' + '<div class="counter-box"><div class="number">%H</div><span>Hours</span></div>' + '<div class="counter-box"><div class="number">%M</div><span>Minutes</span></div>' + '<div class="counter-box last"><div class="number">%S</div><span>Seconds</span></div></div>'))});
})( jQuery, window, document );
