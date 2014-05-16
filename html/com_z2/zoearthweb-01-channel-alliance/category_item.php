<?php
defined('_JEXEC') or die;
Z2HelperUtilities::setDefaultImage($this->item, 'itemlist', $this->params);
?>
<tr>
    <th>
    <?php if ($this->item->image):?>
    <!-- 項目圖片 -->
    <a class="image_fade" target="_blank" style="opacity: 1;" href="http://<?php echo $this->item->extra_fields['links']->value; ?>" title="<?php if(!empty($this->item->image_caption)) echo Z2HelperUtilities::cleanHtml($this->item->image_caption); else echo Z2HelperUtilities::cleanHtml($this->item->title); ?>">
        <img src="<?php echo Z2HelperImage::_($this->item->image); ?>" alt="<?php if(!empty($this->item->image_caption)) echo Z2HelperUtilities::cleanHtml($this->item->image_caption); else echo Z2HelperUtilities::cleanHtml($this->item->title); ?>" style="width:<?php echo $this->item->imageWidth; ?>px; height:auto;" />
    </a>
    <?php endif;?>
    </th>
    <td>
    <a target="_blank" href="http://<?php echo $this->item->extra_fields['links']->value; ?>">
        <!-- 項目標題 -->
        <?php echo $this->item->title; ?>
    </a>
    </td>
</tr>