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

    <div class="itemHeader">
        <!-- 創建日期 Date created -->
        <span class="itemDateCreated">
            <?php echo JHTML::_('date', $this->item->created , JText::_('Z2_DATE_FORMAT_LC2')); ?>
        </span>
    
        <!-- 標題 Item title -->
        
        <h2 class="itemTitle">
            <!-- 顯示標題 -->
            <?php echo $this->item->title; ?>
    
            <!-- 是否頂置 Featured flag -->
            <?php if($this->item->featured): ?>
            <span><sup><?php echo JText::_('Z2_FEATURED'); ?></sup></span>
            <?php endif; ?>
        </h2>
    </div>

    <!-- 外掛 請勿刪除 -->
    <?php echo $this->item->event->AfterDisplayTitle; ?>
    <?php echo $this->item->event->Z2AfterDisplayTitle; ?>

    <div class="itemToolbar">
        <ul>

            <!-- 列印按鈕 Print Button -->
            <?php if($this->item->params->get('itemPrintButton') && !JRequest::getInt('print')): ?>
            <li>
                <a class="itemPrintLink" rel="nofollow" href="<?php echo $this->item->printLink; ?>" onclick="window.open(this.href,'printWindow','width=900,height=600,location=no,menubar=no,resizable=yes,scrollbars=yes'); return false;">
                    <span><?php echo JText::_('Z2_PRINT'); ?></span>
                </a>
            </li>
            <?php endif; ?>

            <!-- 信箱 Email Button -->
            <?php if($this->item->params->get('itemEmailButton') && !JRequest::getInt('print')): ?>
            <li>
                <a class="itemEmailLink" rel="nofollow" href="<?php echo $this->item->emailLink; ?>" onclick="window.open(this.href,'emailWindow','width=400,height=350,location=no,menubar=no,resizable=no,scrollbars=no'); return false;">
                    <span><?php echo JText::_('Z2_EMAIL'); ?></span>
                </a>
            </li>
            <?php endif; ?>

            <!-- 社交按鈕 Item Social Button -->
            <?php if($this->item->params->get('itemSocialButton') && !is_null($this->item->params->get('socialButtonCode', NULL))): ?>
            <li>
                <?php echo $this->item->params->get('socialButtonCode'); ?>
            </li>
            <?php endif; ?>

        </ul>
        <div class="clr"></div>
    </div>

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
            <img src="<?php echo $pic['pic']; ?>" alt="<?php echo $pic['title']; ?>" />
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

    <!-- 點擊次數 Item Hits -->
    <span class="itemHits">
        <?php echo JText::_('Z2_READ'); ?> <b><?php echo $this->item->hits; ?></b> <?php echo JText::_('Z2_TIMES'); ?>
    </span>

    <!-- 修改日期 Item date modified -->
    <?php if(intval($this->item->modified)!=0): ?>
        <span class="itemDateModified">
            <?php echo JText::_('Z2_LAST_MODIFIED_ON'); ?> <?php echo JHTML::_('date', $this->item->modified, JText::_('Z2_DATE_FORMAT_LC2')); ?>
        </span>
    <?php endif; ?>

    </div>

    <!-- 外掛 請勿刪除 -->
    <?php echo $this->item->event->AfterDisplayContent; ?>
    <?php echo $this->item->event->Z2AfterDisplayContent; ?>

    <!-- 社群按鈕 Social sharing -->
    <div class="itemSocialSharing">
        <!-- 推特按鈕 Twitter Button -->
        <div class="itemTwitterButton">
            <a href="https://twitter.com/share" class="twitter-share-button" data-count="horizontal"<?php if($this->item->params->get('twitterUsername')): ?> data-via="<?php echo $this->item->params->get('twitterUsername'); ?>"<?php endif; ?>>
                <?php echo JText::_('Z2_TWEET'); ?>
            </a>
            <script type="text/javascript" src="//platform.twitter.com/widgets.js"></script>
        </div>

        <!-- FB按鈕 Facebook Button -->
        <div class="itemFacebookButton">
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
        <div class="itemGooglePlusOneButton">
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

    <!-- 回到頂端按鈕 -->
    <?php if(!JRequest::getCmd('print')): ?>
    <div class="itemBackToTop">
        <a class="z2Anchor" href="<?php echo $this->item->link; ?>#startOfPageId<?php echo JRequest::getInt('id'); ?>">
            <?php echo JText::_('Z2_BACK_TO_TOP'); ?>
        </a>
    </div>
    <?php endif; ?>

</div>