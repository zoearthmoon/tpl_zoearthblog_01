<?php
defined('_JEXEC') or die;
?>
<div class="span2">
    <div class="product-feature-title">
        <img src="<?php echo JUri::base();?>templates/zoearthweb_01/images/success-title.png">
    </div>
</div>

<?php foreach ($menus as $k=>$menu):?>
    <div class="span2 <?php echo (in_array($k,array(3,7)) ? 'col_last':'');?>">
        <div class="product-feature product-feature3"><img src="<?php echo Z2HelperImage::_($menu['extra_fields']['indexIcon']);?>" border="0">
            <h3><a href="<?php echo $menu['link'];?>"><?php echo $menu['name'];?></a></h3>
            <?php if (count($menu['menus']) > 0 ):?>
                <?php foreach ($menu['menus'] as $menuC):?>
                <p><?php echo mb_substr(strip_tags($menuC['description']),0,35,'utf-8');?>...<a href="<?php echo $menuC['link'];?>"><?php echo JText::_('Z2_MORE');?></a></p>
                <?php break;?>
                <?php endforeach;?>
            <?php endif;?>
        </div>
    </div>
<?php endforeach; ?>