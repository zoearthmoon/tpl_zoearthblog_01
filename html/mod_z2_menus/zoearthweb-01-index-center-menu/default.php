<?php
defined('_JEXEC') or die;
?>
<ul id="main-menu">
<?php foreach ($menus[key($menus)]['menus'] as $menu):?>
    <li class="menu1">
        <a href="<?php echo $menu['link'];?>">
        <img src="<?php echo Z2HelperImage::_($menu['extra_fields']['indexIcon']);?>"><div><?php echo $menu['name'];?></div>
        </a>
    </li>
<?php endforeach; ?>
</ul>