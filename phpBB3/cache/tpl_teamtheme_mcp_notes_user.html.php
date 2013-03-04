<?php if (!defined('IN_PHPBB')) exit; $this->_tpl_include('mcp_header.html'); ?>


<form method="post" id="mcp" action="<?php echo (isset($this->_rootref['U_POST_ACTION'])) ? $this->_rootref['U_POST_ACTION'] : ''; ?>">

<h2><?php echo ((isset($this->_rootref['L_TITLE'])) ? $this->_rootref['L_TITLE'] : ((isset($user->lang['TITLE'])) ? $user->lang['TITLE'] : '{ TITLE }')); ?></h2>

<div class="panel">
	<div class="inner"><span class="corners-top"><span></span></span>

	<h3><?php echo (isset($this->_rootref['USERNAME_FULL'])) ? $this->_rootref['USERNAME_FULL'] : ''; ?></h3>

	<div>
		<div class="column1">
			<?php if ($this->_rootref['AVATAR_IMG']) {  ?><div><?php echo (isset($this->_rootref['AVATAR_IMG'])) ? $this->_rootref['AVATAR_IMG'] : ''; ?></div><?php } ?>

		</div>

		<div class="column2">
			<dl class="details">
				<?php if ($this->_rootref['RANK_TITLE']) {  ?><dt><?php echo ((isset($this->_rootref['L_RANK'])) ? $this->_rootref['L_RANK'] : ((isset($user->lang['RANK'])) ? $user->lang['RANK'] : '{ RANK }')); ?>:</dt><dd><?php echo (isset($this->_rootref['RANK_TITLE'])) ? $this->_rootref['RANK_TITLE'] : ''; ?></dd><?php } if ($this->_rootref['RANK_IMG']) {  ?><dt><?php if ($this->_rootref['RANK_TITLE']) {  ?>&nbsp;<?php } else { echo ((isset($this->_rootref['L_RANK'])) ? $this->_rootref['L_RANK'] : ((isset($user->lang['RANK'])) ? $user->lang['RANK'] : '{ RANK }')); ?>:<?php } ?></dt><dd><?php echo (isset($this->_rootref['RANK_IMG'])) ? $this->_rootref['RANK_IMG'] : ''; ?></dd><?php } ?>

				<dt><?php echo ((isset($this->_rootref['L_JOINED'])) ? $this->_rootref['L_JOINED'] : ((isset($user->lang['JOINED'])) ? $user->lang['JOINED'] : '{ JOINED }')); ?>:</dt><dd><?php echo (isset($this->_rootref['JOINED'])) ? $this->_rootref['JOINED'] : ''; ?></dd>
				<dt><?php echo ((isset($this->_rootref['L_TOTAL_POSTS'])) ? $this->_rootref['L_TOTAL_POSTS'] : ((isset($user->lang['TOTAL_POSTS'])) ? $user->lang['TOTAL_POSTS'] : '{ TOTAL_POSTS }')); ?>:</dt><dd><?php echo (isset($this->_rootref['POSTS'])) ? $this->_rootref['POSTS'] : ''; ?></dd>
				<dt><?php echo ((isset($this->_rootref['L_WARNINGS'])) ? $this->_rootref['L_WARNINGS'] : ((isset($user->lang['WARNINGS'])) ? $user->lang['WARNINGS'] : '{ WARNINGS }')); ?>: </dt><dd><?php echo (isset($this->_rootref['WARNINGS'])) ? $this->_rootref['WARNINGS'] : ''; ?></dd>
			</dl>
		</div>
	</div>

	<span class="corners-bottom"><span></span></span></div>
</div>

<div class="panel">
	<div class="inner"><span class="corners-top"><span></span></span>

	<h3><?php echo ((isset($this->_rootref['L_ADD_FEEDBACK'])) ? $this->_rootref['L_ADD_FEEDBACK'] : ((isset($user->lang['ADD_FEEDBACK'])) ? $user->lang['ADD_FEEDBACK'] : '{ ADD_FEEDBACK }')); ?></h3>
	<p><?php echo ((isset($this->_rootref['L_ADD_FEEDBACK_EXPLAIN'])) ? $this->_rootref['L_ADD_FEEDBACK_EXPLAIN'] : ((isset($user->lang['ADD_FEEDBACK_EXPLAIN'])) ? $user->lang['ADD_FEEDBACK_EXPLAIN'] : '{ ADD_FEEDBACK_EXPLAIN }')); ?></p>

	<fieldset>
		<textarea name="usernote" id="usernote" class="inputbox" cols="40" rows="3"></textarea>
	</fieldset>

	<span class="corners-bottom"><span></span></span></div>
