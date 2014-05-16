<?php
defined('_JEXEC') or die;
?>
<ul class="lp-contacts">
<?php foreach ($menus as $menu):?>
    <li>
    <?php echo $menu['description'];?>
    </li>
<?php endforeach; ?>
</ul>