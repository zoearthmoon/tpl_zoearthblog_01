<?php
defined('_JEXEC') or die;
?>

<div class="navbar-header">
    <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-example-js-navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="#"><?php echo $menus[1]['name']?></a>
</div>
<div class="collapse navbar-collapse bs-example-js-navbar-collapse">
<?php foreach ($menus as $key=>$menu):?>
<?php if ($key > 1):?>
    <ul class="nav navbar-nav navbar-right">
        <li id="fat-menu" class="dropdown">
            <a href="#" id="drop3" role="button" class="dropdown-toggle" data-toggle="dropdown">
                <?php echo $menu['name']?><b class="caret"></b>
            </a>
            <ul class="dropdown-menu" role="menu" aria-labelledby="drop3">
                <?php if (count($menu['menus']) > 0 ):?>
                <?php foreach ($menu['menus'] as $p=>$menuC):?>
                    <li role="presentation">
                        <a role="menuitem" tabindex="-1" href="<?php echo $menuC['link']?>"><?php echo $menuC['name']?></a>
                    </li>
                <?php endforeach;?>
                <?php endif;?>
            </ul>
        </li>
    </ul>
<?php endif;?>
<?php endforeach; ?>
<form method="get" action="<?php echo JRoute::_('index.php?option=com_search&view=search');?>" class="navbar-form navbar-right">
    <input type="text" placeholder="請輸入關鍵字" name="searchword" class="form-control">
</form>
</div>