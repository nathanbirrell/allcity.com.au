window.ALLCITY = window.ALLCITY || {};

ALLCITY.init = function() {
  // remove weird white text that gets set mysteriously
  $('.work-count p.content-white').removeClass('content-white');

  // youtube embed hack
  $('.fluid-width-video-wrapper').css('padding-top', '0');

  // hide a bunch of theme crap
  $('.comments-main, .month, .medium.light-gray').hide();

  var clipboard = new Clipboard('.copy-to-clipboard');

  clipboard.on('success', function(e) {
      $('.success.callout').removeClass('hidden').show().delay(3500).fadeOut();
  });

  $('#cta-arrange-consultation').on('click', function() {
    console.log('open');
    $('#contact').addClass('expanded');
  });
  $('#cta-arrange-consultation-close').on('click', function() {
    $('#contact').removeClass('expanded');
  });

  // $('#blog-details img').each(function() {
  // 	var $link = $(this).closest('a');
  // 	var $img = $(this);
  //
  // 	$link.attr('data-size', $img.width() + 'x' + $img.height());
  // 	$link.attr('itemprop', 'thumbnail');
  // 	// $link.append('<figcaption itemprop="caption description"</figcaption>');
  // 	$link.wrap('<figure class=\"\" itemprop=\"associatedMedia\" itemscope=\"\" itemtype=\"http://schema.org/ImageObject\"> </figure>');
  // });

  // var showMailchimpPopUp = function () {
  //   require(["mojo/signup-forms/Loader"], function(L) { L.start({"baseUrl":"mc.us13.list-manage.com","uuid":"41ab846cc22bcc6e712d0b1e6","lid":"249b7236b0"}) })
  //   document.cookie = "MCEvilPopupClosed=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
  // };
  // $('.mailchimp-popup').click(function() {
  //   showMailchimpPopUp();
  // });

  var initPhotoSwipeFromDOM = function(gallerySelector) {
      // parse slide data (url, title, size ...) from DOM elements
      // (children of gallerySelector)
      var parseThumbnailElements = function(el) {
        var thumbEls;
      // if ($('#blog-details').length > 0) {
      // 	thumbEls = $('figure'); // handle blog page gallery differently
      // } else {
        thumbEls = el.childNodes;
      // }

          var thumbElements = thumbEls,
              numNodes = thumbElements.length,
              items = [],
              figureEl,
              linkEl,
              size,
              item;

          for(var i = 0; i < numNodes; i++) {

              figureEl = thumbElements[i]; // <figure> element

              // include only element nodes
              if(figureEl.nodeType !== 1) {
                  continue;
              }

              linkEl = figureEl.children[0]; // <a> element

              size = linkEl.getAttribute('data-size').split('x');

              // create slide object
              item = {
                  src: linkEl.getAttribute('href'),
                  w: parseInt(size[0], 10),
                  h: parseInt(size[1], 10)
              };



              if(figureEl.children.length > 1) {
                  // <figcaption> content
                  item.title = figureEl.children[1].innerHTML;
              }

              if(linkEl.children.length > 0) {
                  // <img> thumbnail element, retrieving thumbnail url
                  item.msrc = linkEl.children[0].getAttribute('src');
              }

              item.el = figureEl; // save link to element for getThumbBoundsFn
              items.push(item);
          }

          return items;
      };

      // find nearest parent element
      var closest = function closest(el, fn) {
          return el && ( fn(el) ? el : closest(el.parentNode, fn) );
      };

      // triggers when user clicks on thumbnail
      var onThumbnailsClick = function(e) {
          e = e || window.event;
          e.preventDefault ? e.preventDefault() : e.returnValue = false;

          var eTarget = e.target || e.srcElement;

          // find root element of slide
          var clickedListItem = closest(eTarget, function(el) {
              return (el.tagName && el.tagName.toUpperCase() === 'FIGURE');
          });

          if(!clickedListItem) {
              return;
          }

          // find index of clicked item by looping through all child nodes
          // alternatively, you may define index via data- attribute
          var clickedGallery = clickedListItem.parentNode,
              childNodes = clickedListItem.parentNode.childNodes,
              numChildNodes = childNodes.length,
              nodeIndex = 0,
              index;

          for (var i = 0; i < numChildNodes; i++) {
              if(childNodes[i].nodeType !== 1) {
                  continue;
              }

              if(childNodes[i] === clickedListItem) {
                  index = nodeIndex;
                  break;
              }
              nodeIndex++;
          }



          if(index >= 0) {
              // open PhotoSwipe if valid index found
              openPhotoSwipe( index, clickedGallery );
          }
          return false;
      };

      // parse picture index and gallery index from URL (#&pid=1&gid=2)
      var photoswipeParseHash = function() {
          var hash = window.location.hash.substring(1),
          params = {};

          if(hash.length < 5) {
              return params;
          }

          var vars = hash.split('&');
          for (var i = 0; i < vars.length; i++) {
              if(!vars[i]) {
                  continue;
              }
              var pair = vars[i].split('=');
              if(pair.length < 2) {
                  continue;
              }
              params[pair[0]] = pair[1];
          }

          if(params.gid) {
              params.gid = parseInt(params.gid, 10);
          }

          return params;
      };

      var openPhotoSwipe = function(index, galleryElement, disableAnimation, fromURL) {
          var pswpElement = document.querySelectorAll('.pswp')[0],
              gallery,
              options,
              items;

          items = parseThumbnailElements(galleryElement);

          // define options (if needed)
          options = {

              // define gallery index (for URL)
              galleryUID: galleryElement.getAttribute('data-pswp-uid'),

              getThumbBoundsFn: function(index) {
                  // See Options -> getThumbBoundsFn section of documentation for more info
                  var thumbnail = items[index].el.getElementsByTagName('img')[0], // find thumbnail
                      pageYScroll = window.pageYOffset || document.documentElement.scrollTop,
                      rect = thumbnail.getBoundingClientRect();

                  return {x:rect.left, y:rect.top + pageYScroll, w:rect.width};
              }

          };

          // PhotoSwipe opened from URL
          if(fromURL) {
              if(options.galleryPIDs) {
                  // parse real index when custom PIDs are used
                  // http://photoswipe.com/documentation/faq.html#custom-pid-in-url
                  for(var j = 0; j < items.length; j++) {
                      if(items[j].pid == index) {
                          options.index = j;
                          break;
                      }
                  }
              } else {
                  // in URL indexes start from 1
                  options.index = parseInt(index, 10) - 1;
              }
          } else {
              options.index = parseInt(index, 10);
          }

          // exit if index not found
          if( isNaN(options.index) ) {
              return;
          }

          if(disableAnimation) {
              options.showAnimationDuration = 0;
          }

          // Pass data to PhotoSwipe and initialize it
          gallery = new PhotoSwipe( pswpElement, PhotoSwipeUI_Default, items, options);
          gallery.init();
      };

      // loop through all gallery elements and bind events
      var galleryElements = document.querySelectorAll( gallerySelector );

      for(var i = 0, l = galleryElements.length; i < l; i++) {
          galleryElements[i].setAttribute('data-pswp-uid', i+1);
          galleryElements[i].onclick = onThumbnailsClick;
      }

      // Parse URL and open gallery if it contains #&pid=3&gid=1
      var hashData = photoswipeParseHash();
      if(hashData.pid && hashData.gid) {
          openPhotoSwipe( hashData.pid ,  galleryElements[ hashData.gid - 1 ], true, true );
      }
  };

  // execute above function
  initPhotoSwipeFromDOM('.gallery');

  if (typeof __gaTracker !== "undefined") {
    var ga = __gaTracker;

    // custom analytics
    $('#cta-get-quote').click(function() {
      ga('send', {
        hitType: 'event',
        eventCategory: 'CTAs',
        eventAction: 'click',
        eventLabel: 'CTA Header'
      });
    });
    $('#cta-arrange-consultation').click(function() {
      ga('send', {
        hitType: 'event',
        eventCategory: 'CTAs',
        eventAction: 'click',
        eventLabel: 'CTA Footer'
      });
    });
  }
}

