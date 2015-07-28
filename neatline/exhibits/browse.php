<?php

/**
 * @package     omeka
 * @subpackage  neatline
 * @copyright   2014 Rector and Board of Visitors, University of Virginia
 * @license     http://www.apache.org/licenses/LICENSE-2.0.html
 */

?>

<?php
// Original PHP code by Chirp Internet: www.chirp.com.au
function truncateText($string, $limit, $break=" ", $pad="...")
{
  // return with no change if string is shorter than $limit
  if(strlen($string) <= $limit) return $string;

  $string = substr($string, 0, $limit);
  if(false !== ($breakpoint = strrpos($string, $break))) {
    $string = substr($string, 0, $breakpoint);
  }

  return $string . $pad;
}
?>

<?php echo head(array(
   'title' => __('Neatline | Browse Exhibits'),
   'content_class' => 'neatline'
)); ?>

<div id="primary">

  <?php echo flash(); ?>
  <h1><?php echo __('Escolha o seu mapa ou roteiro'); ?></h1>

  <?php if (nl_exhibitsHaveBeenCreated()): ?>

    <div class="pagination"><?php echo pagination_links(); ?></div>

      <?php foreach (loop('NeatlineExhibit') as $e): ?>
        <h2>
          <?php echo nl_getExhibitLink(
            $e, 'show', nl_getExhibitField('title'),
            array('class' => 'neatline'), true
          );?>
        <h2>
        <h4>
          <?php $description = truncateText(nl_getExhibitField('narrative'), 300) ?>
          <?php echo $description ?>
        </h4>
      <?php endforeach; ?>

    <div class="pagination"><?php echo pagination_links(); ?></div>

  <?php endif; ?>

</div>

<?php echo foot(); ?>
