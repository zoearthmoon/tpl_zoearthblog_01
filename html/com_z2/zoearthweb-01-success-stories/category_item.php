<?php
defined('_JEXEC') or die;
Z2HelperUtilities::setDefaultImage($this->item, 'itemlist', $this->params);
?>
<tr>
    <td>
        <?php if ($this->item->extra_fields['caseSex']->value):?>
            <img src="<?php echo JUri::base().'templates/zoearthweb_01/images/icons/'.($this->item->extra_fields['caseSex']->value == '男' ? 'icon-men.png':'icon-female.png');?>" >
        <?php endif;?>
        <a href="<?php echo $this->item->link; ?>" title="<?php if(!empty($this->item->image_caption)) echo Z2HelperUtilities::cleanHtml($this->item->image_caption); else echo Z2HelperUtilities::cleanHtml($this->item->title); ?>">
            <?php echo $this->item->title; ?>
        </a>
    </td>
    <td><?php echo $this->item->extra_fields['caseData']->value; ?></td>
    <td class="money"><?php echo $this->item->extra_fields['caseMoney']->value; ?></td>
</tr>