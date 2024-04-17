<?php 
class KPRelasi extends BaseModel
{
  public $table_name    = "Peminjaman";
  public $table_id      = "PeminjamanID";

  public function get()
  {
    $query = "SELECT * FROM Peminjaman
    INNER JOIN users ON Peminjaman.UserID = users.UserID
    INNER JOIN buku ON Peminjaman.BukuID = buku.BukuID
    ORDER BY users.UserID DESC
    ";
    
    $result = $this->mysqli->query($query);

    $data = [];
		while ($row = $result->fetch_assoc()) {
			$data[] = $row;
		}

		return $data;
  }

  
}
