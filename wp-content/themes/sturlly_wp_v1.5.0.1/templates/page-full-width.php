<?php
/**
 *
 * Page Full Width
 * @since 1.0.0
 * @version 1.0.0
 *
*/
?>

<?php
  while ( have_posts() ) : the_post();
  the_content();
  wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number'));
  endwhile;
?>
