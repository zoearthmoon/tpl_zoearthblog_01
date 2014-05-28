<?php
defined('_JEXEC') or die;
?>
<?php $i=0;?>
<?php foreach ($menus as $menu):?>
    <?php $i++;?>
    <?php if ($i == 1):?>
        <section id="intro" class="main style1 dark fullscreen">
            <div class="content container small">
                <header>
                    <h2><?php echo $menu['name'];?></h2>
                </header>
                <?php echo $menu['description'];?>
                <footer>
                    <a href="#key<?php echo ($i+1)?>" class="button style2 down">More</a>
                </footer>
            </div>
        </section>
    <?php elseif ($i == count($menus)):?>
        <section id="key<?php echo $i?>" class="main style3 primary fullscreen">
            <div class="content container">
                <header>
                    <h2><?php echo $menu['name'];?></h2>
                    <?php echo $menu['description'];?>
                </header>
                <div class="container small gallery">
                    <?php if (count($menu['menus']) > 0 ):?>
                    <?php for ($k=0;$k<=count($menu['menus']);$k=$k+2):?>
                    <div class="row flush images">
                        <div class="6u">
                            <a href="<?php echo Z2HelperImage::_($menu['menus'][$k]['image'],256,257)?>" class="image full l">
                                <img src="<?php echo Z2HelperImage::_($menu['menus'][$k]['image'])?>" title="<?php echo $menu['menus'][$k]['name']?>" />
                            </a>
                        </div>
                        <?php if (isset($menu['menus'][$k+1]['image'])):?>
                        <div class="6u">
                            <a href="<?php echo Z2HelperImage::_($menu['menus'][$k+1]['image'],256,257)?>" class="image full r">
                                <img src="<?php echo Z2HelperImage::_($menu['menus'][$k+1]['image'])?>" title="<?php echo $menu['menus'][$k+1]['name']?>" />
                            </a>
                        </div>
                        <?php endif;?>
                    </div>
                    <?php endfor;?>
                    <?php endif;?>
                </div>
            </div>
        </section>
    <?php elseif (count($menu['menus']) > 0 ):?>
        <?php foreach ($menu['menus'] as $p=>$menuC):?>
        <?php $i = $i + $p;?>
        <section id="key<?php echo $i?>" class="main style2 <?php echo (($i % 2) == 0 ? 'right':'left')?> dark fullscreen">
            <div class="content box style2">
                <header>
                    <h2><?php echo $menuC['name'];?></h2>
                </header>
                <?php echo mb_substr(strip_tags($menuC['description']),0,30);?>...
            </div>
            <a href="#key<?php echo ($i+1)?>" class="button style2 down anchored">Next</a>
        </section>
        <?php endforeach;?>
    <?php endif;?>
<?php endforeach; ?>