// ALLCITY.MailchimpForm = (function() {
//   var self;
//   return {
//     config: {
//       submitButton: $('#submit-to-mailchimp'),
//       mailchimpDc: 'us13',
//       mailchimpListId: '249b7236b0',
//       mailchimpApiKey: 'xxx',
//       mailchimpApiEndpoint: '' // gets built later
//     },
//     init: function() {
//       self = this;
//
//       if (!self.config.submitButton.length) {
//         return false;
//       }
//
//       self.uiBindings();
//
//       // create api url
//       self.config.mailchimpApiEndpoint = '//' + self.config.mailchimpDc + '.api.mailchimp.com/3.0/lists/' + self.config.mailchimpListId + '/members/';
//     },
//     uiBindings: function() {
//       self.config.submitButton.on('click', function() {
//         if (!self.validateForm()) {
//           return;
//         }
//         self.submitToMailchimp(this);
//       });
//     },
//     validateForm: function() {
//       // TODO
//       return true;
//     },
//     submitToMailchimp: function(form) {
//       var request = {
//         email_address: $('#email').val(),
//         status: 'subscribed',
//         merge_fields: {
//           FNAME: $('#name').val(),
//           PHONE: $('#phone').val()
//         }
//       };
//
//       console.log('mailchimp request: ', request);
//
//       $.ajax({
//           url: self.config.mailchimpApiEndpoint,
//           method: 'POST',
//           data: request,
//           dataType: 'jsonp',
//           contentType: 'application/json; charset=utf-8',
//           beforeSend: function(xhr) {
//             xhr.setRequestHeader("Authorization", "Basic " + btoa("api:" + self.config.mailchimpApiKey));
//           },
//           error: function(response, text){
//               console.log('Error', response);
//           },
//           success: function(response){
//               console.log('Success', response);
//           }
//       });
//     }
//   };
// })();

$(document).ready(function() {
  ALLCITY.init();
  // ALLCITY.MailchimpForm.init();
});
