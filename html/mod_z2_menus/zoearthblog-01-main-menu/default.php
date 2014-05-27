<?php
defined('_JEXEC') or die;
//20131210 zoearth 這邊還加上上方的福由選單
?>
<ul id="main-menu">
<?php foreach ($menus as $menu):?>
    <li class="menu1"><a href="<?php echo (count($menu['menus']) > 0 ? 'javascript:void(0)':$menu['link']);?>">
        <div><!-- 標題名稱 --><?php echo $menu['name'];?></div>
        <span><!-- 附加欄位的addTitle --><?php echo $menu['extra_fields']['addTitle'];?></span></a>
        <?php if (count($menu['menus']) > 0 ):?>
        <ul>
            <?php foreach ($menu['menus'] as $menuC):?>
            <li>
                <a href="<?php echo $menuC['link'];?>">
                    <div><!-- 標題名稱 --><?php echo $menuC['name'];?></div>
                </a>
            </li>
            <?php endforeach;?>
        </ul>
        <?php endif;?>
    </li>
<?php endforeach; ?>
</ul>
<script language="Javascript">
jQuery(document).ready(function($) {
    // Dropdown Menu
    if ($().superfish )
    {
        var goHtml = '';
        goHtml += '<div class="container clearfix">';
        goHtml += '<div class="sticky-logo">';
        goHtml += $("#logo").html();
        goHtml += '</div>';
        goHtml += '<div class="sticky-menu-wrap"><div><div class="container clearfix"><ul>';
        goHtml += $("#main-menu").html();
        goHtml += '</ul></div></div></div></div>';

        
        $("#sticky-menu").html(goHtml);
        $("#primary-menu ul, .sticky-menu-wrap ul").superfish({ 
            delay: 250,
            speed: 300,
            animation: {opacity:'show', height:'show'},
            autoArrows: false,
            dropShadows: false
        });
    }
});
</script>