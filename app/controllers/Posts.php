<?php

/** 
 * 
 */
class Posts extends Controller
{
	
	
	function __construct()
	{
		if (!isLoggedin()) {
			redirect('/users/login');
		}

		$this->postModel = $this->model('Post');
		$this->userModel = $this->model('User');

	}


	public function index()
	{
		//get posts
		$post = $this->postModel->getPost();

		$data = [
			'post' => $post
		];


		$this->views('posts/index', $data);
	}


	public function add()
	{
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		// sanitize post array
		$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

			$data = [

			'title' => trim($_POST['title']),
			'body' => trim($_POST['body']),
			'user_id' => $_SESSION['user_id'],
			'title_err' => '',
			'body_err' => ''

		];

		// validate data
		if (empty($data['title'])) {
			
			$data['title_err'] = 'Please enter the title';
		}

		if (empty($data['body'])) {
		$data['body_err'] = 'Please enter the body text';
		}

		// validate the error is empty 
		if (empty($data['title_err']) && empty($data['body_err'])) {
			// validated 

			if ($this->postModel->addPost($data)) {
				flash('post_message', 'Post Added');
				redirect('posts');		
			} else {
				die("Something Went wrong");
			}
			


					} else {

			// load the views with error
			$this->views('posts/add', $data);
		}

	}else{


	$data = [

			'title' => '',
			'body' => ''
		];

		$this->views('posts/add', $data);

	}


	}


	// edit function...
	public function edit($id)
	{
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		// sanitize post array
		$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

			$data = [
			'id' => $id,
			'title' => trim($_POST['title']),
			'body' => trim($_POST['body']),
			'user_id' => $_SESSION['user_id'],
			'title_err' => '',
			'body_err' => ''

		];

		// validate data
		if (empty($data['title'])) {
			
			$data['title_err'] = 'Please enter the title';
		}

		if (empty($data['body'])) {
		$data['body_err'] = 'Please enter the body text';
		}

		// validate the error is empty 
		if (empty($data['title_err']) && empty($data['body_err'])) {
			// validated 

			if ($this->postModel->updatePost($data)) {
				flash('post_message', 'Post Updated');
				redirect('posts');		
			} else {

				die("Something Went wrong");
			}
			


		} else {

			// load the views with error
			$this->views('posts/edit', $data);
		}

	}else{
		//get existing post model
		$post = $this->postModel->getPostbyid($id);

		//check for the user
		if ($post->user_id !== $_SESSION['user_id']) {
			redirect('post');
		}


	$data = [

			'id' => $id,
			'title' => $post->title,
			'body' => $post->body
		];

		$this->views('posts/edit', $data);

	}


	}


	public function show($id)
	{

		$post = $this->postModel->getPostbyid($id);
		$user = $this->userModel->getUserbyid($id);

		$data = [

			'post' => $post,
			'user' => $user 
		];


		$this->views('posts/show', $data);
	}

	public function Delete($id)
	{

			if ($_SERVER['REQUEST_METHOD']) {
							//get existing post model
			$post = $this->postModel->getPostbyid($id);

			//check for the user
			if ($post->user_id !== $_SESSION['user_id']) {
				redirect('post');
			}
			
			if ($this->postModel->deletePost($id)) {
				flash('post_message', 'Post removed');
				redirect('post');
			} else{ die("Something Went WRONG !!!"); }

		}else{

			redirect('post');
		}
	}

}