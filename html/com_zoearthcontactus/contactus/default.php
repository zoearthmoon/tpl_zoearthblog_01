<?php
/*
@author zoearth
*/
defined('_JEXEC') or die('Restricted access');
jimport('joomla.html.pagination');
jimport('joomla.application.component.controller' );
$this->_pagination = new JPagination($this->rs_total,$this->start,$this->limit);
ZoearthContactUsHelperSetupValidate::setupValidate();
?>
<script type="text/javascript">
jQuery(function(){
	jQuery("#zoearthcontactus_form").validate();
	//zoearth_set_ajaxForm("zoearthcontactus_form");
});
</script>
<script language="Javascript">
jQuery(document).ready(function() {
    jQuery(".postcontent").addClass("col_full");
});
jQuery(document).ready(function() {
    jQuery(".postcontent").addClass("col_full");
    jQuery(".container .fright").hide();
    jQuery(".container .process").hide();
});
</script>
<style type="text/css">
.error
{
    color:#FF0000;
    font-size:15px;
}
</style>
<div class="port-desc clearfix">
    <div class="entry_title">
        <h2><?php echo JText::_("TPL_Z201_CONTACTUS")?></h2>
    </div>
    <div class="contact-form-txt">
        <?php echo Z2HelperRelateMenu::$data->description; ?>
    </div>
    <div id="contact-form-result">
        <small>*</small> <?php echo JText::_("TPL_Z201_REQUIRE")?>
    </div>
    <div class="horizontal-form" id="contact-form-container">
        <form class="form-validate" id="zoearthcontactus_form" name="zoearthcontactus_form" method="post" target="addIframe" action="<?php JRoute::_('index.php'); ?>" novalidate >
        <input type="hidden" name="option" value="com_zoearthcontactus" />
        <input type="hidden" name="task" value="store"/>
        <input type="hidden" name="controller" value="contactus" />
        <input type="hidden" name="inputField[]" value="<?php echo JText::_("COM_ZOEARTHCONTACTUS_TITLE")?>">
        <input type="hidden" name="inputField[]" value="<?php echo JText::_("COM_ZOEARTHCONTACTUS_CONTENT")?>">
        <input type="hidden" name="inputField[]" value="<?php echo $con; ?>">
        <div class="control-group">
            <label for="template-contactform-email"><?php echo JText::_("COM_ZOEARTHCONTACTUS_NAME")?> <small>*</small></label>
            <div class="span8">
                <input type="text" class="required input-block-level" name="name" id="name">
            </div>
        </div>
        <div class="control-group">
            <label for="template-contactform-name"><?php echo JText::_("COM_ZOEARTHCONTACTUS_EMAIL")?> <small>*</small>
            </label>
            <div class="span8">
                <input type="text" class="required email input-block-level" name="email" id="email">
            </div>
        </div>
        <div class="control-group">
            <label for="template-contactform-subject"><?php echo JText::_("COM_ZOEARTHCONTACTUS_TITLE")?> <small>*</small>
            </label>
            <div class="span8">
                <input type="text" class="required input-block-level" name="<?php JText::_("COM_ZOEARTHCONTACTUS_TITLE")?>" id="<?php JText::_("COM_ZOEARTHCONTACTUS_TITLE")?>">
            </div>
        </div>
        <div class="control-group">
            <label for="template-contactform-subject"><?php echo JText::_("COM_ZOEARTHCONTACTUS_CONTENT")?> <small>*</small>
            </label>
            <div class="span8">
                <textarea cols="30" rows="10" name="<?php echo JText::_("COM_ZOEARTHCONTACTUS_CONTENT")?>" id="<?php echo JText::_("COM_ZOEARTHCONTACTUS_CONTENT")?>" class="required input-block-level"></textarea>
            </div>
        </div>
        <?php if ($this->useValidate):?>
            <div class="control-group" >
                <label for="template-contactform-subject"><?php echo JText::_("COM_ZOEARTHCONTACTUS_CODE")?>：</label>
                <div class="control-input">
                    <input type="text" size="30" style="float: left" tabindex="0" class="input-small required" name="verifycode" id="verifycode" value="" >
                    <img class="img-polaroid" style="float: left"  src="<?php echo JURI::root().'index.php?option=com_zoearthcontactus&controller=verifycode&time='.time(); ?>">
                </div>
            </div>
        <?php endif;?> 
        
        <div class="col_full nobottommargin hidden">
            <label for="template-contactform-botcheck">Botcheck</label>
            <textarea cols="30" rows="10" name="template-contactform-botcheck" id="template-contactform-botcheck" class="required input-block-level"></textarea>
        </div>
        <div class="dotted-divider"></div>
        <div style="text-align: center;"
            class="col_full nobottommargin">
            <button value="reset" name="template-contactform-submit" id="template-contactform-submit" type="reset" class="simple-button"><?php echo JText::_("COM_ZOEARTHCONTACTUS_CANCEL")?></button>
            <button value="submit" name="template-contactform-submit" id="template-contactform-submit" type="submit" class="simple-button"><?php echo JText::_("COM_ZOEARTHCONTACTUS_SUBMIT")?></button>
        </div>
        </form>
    </div>
</div>