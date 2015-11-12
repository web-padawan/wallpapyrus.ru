(function($){
  $(function() {

    // wallpaper type
    var type = $('.wallp-download').attr('data-type');

    // available styles
    var desktop = [
        'wide_2560x1600', 'wide_1920x1200', 'wide_1680x1050', 'wide_1440x900',
        'hd_2560x1440', 'hd_1920x1080', 'hd_1600x900', 'hd_1366x768',
        'full_1600x1200', 'full_1400x1050', 'full_1280x960', 'full_1024x768'
    ];

    var mobile = [
        'apple_320x480', 'apple_640x960', 'apple_640x1136', 'apple_750x1334',
        'apple_768x1024', 'apple_1080x1920', 'apple_1536x2048',
        'android_480x800', 'android_480x854', 'android_540x960', 'android_600x1024',
        'android_720x1280', 'android_768x1280', 'android_800x1280', 'android_1200x1920'
    ];

    // check if we have appropriate image style
    var userScreen = screen.width + 'x' + screen.height,
        styles = (type === 'desktop') ? desktop : mobile;
        userMatch = styles.filter(function(value) {
          return (~value.indexOf(userScreen)) ? true: false;
        });

    // fill user screen dimensions info
    if (userMatch.length) {
      var imgPath = $('.wallp-download').attr('data-uri'),
          imgLink = '<a href="/system/files_force/styles/' + userMatch[0] + '/public/' + imgPath + '?download=1">' + userScreen + '</a>';
      $('.wallp-download__user-size').html(imgLink);
      Drupal.attachBehaviors();
    } else {
      $('.wallp-download__user-size').text(userScreen);
    }

    // filд wallpaper fields titles
    var $date = $('.submitted');
    $date.attr('title', 'Добавлено: ' + $date.text());

    var $download = $('.field--name-field-download-count');
    $download.attr('title', $download.text());

    var $category = $('.field--name-field-tag-categories');
    $category.attr('title', $category.text());

    var $tags = $('.field--name-field-tags');
    $tags.attr('title', $tags.text());

    var $colors = $('.wallp-colors__label');
    $colors.attr('title', 'Основные цвета');

    var $rating = $('.field--name-field-wallpaper-rating');
    $rating.attr('title', 'Рейтинг');
  });
})(jQuery);
