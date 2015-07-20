<div class="link_colour">
		<?php
				$pageTitle = __('Search Items');
				echo head(array('title' => $pageTitle, 'bodyclass' => 'items advanced-search'));
			?>
<div class="container">
    <div class="row rowcolor">
        <div class="col-md-12">
		    <h1><?php echo $pageTitle; ?></h1>
			<?php $subnav = public_nav_items(); echo $subnav->setUlClass('nav nav-pills'); ?>
			<hr>
			<?php echo $this->partial('items/search-form.php', array('formAttributes' => array('id'=>'advanced-search-form'))); ?>
		</div>
	</div>
</div>
</div>
<div class="container">
    <div class="row rowcolor">
        <div class="col-md-12">
		    <br/>
		</div>
	</div>
</div>
<?php echo foot(); ?>
