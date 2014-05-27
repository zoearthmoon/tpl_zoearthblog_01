<?php
defined('_JEXEC') or die;
?>
<!-- 從這裡開始分類Z2項目的個別輸出 -->
<div class="catItemView">

    <!-- 外掛 請勿刪除 -->
    <?php echo $this->item->event->BeforeDisplay; ?>
    <?php echo $this->item->event->Z2BeforeDisplay; ?>

    
    <div class="catItemHeader">

    <!-- 發佈日期 -->
    <?php echo JHTML::_('date',$this->item->created,JText::_('Z2_DATE_FORMAT_LC2'));?>

    <h3 class="catItemTitle">

        <!-- 連結 -->
        <a href="<?php echo $this->item->link; ?>">
            <!-- 項目標題 -->
            <?php echo $this->item->title; ?>
        </a>

        <!-- 顯示是否為頂置 -->
        <?php if($this->item->featured): ?>
        <span>
            <?php echo JText::_('Z2_FEATURED'); ?>
        </span>
        <?php endif; ?>

    </h3>

    </div>
    
    <!-- 外掛 請勿刪除 -->
    <?php echo $this->item->event->AfterDisplayTitle; ?>
    <?php echo $this->item->event->Z2AfterDisplayTitle; ?>

    <div class="catItemBody">
        <!-- 外掛 請勿刪除 -->
        <?php echo $this->item->event->BeforeDisplayContent; ?>
        <?php echo $this->item->event->Z2BeforeDisplayContent; ?>

        <!-- 項目圖片 -->
        <a href="<?php echo $this->item->link; ?>" title="<?php if(!empty($this->item->image_caption)) echo Z2HelperUtilities::cleanHtml($this->item->image_caption); else echo Z2HelperUtilities::cleanHtml($this->item->title); ?>">
            <img src="<?php echo Z2HelperImage::_($this->item->image); ?>" alt="<?php if(!empty($this->item->image_caption)) echo Z2HelperUtilities::cleanHtml($this->item->image_caption); else echo Z2HelperUtilities::cleanHtml($this->item->title); ?>" style="width:<?php echo $this->item->imageWidth; ?>px; height:auto;" />
        </a>

        <!-- 項目預覽文字 -->
        <div class="catItemIntroText">
            <?php echo $this->item->introtext; ?>
        </div>

        <!-- 顯示附加欄位 Item extra fields -->
        <?php if (is_array($this->item->extra_fields) && count($this->item->extra_fields) > 0):?>
        <div class="catItemExtraFields">
            <h4><?php echo JText::_('Z2_ADDITIONAL_INFO'); ?></h4>
            <ul>
                <?php foreach ($this->item->extra_fields as $key=>$extraField): ?>
                    <?php if($extraField->value != ''): ?>
                    <li class="<?php echo ($key%2) ? "odd" : "even"; ?> type<?php echo ucfirst($extraField->type); ?> group<?php echo $extraField->group; ?>">
                        <?php if($extraField->type == 'header'): ?>
                            <h4 class="catItemExtraFieldsHeader"><?php echo $extraField->name; ?></h4>
                        <?php else: ?>
                            <span class="catItemExtraFieldsLabel"><?php echo $extraField->name; ?></span>
                            <span class="catItemExtraFieldsValue"><?php echo $extraField->value; ?></span>
                        <?php endif; ?>
                    </li>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>
        </div>
        <?php endif;?>

        <!-- 外掛 請勿刪除 -->
        <?php echo $this->item->event->AfterDisplayContent; ?>
        <?php echo $this->item->event->Z2AfterDisplayContent; ?>

    </div>

    <div class="catItemLinks">

        <span class="catItemHits">
            <!-- 顯示點擊次數 -->
            <?php echo JText::_('Z2_READ'); ?><b><?php echo $this->item->hits; ?></b><?php echo JText::_('Z2_TIMES'); ?>
        </span>

        <div class="catItemCategory">
            <span><?php echo JText::_('Z2_PUBLISHED_IN'); ?></span>
            <!-- 顯示分類名稱 -->
            <a href="<?php echo $this->item->category->link; ?>">
                <?php echo $this->item->category->name; ?>
            </a>
        </div>

        <!-- 顯示標籤  -->
        <?php if(count($this->item->tags)): ?>
        <div class="catItemTagsBlock">
            <span><?php echo JText::_('Z2_TAGGED_UNDER'); ?></span>
            <ul class="catItemTags">
                <?php foreach ($this->item->tags as $tag): ?>
                <li><a href="<?php echo $tag->link; ?>"><?php echo $tag->name; ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <?php endif; ?>

        <!-- 附加檔案 Item attachments -->
        <?php if(count($this->item->attachments)): ?>
        <div class="catItemAttachmentsBlock">
            <span><?php echo JText::_('Z2_DOWNLOAD_ATTACHMENTS'); ?></span>
            <ul class="catItemAttachments">
                <?php foreach ($this->item->attachments as $attachment): ?>
                <li>
                    <a title="<?php echo Z2HelperUtilities::cleanHtml($attachment->titleAttribute); ?>" href="<?php echo $attachment->link; ?>">
                        <?php echo $attachment->title ; ?>
                    </a>
                    <!-- 下載次數 -->
                    <span>(<?php echo $attachment->hits; ?> <?php echo ($attachment->hits==1) ? JText::_('Z2_DOWNLOAD') : JText::_('Z2_DOWNLOADS'); ?>)</span>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <?php endif; ?>

    </div>

    <!-- 顯示看更多按鈕  -->
    <div class="catItemReadMore">
        <a class="z2ReadMore" href="<?php echo $this->item->link; ?>">
            <?php echo JText::_('Z2_READ_MORE'); ?>
        </a>
    </div>

    <!-- 顯示項目修改日期 Item date modified -->
    <?php if($this->item->modified != $this->nullDate && $this->item->modified != $this->item->created ): ?>
        <span class="catItemDateModified">
        <?php echo JText::_('Z2_LAST_MODIFIED_ON'); ?> <?php echo JHTML::_('date', $this->item->modified, JText::_('Z2_DATE_FORMAT_LC2')); ?>
        </span>
    <?php endif; ?>
    
    <!-- 外掛 請勿刪除 -->
    <?php echo $this->item->event->AfterDisplay; ?>
    <?php echo $this->item->event->Z2AfterDisplay; ?>

</div>
