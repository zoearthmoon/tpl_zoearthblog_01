<?php
defined('_JEXEC') or die;
Z2HelperUtilities::setDefaultImage($this->item, 'itemlist', $this->params);
?>
<!-- 從這裡開始分類Z2項目的個別輸出 -->
<div class="entry clearfix <?php echo ($this->item->image ? '':'nopic');?>">    
    <div class="entry_image">
        <?php if ($this->item->image):?>
        <!-- 項目圖片 -->
        <a class="image_fade" style="opacity: 1;" href="<?php echo $this->item->link; ?>" title="<?php if(!empty($this->item->image_caption)) echo Z2HelperUtilities::cleanHtml($this->item->image_caption); else echo Z2HelperUtilities::cleanHtml($this->item->title); ?>">
            <img src="<?php echo Z2HelperImage::_($this->item->image); ?>" alt="<?php if(!empty($this->item->image_caption)) echo Z2HelperUtilities::cleanHtml($this->item->image_caption); else echo Z2HelperUtilities::cleanHtml($this->item->title); ?>" style="width:<?php echo $this->item->imageWidth; ?>px; height:auto;" />
        </a>
        <?php endif;?>
    </div>
    <div class="entry_c">
        <div class="entry_title">
            <h2>
            <!-- 連結 -->
            <a href="<?php echo $this->item->link; ?>">
                <!-- 項目標題 -->
                <?php echo $this->item->title; ?>
            </a>
            </h2>
        </div>
        
        <div class="entry_date">
            <div class="year"><?php echo substr($this->item->created,0,4); ?></div>
            <div class="month"><?php echo date( "M", mktime (0,0,0,substr($this->item->created,6,2),substr($this->item->created,8,2),substr($this->item->created,0,4))); ?></div>
            <div class="day"><?php echo substr($this->item->created,8,2); ?></div>
        </div>
        
        <div class="entry_content">
            <?php echo $this->item->extra_fields['addText']->value; ?>
        </div>
    </div>
</div>