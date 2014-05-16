<?php
defined('_JEXEC') or die;
Z2HelperUtilities::setDefaultImage($this->item, 'itemlist', $this->params);
?>
<div class="toggle faq clearfix">
    <div class="togglet"><i class="icon-question-sign"></i><?php echo $this->item->title; ?></div>
    <div class="togglec clearfix" style="display: none;">
    <?php echo $this->item->introtext; ?>
    <?php echo $this->item->fulltext; ?>
    </div>
</div>