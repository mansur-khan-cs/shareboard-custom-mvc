<?php
class ShareModel extends Model{
	public function Index(){
		echo 'models/shares.php/Index() <br />';
		$this->query('SELECT * from shares ORDER BY create_date desc');
		$rows = $this->resultSet();
		//print_r($rows);
		return $rows;
	}
	public function add(){
		echo 'models/shares.php/add() <br />';
		//Sanitize POST
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
		if($post['submit']){
			if($post['title'] == '' || $post['body'] == '' || $post['link'] == ''){
				Messages::setMsg('Plz fill in all fields', 'error');
				return;
			}			
			// Insert into MySQL
			$this->query('INSERT INTO shares (title, body, link, user_id) VALUES(:title, :body, :link, :user_id)');
			$this->bind(':title', $post['title']);
			$this->bind(':body', $post['body']);
			$this->bind(':link', $post['link']);
			$this->bind(':user_id', 1);
			$this->execute();
			//verify
			if($this->lastInsertId()){
				//Redirect
				header('Location: '.ROOT_URL.'shares');
			}
		}
	}	
}
?>