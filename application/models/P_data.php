<?php 
 
class P_data extends CI_Model{
	function tampil_data(){
		return $this->db->get('tbl_pasiens');
	}
 
	function input_data($data,$table){
		$this->db->insert($table,$data);
	}
	function edit_data($where, $table){
		return $this->db->get_where($table,$where);
	}
	function view_data($where, $table){
		return $this->db->get_where($table,$where);
	}
	function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}	
	public function get_pasien_keyword($keyword){
			$this->db->select('*');
			$this->db->from('tbl_pasiens');
			$this->db->like('pasien_nama',$keyword);
			$this->db->or_like('pasien_ktp',$keyword);
			return $this->db->get()->result();
	}
}