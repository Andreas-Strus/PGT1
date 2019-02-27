<?PHP
include "model/model.php";

Class NewsModel extends Model{
	
	public function update($data){
		$name= "'".$this->conn->real_escape_string($data["name"])."'";
		$description= "'".$this->conn->real_escape_string($data["description"])."'";
		$note_id = $this->conn->real_escape_string($data["note_id"]);
		$query ="UPDATE Task_1_News SET `name` =".$name.", 
		`description`=".$description.", `updeated_at`=CURRENT_TIMESTAMP() WHERE `note_ID` =".$note_id."
		and `author_id` =".$_SESSION["user_ID"].";";
		$this->conn->query($query);
	}
	
	public function delete($data){
		$note_ID = $data;
		$query="Delete from `Task_1_News` where `note_ID` = ".$note_ID." and `author_id`=".$_SESSION["user_ID"];
		$this->conn->query($query);
	}
}
?>
		