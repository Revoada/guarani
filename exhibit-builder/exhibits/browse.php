<?php
    $title = __('Browse Exhibits');
    echo head(array('title' => $title, 'bodyclass' => 'exhibits browse'));
?>
<!-- Inicio do container-->
<div class="container">
    <div class="row rowcolor">
        <div class="col-md-12" id="topo"></div>
            <?php if (count($exhibits) > 0): ?>
            <div class="item">
                <?php $exhibitCount = 0; ?>
                <?php foreach (loop('exhibit') as $exhibit):
                    if ($exhibitCount == 0) echo '<div class="row">';
                    if ($exhibitCount%4 == 0) echo '</div><div class="row">';
                ?>
            <div class="col-md-3" id="circle">
                <center>
                    <?php if ($exhibitImage = record_image($exhibit, 'square_thumbnail', array('class' => 'img-circle imgi'))): ?>
                    <div style="width: 170px; height: 170px"><?php echo exhibit_builder_link_to_exhibit($exhibit, $exhibitImage, array('class' => 'image')); ?></div>
                            <?php else: ?>
                                <div style="width: 170px; height: 170px; text-align:center; padding-top:3em; background:#fff;" class="img-circle tit_b">&nbsp;</div>             
                            <?php endif; ?>
                            <h3 class="title_ini"><?php echo link_to_exhibit(); ?></h3>                       <?php if ($exhibitImage = record_image($exhibit, 'square_thumbnail')): ?>
                        <?php endif; ?>
                        <?php if ($exhibitDescription = metadata('exhibit', 'description', array('no_escape' => true))): ?>
                            <h3 class="title_ini" style="font-weight:300; font-size:13px; text-align:justify;">
                            <?php
                               $resumo_texto = $exhibit->description; 
                               $conta_letra = strlen($resumo_texto);
                               if($conta_letra<=140){
                               echo resumo($resumo_texto, 140); 
                               }
                               else{
                                echo resumo($resumo_texto, 140).exhibit_builder_link_to_exhibit($exhibit, '&nbsp;&nbsp;&nbsp;(Saiba Mais)', array('style'=>'color:#768BCD')); 
                               }
                            ?>
                            </h3>
                        <?php endif; ?>
                    </div>
                        <?php $exhibitCount++; ?>
                    <?php endforeach; ?>
                    <?php echo pagination_links(); ?>
                    <?php else : ?>
                    <p><?php echo 'Nenhuma exposição foi adicionado ainda.'; ?></p>
            <?php endif; ?>
            <div class="col-md-12"><?php echo pagination_links(); ?></div>
            </div> <!-- /.row -->
            <br/>
            <br/>
        </div>
   </div>     
</div>
<!--Fim do container -->
<?php echo foot(); ?>
