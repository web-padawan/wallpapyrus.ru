(function ($) {
  Drupal.behaviors.wallpapyrus_downloads = {
    attach: function (context, settings) {

      $('.wallp-download').find('a').on('click', function() {

        $.ajax({
          url: 'wallpapyrus_downloads/' + Drupal.settings.nid,
          success: function(data) {
            $('.field--name-field-download-count .field__item').html(data);
          }
        });

      });
    }
  };
})(jQuery);
