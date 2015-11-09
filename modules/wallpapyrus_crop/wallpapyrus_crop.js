(function ($) {
  Drupal.behaviors.wallpapyrus_crop = {
    attach: function (context, settings) {

      $('#manual-submit').on('click', function(event) {

        event.preventDefault();

        var w = parseInt($('#manual-width').val()),
            h = parseInt($('#manual-height').val());

        if (!isNaN(w) && !isNaN(h) && typeof settings['ajaxLoading'] === 'undefined' || settings.ajaxLoading === false) {
          settings.ajaxLoading = true;

          $.ajax({
            url: 'wallpapyrus_crop/' + Drupal.settings.nid + '/' + w + '/' + h,
            success: function(data) {
              settings.ajaxLoading = false;
              $('#manual-link').html('<a href="' + data.replace('\\', '') + '">' + w + 'x' + h + '</a>');
              Drupal.attachBehaviors();
            }
          });
        }

        if (isNaN(w)) {
          $('#manual-width').val('');
        }
        if (isNaN(h)) {
          $('#manual-height').val('');
        }

      });
    }
  };
})(jQuery);
