<?php
defined('_JEXEC') or die;
?>
<?php foreach ($menus as $menu):?>
<div class="pro-list">
<h4><?php echo $menu['name']; ?><span><?php echo $menu['extra_fields']['addTitle'];?></span></h4>
<ul>
<?php foreach ($menu['menus'] as $menuC):?>
    <li class="menu1">
        <a href="<?php echo $menuC['link'];?>">
        <img src="<?php echo Z2HelperImage::_($menuC['extra_fields']['indexIcon']);?>">
        <div><?php echo $menuC['name'];?></div>
        </a>
    </li>
<?php endforeach; ?>
</ul>
</div>
<?php endforeach; ?>