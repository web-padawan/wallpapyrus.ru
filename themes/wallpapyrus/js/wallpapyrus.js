(function($){
  $(function() {
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
