<?php
defined('_JEXEC') or die;
JHtml::_('formbehavior.chosen', 'select');
?>
<div class="search<?php echo $this->pageclass_sfx; ?>">
<?php if ($this->params->get('show_page_heading', 1)) : ?>
<h1 class="page-title">
	<?php if ($this->escape($this->params->get('page_heading'))) :?>
		<?php echo $this->escape($this->params->get('page_heading')); ?>
	<?php else : ?>
		<?php echo $this->escape($this->params->get('page_title')); ?>
	<?php endif; ?>
</h1>
<?php endif; ?>


<form id="searchForm" action="<?php echo JRoute::_('index.php?option=com_search');?>" method="post">
    <div class="btn-toolbar">
        <div class="btn-group pull-left">
			<input type="text" name="searchword" placeholder="<?php echo JText::_('COM_SEARCH_SEARCH_KEYWORD'); ?>" id="search-searchword" size="30" maxlength="<?php echo $upper_limit; ?>" value="<?php echo $this->escape($this->origkeyword); ?>" class="inputbox" />
		</div>
		<div class="btn-group pull-left">
			<button name="Search" onclick="this.form.submit()" class="btn hasTooltip" title="<?php echo JHtml::tooltipText('COM_SEARCH_SEARCH');?>"><i class="icon-search"></i></button>
		</div>
		<input type="hidden" name="task" value="search" />
		<div class="clearfix"></div>
	</div>

	<div class="searchintro<?php echo $this->params->get('pageclass_sfx'); ?>">
		<?php if (!empty($this->searchword)):?>
		<p><?php echo JText::plural('COM_SEARCH_SEARCH_KEYWORD_N_RESULTS', '<span class="badge badge-info">'. $this->total. '</span>');?></p>
		<?php endif;?>
	</div>

	<fieldset class="phrases">
			<input type="hidden" value="all" id="searchphraseall" name="searchphrase">
			<div class="ordering-box">
			<label for="ordering" class="ordering">
				<?php echo JText::_('COM_SEARCH_ORDERING');?>
			</label>
			<?php echo $this->lists['ordering'];?>
			</div>
	</fieldset>
    <input type="hidden" id="area-z2" value="z2" name="areas[]">

    <?php if ($this->total > 0) : ?>
	<div class="form-limit">
		<label for="limit">
			<?php echo JText::_('JGLOBAL_DISPLAY_NUM'); ?>
		</label>
		<?php echo $this->pagination->getLimitBox(); ?>
	</div>
    <p class="counter">
		<?php echo $this->pagination->getPagesCounter(); ?>
	</p>
    <?php endif; ?>

</form>
<?php if ($this->error) : ?>
<div class="error">
    <?php echo $this->escape($this->error); ?>
</div>
<?php endif; ?>

<?php if ($this->error == null && count($this->results) > 0) :?>




<div class="search-results<?php echo $this->pageclass_sfx; ?> row">
<?php foreach ($this->results as $result) : ?>
    <blockquote>
        <p>
            <?php echo $this->pagination->limitstart + $result->count.'. ';?>
            <?php if ($result->href) :?>
                <a href="<?php echo JRoute::_($result->href); ?>"<?php if ($result->browsernav == 1) :?> target="_blank"<?php endif;?>>
                    <?php echo $this->escape($result->title);?>
                </a>
            <?php else:?>
                <?php echo $this->escape($result->title);?>
            <?php endif; ?>
        </p>
        <small>
        <?php echo $result->text; ?>
        <?php if ($this->params->get('show_date')) : ?>
            <dd class="result-created<?php echo $this->pageclass_sfx; ?>">
                (<?php echo JText::sprintf('JGLOBAL_CREATED_DATE_ON', $result->created); ?>)
            </dd>
        <?php endif; ?>
        </small>
    </blockquote>
<?php endforeach; ?>
</div>

<div class="pagination">
	<?php echo $this->pagination->getPagesLinks(); ?>
</div>





<?php endif; ?>
</div>