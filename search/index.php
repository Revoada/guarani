 <?php
                        $pageTitle = __('Search Omeka ') . __('(%s total)', $total_results);
                        echo head(array('title' => $pageTitle, 'bodyclass' => 'search'));
                        $searchRecordTypes = get_search_record_types();
?>
<!--
<div class="container">
    <div class="row rowcolor">
        <div class="col-md-12" id="topo"></div>
        <div class="row">
                <div class="col-md-12 espacamento_texto">
                        <h3><?php echo $pageTitle; ?></h3>
                        <div><?php echo search_filters(); ?></div>
                        <?php if ($total_results): ?>
                        <br/>
                        <br/>
                        <br/>
                            <table id="search-results">
                                <thead>
                                    <tr>
                                        <th style="text-align:center;"><?php echo __('Record Type');?></th>
                                        <th>&nbsp;</th>
                                        <th style="text-align:center;"><?php echo __('Title');?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $filter = new Zend_Filter_Word_CamelCaseToDash; ?>
                                    <?php foreach (loop('search_texts') as $searchText): ?>
                                    <?php $record = get_record_by_id($searchText['record_type'], $searchText['record_id']); ?>
                                    <?php $recordType = $searchText['record_type']; ?>
                                    <?php set_current_record($recordType, $record); ?>
                                    <tr class="<?php echo strtolower($filter->filter($recordType)); ?>">
                                        <td>
                                            <?php echo $searchRecordTypes[$recordType]; ?>
                                        </td>
                                        <td>
                                            <?php if ($recordImage = record_image($recordType, 'square_thumbnail',array('class' => 'img-circle imgi'))): ?>
                                                <?php echo link_to($record, 'show', $recordImage, array('class' => 'img-circle imgi')); ?>
                                            <?php endif; ?>
                                        </td>
                                        <td>&nbsp;&nbsp;<td>
                                        <td><h3 class="title_ini"><div id="title_center"><a href="<?php echo record_url($record, 'show'); ?>"><?php echo $searchText['title'] ? $searchText['title'] : '[Unknown]'; ?></a></h4>
                                        </td>
                                    </tr>
                                    <tr><td colspan="3">&nbsp;&nbsp;</td></tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <?php echo pagination_links(); ?>
                        <?php else: ?>
                            <p><?php echo __('Your query returned no results.');?></p>
                        <?php endif; ?>
            </div>
        </div>
    </div>
</div>
-->      
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
                                    <?php if ($recordImage = record_image($recordType, 'square_thumbnail',array('class' => 'img-circle imgi'))): ?>
                                    <?php echo link_to($record, 'show', $recordImage, array('class' => 'img-circle imgi')); ?>
                                    <?php else: ?>
                                    <div style="width: 200px; height: 200px; text-align:center; padding-top:3em; background:#fff;" class="img-circle tit_b">&nbsp;</div>
                                    <?php endif; ?><!-- <img src="<?php echo url('/'); ?>files/original/<?php echo $image->filename; ?>" style="width: 170px; height: 170px;" class="img-circle" />-->
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