<?php if ($element['#view_mode'] === 'full'): ?>
  <div class="wallp-colors">
    <div class="wallp-colors__label">Цвета:</div>

      <?php foreach ($items as $delta => $item): ?>
        <a class="wallp-colors__thumb" href="<?php print $item['#href'] ?>" style="background: <?php print $item['#title'] ?>" title="<?php print $item['#title'] ?>">&nbsp;</a>
      <?php endforeach; ?>
  </div>
<?php endif; ?>
