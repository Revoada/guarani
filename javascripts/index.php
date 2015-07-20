<?php echo head(array('bodyid'=>'home')); ?>
<!-- SLIDE -->
<div class="row " role="slider">
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators hidden-xs">
        <!-- Função criada para buscar item por tags - criando a lista bolinha automaticamente-->
            <?php 
            $items = get_records('Item', array('tags'=>'slider'), 20); 
            if ($items): ?>
                <?php 
                 $counti = 0;
                 foreach ($items as $item): 
                  if($counti == '0'){ ?>
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                  <?php }
                   else{ ?>
                    <li data-target="#carousel-example-generic" data-slide-to="<?php echo $counti; ?>"></li>
               <?php } ?>
                <?php $counti++; ?>
                <?php endforeach; ?>
            <?php else: ?>
                <p><?php echo __('No featured items are available.'); ?></p>
            <?php endif; ?>
            <!-- Fim da função -->
        </ol>
        <!-- Wrapper for slides -->
        <div class="carousel-inner">
         <!-- Função criada para buscar item por tags - pegando imagens para o slider-->
            <?php 
            $items = get_records('Item', array('tags'=>'slider'), 20); 
            if ($items): ?>
                 
                <?php 
                 $count = 1;
                 foreach ($items as $item): 
                  if($count == 1){ ?>
                 <div class="item active">
                  <?php }
                   else{ ?>
                    <div class="item">

               <?php } ?>
                    <?php
                    $title = metadata($item, array('Dublin Core', 'Title'));
                    $description = metadata($item, array('Dublin Core', 'Description'), array('snippet' => 150));
                    ?>

                   <!-- Parte da função que chama a foto -->
                   
                    <!-- Fim da chamada da foto -->
                     <div class="carousel-caption">
                        <div id="box-green">
                        <h3><?php echo link_to($item, 'show', strip_formatting($title)); ?></h3>
                        <?php if ($description): ?>
                                <p class="item-description hidden-xs"><?php echo $description; ?>
                                    <span>&nbsp;<?php echo link_to($item, 'show', strip_formatting('SAIBA MAIS')); ?></span>
                                </p>
                        <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php $count++; ?>
                <?php endforeach; ?>
            <?php else: ?>
                <p><?php echo __('No featured items are available.'); ?></p>
            <?php endif; ?>
            <!-- Fim da função -->
        </div>
            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev" style="color:#fff;">
                <span class="glyphicon glyphicon-chevron-left " style="color:#fff;"></span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" style="color:#fff;"></span>
            </a>
    </div>                
</div>
</div>
 <!-- /SLIDE -->
<!-- Inicio Conteúdo central -->
<div class="container-fluid">
     <div class="row toggle_bar">
      <div class="cog-navigation">
         <div class="col-md-6 col-xs-6" id="toggle_class"> 
            <div id="link1" class="cog-nav-link clicado"><a class="info" href="#"  type="button">Mais Recentes</a></div>
        </div>
        <div class="col-md-6 col-xs-6" id="toggle_class">
            <div id="link2" class="cog-nav-link"><a class="gallery" href="#" type="button">Exposições em destaque</a></div>
        </div>
    </div>
  </div>
          <span id="seta1" class="seta1"></span>
          <span id="seta2" class="nada"></span>
</div>

<!-- /Fim do conteúdo central -->
<div id="content" class="container">
    <div class="row">
     
    <div id="caixaTexto1" class="col-md-offset-1 col-md-11">
        <div class='row'>
<div class='col-md-12'>

 <div class="content" id="info">
 <br/>

<?php //Destaque
//if (get_theme_option('Homepage Recent Items') !== '0'): ?>
<!--<h2>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo __('Featured Item'); ?></h2>--><!-- Item em destaque -->
<?php //echo random_featured_items(); ?>
<?php //endif; ?>

<?php
//Adicionados recentemente
    $recentItems = get_theme_option('Homepage Recent Items');
    if ($recentItems === null || $recentItems === ''):
        $recentItems = 4;
    else:
        $recentItems = (int) $recentItems;
    endif;
    if ($recentItems):
    ?>
    <div id="recent-items">
        <?php echo recent_items($recentItems); ?>
    </div><!--end recent-items -->
    <?php endif; ?>
    
    <?php fire_plugin_hook('public_home', array('view' => $this)); ?>
</div>

<div class="content" id="gallery">
  <div id="recent-items">
     <?php 
     //if ((get_theme_option('Display Featured Exhibit')) && function_exists('exhibit_builder_display_random_featured_exhibit')): ?>
    <!-- Featured Exhibit -->
    <?php //echo exhibit_builder_display_random_featured_exhibit(); ?>
    <?php //endif; ?>

    <?php 
        $exhibits=get_records('Exhibit' , array ('featured'=>true, 'sort'=>'recent'));
        $i = 0; 
        foreach($exhibits as $exhibit):
          if ($i == 0) echo '<div class="row">';
          if ($i%4 == 0) echo '</div><div class="row">';?>
             <div class="col-md-3">    
              <center>
              <?php if ($exhibitImage = record_image($exhibit, 'square_thumbnail', array('class' => 'img-circle imgi'))): ?>
              <?php echo exhibit_builder_link_to_exhibit($exhibit, $exhibitImage, array('class' => 'image')); ?>
              <?php else: ?>
                <div style="width: 200px; height: 200px; text-align:center; padding-top:3em; background:#fff;" class="img-circle tit_b">&nbsp;</div>             
              <?php endif; ?>

              <?php
            echo '<center><h3 class="title_ini"><div id="title_center"><a href="/exhibits/show/'.$exhibit->slug.'">'.$exhibit->title.'</a></div></h3></center>';
            $resumo_texto = $exhibit->description; 
            if((strlen($resumo_texto)) <150){
            echo '<span class="item-description" style="text-align:justify;"><p>'.$resumo_texto.'</p></span>';
            }
            else{
             echo '<span class="item-description" style="text-align:justify;"><p>'.substr($resumo_texto,0,150).'...</p></span>'; 
            }
            ?>
              </div>
            <?php  
            $i++;        
        endforeach;
    ?>
  </div>
</div>
</div></div>
    </div>
</div>
</div>
</div>
</div>
<!--Inicio Rodapé -->
<?php echo foot(); ?>
