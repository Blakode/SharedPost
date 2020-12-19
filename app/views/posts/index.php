<?php require APPROOT.'/views/inc/header.php'; ?>


   <?php flash('post_message'); ?>

   <div class="row mb-3">
   		<div class="col-md-6">
   			<h2>Posts</h2>
   		</div>

   		<div class="col-md-6">
   			<a href="<?php echo URLROOT; ?>/posts/add" class="btn btn-primary pull-right">
   			<i class="fa fa-pencil"></i>Add Post
   			</a>
   		</div>
   </div>

<?php foreach($data['post'] as $post): ?>
	<div class="card card-body mb-3">
	<h4 class="card-title"> <?php echo $post->title; ?></h4>

	<div class="bg-light p-2 mb-3">
		Written By: <?php echo $post->name; ?> on <?php echo $post->postCreated; ?>
	</div>
	<p class="card-text"><?php echo $post->body; ?></p>
	<a href="<?php echo URLROOT; ?>/posts/show/<?php echo $post->postID; ?>" class="btn btn-dark">Show More</a>
	</div>
<?php endforeach; ?>

<?php require APPROOT.'/views/inc/footer.php'; ?>
