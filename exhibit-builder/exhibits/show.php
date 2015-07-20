<?php
echo head(array(
    'title' => metadata('exhibit_page', 'title') . ' &middot; ' . metadata('exhibit', 'title'),
    'bodyclass' => 'exhibits show'));
?>
 <div class="row">
        <!-- TITLE -->
        <div id ="title_sup_exhibits" class="col-md-12 hidden-xs">
            <nav class="breadcrumb">
                <div id="margemleft">
                    <h4 style="display:inline">
                        <?php echo link_to_exhibit(); ?> &nbsp; >> &nbsp;
                        <?php echo exhibit_builder_page_trail(); ?>
                    </h4>
                </div>
            </nav>          
        </div>
         <div id ="title_sup_exhibits" class="col-xs-12 hidden-md hidden-lg hidden-sm">
            <nav class="breadcrumb">
                <div id="margemleft">
                    <h4 style="display:inline">
                        <?php echo link_to_exhibit(); ?><p> &nbsp;&nbsp; &nbsp; >> &nbsp;
                        <?php echo exhibit_builder_page_trail(); ?></p>
                    </h4>
                </div>
            </nav>          
        </div>
</div>
<div id="content" class="container">
    <div class="row rowcolor">
        <!--Left side -->
        <!--Texto conteúdo do item--> 
         <div class="col-md-12 textcontent">
            <div role="main">
                <?php 
                    $exhibitPage = null;
                        if ($exhibitPage === null) {
                             $exhibitPage = get_current_record('exhibit_page');
                        }
                            
                    $blocks = $exhibitPage->ExhibitPageBlocks;
                    $rawAttachments = $exhibitPage->getAllAttachments();
                    $attachments = array();
                        foreach ($rawAttachments as $attachment) {
                            $attachments[$attachment->block_id][] = $attachment;
                        }
                        foreach ($blocks as $index => $block) {
                        $layout = $block->getLayout();
                            echo '<div class="exhibit-block layout-' . html_escape($layout->id) . '" style="text-align:center"><h3 class="title_ini">';
                            echo get_view()->partial($layout->getViewPartial(), array(
                                'index' => $index,
                                'options' => $block->getOptions(),
                                'text' => '',
                                'attachments' => array_key_exists($block->id, $attachments) ? $attachments[$block->id] : array()
                            ));
                            echo '</h3></div>';
                        }

                        ?>
            </div>
            <div id="exhibit-page-navigation" style="margin-botton:200px;">
                <?php if ($prevLink = exhibit_builder_link_to_previous_page()): ?>
                    <div id="exhibit-nav-prev">
                        <?php echo $prevLink; ?>
                    </div>
                <?php endif; ?>
                <?php if ($nextLink = exhibit_builder_link_to_next_page()): ?>
                    <div id="exhibit-nav-next">
                        <?php echo $nextLink; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php echo foot(); ?>

