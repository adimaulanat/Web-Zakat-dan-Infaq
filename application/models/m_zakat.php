<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_zakat extends CI_Model{

    function data_admin($number,$offset,$search=""){
        if($search != ''){
            $this->db->like('username', $search);
        }
        return $query = $this->db->get('zakat',$number,$offset)->result();     
    }

    function data_user($username,$number,$offset,$search=""){
        if($search != ''){
            $this->db->like('nama_zakat', $search);
        }
        return $query = $this->db->get_where('zakat',array('username'=>$username),$number,$offset)->result();     
    }

    function data_admin_infaq($number,$offset,$search=""){
        if($search != ''){
            $this->db->like('username', $search);
        }
        return $query = $this->db->get('infaq',$number,$offset)->result();     
    }

    function data_user_infaq($username,$number,$offset,$search=""){
        if($search != ''){
            $this->db->like('nama_infaq', $search);
        }
        return $query = $this->db->get_where('infaq',array('username'=>$username),$number,$offset)->result();     
    }

   function get_list_data($vusername)
    {
        $query=$this->db->query("SELECT * FROM zakat WHERE username = '$vusername' ORDER BY id");
        return $query;
    }

    function get_list_data_infaq($vusername)
    {
        $query=$this->db->query("SELECT * FROM infaq WHERE username = '$vusername' ORDER BY id");
        return $query;
    }

    function get_list_data_print($vusername)
    {
        $query=$this->db->query("SELECT * FROM zakat WHERE username = '$vusername' AND status = '2' ORDER BY id");
        return $query;
    }

    function get_list_data_print_transaksi($id)
    {
        $query=$this->db->query("SELECT * FROM zakat WHERE id = '$id'");
        return $query;
    }

    function get_list_data_infaq_print($vusername)
    {
        $query=$this->db->query("SELECT * FROM infaq WHERE username = '$vusername' AND status = '2' ORDER BY id");
        return $query;
    }

    function get_list_data_infaq_print_transaksi($id)
    {
        $query=$this->db->query("SELECT * FROM infaq WHERE id = '$id'");
        return $query;
    }

    public function get_total_search($username) 
    {   
        $query = $this->db->query("SELECT * FROM zakat where username LIKE '%$username%' ");
        return $query->num_rows();
    }

     public function get_total() 
    {
        return $this->db->count_all("zakat");
    }

    function get_list_data_all()
    {
        $query=$this->db->query("SELECT * FROM zakat ORDER BY tanggal_input");
        return $query;
    }

    function get_list_data_all_infaq()
    {
        $query=$this->db->query("SELECT * FROM infaq ORDER BY tanggal_input");
        return $query;
    }

    // menginputkan/menambahkan zakat baru
    function insert($vusername, $vnominal_gaji, $vnama_zakat, $vfoto){

        $vnominal_zakat = $vnominal_gaji * 2.5 / 100;
        $vtanggal_input=date("Y-m-d");
        $query = $this->db->query("INSERT INTO zakat (id, username, nama_zakat, nominal_gaji, nominal_zakat, slip_gaji, bukti_pembayaran, tanggal_input, tanggal_bayar, tanggal_verifikasi, status) VALUES (NULL, '$vusername', '$vnama_zakat', '$vnominal_gaji', '$vnominal_zakat', '$vfoto', '', '$vtanggal_input', '', '', '0');");
    }

    function input_data_zakat($data,$table){
		$this->db->insert($table,$data);
	}

    function input_data_infaq($data,$table){
		$this->db->insert($table,$data);
	} 

    // menginputkan/menambahkan zakat baru
    function insert_infaq($vusername, $vnominal_infaq, $vnama_infaq){
        $vtanggal_input=date("Y-m-d");
        $query = $this->db->query("INSERT INTO infaq (id, username, nama_infaq, nominal_infaq, bukti_pembayaran, tanggal_input, tanggal_bayar, tanggal_verifikasi, status) 
        VALUES (NULL, '$vusername', '$vnama_infaq', '$vnominal_infaq', '', '$vtanggal_input', '', '', '0');");
    }

    // untuk upload bukti pembayaran
    function update_bukti_pembayaran($vusername, $vid, $vbukti_pembayaran){
        $vtanggal_bayar=date("Y-m-d");
        $query = $this->db->query("UPDATE zakat set bukti_pembayaran = '$vbukti_pembayaran', tanggal_bayar = '$vtanggal_bayar', status = '1' WHERE username = '$vusername' AND id = '$vid'");
    }

    function update_bukti_pembayaran_infaq($vusername, $vid, $vbukti_pembayaran){
        $vtanggal_bayar=date("Y-m-d");
        $query = $this->db->query("UPDATE infaq set bukti_pembayaran = '$vbukti_pembayaran', tanggal_bayar = '$vtanggal_bayar', status = '1' WHERE username = '$vusername' AND id = '$vid'");
    }

     // untuk verifikasi dari admin
    function update_verifikasi_pembayaran($vid){
        $vtanggal_verifikasi=date("Y-m-d");
        $query = $this->db->query("UPDATE zakat set tanggal_verifikasi = '$vtanggal_verifikasi', status = '2' WHERE id = '$vid'");
    }

    function update_verifikasi_pembayaran_infaq($vid){
        $vtanggal_verifikasi=date("Y-m-d");
        $query = $this->db->query("UPDATE infaq set tanggal_verifikasi = '$vtanggal_verifikasi', status = '2' WHERE id = '$vid'");
    }

 
   function jumlah_data($search=""){
        if($search != ''){
            $this->db->like('username', $search);
        }
        return $this->db->get('zakat')->num_rows();
    }

    function jumlah_data_infaq($search=""){
        if($search != ''){
            $this->db->like('username', $search);
        }
        return $this->db->get('infaq')->num_rows();
    }

    function get_profil($id){
		$query = $this->db->get_where('akun', array('username' => $id))->row();
		return $query;
    }

    function update_data_profil($where,$data,$table){
		$this->db->where($where);
		return $this->db->update($table,$data);
		
    }
    
    function print_by_month($month, $year){
        $query=$this->db->query("SELECT * FROM zakat WHERE MONTH(tanggal_input) = '$month' AND YEAR(tanggal_input) = '$year' ORDER BY id");
        return $query;
    }

    function print_by_month_infaq($month, $year){
        $query=$this->db->query("SELECT * FROM infaq WHERE MONTH(tanggal_input) = '$month' AND YEAR(tanggal_input) = '$year' ORDER BY id");
        return $query;
    }
}
?>
