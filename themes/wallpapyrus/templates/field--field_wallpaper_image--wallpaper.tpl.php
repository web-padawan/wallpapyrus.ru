<?php foreach ($items as $delta => $item): ?>

  <?php if ($element['#view_mode'] === 'teaser'): ?>
    <div class="wallp wallp--teaser">
  <?php else: ?>
    <div class="wallp wallp--full">
  <?php endif; ?>

    <?php
      $node = $element['#object'];
    ?>

    <?php if ($element['#view_mode'] === 'teaser'): ?>
      <a class="wallp__link" href="/node/<?php print $node->nid ?>" title="<?php print $node->title ?>">
    <?php endif; ?>

    <?php
      $url = $item['#item']['uri'];
      $image = array(
        'style_name' => 'wallpaper_preview_480x300',
        'path' => $url
      );
      print theme('image_style', $image);
    ?>

    <?php if ($element['#view_mode'] === 'teaser'): ?>
        <div class="wallp__title"><?php print $node->title ?></div>
      </a>
    <?php endif; ?>

    <?php if ($element['#view_mode'] === 'full'): ?>
      <div class="wallp__download wallp-download">
        <div class="wallp-download__title">Select your size:</div>
        <div class="wallp-download__link">
          <?php
            print l('Thumbnail', file_force_create_url(image_style_path('thumbnail', $url)));
          ?>
        </div>
      </div>
    <?php endif; ?>

    </div>
<?php endforeach; ?>
