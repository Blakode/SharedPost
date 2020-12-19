<?php require APPROOT.'/views/inc/header.php'; ?>

	<a href="<?php echo URLROOT?>/posts" class="btn btn-light"><i class="fa fa-backward"></i>Back</a>

	<h2><?php echo $data['post']->title; ?></h2>

	<div class="bg-secondary text-white p-2 mb-3">
		<p>Written By: </p><?php echo $data['user']->name; ?> on <?php echo $data['post']->created_at; ?>
	</div>

	<p><?php echo $data['post']->body; ?></p>
	<hr>
	<?php if ($data['post']->user_id == $_SESSION['user_id']): ?>
		<a href="<?php echo URLROOT;?>/posts/edit/<?php echo $data['post']->id;?>" class="btn btn-dark">Edit</a>

		<form class="pull-right" action="<?php echo URLROOT;?>/posts/delete/<?php echo $data['post']->id;?>" method="post">
			<input class="btn btn-danger" type="submit" value="delete" name="Submit">
		</form>
	<?php endif; ?>
<?php require APPROOT.'/views/inc/footer.php'; ?>