<?php
	/**
	 * 
	 */
	class Pages extends Controller{
		
		public function __construct()
		{
		}


		public function index()
		{

			if(isLoggedin()) {
			redirect('posts');
			}

			$data =["title" => 'SharedPost',
					"description" => "Simple social network built on the TraversyMVC PHP Framework" ];
			
			$this->views('pages/index', $data);
		}

		public function about()
		{
			$data = ["title" => 'About Us',
					"description" => "App to share post with other users"];
			
			$this->views('pages/about', $data);
		}



	}