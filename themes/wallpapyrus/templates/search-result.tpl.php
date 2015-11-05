<article class="search-results__item">
  <?php if ($teaser) : ?>
    <?php print drupal_render($teaser); ?>
  <?php else : ?>
    <?php print render($title_prefix); ?>
    <h3><a href="<?php print $url; ?>"><?php print $title; ?></a></h3>
    <?php print render($title_suffix); ?>
    <?php if ($snippet) : ?>
      <p><?php print $snippet; ?></p>
    <?php endif; ?>
  <?php endif; ?>

  <?php if ($info && !$teaser): ?>
    <footer><?php print $info; ?></footer>
  <?php endif; ?>

</article>
