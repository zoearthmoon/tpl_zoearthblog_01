<?php
defined('_JEXEC') or die;
JHtml::_('formbehavior.chosen', 'select');
?>
<div id="z2Container" class="itemView rows container search<?php echo $this->pageclass_sfx; ?>">
<?php if ($this->params->get('show_page_heading', 1)) : ?>
<h1 class="page-title">
	<?php if ($this->escape($this->params->get('page_heading'))) :?>
		<?php echo $this->escape($this->params->get('page_heading')); ?>
	<?php else : ?>
		<?php echo $this->escape($this->params->get('page_title')); ?>
	<?php endif; ?>
</h1>
<?php endif; ?>

<form id="searchForm" action="<?php echo JRoute::_('index.php?option=com_search');?>" method="post" class="form-horizontal" role="form" >
    <div class="form-group">
        <label class="col-sm-2 control-label" ><?php echo JText::_('COM_SEARCH_SEARCH_KEYWORD'); ?></label>
        <div class="col-sm-4 input-group">
            <input type="text" name="searchword" placeholder="<?php echo JText::_('COM_SEARCH_SEARCH_KEYWORD'); ?>" id="search-searchword" maxlength="<?php echo $upper_limit; ?>" value="<?php echo $this->escape($this->origkeyword); ?>" class="inputbox" />
            <span class="input-group-btn">
                <button name="Search" onclick="this.form.submit()" class="btn hasTooltip" title="<?php echo JHtml::tooltipText('COM_SEARCH_SEARCH');?>"><i class="glyphicon glyphicon-search"></i></button>
            </span>
        </div>
    </div>
    <input type="hidden" name="task" value="search" />

    <div class="form-group">
        <label class="col-sm-2 control-label"></label>
        <div class="col-sm-4">
        <?php if (!empty($this->searchword)):?>
        <p><?php echo JText::plural('COM_SEARCH_SEARCH_KEYWORD_N_RESULTS', '<b class="label label-success">'. $this->total. '</b>');?></p>
        <?php endif;?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label"><?php echo JText::_('COM_SEARCH_ORDERING');?></label>
        <div class="col-sm-4">
        <?php echo $this->lists['ordering'];?>
        </div>
    </div>

    <input type="hidden" id="area-z2" value="z2" name="areas[]">

    <?php if ($this->total > 0) : ?>
    <div class="form-group">
        <label class="col-sm-2 control-label" ><?php echo JText::_('JGLOBAL_DISPLAY_NUM'); ?></label>
        <div class="col-sm-4">
            <?php echo $this->pagination->getLimitBox(); ?>
        </div>
        <div class="col-sm-4">
            <?php echo $this->pagination->getPagesCounter(); ?>
        </div>
    </div>
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