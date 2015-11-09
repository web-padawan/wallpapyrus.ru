<?php foreach ($items as $delta => $item): ?>

  <?php if ($element['#view_mode'] === 'teaser'): ?>
    <div class="wallp wallp--teaser wallp--desktop">
  <?php else: ?>
    <div class="wallp wallp--full wallp--desktop">
  <?php endif; ?>

    <?php
      $node = $element['#object'];
    ?>

    <?php if ($element['#view_mode'] === 'teaser'): ?>
      <a class="wallp__link" href="/node/<?php print $node->nid ?>" title="<?php print $node->title ?>">
    <?php endif; ?>

    <div class="wallp__image">

      <?php if ($element['#view_mode'] === 'teaser'): ?>
        <div class="wallp__icon-wrapper" title="обои для ПК и ноутбуков">
          <div class="wallp__icon wallp__icon--desktop">&nbsp;</div>
        </div>
      <?php endif; ?>

      <?php
        $url = $item['#item']['uri'];
        $imgprops = image_get_info($url);
        $image = array(
          'style_name' => 'preview_480x300',
          'path' => $url
        );
        print theme('image_style', $image);
      ?>
    </div>

    <?php if ($element['#view_mode'] === 'teaser'): ?>
        <div class="wallp__title"><?php print $node->title ?></div>
      </a>
    <?php endif; ?>

    <?php if ($element['#view_mode'] === 'full'): ?>

      <?php
        $wide = array(
          'wide_2560x1600' => '2560x1600',
          'wide_1920x1200' => '1920x1200',
          'wide_1680x1050' => '1680x1050',
          'wide_1440x900'  => '1440x900'
        );
        $hd = array(
          'hd_2560x1440' => '2560x1440',
          'hd_1920x1080' => '1920x1080',
          'hd_1600x900'  => '1600x900',
          'hd_1366x768'  => '1366x768'
        );
        $full = array(
          'full_1600x1200' => '1600x1200',
          'full_1400x1050' => '1400x1050',
          'full_1280x960'  => '1280x960',
          'full_1024x768'  => '1024x768'
        );
      ?>

      <div class="wallp-download" data-uri="<?php print file_uri_target($url); ?>">

        <div class="wallp-download__orig">
          <div class="wallp-download__orig-title">Оригинальный размер:</div>
          <div class="wallp-download__orig-size"><?php print l($imgprops['width'] . 'x' . $imgprops['height'], file_force_create_url($url)); ?></div>
        </div>

        <div class="wallp-download__user">
          <div class="wallp-download__user-title">Ваше разрешение:</div>
          <div class="wallp-download__user-size">&nbsp;</div>
        </div>

        <div class="wallp-download__block wallp-download__block--wide">
          <div class="wallp-download__type">Widescreen 16:10</div>
          <?php foreach ($wide as $style_id => $style_text): ?>
            <div class="wallp-download__link"><?php print l($style_text, file_force_create_url(image_style_path($style_id, $url))); ?></div>
          <?php endforeach; ?>
        </div>

        <div class="wallp-download__block wallp-download__block--hd">
          <div class="wallp-download__type">HD 16:9</div>
          <?php foreach ($hd as $style_id => $style_text): ?>
            <div class="wallp-download__link"><?php print l($style_text, file_force_create_url(image_style_path($style_id, $url))); ?></div>
          <?php endforeach; ?>
        </div>

        <div class="wallp-download__block wallp-download__block--full">
          <div class="wallp-download__type">Fullscreen 4:3</div>
          <?php foreach ($full as $style_id => $style_text): ?>
            <div class="wallp-download__link"><?php print l($style_text, file_force_create_url(image_style_path($style_id, $url))); ?></div>
          <?php endforeach; ?>
        </div>

      </div>
    <?php endif; ?>

    </div>
<?php endforeach; ?>




