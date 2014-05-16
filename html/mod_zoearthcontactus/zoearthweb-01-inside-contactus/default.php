<?php
defined('_JEXEC') or die;
require_once(JPATH_BASE.'/components/com_zoearthcontactus/helpers/SetupValidate.php');
ZoearthContactUsHelperSetupValidate::setupValidate();
?>
<script type="text/javascript">
jQuery(function(){
	jQuery("#zoearthcontactusinside_form").validate();
});
</script>
<div class="grybox consulting">
    <h4>免費諮詢<span>Free Consultation</span></h4>
    <div class="horizontal-form" id="contact-form-container">
        <form method="post" id="zoearthcontactusinside_form" name="zoearthcontactusinside_form" target="addIframe" method="post" action="<?php JRoute::_('index.php'); ?>" >
        <input type="hidden" name="option" value="com_zoearthcontactus" />
        <input type="hidden" name="task" value="store"/>
        <input type="hidden" name="controller" value="contactus" />
        <input type="hidden" name="inputField[]" value="性別">
        <input type="hidden" name="inputField[]" value="行動電話">
        <input type="hidden" name="inputField[]" value="可聯絡時間">
        <input type="hidden" name="inputField[]" value="備註">
        <div class="control-group">
            <label for="template-contactform-email">姓&#12288;&#12288;名：</label>
            <div class="control-input"><input type="text" class="required input-block-level" name="name" id="name"></div>
        </div>
        <div class="control-group">
            <label for="template-contactform-message2">性&#12288;&#12288;別：</label>
            <div class="control-input">
                <label for=""><input type="radio" value="男" id="性別" name="性別" checked >男生</label>
                <label for=""><input type="radio" value="女" id="性別" name="性別">女生</label>
            </div>
        </div>
        <div class="control-group">
            <label for="template-contactform-email">電子信箱：</label>
            <div class="control-input">
                <input type="text" class="required email input-block-level" name="email" id="email">
            </div>
        </div>
        <div class="control-group">
            <label for="template-contactform-email">行動電話：</label>
            <div class="control-input">
                <input type="text" class="required input-block-level" name="行動電話" id="行動電話">
            </div>
        </div>
        <div class="control-group">
            <label for="template-contactform-email">可聯絡時間：</label>
            <div class="control-input">
                <select class="input-block-level" name="可聯絡時間" id="可聯絡時間">
                <option value="am08:00~am09:00">am08:00~am09:00</option>
                <option value="am09:00~am10:00">am09:00~am10:00</option>
                <option value="am10:00~am11:00">am10:00~am11:00</option>
                <option value="am11:00~am12:00">am11:00~am12:00</option>
                <option value="am12:00~pm01:00">am12:00~pm01:00</option>
                <option value="pm01:00~pm02:00">pm01:00~pm02:00</option>
                <option value="pm02:00~pm03:00">pm02:00~pm03:00</option>
                <option value="pm03:00~pm04:00">pm03:00~pm04:00</option>
                <option value="pm04:00~pm05:00">pm04:00~pm05:00</option>
                </select>
            </div>
        </div>
        <div class="control-group">
            <label for="template-contactform-email">備&#12288;註：</label>
            <div class="control-input">
                <textarea class="input-block-level" rows="2" cols="10" id="備註" name="備註"></textarea>
            </div>
        </div>
        <?php if ($useValidate):?>
            <div class="control-group" >
                <label for="template-contactform-email">驗證碼：</label>
                <div class="control-input">
                    <input type="text" size="30" style="width:100%" tabindex="0" class="input-small required" name="verifycode" id="verifycode" value="" >
                    <img class="img-polaroid" src="<?php echo JURI::root().'index.php?option=com_zoearthcontactus&controller=verifycode&time='.time(); ?>">
                </div>
            </div>
            
        <?php endif;?> 
        <div class="dotted-divider"></div>                    
        <div style="text-align:center;" class="col_full nobottommargin">
            <button id="template-contactform-submit" type="submit" class="simple-button">送出</button>
            <button id="template-contactform-submit" type="reset" class="simple-button">取消</button>
        </div>
        </form>
    </div>
</div>