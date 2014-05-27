<?php
/**
 * @zoearth
 */

defined('_JEXEC') or die;
?>
<!DOCTYPE html> 
<html dir="ltr" lang="<?php echo $lang->getTag();?>">
<head>
    <jdoc:include type="head" />
    <?php echo $favicon;?>
    <?php echo $this->params->get('gacode');?>
    <!--[if lte IE 8]><script src="<?php echo $tmpUrl;?>css/ie/html5shiv.js"></script><![endif]-->
    <!--[if lte IE 8]><link rel="stylesheet" href="<?php echo $tmpUrl;?>css/ie/v8.css" /><![endif]-->
</head>
<body>
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <jdoc:include type="modules" name="TOP-MENU" />
        </div>
    </nav>
    <jdoc:include type="modules" name="TOP-BANNER" />
    
    <div class="container main">
        <jdoc:include type="modules" name="BREADCRUME" />

        <jdoc:include type="message" />
        <jdoc:include type="component" />

    </div>
    
    <footer id="footer">
        <div class="actions hidden-xs">
            <jdoc:include type="modules" name="PAGE-BOTTOM-LEFT" />
        </div>
        <div class="menu text-right">
            <jdoc:include type="modules" name="PAGE-BOTTOM-RIGHT" />
        </div>
    </footer>
    <jdoc:include type="modules" name="debug" />
</body>
</html>