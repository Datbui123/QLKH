<?php
	session_start(); 
	include "../includes/header.php";
 ?>
<?php require_once("../includes/connection.php"); ?>

public function deletePost($postId)
	{
		$sql = "DELETE FROM posts WHERE id = $postId";
		return $this->db->conn->query($sql);
	}
<?php

class DeletePost {
	public function __construct()
	{
		require_once('website/posts.php');
		
		$postModel = new PostModel();
		
		if (isset($_GET['postId'])) {
			$postId = $_GET['postId'];
			$postModel->deletePost($postId);

			header('Location: ?controller=listPost');
		}

	}
}