<?php
  $color = $row->taxonomy_term_data_name;
  $link = '/taxonomy/term/' . $row->tid;
?>

<a class="wallp-colors__thumb wallp-colors__thumb--big" href="<?php print $link ?>" style="background: <?php print $color ?>" title="<?php print $color ?>">&nbsp;</a>
