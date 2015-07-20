<?php
    $pageTitle = __('Browse Items');
    echo head(array('title'=>$pageTitle,'bodyclass' => 'items browse'));
?>
<div class="col-md-12" id="topo"></div>
        <?php if ($total_results > 0): ?>
        <?php
            $sortLinks[__('Title')] = 'Dublin Core,Title';
            $sortLinks[__('Creator')] = 'Dublin Core,Creator';
            ?>
<!-- Inicio do container-->
<div class="container">
    <div class="row rowcolor">
            <div class="col-md-12" id="topo"></div>
                <div class="item">
            <?php
                $i = 0; 
                foreach (loop('items') as $item): 
                if ($i == 0) echo '<div class="row">';
                if ($i%4 == 0) echo '</div><div class="row">';
            ?>
                    <div class="col-md-3" id="circle">
                        <?php $images = $item->Files; $imagesCount = 1; ?>
                        <?php if ($images): ?>
                            <?php foreach ($images as $image): ?>
                                <?php if ($imagesCount ==1): ?>
                                <div id="tit_browse1">
                                    <?php echo item_image('square_thumbnail', array('class' => 'img-circle','style'=>'width: 170px; height: 170px;'),0, $image); ?>
                                   <!-- <img src="<?php echo url('/'); ?>files/original/<?php echo $image->filename; ?>" style="width: 170px; height: 170px;" class="img-circle" />-->
                                    <h3 class="title_ini"><?php echo link_to_item(metadata('item', array('Dublin Core', 'Title')), array('class'=>'permalink')); ?></h3>
                                </div>
                                <?php endif; ?>
                                <?php $imagesCount++;?>
                            <?php endforeach; ?>
                        <?php else: ?>
                        <div id="tit_browse">
                            <div style="width: 170px; height: 170px; text-align:center; padding-top:3em; background:#fff;" class="img-circle tit_b">&nbsp;</div>
                            <h3 class="title_ini"><?php echo link_to_item(metadata('item', array('Dublin Core', 'Title')), array('class'=>'permalink')); ?></h3>
                        </div>
                        <?php endif; ?>  
                    </div>
            <?php
                $i++; 
                endforeach; 
            ?>
            
        <?php else : ?>
            <p><?php echo 'Nenhum item foi adicionado ainda.'; ?></p>
        <?php endif; ?>
                <div class="col-md-12"><?php echo pagination_links(); ?></div>
                    <?php fire_plugin_hook('public_items_browse', array('items'=>$items, 'view' => $this)); ?>      
                    </div> <!-- /.row -->

        <br/><br/>
        
    </div>
   </div>     
</div>
<!--Fim do container -->
<?php echo foot(); ?>
