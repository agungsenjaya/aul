<?php
class Login extends CI_Controller{
  function __construct(){
    parent::__construct();
    $this->load->model('login_model');
  }
 
  function index(){
   
    if($this->session->userdata('logged_in') == TRUE){
      if($this->session->userdata('level')==='1'){
      redirect('page');
        }else{
      redirect('page/dokter');
      }
    }
    $this->load->view('login_view');
  }
 
  function auth(){
    $name    = $this->input->post('name',TRUE);
    $password = md5($this->input->post('password',TRUE));
    $validate = $this->login_model->validate($name,$password);
    if($validate->num_rows() > 0){
        $data  = $validate->row_array();
        $name  = $data['user_name'];
        $email = $data['user_email'];
        $level = $data['user_level'];
        $sesdata = array(
            'username'  => $name,
            'email'     => $email,
            'level'     => $level,
            'logged_in' => TRUE
        );
        $this->session->set_userdata($sesdata);
        // access login for pegawai
        if($level === '1'){
            redirect('page');
 
        // access login for dokter
        }elseif($level === '2'){
            redirect('page/dokter');
 
        // access login for author
        }else{
            redirect('page/author');
        }
    }else{
        echo $this->session->set_flashdata('msg','Username Atau Password Salah');
        redirect('/');
    }
  }
 
  function logout(){
      $this->session->sess_destroy();
      redirect('/');
  }
 
}