<?php
defined('_JEXEC') or die;
require_once(JPATH_SITE.DS.'components'.DS.'com_z2'.DS.'helpers'.DS.'errorPage.php');
Z2HelperErrorPage::show($this->error);
?>
<!DOCTYPE html>
<html prefix="og: http://ogp.me/ns#" dir="ltr" lang="zh-TW">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title><?php echo $this->error->getCode()?></title>
    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/zoearthweb_03/css/style.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/zoearthweb_03/css/tipsy.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/zoearthweb_03/css/font-awesome.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/zoearthweb_03/css/prettyPhoto.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/zoearthweb_03/css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/zoearthweb_03/css/portfolio-item.css" type="text/css" />
<body class="stretched homepage">
    <div id="wrapper" class="clearfix">
        <div id="header"></div>
    </div>
    <div id="content" class="homepage">
        <div class="content-wrap">
        <div class="hero-unit">
            <h1><?php echo $this->error->getCode(); ?></h1>
			<p><?php echo htmlspecialchars($this->error->getMessage()); ?></p>
			<p>
				<?php if ($this->debug) :
					echo $this->renderBacktrace();
				endif; ?>
			</p>
        </div>
        </div>
    </div>
    <div id="copyrights" class="copyrights-dark">
    </div>
</body>
</html>