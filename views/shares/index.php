<?php echo 'views/shares/index.php <br />'; ?>
<div>
	<?php if(isset($_SESSION['is_logged_in'])) : ?>
	<a href="<?php echo ROOT_URL;?>shares/add">Share Something?</a>
	<?php endif; ?>
	<?foreach ((array)$viewmodel as $item) : ?>	
		<br /><br /><br />
		<div class="well">
			<h3><?php echo $item['title'];?></h3>
			<small><?php echo $item['create_date'] ?></small>
			<hr />
			<p><?php echo $item['body']; ?></p>
			<a class="btn btn-default" href="<?php echo $item['link'];?>" target="_blank">Go to website</a>			
		</div>
	<?php endforeach;?>
</div>