<?php
//  todo 2 (important) +1: LIST ALL BAND
//  todo 3 (important) +1: GET DETAIL BAND
//  todo 4 (important) +1: EDIT BAND
//  todo 5 (important) +1: ADD PRODUCT
//  todo 6 (important) +1: EDIT PRODUCT
//  todo 7 (important) +1: SEE PROFIT
defined('BASEPATH') OR exit('No direct script access allowed');
class Band extends MX_Controller {
	private $parent;

	function __construct() {
        parent::__construct();
        $this->load->model('GLobalModel');
        require_once(APPPATH.'modules/index/controllers/Index.php');

        $this->parent = new Index();
    }
    function index(){
        $data['view'] = 'main_html/content/login';
        $data['parent'] = $this->parent;
        $this->load->view('main_html/content_dinamis', $data);
    }
    function do_signup(){
    	$params = $this->input->post();
    	$response = array();
    	$response['status'] = 'false';
    	$response['message'] = 'Registrasi Gagal';
    	if($params != null){
    		$response['message'] = 'Password Tidak Sama';
    		if($params['password'] == $params['passwordver']){
    			$response['message'] = 'Username Sudah Terpakai';    			
	    		$dataSelect['username'] = $params['username'];
	    		$dataDuplicate = $this->GLobalModel->select($dataSelect, 'ur_band');
	    		if($dataDuplicate->num_rows() < 1){
	    			$response['message'] = 'Insert Gagal';

		    		$dataInsert['username'] = $params['username'];
		    		$dataInsert['email'] = $params['email'];
		    		$dataInsert['password'] = md5($params['password']);
		    		$dataInsert['verification'] = 'false';

		    		$insertData = $this->GLobalModel->insert($dataInsert, 'ur_band');
		    		if($insertData){
		    			$response['status'] = 'true';
		    			$response['message'] = 'Registrasi Berhasil \nCek Email untuk Aktivasi';
		    		}
	    		}
    		}
    	}
    	echo json_encode($response);
    }
    function do_login(){
    	$params  = $this->input->post();
    	$response = array();
    	$response['status'] = 'false';
    	$response['message'] = 'Registrasi Gagal';    	
    	if($params != null){
    		$dataSelect['username'] = $params['username'];
    		$dataSelect['password'] = md5($params['password']);
    		$dataSelect['verification'] = 'true';
    		$selectData = $this->GLobalModel->select($dataSelect, 'ur_band');
    		if($selectData->num_rows() > 0){
                $dataSess["band_code"] = $selectData->row()->band_code;
                $dataSess["username"] = $selectData->row()->username;
    			$this->_set_session($dataSess);
                $response['band_code'] = $selectData->row()->band_code;
    			$response['status'] = 'true';
    		}
    	}
    	echo json_encode($response);
    }
    function logout_band()
    {
        $this->session->sess_destroy();
        redirect('index','refresh');
    }
    function _set_session($params = null){
    	if($params != null){
            $this->session->set_userdata($params);
    	}
    }

