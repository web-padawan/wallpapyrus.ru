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

    <div class="wallp__image">
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

      <div class="wallp-download" data-uri="<?php print file_uri_target($url); ?>" data-type="desktop">

        <div class="wallp-download__orig">
          <div class="wallp-download__orig-title">Оригинальный размер:</div>
          <div class="wallp-download__orig-size"><?php print l($imgprops['width'] . 'x' . $imgprops['height'], file_force_create_url($url)); ?></div>
        </div>

        <div class="wallp-download__user">
          <div class="wallp-download__user-title">Ваше разрешение:</div>
          <a class="wallp-download__user-size" href="#" id="user-size">&nbsp;</a>
        </div>

        <div class="wallp-download__select">
          <div class="wallp-download__type">Для ПК и ноутбуков</div>
          <form id="desktop">
            <select id="desktop-list" class="form-select">
              <option value="1" disabled selected="selected">Выберите размер</option>
                <optgroup label="Widescreen 16:10">
                 <option value="2560x1600">2560x1600</option>
                 <option value="1920x1200">1920x1200</option>
                 <option value="1680x1050">1680x1050</option>
                 <option value="1440x900">1440x900</option>
                 <option value="1280x800">1280x800</option>
               </optgroup>
              <optgroup label="Widescreen 16:9">
                <option value="2560x1440">2560x1440</option>
                <option value="1920x1080">1920x1080</option>
                <option value="1600x900">1600x900</option>
              </optgroup>
              <optgroup label="Fullscreen 4:3">
                <option value="1600x1200">1600x1200</option>
                <option value="1400x1050">1400x1050</option>
                <option value="1280x960">1280x960</option>
                <option value="1024x768">1024x768</option>
              </optgroup>
              <optgroup label="Fullscreen 5:4">
                <option value="1280x1024">1280x1024</option>
                <option value="1152x864">1152x864</option>
              </optgroup>
            </select>
            <input class="form-submit" type="submit" id="desktop-submit" value="Скачать">
          </form>
        </div>

        <div class="wallp-download__select">
          <div class="wallp-download__type">Для мобильных устройств</div>
          <form id="mobile">
            <select id="mobile-list" class="form-select">
              <option value="1" disabled selected="selected">Выберите размер</option>
              <optgroup label="Apple Devices">
                <option value="320x480">320x480 iPhone 3GS</option>
                <option value="640x960">640x960 iPhone 4/4S</option>
                <option value="640x1136">640x1136 iPhone 5</option>
                <option value="750x1334">750x1334 iPhone 6</option>
                <option value="1080x1920">1080x1920 iPhone 6+</option>
                <option value="768x1024">768x1024 iPad 1, 2</option>
                <option value="1536x2048">1536x2048 iPad 3, 4</option>
              </optgroup>
              <optgroup label="Google Android">
                <option value="480x800">480x800 Galaxy S</option>
                <option value="600x1024">600x1024 Galaxy Tab</option>
                <option value="540x960">540x960 Droid</option>
                <option value="720x1280">720x1280 Galaxy SIII</option>
                <option value="768x1280">768x1280 Google Nexus 4</option>
                <option value="800x1280">800x1280 Galaxy Note</option>
              </optgroup>
            </select>
            <input class="form-submit" type="submit" id="mobile-submit" value="Скачать">
          </form>
        </div>

        <div class="wallp-download__manual">
          <div class="wallp-download__manual-title">Обрезка вручную:</div>
          <div id="manual-link" class="wallp-download__manual-link">&nbsp;</div>
          <form id="manual-crop">
            <label for="manual-width">Ширина:</label>
            <input class="form-text" type="text" id="manual-width" name="manual-width" size="4" maxlength="4" required>
            <label for="manual-height">Высота:</label>
            <input class="form-text" type="text" id="manual-height" name="manual-height" size="4" maxlength="4" required>
            <input class="form-submit" type="submit" id="manual-submit" value="Обрезать">
          </form>
        </div>

        <a class="wallp-download__invisible" id="download-link">&nbsp;</a>

      </div>
    <?php endif; ?>

    </div>
<?php endforeach; ?>
