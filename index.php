<?php
/**
 * @zoearth
 */

defined('_JEXEC') or die;
JLoader::import('joomla.filesystem.file');
//JHtml::_('bootstrap.framework');
require_once dirname(__FILE__).'/addJs.php';

$favicon = $this->params->get('favicon');
if (JFile::exists(JPATH_BASE.DS.$favicon))
{
    $favicon = '<link href="'.$favicon.'" rel="shortcut icon" type="image/vnd.microsoft.icon" />';
}
else
{
    $favicon = '<link href="'.$tmpUrl.'z2favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />';
}

//20140121 zoearth 取消 "/media/jui/js/chosen.jquery.min.js"
//這邊取消chosen這美化select的javascript因為會影響到手機板的功能
$document = JFactory::getDocument();
$headData = $document->getHeadData();

$scripts = $headData['scripts'];
unset($scripts['/media/jui/js/chosen.jquery.min.js']);
unset($scripts['/media/jui/js/bootstrap.min.js']);

unset($scripts['/media/system/js/modal.js']);//20140915 zoearth 取消mootools
unset($scripts['/media/system/js/mootools-core.js']);
unset($scripts['/media/system/js/mootools-more.js']);

$headData['scripts'] = $scripts;

$styleSheets = $headData['styleSheets'];
unset($styleSheets['/joomla3/media/system/css/modal.css']);
$headData['styleSheets'] = $styleSheets;

$headData['script']['text/javascript'] = str_replace("jQuery('select').chosen","jQuery('selectNone').chosen",$headData['script']['text/javascript']);
$headData['script']['text/javascript'] = str_replace("jQuery('selectNone').chosen","//jQuery('selectNone').chosen",$headData['script']['text/javascript']);

$headData['script']['text/javascript'] = str_replace("SqueezeBox.","return false;SqueezeBox.",$headData['script']['text/javascript']);

$document->setHeadData($headData);

$app = JFactory::getApplication();
$menu = $app->getMenu();
$lang = JFactory::getLanguage();

if ($menu->getActive() == $menu->getDefault($lang->getTag()))
{
    require_once dirname(__FILE__).'/page_index.php';
}
else
{
    require_once dirname(__FILE__).'/page_inside.php';
}
?>