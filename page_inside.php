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
</head>
<body class="stretched">
    <div id="wrapper" class="clearfix">
        <div id="sticky-menu" class="clearfix"></div>
        <div id="header" class="header2">
            <div class="container clearfix">
                <div id="logo">
                    <jdoc:include type="modules" name="TOP-LOGO" />
                </div>
                <jdoc:include type="modules" name="TOP-RIGHT" />
            </div>
            <div id="primary-menu">
                <div class="container clearfix">
                    <jdoc:include type="modules" name="TOP-MENU" />
                </div>
            </div>
        </div>
        <div id="content" class="page-about">
            <div id="page-title">
                <jdoc:include type="modules" name="TOP-BANNER" />
            </div>
            <div class="content-wrap">
                <div class="container clearfix">
                    <div class="breadcrumb">
                        <jdoc:include type="modules" name="BREADCRUME" />
                    </div>
                    <div class="span3 sidebar">
                        <jdoc:include type="modules" name="MAIN-LEFT" />
                    </div>
                    <div class="span6 postcontent">
                        <div class="port-desc clearfix">
                            <jdoc:include type="message" />
                            <jdoc:include type="component" />
                        </div>
                    </div>
                    <div class="span3 sidebar fright">
                        <jdoc:include type="modules" name="MAIN-RIGHT" />
                    </div>
                </div>
            </div>
        </div>
        <div id="copyrights" class="copyrights-dark">
            <div class="container clearfix">
                <div class="col_half">
                    <jdoc:include type="modules" name="PAGE-BOTTOM-CENTER" />
                </div>
                <div class="col_half col_last tright">
                    <jdoc:include type="modules" name="PAGE-BOTTOM-RIGHT" />
                </div>
            </div>
        </div>
    </div>
    <div id="gotoTop" class="icon-angle-up"></div>
    <jdoc:include type="modules" name="debug" />
</body>
</html>