<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_zakat extends CI_Model{

    // menampilkan data zakat (log)
	function get_list_data($vusername)
	{
		$query=$this->db->query("SELECT * FROM zakat WHERE username = '$vusername' ORDER BY id");
		return $query;
    }

    // menampilkan data zakat (log)
    function get_list_data_all()
    {
        $query=$this->db->query("SELECT * FROM zakat ORDER BY tanggal_input");
        return $query;
    }

    function get_list_data_infaq($vusername)
    {
        $query=$this->db->query("SELECT * FROM infaq WHERE username = '$vusername' ORDER BY id");
        return $query;
    }

    // menginputkan/menambahkan zakat baru
    function insert($vusername, $vnominal_gaji){

        $vnominal_zakat = $vnominal_gaji * 2.5 / 100;
        $vtanggal_input=date("Y-m-d");
        $query = $this->db->query("INSERT INTO zakat (id, username, nominal_gaji, nominal_zakat, bukti_pembayaran, tanggal_input, tanggal_bayar, tanggal_verifikasi, status) VALUES (NULL, '$vusername', '$vnominal_gaji', '$vnominal_zakat', '', '$vtanggal_input', '', '', '0');");
    }

    // menginputkan/menambahkan infaq baru
    function insert_infaq($vusername, $vnominal_infaq){

        $vnominal_infaq = $vnominal_infaq;
        $vtanggal_input=date("Y-m-d");
        $query = $this->db->query("INSERT INTO infaq (id, username, nominal_infaq, bukti_pembayaran, tanggal_input, tanggal_bayar, tanggal_verifikasi, status) VALUES (NULL, '$vusername', '$vnominal_infaq', '', '$vtanggal_input', '', '', '0');");
    }

    // untuk upload bukti pembayaran
    function update_bukti_pembayaran($vusername, $vid, $vbukti_pembayaran){
        $vtanggal_bayar=date("Y-m-d");
        $query = $this->db->query("UPDATE zakat set bukti_pembayaran = '$vbukti_pembayaran', tanggal_bayar = '$vtanggal_bayar', status = '1' WHERE username = '$vusername' AND id = $vid");
    }

     // untuk verifikasi dari admin
    function update_verifikasi_pembayaran($vusername, $vid){
        $vtanggal_verifikasi=date("Y-m-d");
        $query = $this->db->query("UPDATE zakat set tanggal_verifikasi = '$vtanggal_verifikasi', status = '2' WHERE username = '$vusername' AND id = $vid");
    }
}
?>