<!-- Inicio do container-->

            <div class="col-md-3">
          
                <div class="item record">
                    <center><?php
                    $title = metadata($item, array('Dublin Core', 'Title'));
                    $description = metadata($item, array('Dublin Core', 'Description'), array('snippet' => 150));
                    ?>
                    <?php 
                        if (metadata($item, 'has files')) {
                            echo link_to_item(
                                item_image('square_thumbnail', array('class' => 'img-circle imgi'), 0, $item), 
                                array('class' => 'image'), 'show', $item
                            );
                                                            }
                        else{
                            echo '<div style="width: 200px; height: 200px; text-align:center; padding-top:3em; background:#fff;" class="img-circle tit_b">&nbsp;</div>';
                        }
                    ?></center>
                    <center><h3 class="title_ini"><div id="title_center"><?php echo link_to($item, 'show', strip_formatting($title)); ?></div></h3></center><!-- Título do item -->
                    <?php if ($description): ?>
                        <p class="item-description"><?php echo $description; ?></p>
                    <?php endif; ?>
                </div>
               </div>