<?php
defined('_JEXEC') or die;
?>
<div class="selectCategory">
<div class="cate">
<select class="input-block-level" name="template-contactform-service" id="template-contactform-service">
<?php foreach ($menus as $k=>$menu):?>
    <option value="">--<?php echo $menu['name'];?>--</option>
    <?php if (count($menu['menus']) > 0 ):?>
        <?php foreach ($menu['menus'] as $menuC):?>
        <option value="<?php echo $menuC['link'];?>" <?php echo $menuC['active'] ? 'selected':''?> ><?php echo $menuC['name'];?></option>
        <?php endforeach;?>
    <?php endif;?>
<?php endforeach; ?>
</select>
</div>
</div>
<script language="Javascript">
jQuery(document).ready(function() {
    jQuery(".entry_title h2").append(jQuery(".selectCategory").html());
    jQuery(".selectCategory").hide();
    jQuery(".cate select").bind('change',function(){
        if (jQuery(this).val())
        {
            location = jQuery(this).val();
        }
    });
});
</script>