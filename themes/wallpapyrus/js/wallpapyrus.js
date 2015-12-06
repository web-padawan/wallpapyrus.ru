(function($){
  $(function() {
    var $date = $('.node__submitted .submitted'),
        text = $date.text();

    $date.attr('title', text);
    $date.text('Загружено: ' + text);

    var $download = $('.field--name-field-download-count');
    $download.attr('title', $download.text());

    var $category = $('.field--name-field-tag-categories');
    $category.attr('title', $category.text());

    var $tags = $('.field--name-field-tags'),
        terms = $tags.find('.field__item'),
        tArr = [];

    for (var i = 0; i< terms.length; i++) {
      tArr.push(terms[i].innerText);
    };

    $tags.attr('title', 'Теги: '+ tArr.join(', '));

    var $colors = $('.wallp-colors__label');
    $colors.attr('title', 'Основные цвета');

    var $rating = $('.field--name-field-wallpaper-rating');
    $rating.attr('title', 'Рейтинг');

    $('#wallp').magnificPopup({
      type: 'image',
      closeOnContentClick: true
    });
  });
})(jQuery);
