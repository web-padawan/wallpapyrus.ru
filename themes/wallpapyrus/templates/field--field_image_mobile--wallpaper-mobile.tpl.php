<?php foreach ($items as $delta => $item): ?>

  <?php if ($element['#view_mode'] === 'teaser'): ?>
    <div class="wallp wallp--teaser wallp--mobile">
  <?php else: ?>
    <div class="wallp wallp--full wallp--mobile">
  <?php endif; ?>

    <?php
      $node = $element['#object'];
    ?>

    <?php if ($element['#view_mode'] === 'teaser'): ?>
      <a class="wallp__link" href="/node/<?php print $node->nid ?>" title="<?php print $node->title ?>">
    <?php endif; ?>

    <div class="wallp__image">

      <?php if ($element['#view_mode'] === 'teaser'): ?>
        <div class="wallp__icon-wrapper">
          <div class="wallp__icon wallp__icon--mobile" title="обои для мобильных устройств">&nbsp;</div>
        </div>
      <?php endif; ?>

      <?php
        $url = $item['#item']['uri'];
        $style_name = ($element['#view_mode'] === 'teaser') ? 'preview_480x300' : 'preview_225x320';

        $imgprops = image_get_info($url);
        $image = array(
          'style_name' => $style_name,
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
        $apple = array(
          'apple_320x480'   => '320x480',
          'apple_640x960'   => '640x960',
          'apple_640x1136'  => '640x1136',
          'apple_750x1334'  => '750x1334',
          'apple_768x1024'  => '768x1024',
          'apple_1080x1920' => '1080x1920',
          'apple_1536x2048' => '1536x2048'
        );
        $android = array(
          'android_480x800'   => '480x800',
          'android_480x854'   => '480x854',
          'android_540x960'   => '540x960',
          'android_600x1024'  => '600x1024',
          'android_720x1280'  => '720x1280',
          'android_768x1280'  => '768x1280',
          'android_800x1280'  => '800x1280',
          'android_1200x1920' => '1200x1920'
        );
      ?>

      <div class="wallp-download" data-uri="<?php print file_uri_target($url); ?>">

        <div class="wallp-download__orig">
          <div class="wallp-download__origtitle">Оригинальный размер:</div>
          <div class="wallp-download__origsize"><?php print l($imgprops['width'] . 'x' . $imgprops['height'], file_force_create_url($url)); ?></div>
        </div>

        <div class="wallp-download__user">
          <div class="wallp-download__user-title">Ваше разрешение:</div>
          <div class="wallp-download__user-size">&nbsp;</div>
        </div>

        <div class="wallp-download__block wallp-download__block--apple">
          <div class="wallp-download__type">Apple: iPhone, iPad</div>
          <?php foreach ($apple as $style_id => $style_text): ?>
            <div class="wallp-download__link"><?php print l($style_text, file_force_create_url(image_style_path($style_id, $url))); ?></div>
          <?php endforeach; ?>
        </div>

        <div class="wallp-download__block wallp-download__block--android">
          <div class="wallp-download__type">Google Android</div>
          <?php foreach ($android as $style_id => $style_text): ?>
            <div class="wallp-download__link"><?php print l($style_text, file_force_create_url(image_style_path($style_id, $url))); ?></div>
          <?php endforeach; ?>
        </div>

      </div>
    <?php endif; ?>

    </div>
<?php endforeach; ?>




