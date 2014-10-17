<?php
/**
 * @zoearth
 */
$doc = JFactory::getDocument();
$tmpUrl = JUri::base().'templates/'.$this->template.'/';
$doc->addStyleSheet('http://fonts.googleapis.com/css?family=Droid+Serif:400,400italic|Open+Sans:400,300,600,700','text/css');
$doc->addStyleSheet($tmpUrl.'bootstrap/css/bootstrap.min.css','text/css');
$doc->addStyleSheet($tmpUrl.'css/skel-noscript.css','text/css');
//$doc->addStyleSheet($tmpUrl.'css/style.css','text/css');

$doc->addScript($tmpUrl.'bootstrap/js/bootstrap.min.js');
$doc->addScript($tmpUrl.'js/jquery.poptrox.min.js');
$doc->addScript($tmpUrl.'js/skel.min.js');
$doc->addScript($tmpUrl.'js/init.js');

?>