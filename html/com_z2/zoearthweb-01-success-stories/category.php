<?php
defined('_JEXEC') or die;
?>
<script language="Javascript">
jQuery(document).ready(function() {
    jQuery(".postcontent").addClass("col_full");
    jQuery(".container .fright").hide();
    jQuery(".container .process").hide();
});
</script>
<!-- 分類 -->
<div class="entry_title"><h2><?php echo $this->category->name; ?></h2></div>

<!-- 分類圖片 Category image -->
<?php if($this->category->image): ?>
<img alt="<?php echo Z2HelperUtilities::cleanHtml($this->category->name); ?>" src="<?php echo Z2HelperImage::_($this->category->image); ?>" style="width:<?php echo $this->params->get('catImageWidth'); ?>px; height:auto;" />
<?php endif; ?>

<div class="entry_content">
<!-- 分類描述 Category description -->
<?php echo $this->category->description; ?>
<!-- 外掛 請勿刪除 -->
<?php echo $this->category->event->Z2CategoryDisplay; ?>
</div>
<!-- 項目列表 Item list -->
<?php if((isset($this->leading) || isset($this->primary) || isset($this->secondary) || isset($this->links)) && (count($this->leading) || count($this->primary) || count($this->secondary) || count($this->links))): ?>
<div class="entry_content">
<table width="100%" cellspacing="1" cellpadding="0" border="0" class="list-box">
<tbody>
    <!-- 是否有項目 Primary items -->
    <?php if(isset($this->primary) && count($this->primary)): ?>
        <?php foreach($this->primary as $key=>$item): ?>
            <!-- 列出項目從項目模板 -->
            <?php $this->item=$item; echo $this->loadTemplate('item');?>
        <?php endforeach; ?>
    <?php endif; ?>
</tbody>
</table>
</div>

<!-- 頁數統計 -->
<?php echo $this->pagination->getPagesCounter(); ?>
<div class="pagination">
    <!-- 跳頁 Pagination -->
    <?php echo $this->pagination->getPagesLinks(); ?>
</div>

<?php endif; ?>