<?php
defined('_JEXEC') or die;
$tmpUrl = JUri::base().'templates/zoearthblog_01/';
?>
<?php $i=0;?>
<?php foreach ($menus as $menu):?>
<?php
if ($menu['image'])
{
    $goImg = Juri::base().Z2HelperImage::_($menu['image'],800,800);
}
else
{
    $goImg = $tmpUrl."images/intro.jpg";
}
?>
<style type="text/css">
#introBanner {
    background: url("<?php echo $tmpUrl?>css/images/overlay.png") repeat fixed left top / 256px 256px, url("<?php echo $goImg?>") repeat fixed center center / cover rgba(0, 0, 0, 0);
}
</style>
<section id="introBanner" class="main style1 dark fullscreen">
    <div class="content container small">
        <header>
            <h2><?php echo $menu['name'];?></h2>
        </header>
        <?php echo $menu['description'];?>
        <footer>
            <a href="#mainContent" class="button style2 down">More</a>
        </footer>
    </div>
</section>
<?php endforeach; ?>