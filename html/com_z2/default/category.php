<?php
defined('_JEXEC') or die;
?>
<!-- 分類 -->
<!-- 這邊顯示分類與子分類  -->
<?php if(isset($this->category) || ( $this->params->get('subCategories') && isset($this->subCategories) && count($this->subCategories) )): ?>

    <!-- 分類圖片 Category image -->
    <?php if($this->category->image): ?>
    <style type="text/css">
    #intro {
        background: url("<?php echo Juri::base() ?>templates/tpl_zoearthblog_01/images/overlay.png") repeat fixed left top / 256px 256px, url("<?php echo Z2HelperImage::_($this->category->image,50); ?>") no-repeat fixed center bottom / cover rgba(0, 0, 0, 0);
    }
    </style>
    <?php endif; ?>
    
    <!-- 分類標題 Category title -->
    <div class="blog-header">
        <h2 class="blog-title"><?php echo $this->category->name; ?></h2>
    </div>
    <!-- 分類描述 Category description -->
    <p><?php echo $this->category->description; ?></p>
    
    <!-- 外掛 請勿刪除 -->
    <?php echo $this->category->event->Z2CategoryDisplay; ?>

<?php endif; ?>

<!-- 項目列表 Item list -->
<?php if(isset($this->primary) && count($this->primary) > 0): ?>
    <div class="rows">
        <!-- 是否有項目 Primary items -->
        <?php if(isset($this->primary) && count($this->primary)): ?>
            <?php $preList = ceil(count($this->primary)/3); ?>
            <?php for ($c=1;$v<=3;$c++):?>
                <?php for ($q=0+$c;$q<=count($this->primary);$q=$q+3):?>
                    <?php if (isset($this->primary[$q])):?>
                    <?php $this->item = $this->primary[$q];echo $this->loadTemplate('item');?>
                    <?php endif;?>
                <?php endfor;?>
            <?php endfor;?>
        <?php endif; ?>
    </div>
    <div class="z2Pagination">
        <!-- 跳頁 Pagination -->
        <?php echo $this->pagination->getPagesLinks(); ?>
        <!-- 頁數統計 -->
        <?php echo $this->pagination->getPagesCounter(); ?>
    </div>
<?php endif; ?>