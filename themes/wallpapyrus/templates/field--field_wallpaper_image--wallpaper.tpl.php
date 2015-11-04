<div class="<?php print $classes; ?>"<?php print $attributes; ?>>
  <div class="field-items"<?php print $content_attributes; ?>>
    <?php foreach ($items as $delta => $item): ?>

      <div class="field-item <?php print $delta % 2 ? 'odd' : 'even'; ?>"<?php print $item_attributes[$delta]; ?>>
        <?php
          $url = $item['#item']['uri'];
          $image = array(
            'style_name' => 'wallpaper_preview_480x300',
            'path' => $url
          );

          print theme('image_style', $image);

        ?>
        <?php if ($element['#view_mode'] !== 'teaser'): ?>
          <div class="download">
            <div class="download__title">Select your size:</div>
            <div class="downoad__links">
              <?php
                print l('Thumbnail', file_force_create_url(image_style_path('thumbnail', $url)));
              ?>
            </div>
          </div>
        <?php endif ?>
      </div>

    <?php endforeach; ?>
  </div>
</div>
