    <?php 
        echo head(array('title' => metadata('item', array('Dublin Core', 'Title')), 'bodyclass' => 'items show'));
        /*Procurar a palavra exhibits*/
         $endereco = $_SERVER ['REQUEST_URI'];
         $value='exhibits';
         $pos = strpos($endereco, $value);
    ?>
    <div class="row" role="slider">
        <!-- TITLE -->
        <div id ="title_sup" class="col-md-12">
            <h2><?php echo metadata('item', array('Dublin Core', 'Title')); ?></h2>
        </div> 
        <!-- /TITLE -->
        <!-- Carousel -->
        <div id ="carrossel" class="col-md-12">   
            <script type="text/javascript">
                $(document).ready(function(){
                            
                $('.bxslider').bxSlider({
                minSlides: 1,
                maxSlides: 25,
                slideWidth: 180,
                slideMargin: 10
                });
                    });
            </script>
             <!-- As imagens que iram passar no carrosell-->
                                <?php $images = $item->Files; $imagesCount = 1; ?>
                                <?php if ($images): ?>



                               <!-- <ul id="image-gallery" class="clearfix"></ul>-->
                               
                            <!-- Fim das imagen que passaram no carrossel-->
            <ul class="bxslider">
                <?php foreach ($images as $image): ?>
                    <?php if ($imagesCount >=1): 
                     
                    ?>
                        <li><a href="<?php echo url('/'); ?>files/original/<?php echo $image->filename; ?>" data-lightbox="gallery-name" data-title="

                            <?php 
                            //Título da Imagem
                            if ($titulo = metadata($image, array('Dublin Core', 'Title'), array('snippet'=>250))): ?>
    
                            <?php echo '<p>Título :&nbsp;'.$titulo.'</p>'; ?>

                            <?php endif; ?>

                             
                            <?php
                              //Descrição da Imagem
                             if ($description = metadata($image, array('Dublin Core', 'Description'), array('snippet'=>250))): ?>
    
                            <?php echo '<p>Descrição :&nbsp;'.$description.'</p>'; ?>

                            <?php endif; ?>
                            <?php 
                            //Criação da Imagem
                            if ($creator = metadata($image, array('Dublin Core', 'Creator'), array('snippet'=>250))): ?>
    
                            <?php echo '<p>Criador :&nbsp;'.$creator.'</p>'; ?>

                            <?php endif; ?>
                            <?php 
                            //Direitos
                            if ($direitos = metadata($image, array('Dublin Core', 'Rights'), array('snippet'=>250))): ?>
    
                            <?php echo '<p>Direitos :&nbsp;'.$direitos.'</p>'; ?>

                            <?php endif; ?>

                            "><?php echo 

                        item_image('square_thumbnail', array('class' => 'img-square imgi'),0, $image);

                         ?></a></li>
                    <?php endif; ?>
                <?php $imagesCount++; endforeach; ?>
            </ul>
            <?php else: ?>
                <div class="no-image"><p style="color:#fff;">Item não contém imagens.</p></div>
            <?php endif; ?>       
        </div> 
    <!-- /Carousel -->              
    </div>
