<?php
class Page extends CI_Controller{
  function __construct(){
    parent::__construct();
    if($this->session->userdata('logged_in') !== TRUE){
      redirect('/');
    }
    $this->load->model('p_data');
    $this->load->database();
  }
 
  function index(){
    //Allowing akses to admin only
      if($this->session->userdata('level')==='1'){
          $this->load->view('layouts/header');
          $this->load->view('layouts/sidebar');
          $this->load->view('dashboard');
          $this->load->view('layouts/footer');
      }else{
          echo "Access Denied";
      }
  }
  
  function json(){
    $data['pasien'] = $this->p_data->SelectAll()->result_array();
    echo json_encode($data);
  }

  function pasien(){
    if($this->session->userdata('level')==='1'){
      $this->load->view('layouts/header');
      $this->load->view('layouts/sidebar');
      $data['pasien'] = $this->p_data->tampil_data()->result();
      $this->load->view('pasien', $data);
      $this->load->view('layouts/footer');
  }else{
      echo "Access Denied";
  }
  }
  function pasien_list(){
    if($this->session->userdata('level')==='1'){

      $this->load->view('layouts/header');
      $this->load->view('layouts/sidebar');
      $data['pasien'] = $this->p_data->list_data()->result();
      $this->load->view('pasien_list', $data);
      $this->load->view('layouts/footer');

      }else{
      echo "Access Denied";
  }
  }
  function pasien_proses(){
    if($this->session->userdata('level')==='1'){

      $pasien_status = 2;
    $id = $this->input->post('pasien_id');
    $reg = date('Y-m-d H:i:s');
    $data = array(
      'pasien_status' => $pasien_status,
      'pasien_reg' => $reg
    );
    $where = array(
        'pasien_id' => $id
      );
    $this->p_data->update_proses($where,$data,'tbl_pasiens');
    redirect('page/pasien');

      }else{
      echo "Access Denied";
    }
  }
  function get_autocomplete(){
      if (isset($_GET['term'])) {
          $result = $this->p_data->search_pasien($_GET['term']);
          if (count($result) > 0) {
          foreach ($result as $row)
              $arr_result[] = $row->pasien_nama;
              echo json_encode($arr_result);
          }else{
            echo "Data Tidak Ada";
          }
      }
  }
  function pro(){
            $query = $this->input->get('query');

        $this->db->like('pasien_nama', $query);


        $data = $this->db->get("tbl_pasiens")->result();


        echo json_encode( $data);
  }
function edit($id){
  if($this->session->userdata('level')==='1'){
  $where = array('pasien_id' => $id);
  $data['pasien'] = $this->p_data->edit_data($where,'tbl_pasiens')->result();
  $this->load->view('layouts/header');
  $this->load->view('layouts/sidebar');
  $this->load->view('pasien_edit',$data);
  $this->load->view('layouts/footer');
}else{
  echo "Access Denied";
}
}
function update(){
  if($this->session->userdata('level')==='1'){
  $id = $this->input->post('pasien_id');
  $nama = $this->input->post('pasien_nama');
  $alamat = $this->input->post('pasien_alamat');
  $kelamin = $this->input->post('pasien_kelamin');
  $ktp = $this->input->post('pasien_ktp');

  $data = array(
    'pasien_nama' => $nama,
    'pasien_alamat' => $alamat,
    'pasien_kelamin' => $kelamin,
    'pasien_ktp' => $ktp
  );

  $where = array(
    'pasien_id' => $id
  );

  $this->p_data->update_data($where,$data,'tbl_pasiens');
  redirect('page/pasien');
  }else{
    echo "Access Denied";
}
}
function update_pasien(){
  if($this->session->userdata('level')==='1'){
    $pasien_status = 1;
    $id = $this->input->post('pasien_id');
    $reg = date('Y-m-d H:i:s');
    $data = array(
      'pasien_status' => $pasien_status,
      'pasien_reg' => $reg
    );
    $where = array(
        'pasien_id' => $id
      );
    $this->p_data->update_status($where,$data,'tbl_pasiens');
    redirect('page/pasien');
      }else{
    echo "Access Denied";
}

}
  function tambah_pasien(){
      $koda = $this->input->post('pasien_ktp');
     if($this->session->userdata('level')==='1'){
      $sql = $this->db->query("SELECT * FROM tbl_pasiens WHERE pasien_ktp='$koda'");
      $count = $sql->num_rows();
      if ($count > 0) {
        echo "sudah ada";
      }else{
        $nama = $this->input->post('pasien_nama');
        $alamat = $this->input->post('pasien_alamat');
        $kelamin = $this->input->post('pasien_kelamin');
        $reg = date('Y-m-d H:i:s');
        $ktp = $this->input->post('pasien_ktp');
        $data = array(
          'pasien_nama' => $nama,
          'pasien_alamat' => $alamat,
          'pasien_kelamin' => $kelamin,
          'pasien_ktp' => $ktp,
          'pasien_reg' => $reg
          );
        $this->p_data->input_data($data,'tbl_pasiens');
        redirect('page/pasien');
      }

        }else{
          echo "Access Denied";
      }
    
  }
 
  function dokter(){
    //Allowing akses to dokter only
    if($this->session->userdata('level')==='2'){
      $this->load->view('layouts/header');
      $this->load->view('layouts/sidebar');
      $this->load->view('dashboard');
      $this->load->view('layouts/footer');
    }else{
        echo "Access Denied";
    }
  }
  public function search(){
    if($this->session->userdata('level')==='2'){
      $keyword = $this->input->post('keyword');
      $data['pasien']=$this->p_data->get_pasien_keyword($keyword);
      $this->load->view('layouts/header');
      $this->load->view('layouts/sidebar');
      $this->load->view('search',$data);
      $this->load->view('layouts/footer');
      }else{
        echo "Access Denied";
    }
    }

    function view($id){
        if($this->session->userdata('level')==='2'){
      }else{
        echo "Access Denied";
      }
      }

      function tambah_diagnosa(){
        if($this->session->userdata('level')==='2'){
        $penyakit = $this->input->post('konsultan_judul');
        $obat = $this->input->post('konsultan_obat');
        $pasien_id = $this->input->post('pasien_id');
        $reg = date('Y-m-d H:i:s');
        $data = array(
          'konsultan_judul' => $penyakit,
          'konsultan_obat' => $obat,
          'pasien_id' => $pasien_id,
          'konsultan_tgl' => $reg,
          );
        $this->p_data->tambah_diagnosa($data,'tbl_konsultans');
        $eml ="UPDATE tbl_pasiens SET pasien_status=3 WHERE pasien_id=".$pasien_id;
        $this->db->query($eml);
        redirect('page/dokter');

        }else{
          echo "Access Denied";
        }
      }

  function author(){
    //Allowing akses to anonym only
    if($this->session->userdata('level')==='3'){
      $this->load->view('dashboard');
    }else{
        echo "Access Denied";
    }
  }
 
}