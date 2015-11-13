(function ($) {
  Drupal.behaviors.wallpapyrus_crop = {
    attach: function (context, settings) {

      var $download = $('#download-link');
      $download.on('click', function(){
        window.location.href = $(this).attr('href');
      });

      var $user = $('#user-size');
      $user.text(screen.width + 'x' + screen.height);

      var requestCrop = function(w, h, target) {
        if (!isNaN(w) && !isNaN(h) && typeof settings['ajaxLoading'] === 'undefined' || settings.ajaxLoading === false) {
          settings.ajaxLoading = true;
          var throbber = $('<div class="ajax-loader">&nbsp;</div></div>');
          $(target).after(throbber);

          $.ajax({
            url: 'wallpapyrus_crop/' + Drupal.settings.nid + '/' + w + '/' + h,
            success: function(data) {
              settings.ajaxLoading = false;
              $download.attr('href', data.replace('\\', ''));
              Drupal.attachBehaviors();
              $download.trigger('click');
              $('.wallp-download').find('.ajax-loader').remove();
            }
          });
        }
      }

      $('#manual-submit').on('click', function(event) {
        event.preventDefault();

        var w = parseInt($('#manual-width').val()),
            h = parseInt($('#manual-height').val());

        requestCrop(w, h, this);

        if (isNaN(w)) {
          $('#manual-width').val('');
        }

        if (isNaN(h)) {
          $('#manual-height').val('');
        }
      });

      $('#desktop-submit').on('click', function(event) {
        event.preventDefault();

        var s = $("#desktop-list").val().split('x'),
            w = parseInt(s[0]),
            h = parseInt(s[1]);

        requestCrop(w, h, this);
      });

      $('#mobile-submit').on('click', function(event) {
        event.preventDefault();

        var s = $("#mobile-list").val().split('x'),
            w = parseInt(s[0]),
            h = parseInt(s[1]);

        requestCrop(w, h, this);
      });

      $user.on('click', function(event) {
        event.preventDefault();

        var s = $(this).text().split('x'),
            w = parseInt(s[0]),
            h = parseInt(s[1]);

        requestCrop(w, h, this);
      });
    }
  };
})(jQuery);
