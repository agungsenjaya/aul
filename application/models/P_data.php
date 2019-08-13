<?php 
 
class P_data extends CI_Model{
	function tampil_data(){
		return $this->db->get('tbl_pasiens');
	}
	function list_data(){
		$aq = date('Y-m-d');
		$this->db->select('*');
		$this->db->from('tbl_pasiens');
		$this->db->like('pasien_reg', $aq);
		$this->db->where('pasien_status',1);
		$this->db->or_where('pasien_status',2);
		return $this->db->get();
	}
 
	function input_data($data,$table){
		$this->db->insert($table,$data);
	}
	function input_pegawai($data,$table){
		$this->db->insert($table,$data);
	}
	function tambah_diagnosa($data,$table){
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
	function update_cc($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
	function update_status($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
	function update_proses($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
	function update_finish($where,$data,$table){
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
	function search_pasien($ktp){
        $this->db->like('pasien_ktp', $ktp , 'both');
        $this->db->order_by('pasien_ktp', 'ASC');
        $this->db->limit(10);
        return $this->db->get('tbl_pasiens')->result();
    }
    function SelectAll()
	{
	   $this->db->select('*');
   $this->db->from('tbl_pasiens');
   $query = $this->db->get();
   return $query;
	}
}