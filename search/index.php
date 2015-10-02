 <?php
                        $pageTitle = __('Search Omeka ') . __('(%s total)', $total_results);
                        echo head(array('title' => $pageTitle, 'bodyclass' => 'search'));
                        $searchRecordTypes = get_search_record_types();
?>
<!-- Inicio do container-->
<div class="container">
    <div class="row rowcolor">
            <div class="col-md-12" id="topo"></div>
            <h3><?php echo $pageTitle; ?></h3>
                        <div><?php echo search_filters(); ?></div>
                        <?php if ($total_results): ?>
                <div class="item">
            <?php
                $i = 0; 
                foreach (loop('search_texts') as $searchText):
                $record = get_record_by_id($searchText['record_type'], $searchText['record_id']); ?>
                <?php $recordType = $searchText['record_type']; ?>
                <?php set_current_record($recordType, $record); 
                        
              
                if ($i == 0) echo '<div class="row">';
                if ($i%4 == 0) echo '</div><div class="row">';
            ?>
                    <div class="col-md-3" id="circle">
                         <div id="tit_browse1">
                                <h3 class="title_ini"><?php echo $searchRecordTypes[$recordType]; ?></h3>
				    <?php if ($recordType == "File"):  ?>
                                    <?php if ($recordImage = record_image($recordType, 'square_thumbnail',array('class' => 'img-circle imgi'))): ?>
					<a href="<?php echo url('/'); ?>files/original/<?php echo $record->filename; ?>" data-lightbox="<?php echo $record->filename?>" data-title="

                            <?php 
                            //Título da Imagem
                            if ($titulo = metadata($record, array('Dublin Core', 'Title'), array('snippet'=>250))): ?>
    
                            <?php echo '<p>Título :&nbsp;'.$titulo.'</p>'; ?>

                            <?php endif; ?>

                             
                            <?php
                              //Descrição da Imagem
                             if ($description = metadata($record, array('Dublin Core', 'Description'), array('snippet'=>250))): ?>
    
                            <?php echo '<p>Descrição :&nbsp;'.$description.'</p>'; ?>

                            <?php endif; ?>
                            <?php 
                            //Criação da Imagem
                            if ($creator = metadata($record, array('Dublin Core', 'Creator'), array('snippet'=>250))): ?>
    
                            <?php echo '<p>Criador :&nbsp;'.$creator.'</p>'; ?>

                            <?php endif; ?>
                            <?php 
                            //Direitos
                            if ($direitos = metadata($record, array('Dublin Core', 'Rights'), array('snippet'=>250))): ?>
    
                            <?php echo '<p>Direitos :&nbsp;'.$direitos.'</p>'; ?>

                            <?php endif; ?>

                            


">
					<?php echo item_image('square_thumbnail', array('class' => 'img-circle imgi'),0, $record);?>
					</a>

                                    <?php 
					//echo link_to($record, '', $recordImage, array('class' => 'img-circle imgi','data-lightbox' =>'gallery-name')); 
					?> 
                                    <?php else: ?>
                                    <div style="width: 200px; height: 200px; text-align:center; padding-top:3em; background:#fff;" class="img-circle tit_b">&nbsp;</div>
                                    <?php endif; ?>
				    
				<!--Else da verificaao se eh arquivo -->
				<?php else: ?>

				   <?php if ($recordImage = record_image($recordType, 'square_thumbnail',array('class' => 'img-circle imgi'))): ?>
                                    <?php echo link_to($record, 'show', $recordImage, array('class' => 'img-circle imgi')); ?>
                                    <?php else: ?>
                                    <div style="width: 200px; height: 200px; text-align:center; padding-top:3em; background:#fff;" class="img-circle tit_b">&nbsp;</div>
                                    <?php endif; ?>

				<?php endif?>
				
                                    <h3 class="title_ini"><div id="title_center"><a href="<?php echo record_url($record, 'show'); ?>"><?php echo $searchText['title'] ? $searchText['title'] : '[Unknown]'; ?></a></h4>
                                </div>
                        <?php $images = $searchText->Files; $imagesCount = 1; ?>
                        <?php if ($images): ?>
                            <?php foreach ($images as $image): ?>
                                <?php if ($imagesCount ==1): ?>
                               
                                <?php endif; ?>
                                <?php $imagesCount++;?>
                            <?php endforeach; ?>
                        <?php endif; ?>  
                    </div>
            <?php
                $i++; 
                endforeach; 
            ?>
            
        
        <?php endif; ?>


        <br/><br/>
        
    </div>
   </div>     
</div>
</div>
<?php echo foot(); ?>
