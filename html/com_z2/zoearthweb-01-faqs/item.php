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
    <div class="entry_title">
        <h2><?php echo $item->category->name;?></h2>
    </div>

    
    <div class="entry_content">
        <h3><?php echo $this->item->title; ?></h3>
        <div class="money"><?php echo $this->item->extra_fields['caseSex']->value; ?></div>
        <div class="name"><?php echo $this->item->extra_fields['caseSex']->value; ?></div>
        
        <img src="<?php echo Z2HelperImage::_($this->item->image); ?>" alt="<?php if(!empty($this->item->image_caption)) echo Z2HelperUtilities::cleanHtml($this->item->image_caption); else echo Z2HelperUtilities::cleanHtml($this->item->title); ?>" style="width:<?php echo $this->item->imageWidth; ?>px; height:auto;" />
        
        <div style="padding: 10px;" class="info">
            <?php echo $this->item->introtext; ?>
            <?php echo $this->item->fulltext; ?>
        </div>
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
    
    <p align="center"><a href="success-list.html"><i class="icon-reply"></i> 回列表頁</a></p>
    
    <?php if(!JRequest::getCmd('print')): ?>
    <!-- 下一個 與 上一個 Item navigation -->
    <div class="itemNavigation">
        <?php if(isset($this->item->previousLink)): ?>
        <a class="itemPrevious" href="<?php echo $this->item->previousLink; ?>">
            &laquo; <?php echo $this->item->previousTitle; ?>
        </a>
        <?php endif; ?>

        <?php if(isset($this->item->nextLink)): ?>
        <a class="itemNext" href="<?php echo $this->item->nextLink; ?>">
            <?php echo $this->item->nextTitle; ?> &raquo;
        </a>
        <?php endif; ?>
    </div>
    <?php endif; ?>
    
</div>