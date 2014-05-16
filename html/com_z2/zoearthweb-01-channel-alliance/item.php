<?php
defined('_JEXEC') or die;
?>
<!-- 這邊是項目詳細頁 -->

<!-- 列印按鈕 只在列印頁面時顯示 Print button at the top of the print page only -->
<?php if(JRequest::getInt('print')==1): ?>
<a class="itemPrintThisPage" rel="nofollow" href="#" onclick="window.print();return false;">
    <span><?php echo JText::_('Z2_PRINT_THIS_PAGE'); ?></span>
</a>
<?php endif; ?>

<!-- 開始項目主頁面輸出 Start Z2 Item Layout -->
<div id="z2Container" class="itemView">

    <!-- 外掛 請勿刪除 -->
    <?php echo $this->item->event->BeforeDisplay; ?>
    <?php echo $this->item->event->Z2BeforeDisplay; ?>

    
    <!-- 創建日期 Date created -->
    <!-- 
    <span class="itemDateCreated">
        <?php echo JHTML::_('date', $this->item->created , JText::_('Z2_DATE_FORMAT_LC2')); ?>
    </span>
    -->
    
    <!-- 標題 Item title -->
    
    <div class="entry_title"><h2>
        <!-- 顯示標題 -->
        <?php echo $this->item->title; ?>

        <!-- 是否頂置 Featured flag -->
        <?php if($this->item->featured): ?>
        <span><sup><?php echo JText::_('Z2_FEATURED'); ?></sup></span>
        <?php endif; ?>
    </h2></div>

    <!-- 外掛 請勿刪除 -->
    <?php echo $this->item->event->AfterDisplayTitle; ?>
    <?php echo $this->item->event->Z2AfterDisplayTitle; ?>


    <div class="itemBody">

    <!-- 外掛 請勿刪除 -->
    <?php echo $this->item->event->BeforeDisplayContent; ?>
    <?php echo $this->item->event->Z2BeforeDisplayContent; ?>

    <!-- 圖片 Item Image -->
    <?php if(!empty($this->item->image)): ?>
    <div class="itemImageBlock">
        <span class="itemImage">
        <a rel="lightbox" href="<?php echo Z2HelperImage::_($this->item->image); ?>" title="<?php echo JText::_('Z2_CLICK_TO_PREVIEW_IMAGE'); ?>">
            <img src="<?php echo Z2HelperImage::_($this->item->image); ?>" alt="<?php if(!empty($this->item->image_caption)) echo Z2HelperUtilities::cleanHtml($this->item->image_caption); else echo Z2HelperUtilities::cleanHtml($this->item->title); ?>" style="width:<?php echo $this->item->imageWidth; ?>px; height:auto;" />
        </a>
        </span>

        <!-- 圖片  Image caption -->
        <span class="itemImageCaption"><?php echo $this->item->image_caption; ?></span>

        <!-- 圖片說明 Image credits -->
        <span class="itemImageCredits"><?php echo $this->item->image_credits; ?></span>

    </div>
    <?php endif; ?>

    <!-- 附加圖片 -->
    <?php if(!empty($this->item->addPic)): ?>
    <?php foreach ($this->item->addPic as $pic):?>
    <div class="itemImageBlock">
        <span class="itemImage">
            <img src="<?php echo Z2HelperImage::_($pic['pic']); ?>" alt="<?php echo $pic['title']; ?>" />
        </span>
    </div>
    <?php endforeach;?>
    <?php endif; ?>
    
    <div class="itemIntroText">
        <!-- 項目內容Item introtext -->
        <?php echo $this->item->introtext; ?>
        <?php echo $this->item->fulltext; ?>
    </div>

    <!-- 額外欄位 Item extra fields -->
    <?php if(count($this->item->extra_fields)): ?>
    <div class="itemExtraFields">
    <ul>
    <?php foreach ($this->item->extra_fields as $key=>$extraField): ?>
        <?php if($extraField->value != '' && $extraField->showInPage == 1): ?>
            <li class="<?php echo ($key%2) ? "odd" : "even"; ?> type<?php echo ucfirst($extraField->type); ?> group<?php echo $extraField->group; ?>">
            <?php if($extraField->type == 'header'): ?>
                <h4 class="itemExtraFieldsHeader"><?php echo $extraField->name; ?></h4>
            <?php else: ?>
                <span class="itemExtraFieldsLabel"><?php echo $extraField->name; ?>:</span>
                <span class="itemExtraFieldsValue"><?php echo $extraField->value; ?></span>
            <?php endif; ?>
            </li>
        <?php endif; ?>
    <?php endforeach; ?>
    </ul>
    </div>
    <?php endif; ?>

    </div>

    <!-- 外掛 請勿刪除 -->
    <?php echo $this->item->event->AfterDisplayContent; ?>
    <?php echo $this->item->event->Z2AfterDisplayContent; ?>

    <!-- 社群按鈕 Social sharing -->
    <div class="itemSocialSharing span7">
        <span class="span2"><?php echo Z2HelperSocial::showTwitterButton(); ?></span>
        <span class="span3"><?php echo Z2HelperSocial::showFacebookLikeButton(); ?></span>
        <span class="span1"><?php echo Z2HelperSocial::showGoogleLikeButton(); ?></span>
    </div>

    <div class="itemLinks">

        <!-- 附加檔案 Item attachments -->
        <?php if(count($this->item->attachments)): ?>
        <div class="itemAttachmentsBlock">
            <span><?php echo JText::_('Z2_DOWNLOAD_ATTACHMENTS'); ?></span>
            <ul class="itemAttachments">
            <?php foreach ($this->item->attachments as $attachment): ?>
            <li>
                <a title="<?php echo Z2HelperUtilities::cleanHtml($attachment->titleAttribute); ?>" href="<?php echo $attachment->link; ?>"><?php echo $attachment->title; ?></a>
                <?php if($this->item->params->get('itemAttachmentsCounter')): ?>
                    <span>(<?php echo $attachment->hits; ?> <?php echo ($attachment->hits==1) ? JText::_('Z2_DOWNLOAD') : JText::_('Z2_DOWNLOADS'); ?>)</span>
                <?php endif; ?>
            </li>
            <?php endforeach; ?>
            </ul>
        </div>
        <?php endif; ?>

    </div>

    <!-- 外掛 請勿刪除 -->
    <?php echo $this->item->event->AfterDisplay; ?>
    <?php echo $this->item->event->Z2AfterDisplay; ?>

</div>