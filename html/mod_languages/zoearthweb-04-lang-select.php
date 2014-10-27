<?php
defined('_JEXEC') or die;
require_once JPATH_SITE.'/components/com_users/helpers/route.php';
$aLangs = Z2HelperLang::getActiveLang();
?>
<script language="Javascript">
jQuery(document).ready(function() {
	jQuery("#langSwitchGo").html(jQuery("#langSwitch").html());
});
</script>
<div class="btn-group" id="langSwitch" style="display:none;">
	<button data-toggle="dropdown" class="btn btn-default dropdown-toggle" type="button"><?php echo $aLangs[Z2HelperLang::getNowLang()]['name']; ?> <span class="caret"></span></button>
	<ul role="menu" class="dropdown-menu">
	<?php foreach ($list as $language) : ?>
		<li><a href="<?php echo $language->link;?>"><?php echo $language->title_native;?></a></li>
	<?php endforeach; ?>
	</ul>
</div>