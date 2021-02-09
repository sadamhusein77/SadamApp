<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller {
  function __construct()
  {
    parent::__construct();
    date_default_timezone_set('Asia/Jakarta');
    $this->load->model('m_data'); // load model general
    // cek session yang login,
    // jika session status tidak sama dengan session telah_login, berarti pengguna belum login
    // maka halaman akan di alihkan kembali ke halaman login.
    if($this->session->userdata('status')!="telah_login"){
      redirect(base_url().'auth?alert=belum_login');
    }
    if($this->session->userdata('id_role')!="1"){
      redirect(base_url().'welcome/notfound');
    }
  }

  public function index()
  {
    $data['title'] = 'Sadam App - produk';
    $data['card'] = 'Data produk User';
    $email = $this->session->userdata('email');
    $data['profile'] = $this->db->query("SELECT * FROM user JOIN role ON user.id_role=role.id_role WHERE user.email='$email'")->row();
    $data['produk'] = $this->m_data->get_data('produk')->result();
    $data['msg'] = $this->session->flashdata('msg');
    $this->load->view('admin/v_header', $data);
    $this->load->view('admin/v_produk',$data);
    $this->load->view('admin/v_footer');
  }

  public function tambah_produk()
  {
    $data['title'] = 'Sadam App - Tambah Data';
    $data['url'] = 'Tambah produk';
    $data['judul'] = 'Form Tambah Data produk' ;
    $email = $this->session->userdata('email');
    $data['profile'] = $this->db->query("SELECT * FROM user JOIN role ON user.id_role=role.id_role WHERE user.email='$email'")->row();
    $this->load->view('admin/v_header', $data);
    $this->load->view('admin/v_produk_tambah', $data);
    $this->load->view('admin/v_footer');
  }

  public function produk_aksi()
  {
    // Validasi Wajib isi form produk
    $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required|max_length[150]|is_unique[produk.nama_produk]',[
      'is_unique' => 'Nama Produk Ini Sudah Terdaftar!'
    ]);
    $this->form_validation->set_rules('keterangan', 'Keterangan', 'required|max_length[250]');
    $this->form_validation->set_rules('harga', 'Harga', 'numeric|required|max_length[13]');
    $this->form_validation->set_rules('jumlah', 'Jumlah', 'numeric|required|max_length[13]');

    if($this->form_validation->run() != false){
      $nama_produk = $this->input->post('nama_produk');
      $keterangan = $this->input->post('keterangan');
      $harga = $this->input->post('harga');
      $jumlah = $this->input->post('jumlah');
      $data = array(
        'nama_produk' => $nama_produk,
        'keterangan' => $keterangan,
        'harga' => $harga,
        'jumlah' => $jumlah
      );
      $this->m_data->insert_data($data,'produk');
      $this->session->set_flashdata('msg', ' Disimpan');
      redirect(base_url().'admin/tambah_produk');
    }else{
      $data['title'] = 'Sadam App- Tambah Data';
      $data['url'] = 'Tambah produk';
      $data['judul'] = 'Form Tambah Data produk' ;
      $email = $this->session->userdata('email');
      $data['profile'] = $this->db->query("SELECT * FROM user JOIN role ON user.id_role=role.id_role WHERE user.email='$email'")->row();
      $this->load->view('admin/v_header', $data);
      $this->load->view('admin/v_produk_tambah', $data);
      $this->load->view('admin/v_footer');
    }
  }
  public function ubah_produk($id_produk){
    $where = array(
      'id_produk' => $id_produk
    );
    $data['title'] = 'Sadam App- Edit produk';
    $data['url'] = 'Edit produk';
    $data['judul'] = 'Form Edit Data produk' ;
    $data['produk'] = $this->m_data->edit_data($where,'produk')->result();
    $email = $this->session->userdata('email');
    $data['profile'] = $this->db->query("SELECT * FROM user JOIN role ON user.id_role=role.id_role WHERE user.email='$email'")->row();
    $this->load->view('admin/v_header', $data);
    $this->load->view('admin/v_produk_ubah', $data);
    $this->load->view('admin/v_footer');
  }

  // Fungsi update halaman
  public function produk_update()
  {
    // Wajib isi judul,konten
    $id_produk = $this->input->post('id_produk');
    $nama = $this->db->get_where('produk', array('id_produk' => $id_produk))->row();
    $nama_produk = $nama->nama_produk;
    if($this->input->post('nama_produk') != $nama_produk) {
      $is_unique =  '|is_unique[produk.nama_produk]';
    } else {
      $is_unique =  '';
    }
    $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required|max_length[150]'.$is_unique,[
      'is_unique' => 'Nama Produk Ini Sudah Terdaftar!'
    ]);
    $this->form_validation->set_rules('keterangan', 'Keterangan', 'required|max_length[250]');
    $this->form_validation->set_rules('harga', 'Harga', 'numeric|required|max_length[13]');
    $this->form_validation->set_rules('jumlah', 'Jumlah', 'numeric|required|max_length[13]');
    if($this->form_validation->run() != false){
      $id_produk = $this->input->post('id_produk');
      $nama_produk = $this->input->post('nama_produk');
      $keterangan = $this->input->post('keterangan');
      $harga = $this->input->post('harga');
      $jumlah = $this->input->post('jumlah');
      $where = array(
        'id_produk' => $id_produk
      );
      $data = array(
        'nama_produk' => $nama_produk,
        'keterangan' => $keterangan,
        'harga' => $harga,
        'jumlah' => $jumlah
      );
      $this->m_data->update_data($where,$data,'produk');
      $this->session->set_flashdata('msg', ' Diubah');
      redirect(base_url().'admin/index');
    }else{
      $id_produk = $this->input->post('id_produk');
      $where = array(
        'id_produk' => $id_produk
      );
      $data['title'] = 'Sadam App- Edit produk';
      $data['url'] = 'Edit produk';
      $data['judul'] = 'Form Edit Data produk' ;
      $email = $this->session->userdata('email');
      $data['profile'] = $this->db->query("SELECT * FROM user JOIN role ON user.id_role=role.id_role WHERE user.email='$email'")->row();
      $data['produk'] = $this->m_data->edit_data($where,'produk')->result();
      $this->load->view('admin/v_header', $data);
      $this->load->view('admin/v_produk_ubah', $data);
      $this->load->view('admin/v_footer');
    }
  }

  // Fungsi hapus
  public function hapus_produk($id_produk)
  {
    $where = array(
      'id_produk' => $id_produk
    );
    $this->m_data->delete_data($where,'produk');
    $this->session->set_flashdata('msg', ' Dihapus');
    redirect(base_url().'admin/index');
  }
}
