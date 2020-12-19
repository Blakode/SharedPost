<?php

	/**
	 * This is the user model for the sharedpost
	 */
	class User
	{

		private $db;
		
		function __construct()
		{

		$this->db = new Database;
					
		}

		// register user
		public function register($data)
		{
		$this->db->query('INSERT INTO user (name, email, password) VALUES (:name,:email,:password)'); 
		//bind values
		$this->db->bind(':name', $data['name']);
		$this->db->bind(':email', $data['email']);
		$this->db->bind(':password', $data['password']);

		// execute query
		if($this->db->execute()){
			return true;
		}else{
			return false;
		}
}

	public function login($email, $password)		
	{
		$this->db->query('SELECT * FROM user WHERE email = :email');
		$this->db->bind(':email', $email);

		$row = $this->db->single();

		$hashed_password = $row->password;	
		if (password_verify($password, $hashed_password)) 
		{
			return $row;	
		}else{
			return false;
		}
	}

		// find user by email
		public function FindUserByEmail($email)
		{
		
		$this->db->query('SELECT * FROM user WHERE email = :email');
		//bind value
		$this->db->bind(':email', $email);

		$row = $this->db->single();

		//check row 
		if($this->db->rowCount() > 0){
				return true ;
			} else
			{
				return false;
			}
		}


		// find user by email
		public function getUserbyid($id)
		{
		
		$this->db->query('SELECT * FROM user WHERE id = :id');
		//bind value
		$this->db->bind(':id', $id);

		$row = $this->db->single();

		return $row ;
		}

	}

