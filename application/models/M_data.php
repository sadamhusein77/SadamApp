<?php
class M_data extends CI_Model{
  function cek_login($table,$where){
    return $this->db->get_where($table,$where);
  }
  // fungsi untuk mengupdate atau mengubah data di database
  function update_data($where,$data,$table){
    $this->db->where($where);
    $this->db->update($table,$data);
  }
  // fungsi untuk mengambil data dari database
  function get_data($table){
    return $this->db->get($table);
  }
  // fungsi untuk menginput data ke database
  function insert_data($data,$table){
    $this->db->insert($table,$data);
  }
  // fungsi untuk mengedit data
  function edit_data($where,$table){
    return $this->db->get_where($table,$where);
  }
  // fungsi untuk menghapus data dari database
  function delete_data($where,$table){
    $this->db->delete($table,$where);
  }


  function code_cashin()
  {
  $this->db->select('RIGHT(cashin.no_cashin,4) as kode', FALSE);
  $this->db->order_by('no_cashin','DESC');
  $this->db->limit(1);
  $query = $this->db->get('cashin');      //cek dulu apakah ada sudah ada kode di tabel.
  if($query->num_rows() <> 0){
   //jika kode ternyata sudah ada.
   $data = $query->row();
   $kode = intval($data->kode) + 1;
  }else{
   //jika kode belum ada
   $kode = 1;
  }
  $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT);
  $date = date('dmY');
  $codein = 1;
  // $sub_tahun = substr($tahun,2);
  $kodejadi = $codein.$date.$kodemax;
  return $kodejadi;
  }

  function code_cashout()
  {
  $this->db->select('RIGHT(cashout.no_cashout,4) as kode', FALSE);
  $this->db->order_by('no_cashout','DESC');
  $this->db->limit(1);
  $query = $this->db->get('cashout');      //cek dulu apakah ada sudah ada kode di tabel.
  if($query->num_rows() <> 0){
   //jika kode ternyata sudah ada.
   $data = $query->row();
   $kode = intval($data->kode) + 1;
  }else{
   //jika kode belum ada
   $kode = 1;
  }
  $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT);
  $date = date('dmY');
  $codeout = 2;
  // $sub_tahun = substr($tahun,2);
  $kodejadi = $codeout.$date.$kodemax;
  return $kodejadi;
  }

}
?>
