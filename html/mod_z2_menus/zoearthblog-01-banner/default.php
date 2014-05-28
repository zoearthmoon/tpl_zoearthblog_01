<?php
defined('_JEXEC') or die;
?>
<?php $i=0;?>
<?php foreach ($menus as $menu):?>
<section id="intro" class="main style1 dark fullscreen">
    <div class="content container small">
        <header>
            <h2><?php echo $menu['name'];?></h2>
        </header>
        <?php echo $menu['description'];?>
    </div>
</section>
<?php endforeach; ?>