    function update_data()
    {
        $params = $this->input->post();
        if ($params != null) {
            $where["band_code"] = $this->session->userdata('band_code');
            $data["band_name"] = $params["name"];
            $data["username"] = $params["username"];
            $data["email"] = $params["email"];
            if (isset($params["password"]) && isset($params["repassword"])) {
                if (($params["password"] != null) && ($params["repassword"] != null)) {
                    $data["password"] = $params["password"];
                }
            }
            $data["information"] = $params["information"];
            $this->GLobalModel->update($where, $data, 'ur_band');
            redirect('Index/band_detail/'.$this->session->userdata('band_code'),'refresh');
        }
    }
    function add_product()
    {
        $params = $this->input->post();
        if ($params != null) {
            $dataProduct["product_code"]   = $this->get_LastPk("ur_product","product_code", "KO");
            $dataProduct["product_name"]   = $params["name"];
            $dataProduct["band_code"]      = $this->session->userdata('band_code');
            $dataProduct["category"]       = 1;
            $dataProduct["picture"]        = "";
            $dataProduct["status"]         = $params["status"];
            $dataProduct["date"]           = date('Y-m-d');
            $dataProduct["information"]    = $params["information"];
            $this->GLobalModel->insert($dataProduct, 'ur_product');


            $dataCat["category_code"] = $dataProduct["category"];
            $cat = $this->GLobalModel->select($dataCat, 'ur_category');
            $production_cat = $cat->row()->production_cost;
            $arr_size = array(
                "S","M","L","XL"
            );
            for ($i=0; $i < count($arr_size); $i++) { 
                $dataDProduct["product_code"] = $dataProduct["product_code"];
                $dataDProduct["size"] = $arr_size[$i];
                $dataDProduct["stock"] = 0;
                $dataDProduct["harga"] = $production_cat + $params["price"];
                $dataDProduct["status"] = $dataProduct["status"];
                $this->GLobalModel->insert($dataDProduct, 'ur_product_detail');
            }
            redirect("Index/Index/band_detail/".$this->session->userdata('band_code'));
        }
    }
    function edit_product()
    {
        $params = $this->input->post();
        if ($params != null) {
            $act = $params["act"];
            if ($act == "edit") {
                $q = "SELECT p.*, pd.harga-cat.production_cost as provit FROM ur_product as p INNER JOIN  ur_product_detail as pd ON p.product_code = pd.product_code INNER JOIN  ur_category as cat ON cat.category_code = p.category WHERE p.product_code='".$params["product_code"]."'";
                $q = $this->GLobalModel->rawQuery($q);
                if ($q->num_rows() > 0) {
                    $r = $q->row(1);
                    $dataSend["code"] = $r->product_code;
                    $dataSend["name"] = $r->product_name;
                    $dataSend["status"] = $r->status;
                    $dataSend["provit"] = $r->provit;
                    $dataSend["info"] = $r->information;
                    echo json_encode(array("status"=>"success", "data"=>$dataSend));
                }else{
                    echo json_encode(array("status"=>"failed"));
                }
            }else if ($act == "update") {
                
                $dataWhere["product_code"]   = $params["product_code"];
                $dataProduct["product_name"]   = $params["name"];
                $dataProduct["band_code"]      = $this->session->userdata('band_code');
                $dataProduct["category"]       = 1;
                $dataProduct["picture"]        = "";
                $dataProduct["status"]         = $params["status"];
                $dataProduct["date"]           = date('Y-m-d');
                $dataProduct["information"]    = $params["information"];
                $this->GLobalModel->update($dataWhere, $dataProduct, 'ur_product');


                $dataCat["category_code"] = $dataProduct["category"];
                $cat = $this->GLobalModel->select($dataCat, 'ur_category');
                $production_cat = $cat->row()->production_cost;
                $arr_size = array(
                    "S","M","L","XL"
                );
                for ($i=0; $i < count($arr_size); $i++) { 
                    $dataDWhere["product_code"] = $dataWhere["product_code"];
                    $dataDWhere["size"] = $arr_size[$i];
                    $dataDProduct["harga"] = $production_cat + $params["price"];
                    $dataDProduct["status"] = $dataProduct["status"];
                    $this->GLobalModel->update($dataDWhere, $dataDProduct, 'ur_product_detail');
                }
                redirect("Index/Index/band_detail/".$this->session->userdata('band_code'));
            }
        }
    }
    function get_LastPk($table, $name_pk, $format_pk)
    {
        $max = $this->GLobalModel->rawQuery("SELECT MAX(".$name_pk.") AS max_code FROM ".$table);
        $q = $max->row();
        $fix_pk = "";
        if ($q) {
            $id = intval(substr($q->max_code, strlen($format_pk)));
            $id += 1;
            $fix_pk = $format_pk."".$id;
        }
        return $fix_pk;
    }
}