</div>
<!-- CONTENT -->

 <div id="content" class="container">
            <div class="row rowcolor">
                 <!--Left side -->
                <div class="col-md-7 col-md-offset-1">
                    <div class="row">
                        <!--Texto conteúdo do item--> 
                        <div class="col-md-10 textcontent">
                            <?php if($pos !== false){?>
                            <div id="exhibits-breadcrumb">
                                <a href="<?php echo html_escape(url('exhibits')); ?>"><?php echo __('Exhibits'); ?></a> &gt;
                                <a href="<?php echo html_escape(url('exhibits/show/' . $exhibit['slug']));?>"><?php echo html_escape($exhibit['title']); ?></a>
                                <a href="<?php echo html_escape(url('exhibits/show/' . $exhibit['slug'].'/'));?>"><?php echo html_escape($exhibit['Page Slug']); ?></a>
                                
                                <p>&nbsp;</p>
                            </div>
                            <?php  } ?>
                            <?php //echo all_element_texts('item');  ?>
                            <?php echo metadata('item', array('Dublin Core', 'Description')); ?>
                            

                            <!-- The following returns all of the files associated with an item. -->
                            <!--<?php //if (metadata('item', 'has files')): ?>
                            <div id="itemfiles" class="element">
                                <h3><?php //echo __('Files'); ?></h3>
                                <div class="element-text"><?php //echo files_for_item(); ?></div>
                            </div>
                            <?php //endif; ?>-->

                            <!-- If the item belongs to a collection, the following creates a link to that collection. -->
                            <?php if (metadata('item', 'Collection Name')): ?>
                            <div id="collection" class="element">
                                <h3><?php echo __('Collection'); ?></h3>
                                <div class="element-text"><p><?php echo link_to_collection_for_item(); ?></p></div>
                            </div>
                            <?php endif; ?>

                            <!-- The following prints a list of all tags associated with the item -->
                            <?php if (metadata('item', 'has tags')): ?>
                            <div id="item-tags" class="element">
                                <h3><?php echo __('Tags'); ?></h3>
                                <div class="element-text"><?php echo tag_string('item'); ?></div>
                            </div>
                            <?php endif;?>

                            <!-- The following prints a citation for this item. -->
                            <div id="item-citation" class="element">
                                <h3><?php echo __('Citation'); ?></h3>
                                <div class="element-text"><?php echo metadata('item', 'citation', array('no_escape' => true)); ?></div>
                            </div>

                            <div id="item-output-formats" class="element">
                               <br/> <h3><?php echo __('Output Formats'); ?></h3>
                                <div class="element-text"><?php echo output_format_list(false); ?></div>
                            </div>

                            <?php //fire_plugin_hook('public_items_show', array('view' => $this, 'item' => $item)); ?>
                        </div>
                            <!--Comentário--> 
                            <div id="comentario" class="col-md-10 textcontent">
                            <?php 
                                    //Chamando o comentario
                                    CommentingPlugin::showComments();
                                     ?>
                            </div>
                            <!--/Comentário-->
                            <!--Comente--> 
                            <div id="comente" class="col-md-11 textcontent">
                                <div id="comente" class="col-md-9">
                                    
                                </div>
                            </div>
                      <!--Comente--> 
                    </div>

                </div>
                <!--/Left side -->
                <!--Right side -->
                <div class="col-md-4">
                    <div class="row">
                        <!--Map image -->
                        <div class="col-md-12 textcontent" id="mapa">
                            <a href="#"><img src="<?php echo img('img/veja_mapa.jpg'); ?>" />
                        </div>
                        <!--/Map image -->
                        <!--Redes -->
                        <div class="col-md-12 textcontent" id="redes">
                             <div class="pw-widget pw-counter-vertical">         
                               <!-- <a class="pw-button-facebook pw-look-native"></a>           
                                <a class="pw-button-twitter pw-look-native"></a>            
                                <a class="pw-button-linkedin pw-look-native"></a>           
                                <a class="pw-button-post-share"></a>  -->
                                
                                <?php echo '<div>';
                                        $item = get_current_record('item');
                                        $url = record_url($item, 'show', true);
                                        $title = strip_formatting(metadata($item, array('Dublin Core', 'Title')));
                                        $description = strip_formatting(metadata($item, array('Dublin Core', 'Description')));
                                        echo social_bookmarking_toolbar($url, $title, $description);
                                        echo '</div>'; 
                                ?>
                            </div>
                            <!--<script src="http://i.po.st/static/v3/post-widget.js#publisherKey=sqmvcek1s4kcf8d21388&retina=true" type="text/javascript"></script>-->
                        </div>
                        <!--/Redes -->
                </div>
                <!--/Right side-->
            </div> </div>
            <!-- /CONTENT -->
<?php echo foot(); ?>
