<?php
defined('_JEXEC') or die;
$tmpUrl = JUri::base().'templates/zoearthblog_01/';
?>
<?php $i=0;?>
<?php foreach ($menus as $k=>$menu):?>
    <?php $i++;?>
    <?php if ($i == 1):?>
        <?php
        $randPic = array();
        foreach ($menu['addPics'] as $pic)
        {
            $randPic[] = $pic->pic;
        }
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
                    <a href="#key<?php echo ($i+1)?>" class="button style2 down">More</a>
                </footer>
            </div>
        </section>
    <?php elseif ($k == 3):?>
        <section id="key<?php echo $i-1?>" class="main style3 primary fullscreen workSection">
            <div class="content container">
                <header>
                    <h2><?php echo $menu['name'];?></h2>
                    <?php echo $menu['description'];?>
                </header>
                <div class="container small gallery">
                    <?php if (count($menu['menus']) > 0 ):?>
                    <?php for ($k=0;$k<=count($menu['menus']);$k=$k+2):?>
						<?php if (isset($menu['menus'][$k]['image'])):?>
						<div class="row flush images">
							<div class="6u">
								<a href="<?php echo Z2HelperImage::_($menu['menus'][$k]['image']) ?>" class="image full l">
									<img src="<?php echo Z2HelperImage::_($menu['menus'][$k]['image'],440,276)?>" title="<?php echo $menu['menus'][$k]['name']?>" />
								</a>
							</div>
							<?php if (isset($menu['menus'][$k+1]['image'])):?>
							<div class="6u">
								<a href="<?php echo Z2HelperImage::_($menu['menus'][$k+1]['image'])?>" class="image full r">
									<img src="<?php echo Z2HelperImage::_($menu['menus'][$k+1]['image'],440,276)?>" title="<?php echo $menu['menus'][$k+1]['name']?>" />
								</a>
							</div>
							<?php endif;?>
						</div>
						<?php endif;?>
                    <?php endfor;?>
                    <?php endif;?>
                </div>
            </div>
        </section>
    <?php elseif (count($menu['menus']) > 0 ):?>
        <?php
        $randKeys = array_rand($randPic,count($menu['menus']));
        ?>
        <?php foreach ($menu['menus'] as $p=>$menuC):?>
        <?php
        if ($menuC['image'])
        {
            $goImg = $menuC['image'];
        }
        else
        {
            $goImg = Juri::base().Z2HelperImage::_($randPic[$randKeys[$p]],800,800);
        }
        ?>
        <style type="text/css">
        #key<?php echo $i?> {
            background: url("<?php echo $tmpUrl?>css/images/overlay.png") repeat fixed left top / 256px 256px, url("<?php echo $goImg?>") repeat fixed center center / cover rgba(0, 0, 0, 0);
        }
        </style>
        <section id="key<?php echo $i?>" class="main style2 <?php echo (($i % 2) == 0 ? 'right':'left')?> dark fullscreen">
            <div class="content box style2">
                
                <header>
                    <h2><?php echo $menuC['name'];?></h2>
                </header>
                
                <?php 
                $goStr = substr(strip_tags($menuC['description']),0,350);
                echo mb_substr($goStr,0,mb_strlen($goStr,'UTF-8')-1,'UTF-8').'...';
                ?>
                <a type="button" class="btn btn-info" href="<?php echo $menuC['link'];?>">More</a>
                
            </div>
            <a href="#key<?php echo ($i+1)?>" class="button style2 down anchored">Next</a>
        </section>
        <?php $i++;?>
        <?php endforeach;?>
    <?php endif;?>
<?php endforeach; ?>