<?php
defined('_JEXEC') or die;
?>
<div class="entry_content">

    <div class="entry_title">
        <h2><?php echo $this->item->category->name;?></h2>
    </div>

    <h3><?php echo $this->item->title; ?></h3>
    <div class="money"><?php echo $this->item->extra_fields['caseMoney']->value; ?></div>
    <div class="name"><?php echo $this->item->extra_fields['caseData']->value; ?></div>
    <div style="padding: 10px;" class="info">
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
    
    <!-- 社群按鈕 Social sharing -->
    <div class="itemSocialSharing span7">
        <span class="span2"><?php echo Z2HelperSocial::showTwitterButton(); ?></span>
        <span class="span3"><?php echo Z2HelperSocial::showFacebookLikeButton(); ?></span>
        <span class="span1"><?php echo Z2HelperSocial::showGoogleLikeButton(); ?></span>
    </div>
    
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

<p align="center"><a href="<?php echo $this->item->category->link;?>"><i class="icon-reply"></i><?php echo JText::_('TPL_Z201_BACK_TO_CATEGORY'); ?></a></p>

<ul class="pager">
    <?php if ($this->item->previousLink):?>
    <li class="previous">
        <a href="<?php echo $this->item->previousLink; ?>"><?php echo JText::_('TPL_Z201_PREV_ITEM'); ?><br>
            <span><?php echo $this->item->previousTitle; ?></span>
        </a>
    </li>
    <?php endif;?>
    
    <?php if ($this->item->nextLink):?>
    <li class="next">
        <a href="<?php echo $this->item->nextLink; ?>"><?php echo JText::_('TPL_Z201_NEXT_ITEM'); ?><br>
            <span><?php echo $this->item->nextTitle; ?></span>
        </a>
    </li>
    <?php endif;?>
</ul>