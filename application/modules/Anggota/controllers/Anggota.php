<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Anggota extends MX_Controller {
	private $tabel = "tm_anggota";
	function __construct() {
        parent::__construct();
        $this->load->model('GLobalModel');
    }
    function detail($id = 0){
        $dataSelect['sha1(kd_anggota)'] = $id;
        $selectData = $this->GLobalModel->select($dataSelect, $this->tabel);
        return $selectData;
    }
    function data(){
    	$selectData = $this->GLobalModel->get($this->tabel);
    	return $selectData;
    }
    function add($param = null){
        if($param != null){
            $params = $param;

            $dataInsert = array();

            $dataInsert['nama_anggota'] = $params['nama'];
            $dataInsert['alamat_anggota'] = $params['alamat'];
            $dataInsert['tanggal_lahir'] = $params['tanggallahir'];
            $dataInsert['tanggal_masuk'] = $params['tanggalmasuk'];
            $dataInsert['tanggal_daftar'] = date('Y-m-d');
            $dataInsert['no_identitas'] = $params['noidentitas'];
            $dataInsert['no_karyawan'] = $params['nokaryawan'];
            $dataInsert['kd_user'] = '1';

            $insertData = $this->GLobalModel->insert($dataInsert, $this->tabel);
            if($insertData){
                return true;
            }
            return false;            
        }
        return false;
    }
    function delete($id){
    	$params = $id;
    	$dataDelete = array();
    	$dataDelete['sha1(kd_anggota)'] = $params;
    	$deleteData = $this->GLobalModel->delete($dataDelete, $this->tabel);
    	if($deleteData){
    		return true;
    	}else{
            return false;
        }
    }
    function update(){
    	$params = $this->input->post();

    	$dataUpdate = array();

    	$dataUpdate['nama'] = $params['nama_anggota'];
    	$dataUpdate['alamat'] = $params['nama_anggota'];
    	$dataUpdate['tanggal_lahir'] = $params['tanggal_lahir'];
    	$dataUpdate['tanggal_masuk'] = $params['tanggal_masuk'];
    	$dataUpdate['tanggal_daftar'] = $params['tanggal_daftar'];
    	$dataUpdate['no_identitas'] = $params['no_identitas'];
    	$dataUpdate['no_karyawan'] = $params['no_karyawan'];

    	$dataCondition['sha1(kd_anggota)'] = $params['kd_anggota'];

    	$updateData = $this->GLobalModel->insert($dataCondition, $dataUpdate, $this->tabel);

    	if($updateData){
    		return true;
    	}   	
    	return false;
    }
}