<?php
defined('_JEXEC') or die;
?>
<div class="grybox success">
<h4><?php echo JText::_("TPL_Z201_SUCCESS_CASE")?><span>Success Stories</span></h4>
<ul>
<?php foreach ($menus as $menu):?>
<li>
    
    <img src="<?php echo JUri::base().'templates/zoearthweb_01/images/icons/'.($menu['extra_fields']['caseSex'] == '男' ? 'icon-men.png':'icon-female.png');?>" >
    
    <div>
    <?php echo $menu['extra_fields']['caseTypeTitle'];?><br>
    
    <a href="<?php echo $menu['link'];?>">
        <?php if ($menu['extra_fields']['caseData']):?>
            <?php echo $menu['extra_fields']['caseData'];?>
        <?php else:?>
            <?php echo $menu['name'];?>
        <?php endif;?>
    </a>
    
    <br>
    <strong><?php echo $menu['extra_fields']['caseMoney'];?></strong>
    </div>
</li>
<?php endforeach; ?>
</ul>
</div>