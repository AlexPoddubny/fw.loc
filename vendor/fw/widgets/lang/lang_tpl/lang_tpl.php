<select name="lang" id="lang">
	<option value="<?=$this->lang['code'];?>"><?=$this->lang['title'];?></option>
	<?php foreach ($this->langs as $k => $v):?>
		<?php if ($this->lang['code'] != $k):?>
			<option value="<?=$k;?>"><?=$v['title'];?></option>
		<?php endif;?>
	<?php endforeach;?>
</select>