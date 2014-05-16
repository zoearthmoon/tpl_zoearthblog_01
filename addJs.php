<?php
/**
 * @zoearth
 */
$doc = JFactory::getDocument();
$tmpUrl = JUri::base().'templates/'.$this->template.'/';
$doc->addStyleSheet($tmpUrl.'css/style.css','text/css');
$doc->addStyleSheet('http://fonts.googleapis.com/css?family=Droid+Serif:400,400italic|Open+Sans:400,300,600,700','text/css');
$doc->addStyleSheet($tmpUrl.'css/retina.css','text/css','only screen and (-webkit-min-device-pixel-ratio: 2)');
$doc->addStyleSheet($tmpUrl.'css/tipsy.css','text/css');
//$doc->addStyleSheet(JUri::base().'css/bootstrap.css','text/css');

$doc->addStyleSheet($tmpUrl.'css/font-awesome.css','text/css');
$doc->addStyleSheet($tmpUrl.'css/prettyPhoto.css','text/css');
$doc->addStyleSheet($tmpUrl.'css/bootstrap.css','text/css');
$doc->addStyleSheet($tmpUrl.'css/custom.css','text/css');

$doc->addScript($tmpUrl.'js/plugins.js');
$doc->addScript($tmpUrl.'js/custom.js');

?>