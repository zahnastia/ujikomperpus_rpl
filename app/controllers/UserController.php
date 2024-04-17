<?php 
use Dompdf\Dompdf;
class UserController extends Controller
{
  public function __construct()
  {
    /**
      * Batasi hak akses hanya untuk Administrator
      * Selain Administrator akan langsung diarahkan kembali ke halaman home
    */
    if ($_SESSION['role'] !== 'Administrator') {
      redirectTo('error', 'Mohon maaf, Anda tidak berhak mengakses halaman ini', '/');
    }
  }

  public function index()
  {
    $data = $this->model('User')->getAll();
    $this->view('user/home', $data);
  }

  public function create()
  {
    $this->view('user/create');
  }

  public function store()
  {
    if ($_POST['Password'] !== $_POST['Konfirmasi_Password']) {
      redirectTo('error', 'Maaf, Konfirmasi password tidak cocok!', '/user/create');
    } else {
      if ($this->model('User')->create([
        'Username'      => $_POST['Username'],
        'Email'         => $_POST['Email'],
        'NamaLengkap'   => $_POST['NamaLengkap'],
        'Alamat'        => $_POST['Alamat'],
        'Password'      => password_hash($_POST['Password'], PASSWORD_DEFAULT),
        'Role'          => 2
      ]) > 0) {
        redirectTo('success', 'Selamat, Data Petugas Berhasil di Tambahkan', '/user');
      } else {
        redirectTo('error', 'Maaf, Username/Email sudah terdaftar', '/user');
      }
    }
  }

  public function edit($id)
  {
    $data = $this->model('User')->getById($id);
    $this->view('user/edit', $data);
  }

  public function update($id)
  {
    if ($this->model('User')->update($id) > 0) {
			redirectTo('success', 'Selamat, Data Petugas berhasil di edit!', '/user');
		} else {
			redirectTo('info', 'Tidak ada perubahan data!', '/user');
		}
  }

  public function delete($id)
	{
		if ($this->model('User')->delete($id) > 0) {
			redirectTo('success', 'Selamat, Data User berhasil di hapus!', '/user');
		}
	}

  public function cetakuser()
  {
    $data = $this->model('KURelasi')->get();
    $html 	= "<center>";
		$html 	.= "<h1>SMK MERDEKA BANDUNG        </h1>";
		$html 	.= "<h2>PERPUSTAKAAN DIGITAL</h2>";
		$html 	.= "<h3>DAFTAR USER</h3>";
		$html 	.= "<hr>";
    $html   .= "<table align='center' border='1' cellpadding='10' cellspacing='0'>";
		$html   .= "<tr><th>#</th><th>Nama Lengkap</th><th>Email</th><th>Alamat Lengkap</th><th>Role</th></tr>";
    $no = 1;
    foreach ($data as $user) {
      $html .= "<tr>";
      $html .= "<td>".$no."</td>";
      $html .= "<td>".$user['NamaLengkap']."</td>";
      $html .= "<td>".$user['Email']."</td>";
      $html .= "<td>".$user['Alamat']."</td>";
      $html .= "<td>".$user['Role']."</td>";
      $html .= "</tr>";
      $no++;
    }
    $html   .= "</table>";
    $html 	.= "</center>";
    $dompdf = new Dompdf();
		$dompdf->loadHtml($html);
		$dompdf->setPaper('4A', 'potrait');
		$dompdf->render();
		$dompdf->stream('Data peminjam', ['Attachment' => 0]);
  }

}