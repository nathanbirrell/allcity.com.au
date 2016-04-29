<?php
/**
 *
 * Page With Container
 * @since 1.0.0
 * @version 1.0.0
 *
*/
?>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <?php
        while ( have_posts() ) : the_post();
        the_content();
        wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number'));
        endwhile;
      ?>
    </div>
  </div>
</div>