<?php
$pageTitle = __('Browse Items');
echo head(array('title'=>$pageTitle,'bodyid'=>'items','bodyclass'=>'tags'));
?>
<div class="container">
    <div class="row rowcolor">
        <div class="col-md-12" style="padding-left:2.6em;">
            <div class="page-title"><h1><i class="icon-tags"></i> <?php //echo $pageTitle; ?><small> <!--Por Tags --></small></h1></div>
            <?php echo public_nav_items()->setUlClass('nav nav-pills'); ?>
            <?php
            asort($tags);
            echo tag_cloud($tags,url('items/browse')); ?>
        </div>
    </div><!-- end primary -->
</div>
<br/>
<?php echo foot(); ?>
