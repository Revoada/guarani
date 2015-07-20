<?php

/* vim: set expandtab tabstop=2 shiftwidth=2 softtabstop=2 cc=80; */

/**
 * @package     omeka
 * @subpackage  neatline
 * @copyright   2012 Rector and Board of Visitors, University of Virginia / Modificações de Layout por @gabrielfedel e @amariliscamargo
 * @license     http://www.apache.org/licenses/LICENSE-2.0.html
 * 
 */

?>
<?php echo head(array(
  'title' => __('Escolha o seu mapa ou roteiro'),
  'content_class' => 'neatline'
)); ?>
  <div class="row toggle_bar">
    <div class="cog-navigation">
      <div class="col-md-6 col-sm-6 col-xs-6" id="toggle_class">
          <div id="link1" class="cog-nav-link clicado"><a class="info" href="#"  type="button">Português</a></div>
      </div>
      <div class="col-md-6 col-sm-6 col-xs-6" id="toggle_class">
        <div id="link2" class="cog-nav-link"><a class="gallery" href="#" type="button">English</a></div>
      </div>
    </div>
   </div>
          <span id="seta1" class="seta1"></span>
          <span id="seta2" class="nada"></span>

<div class="col-md-12" id="topo"></div>
<!-- Inicio do container-->
<div class="container">
  <?php echo flash(); ?>
      <?php if (nl_exhibitsHaveBeenCreated()): ?>
      <div class="pagination"><?php echo pagination_links(); ?></div>
  <!-- Protuguês-->
  <div class="content" id="info">
    <div class="row item_map">
     <!-- Three columns of text below the carousel -->
      <!--<div class="col-md-12"><h2><?php //echo __('Português'); ?></h2></div>-->
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4" style="text-align:center">
          <a href="neatline/fullscreen/mapa" style="outline:none;"><img src="imagens/mapa.png"  style=" -webkit-box-shadow: 0 0 5px 4px rgba(0, 0, 0, .5);
          box-shadow: 0 0 5px 2px rgba(0, 0, 0, .5);  border-radius:50%;"></a>
          <h3 style="font-weight:300;"><?php echo __('Mapa da Cultura de Campinas'); ?></h3>
      </div><!-- /.col-lg-4 -->
      <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4" style="text-align:center">
          <a href="neatline/fullscreen/roteiro-centro" style="outline:none;"><img src="imagens/roteiro_centro.png"  style=" -webkit-box-shadow: 0 0 5px 4px rgba(0, 0, 0, .5);
          box-shadow: 0 0 5px 2px rgba(0, 0, 0, .5);  border-radius:50%;"></a>
          <h3 style="font-weight:300;"><?php echo __('Roteiro do Centro Histórico de Campinas'); ?></h3>
          </div><!-- /.col-lg-4 -->
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4" style="text-align:center">
          <a href="neatline/fullscreen/roteiro-afro" style="outline:none;"><img src="imagens/roteiro_afro.png"  style=" -webkit-box-shadow: 0 0 5px 4px rgba(0, 0, 0, .5);
          box-shadow: 0 0 5px 2px rgba(0, 0, 0, .5);  border-radius:50%;"></a>
          <h3 style="font-weight:300; text-align:center;"><?php echo __('Roteiro Afro de Campinas'); ?></h3>
          </div><!-- /.col-lg-4 -->
      </div><!-- /.row -->
  </div><!-- Fim #info-->

  <!-- Inglês -->
  <div class="content" id="gallery">
    <div class="row item_map">
     <!-- Three columns of text below the carousel -->
      <!--<div class="col-md-12"><h2><?php //echo __('English'); ?></h2></div>-->
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 col-sm-offset-2 col-md-offset-2 col-lg-offset-2" style="text-align:center">
          <a href="neatline/fullscreen/roteiro-afro-en" style="outline:none;"><img src="imagens/roteiro_afro_en.png"  style=" -webkit-box-shadow: 0 0 5px 4px rgba(0, 0, 0, .5);
        box-shadow: 0 0 5px 2px rgba(0, 0, 0, .5);  border-radius:50%;"></a>
          <h3 style="font-weight:300;"><?php echo __('African Heritage Tour'); ?></h3>
      </div><!-- /.col-lg-4 -->
      <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 col-sm-offset-2 col-md-offset-2 col-lg-offset-2" style="text-align:center">
         <a href="neatline/fullscreen/roteiro-centro-en" style="outline:none;"><img src="imagens/roteiro_centro_en.png"  style=" -webkit-box-shadow: 0 0 5px 4px rgba(0, 0, 0, .5);
        box-shadow: 0 0 5px 2px rgba(0, 0, 0, .5);  border-radius:50%;"></a>
          <h3 style="font-weight:300;"><?php echo __('Downtown Historical Tour'); ?></h3>
          </div><!-- /.col-lg-4 -->
      </div><!-- /.row --> 
  </div>
 </div>
<div class="pagination"><?php echo pagination_links(); ?></div>
</div>
<?php endif; ?>
<br/>
<?php echo foot(); ?>