</div>

<fieldset class="submit-buttons">
	<?php echo (isset($this->_rootref['S_HIDDEN_FIELDS'])) ? $this->_rootref['S_HIDDEN_FIELDS'] : ''; ?><input type="reset" value="<?php echo ((isset($this->_rootref['L_RESET'])) ? $this->_rootref['L_RESET'] : ((isset($user->lang['RESET'])) ? $user->lang['RESET'] : '{ RESET }')); ?>" name="reset" class="button2" />&nbsp;
	<input type="submit" name="action[add_feedback]" value="<?php echo ((isset($this->_rootref['L_SUBMIT'])) ? $this->_rootref['L_SUBMIT'] : ((isset($user->lang['SUBMIT'])) ? $user->lang['SUBMIT'] : '{ SUBMIT }')); ?>" class="button1" />
	<?php echo (isset($this->_rootref['S_FORM_TOKEN'])) ? $this->_rootref['S_FORM_TOKEN'] : ''; ?>

</fieldset>

<div class="panel">
	<div class="inner"><span class="corners-top"><span></span></span>

	<ul class="linklist">
		<li class="leftside">
			<?php echo ((isset($this->_rootref['L_SEARCH_KEYWORDS'])) ? $this->_rootref['L_SEARCH_KEYWORDS'] : ((isset($user->lang['SEARCH_KEYWORDS'])) ? $user->lang['SEARCH_KEYWORDS'] : '{ SEARCH_KEYWORDS }')); ?>: <input type="text" class="inputbox autowidth" name="keywords" value="<?php echo (isset($this->_rootref['S_KEYWORDS'])) ? $this->_rootref['S_KEYWORDS'] : ''; ?>" />&nbsp;<input type="submit" class="button2" name="filter" value="<?php echo ((isset($this->_rootref['L_SEARCH'])) ? $this->_rootref['L_SEARCH'] : ((isset($user->lang['SEARCH'])) ? $user->lang['SEARCH'] : '{ SEARCH }')); ?>" />
		</li>
		<li class="rightside pagination">
			<?php if ($this->_rootref['TOTAL_REPORTS']) {  echo (isset($this->_rootref['TOTAL_REPORTS'])) ? $this->_rootref['TOTAL_REPORTS'] : ''; ?> <?php } if ($this->_rootref['PAGE_NUMBER']) {  if ($this->_rootref['PAGINATION']) {  ?> &bull; <a href="#" onclick="jumpto(); return false;" title="<?php echo ((isset($this->_rootref['L_JUMP_TO_PAGE'])) ? $this->_rootref['L_JUMP_TO_PAGE'] : ((isset($user->lang['JUMP_TO_PAGE'])) ? $user->lang['JUMP_TO_PAGE'] : '{ JUMP_TO_PAGE }')); ?>"><?php echo (isset($this->_rootref['PAGE_NUMBER'])) ? $this->_rootref['PAGE_NUMBER'] : ''; ?></a> &bull; <span><?php echo (isset($this->_rootref['PAGINATION'])) ? $this->_rootref['PAGINATION'] : ''; ?></span><?php } else { ?> &bull; <?php echo (isset($this->_rootref['PAGE_NUMBER'])) ? $this->_rootref['PAGE_NUMBER'] : ''; } } ?>

		</li>
	</ul>

	<table cellspacing="1" class="table1">
	<thead>
	<tr>
		<th><?php echo ((isset($this->_rootref['L_REPORT_BY'])) ? $this->_rootref['L_REPORT_BY'] : ((isset($user->lang['REPORT_BY'])) ? $user->lang['REPORT_BY'] : '{ REPORT_BY }')); ?></th>
		<th style="text-align: center"><?php echo ((isset($this->_rootref['L_IP'])) ? $this->_rootref['L_IP'] : ((isset($user->lang['IP'])) ? $user->lang['IP'] : '{ IP }')); ?></th>
		<th style="text-align: center"><?php echo ((isset($this->_rootref['L_TIME'])) ? $this->_rootref['L_TIME'] : ((isset($user->lang['TIME'])) ? $user->lang['TIME'] : '{ TIME }')); ?></th>
		<th><?php echo ((isset($this->_rootref['L_ACTION_NOTE'])) ? $this->_rootref['L_ACTION_NOTE'] : ((isset($user->lang['ACTION_NOTE'])) ? $user->lang['ACTION_NOTE'] : '{ ACTION_NOTE }')); ?></th>
		<?php if ($this->_rootref['S_CLEAR_ALLOWED']) {  ?><th><?php echo ((isset($this->_rootref['L_MARK'])) ? $this->_rootref['L_MARK'] : ((isset($user->lang['MARK'])) ? $user->lang['MARK'] : '{ MARK }')); ?></th><?php } ?>

	</tr>
	</thead>
	<tbody>
	<?php $_usernotes_count = (isset($this->_tpldata['usernotes'])) ? sizeof($this->_tpldata['usernotes']) : 0;if ($_usernotes_count) {for ($_usernotes_i = 0; $_usernotes_i < $_usernotes_count; ++$_usernotes_i){$_usernotes_val = &$this->_tpldata['usernotes'][$_usernotes_i]; if (!($_usernotes_val['S_ROW_COUNT'] & 1)  ) {  ?><tr class="bg1"><?php } else { ?><tr class="bg2"><?php } ?>

		<td><?php echo $_usernotes_val['REPORT_BY']; ?></td>
		<td style="text-align: center"><?php echo $_usernotes_val['IP']; ?></td>
		<td style="text-align: center"><?php echo $_usernotes_val['REPORT_AT']; ?></td>
		<td><?php echo $_usernotes_val['ACTION']; ?></td>

		<?php if ($this->_rootref['S_CLEAR_ALLOWED']) {  ?><td style="width: 5%; text-align: center;"><input type="checkbox" name="marknote[]" id="note-<?php echo $_usernotes_val['ID']; ?>" value="<?php echo $_usernotes_val['ID']; ?>" /></td><?php } ?>

	</tr>
	<?php }} else { ?>

	<tr>
		<td class="bg1" colspan="<?php if ($this->_rootref['S_CLEAR_ALLOWED']) {  ?>5<?php } else { ?>4<?php } ?>" align="center"><span class="gen"><?php echo ((isset($this->_rootref['L_NO_ENTRIES'])) ? $this->_rootref['L_NO_ENTRIES'] : ((isset($user->lang['NO_ENTRIES'])) ? $user->lang['NO_ENTRIES'] : '{ NO_ENTRIES }')); ?></span></td>
	</tr>
	<?php } ?>

	</tbody>
	</table>

	<hr />

	<fieldset class="display-options">
		<?php if ($this->_rootref['NEXT_PAGE']) {  ?><a href="<?php echo (isset($this->_rootref['NEXT_PAGE'])) ? $this->_rootref['NEXT_PAGE'] : ''; ?>" class="right-box <?php echo (isset($this->_rootref['S_CONTENT_FLOW_END'])) ? $this->_rootref['S_CONTENT_FLOW_END'] : ''; ?>"><?php echo ((isset($this->_rootref['L_NEXT'])) ? $this->_rootref['L_NEXT'] : ((isset($user->lang['NEXT'])) ? $user->lang['NEXT'] : '{ NEXT }')); ?></a><?php } if ($this->_rootref['PREVIOUS_PAGE']) {  ?><a href="<?php echo (isset($this->_rootref['PREVIOUS_PAGE'])) ? $this->_rootref['PREVIOUS_PAGE'] : ''; ?>" class="left-box <?php echo (isset($this->_rootref['S_CONTENT_FLOW_BEGIN'])) ? $this->_rootref['S_CONTENT_FLOW_BEGIN'] : ''; ?>"><?php echo ((isset($this->_rootref['L_PREVIOUS'])) ? $this->_rootref['L_PREVIOUS'] : ((isset($user->lang['PREVIOUS'])) ? $user->lang['PREVIOUS'] : '{ PREVIOUS }')); ?></a><?php } ?>

		<label><?php echo ((isset($this->_rootref['L_DISPLAY_LOG'])) ? $this->_rootref['L_DISPLAY_LOG'] : ((isset($user->lang['DISPLAY_LOG'])) ? $user->lang['DISPLAY_LOG'] : '{ DISPLAY_LOG }')); ?>: <?php echo (isset($this->_rootref['S_SELECT_SORT_DAYS'])) ? $this->_rootref['S_SELECT_SORT_DAYS'] : ''; ?></label>
		<label><?php echo ((isset($this->_rootref['L_SORT_BY'])) ? $this->_rootref['L_SORT_BY'] : ((isset($user->lang['SORT_BY'])) ? $user->lang['SORT_BY'] : '{ SORT_BY }')); ?> <?php echo (isset($this->_rootref['S_SELECT_SORT_KEY'])) ? $this->_rootref['S_SELECT_SORT_KEY'] : ''; ?></label><label><?php echo (isset($this->_rootref['S_SELECT_SORT_DIR'])) ? $this->_rootref['S_SELECT_SORT_DIR'] : ''; ?></label>
		<input type="submit" name="sort" value="<?php echo ((isset($this->_rootref['L_GO'])) ? $this->_rootref['L_GO'] : ((isset($user->lang['GO'])) ? $user->lang['GO'] : '{ GO }')); ?>" class="button2" />
	</fieldset>

	<hr />

	<ul class="linklist">
		<li class="rightside pagination">
			<?php if ($this->_rootref['TOTAL_REPORTS']) {  echo (isset($this->_rootref['TOTAL_REPORTS'])) ? $this->_rootref['TOTAL_REPORTS'] : ''; } if ($this->_rootref['PAGE_NUMBER']) {  if ($this->_rootref['PAGINATION']) {  ?> &bull; <a href="#" onclick="jumpto(); return false;" title="<?php echo ((isset($this->_rootref['L_JUMP_TO_PAGE'])) ? $this->_rootref['L_JUMP_TO_PAGE'] : ((isset($user->lang['JUMP_TO_PAGE'])) ? $user->lang['JUMP_TO_PAGE'] : '{ JUMP_TO_PAGE }')); ?>"><?php echo (isset($this->_rootref['PAGE_NUMBER'])) ? $this->_rootref['PAGE_NUMBER'] : ''; ?></a> &bull; <span><?php echo (isset($this->_rootref['PAGINATION'])) ? $this->_rootref['PAGINATION'] : ''; ?></span><?php } else { ?> &bull; <?php echo (isset($this->_rootref['PAGE_NUMBER'])) ? $this->_rootref['PAGE_NUMBER'] : ''; } } ?>

		</li>
	</ul>

	<span class="corners-bottom"><span></span></span></div>
