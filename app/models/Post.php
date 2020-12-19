<?php

/**
 * 
 */
class Post
{
	

	private $db;
	
	function __construct()
	{
		$this->db = new Database;
	}


	public function getPost()
	{
		$this->db->query('SELECT *,
						post.id as postID,
						user.id as userID,
						post.created_at as postCreated,
						user.created_at as userCreated
						FROM post
						INNER JOIN user
						ON post.user_id = user.id
						ORDER BY post.created_at DESC ');

		$result = $this->db->resultSet();

		return $result;
	}


	public function addPost($data)
	{
		$this->db->query('INSERT INTO post (title,user_id, body ) VALUES (:title,:user_id, :body )'); 
		//bind values
		$this->db->bind(':title', $data['title']);
			$this->db->bind(':user_id', $data['user_id']);
		$this->db->bind(':body', $data['body']);
		
		// execute query
		if($this->db->execute()){
			return true;
		}else{
			return false;
		}
	}


public function updatePost($data)
	{
		$this->db->query('UPDATE post SET title = :title, body = :body WHERE id = :id'); 
		//bind values
		$this->db->bind(':id', $data['id']);
		$this->db->bind(':title', $data['title']);
		$this->db->bind(':body', $data['body']);
		
		// execute query
		if($this->db->execute()){
			return true;
		}else{
			return false;
		}
	}

	public function getPostbyid($id)
	{
		$this->db->query('SELECT * FROM post WHERE id = :id');

		//bind values
		$this->db->bind(':id', $id);

		$row = $this->db->single();

		return $row;

	}


	public function deletePost($id)
	{

		
		$this->db->query('DELETE FROM post WHERE id = :id'); 
		//bind values
		$this->db->bind(':id', $id);
		// execute query
		if($this->db->execute()){
			return true;
		}else{
			return false;
		}
	}


}