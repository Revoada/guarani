<?php echo head(array('title' => metadata('exhibit', 'title'), 'bodyclass'=>'exhibits summary')); ?>
<!-- CONTENT -->
<div id="content" class="container">
            <div class="row rowcolor">
                 <!--Left side -->
                <div class="col-md-10 col-md-offset-1">
                    <div class="row">
                        <!--Texto conteúdo do item--> 
                        <div class="col-md-10 textcontent">
                        	     <!-- TITLE -->
						        <div id ="title_sup">
						            <h3 style="text-align:left;"><?php echo metadata('exhibit', 'title'); ?></h3>
						        </div> 
						        <!-- /TITLE -->
								<?php if ($exhibit->getPagesCount() > 0): ?>
								<nav style="margin-bottom:1.5em;">
								    <ul style="margin: 0; padding: 0;">
								        <?php set_exhibit_pages_for_loop_by_exhibit(); ?>
								        <?php foreach (loop('exhibit_page') as $exhibitPage): ?>
								        <?php echo exhibit_builder_page_summary($exhibitPage); ?>
								        <?php endforeach; ?>
								    </ul>
								</nav>
								<?php endif; ?>

								<div id="primary">
								<?php if ($exhibitDescription = metadata('exhibit', 'description', array('no_escape' => true))): ?>
								<div class="exhibit-description">
								    <?php echo $exhibitDescription; ?>
								</div>
								<?php endif; ?>

								<?php if (($exhibitCredits = metadata('exhibit', 'credits'))): ?>
								<div class="exhibit-credits">
								    <h3><?php echo __('Credits'); ?></h3>
								    <p><?php echo $exhibitCredits; ?></p>
								</div>
								<?php endif; ?>
								</div>		
				</div>
			</div>
		</div>
	</div>
</div>
<div class="col-md-1"></div>
<?php echo foot(); ?>