</div>

<?php if ($this->_rootref['S_CLEAR_ALLOWED']) {  ?>

<fieldset class="display-actions">
	<input class="button2" type="submit" name="action[del_all]" value="<?php echo ((isset($this->_rootref['L_DELETE_ALL'])) ? $this->_rootref['L_DELETE_ALL'] : ((isset($user->lang['DELETE_ALL'])) ? $user->lang['DELETE_ALL'] : '{ DELETE_ALL }')); ?>" />
	&nbsp;<input class="button1" type="submit" name="action[del_marked]" value="<?php echo ((isset($this->_rootref['L_DELETE_MARKED'])) ? $this->_rootref['L_DELETE_MARKED'] : ((isset($user->lang['DELETE_MARKED'])) ? $user->lang['DELETE_MARKED'] : '{ DELETE_MARKED }')); ?>" />
</fieldset>

<fieldset class="display-actions">
	<div><a href="#" onclick="marklist('mcp', 'marknote', true); return false;"><?php echo ((isset($this->_rootref['L_MARK_ALL'])) ? $this->_rootref['L_MARK_ALL'] : ((isset($user->lang['MARK_ALL'])) ? $user->lang['MARK_ALL'] : '{ MARK_ALL }')); ?></a> &bull; <a href="#" onclick="marklist('mcp', 'marknote', false); return false;"><?php echo ((isset($this->_rootref['L_UNMARK_ALL'])) ? $this->_rootref['L_UNMARK_ALL'] : ((isset($user->lang['UNMARK_ALL'])) ? $user->lang['UNMARK_ALL'] : '{ UNMARK_ALL }')); ?></a></div>
</fieldset>
<?php } ?>

</form>

<?php $this->_tpl_include('mcp_footer.html'); ?>