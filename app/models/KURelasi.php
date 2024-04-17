<?php 
class KURelasi extends BaseModel
{
  public $table_name    = "user";
  public $table_id      = "UserID";

  public function get()
  {
    $query = "SELECT * FROM users
    ";
    
    $result = $this->mysqli->query($query);

    $data = [];
		while ($row = $result->fetch_assoc()) {
			$data[] = $row;
		}

		return $data;
  }

  
}
