    </div>
    <!-- FOOTER -->
    <div class="container-fluid">
        <footer>
            <div class="row">
                <!--<div class="col-md-12 rodape"><p><?php echo __('Copyright &copy; ') . date('Y') . ' ' . link_to_home_page() . ', Todos os direitos reservados.'; ?></p></div>-->
  <div class="col-md-12 rodape"><p><?php echo __('<a rel="license" href="http://creativecommons.org/licenses/by-sa/4.0/">
<img alt=“Licença Creative Commons" style="border-width:0" src="https://i.creativecommons.org/l/by-sa/4.0/80x15.png" /></a>
<br><span xmlns:dct="http://purl.org/dc/terms/" property="dct:title">A não ser que indicado contrariamente,
todo o conteúdo disponível no CultCampinas</span>
está disponível com uma licença <a rel="license" href="http://creativecommons.org/licenses/by-sa/4.0/">
Creative Commons Atribuição-Compartilhamento Igual 4.0 Internacional</a>')?></p></div>
            </div>
        </footer>
    </div>
    <!-- /FOOTER -->

    <script type="text/javascript">
      /* Change contend div*/
    $('.content:not(:first)').hide();
    $( ".cog-navigation .cog-nav-link a" ).on('click', function(event){
    event.preventDefault();
    var index= $(this).attr('class');
    $('.content').hide();                       
    $('#'+index+'.content').show();
   
});
/* function, change color of buttom */
$('#'+'link2').click(function(){
    
     $('#'+'link2').addClass('clicado gallery');
     $('#'+'link1').removeClass('clicado');
     $('#'+'link1').addClass('info');
     $('#'+'seta2').addClass('seta2');
     $('#'+'seta1').removeClass('seta1');
      $('#'+'seta1').addClass('nada');
    
});

$('#'+'link1').click(function(){
     
     $('#'+'link1').addClass('clicado');
     $('#'+'link2').removeClass('clicado');
     $('#'+'link2').addClass('gallery');
     $('#'+'seta1').addClass('seta1');
     $('#'+'seta2').removeClass('seta2');
     $('#'+'seta2').addClass('nada');

});
    </script>
</body>
</html>
