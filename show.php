    <?php 
        echo head(array('title' => metadata('item', array('Dublin Core', 'Title')), 'bodyclass' => 'items show'));
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
                maxSlides: 5,
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
                    <?php if ($imagesCount >=1): ?>
                        <li><a href="<?php echo url('/'); ?>files/original/<?php echo $image->filename; ?>" data-lightbox="gallery-name" data-title=""><?php echo 

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
                        <div class="col-md-12 textcontent">
                            <?php echo all_element_texts('item'); ?>
                        </div>
                            <!--Comentário--> 
                            <div id="comentario" class="col-md-8 textcontent">
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
                                <a class="pw-button-facebook pw-look-native"></a>           
                                <a class="pw-button-twitter pw-look-native"></a>            
                                <a class="pw-button-linkedin pw-look-native"></a>           
                                <a class="pw-button-post-share"></a>        
                            </div>
                            <script src="http://i.po.st/static/v3/post-widget.js#publisherKey=sqmvcek1s4kcf8d21388&retina=true" type="text/javascript"></script>
                        </div>
                        <!--/Redes -->
                </div>
                <!--/Right side-->
            </div> </div>
            <!-- /CONTENT -->
<?php echo foot(); ?>
