// Portfolio Tab
"use strict";
jQuery(document).ready(function(a) {

        a("body")
        .waypoint({
            offset: -200,
            handler: function(b) {
                "down" === b ? a(".go-top")
                .css("bottom", "12px")
                .css("opacity", "1") : a(".go-top")
                .css("bottom", "-44px")
                .css("opacity", "0")
            }
        }), a(".go-top")
        .click(function(b) {
            b.preventDefault(), a("html, body")
            .animate({
                scrollTop: 0
            }, 300)
        }), a(".os-animation")
        .each(function() {
            var b = a(this),
            c = b.attr("data-os-animation"),
            d = b.attr("data-os-animation-delay");
            b.css("-webkit-animation-delay", d), b.css("-moz-animation-delay", d), b.css("animation-delay", d), b.waypoint(function() {
                a(this)
                .addClass("animated")
                .addClass(c)
            }, {
                triggerOnce: !0,
                offset: "100%"
            })
    });
});