<?php
defined('_JEXEC') or die;
?>
<!-- 這邊是項目詳細頁 -->
<style type="text/css">
#z2Container img
{
	max-width:95%;
}
</style>
<!-- 開始項目主頁面輸出 Start Z2 Item Layout -->
<div id="z2Container" class="itemView container">

    <!-- 外掛 請勿刪除 -->
    <?php echo $this->item->event->BeforeDisplay; ?>
    <?php echo $this->item->event->Z2BeforeDisplay; ?>
    
    <div class="page-header media">
    
        <!-- 標題 Item title -->
        
        <h2 class="blog-title">
            <!-- 顯示標題 -->
            <?php echo $this->item->title; ?>
    
            <!-- 是否頂置 Featured flag -->
            <?php if($this->item->featured): ?>
            <span><sup><?php echo JText::_('Z2_FEATURED'); ?></sup></span>
            <?php endif; ?>
        </h2>
        
        <!-- 創建日期 Date created -->
        <span class="itemDateCreated label label-info">
            <?php echo JHTML::_('date', $this->item->created , JText::_('Z2_DATE_FORMAT_LC2')); ?>
        </span>
        
        <!-- 圖片 Item Image -->
        <?php if (Z2HelperImage::exist($this->item->image)):?>
            <a rel="lightbox" href="<?php echo Z2HelperImage::_($this->item->image); ?>" title="<?php echo $this->item->image_caption; ?>" alt="<?php echo $this->item->image_caption; ?>" >
                <img class="thumbnail" src="<?php echo Z2HelperImage::_($this->item->image); ?>" title="<?php echo $this->item->image_caption; ?>" alt="<?php echo $this->item->image_caption; ?>" />
            </a>
        <?php endif; ?>
        
    </div>

    <!-- 外掛 請勿刪除 -->
    <?php echo $this->item->event->AfterDisplayTitle; ?>
    <?php echo $this->item->event->Z2AfterDisplayTitle; ?>

    <div class="itemBody">

    <!-- 外掛 請勿刪除 -->
    <?php echo $this->item->event->BeforeDisplayContent; ?>
    <?php echo $this->item->event->Z2BeforeDisplayContent; ?>



    <!-- 附加圖片 -->
    <?php if(!empty($this->item->addPic)): ?>
    <div class="row">
        <?php foreach ($this->item->addPic as $pic):?>
        <?php if (Z2HelperImage::exist($pic['pic'])):?>
        <div class="col-xs-4 col-md-2">
            <a rel="lightbox" href="<?php echo $pic['pic']; ?>" class="thumbnail" title="<?php echo $pic['title']; ?>" alt="<?php echo $pic['title']; ?>" >
                <img src="<?php echo Z2HelperImage::_($pic['pic'],171,180); ?>" />
            </a>
        </div>
        <?php endif;?>
        <?php endforeach;?>
    </div>
    <?php endif; ?>
    
    <div class="itemIntroText">
        <!-- 項目內容Item introtext -->
        <?php echo $this->item->introtext; ?>
        <?php echo $this->item->fulltext; ?>
    </div>

    <!-- 額外欄位 Item extra fields -->
    <?php if(count($this->item->extra_fields)): ?>
    <div class="itemExtraFields">
    <h3><?php echo JText::_('Z2_ADDITIONAL_INFO'); ?></h3>
    <ul>
    <?php foreach ($this->item->extra_fields as $key=>$extraField): ?>
        <?php if($extraField->value != '' && $extraField->showInPage == 1 ): ?>
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
    <div class="itemSocialSharing row">
        <!-- 推特按鈕 Twitter Button -->
        <div class="itemTwitterButton col-xs-12 col-md-3">
            <a href="https://twitter.com/share" class="twitter-share-button" data-count="horizontal"<?php if($this->item->params->get('twitterUsername')): ?> data-via="<?php echo $this->item->params->get('twitterUsername'); ?>"<?php endif; ?>>
                <?php echo JText::_('Z2_TWEET'); ?>
            </a>
            <script type="text/javascript" src="//platform.twitter.com/widgets.js"></script>
        </div>

        <!-- FB按鈕 Facebook Button -->
        <div class="itemFacebookButton col-xs-12 col-md-3">
            <div id="fb-root"></div>
            <script type="text/javascript">
            (function(d, s, id) {
              var js, fjs = d.getElementsByTagName(s)[0];
              if (d.getElementById(id)) return;
              js = d.createElement(s); js.id = id;
              js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
              fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
            </script>
            <div class="fb-like" data-send="false" data-width="200" data-show-faces="true"></div>
        </div>

        <!-- GOOGLE按鈕 Google +1 Button -->
        <div class="itemGooglePlusOneButton col-xs-12 col-md-3">
            <g:plusone annotation="inline" width="120"></g:plusone>
            <script type="text/javascript">
            (function() {
              window.___gcfg = {lang: 'en'}; // Define button default language here
            var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
            po.src = 'https://apis.google.com/js/plusone.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
            })();
            </script>
        </div>

    </div>

    <div class="itemLinks">

        <!-- 項目分類 Item category -->
        <div class="itemCategory">
            <span><?php echo JText::_('Z2_PUBLISHED_IN'); ?></span>
            <a href="<?php echo $this->item->category->link; ?>"><?php echo $this->item->category->name; ?></a>
        </div>
    

        <!-- 項目標籤 Item tags -->
        <?php if(count($this->item->tags)): ?>
        <div class="itemTagsBlock">
            <span><?php echo JText::_('Z2_TAGGED_UNDER'); ?></span>
            <ul class="itemTags">
            <?php foreach ($this->item->tags as $tag): ?>
                <li><a href="<?php echo $tag->link; ?>"><?php echo $tag->name; ?></a></li>
            <?php endforeach; ?>
            </ul>
        </div>
        <?php endif; ?>
    
        
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


    <!-- 相關項目  Related items by tag -->
    <?php if($this->item->params->get('itemRelated') && isset($this->relatedItems)): ?>
    <div class="itemRelated">
        <h3><?php echo JText::_("Z2_RELATED_ITEMS_BY_TAG"); ?></h3>
        <ul>
            <?php foreach($this->relatedItems as $key=>$item): ?>
            <li class="<?php echo ($key%2) ? "odd" : "even"; ?>">

                <!-- 相關項目標題 -->
                <a class="itemRelTitle" href="<?php echo $item->link ?>"><?php echo $item->title; ?></a>
                
                <!-- 相關項目分類 -->
                <div class="itemRelCat"><?php echo JText::_("Z2_IN"); ?> <a href="<?php echo $item->category->link ?>"><?php echo $item->category->name; ?></a></div>

                <!-- 相關項目圖片 -->
                <img style="width:<?php echo $item->imageWidth; ?>px;height:auto;" class="itemRelImg" src="<?php echo Z2HelperImage::_($item->image); ?>" alt="<?php Z2HelperUtilities::cleanHtml($item->title); ?>" />

                <!-- 相關項目說明 -->
                <div class="itemRelIntrotext"><?php echo $item->introtext; ?></div>

            </li>
            <?php endforeach; ?>
            <li class="clr"></li>
        </ul>
        <div class="clr"></div>
    </div>
    <?php endif; ?>


    <?php if(!JRequest::getCmd('print')): ?>
    <!-- 下一個 與 上一個 Item navigation -->
    <div class="itemNavigation">
        <span class="itemNavigationTitle"><?php echo JText::_('Z2_MORE_IN_THIS_CATEGORY'); ?></span>

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

    <!-- 外掛 請勿刪除 -->
    <?php echo $this->item->event->AfterDisplay; ?>
    <?php echo $this->item->event->Z2AfterDisplay; ?>

</div>