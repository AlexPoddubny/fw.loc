<?php use fw\widgets\menu\Menu;
	
	if (!empty($posts)): ?>
		<div id="answer"></div>
		<button class="btn btn-default" id="send">Button</button>
		<br>
		<?php
			new Menu([
				'tpl' => APP . '/views/widgets/menu/menu_tpl/select.php',
				'class' => 'menu',
				'container' => 'select',
				'table' => 'categories',
				'cache' => 60
			]);
		?>
		<?php foreach ($posts as $post):?>
			<div class="panel panel-default">
				<div class="panel-heading"><?=$post['title']?></div>
				<div class="panel-body">
					<?=$post['text']?>
				</div>
			</div>
		<?php endforeach; ?>
		<div class="text-center">
			<p>Articles: <?=count($posts);?> from <?=$total;?></p>
			<?php if ($pagination->countPages > 1):?>
				<p><?=$pagination;?></p>
			<?php endif;?>
		</div>
	<?php endif; ?>
<script src="/js/test.js"></script>
<script>
	$(function(){
		$('#send').click(function () {
			$.ajax({
				url: '/main/test',
				type: 'post',
				data: {'id': 2},
				success: function (res) {
					// var data = JSON.parse(res);
					$('#answer').html(res);
					// console.log(res);
				},
				error: function () {
					console.log('error!');
				}
			});
		});
	});
</script>
