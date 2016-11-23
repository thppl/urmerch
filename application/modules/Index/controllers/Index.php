<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Index extends MX_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model('GLobalModel');
    }
    function index(){
    	$data['data'] = 'test';
        $data['parent'] = $this;
    	$this->load->view('main_html/content', $data);
    }
    function band(){
        $data['dataBand'] = 'false';
        $dataSelect = $this->GLobalModel->get('ur_band');
        if($dataSelect->num_rows() > 0){
            $data['dataBand'] = $dataSelect;            
        }
        $this->load->view('main_html/content/bands', $data);
    }
    function catalog(){
        $data['productTerlaris'] = $this->GLobalModel->rawQuery("select ur_product.*, ur_product.product_code as code, 
                                                                            (select count(*) from 
                                                                                    ur_order_detail 
                                                                                    where ur_order_detail.product_code = code) as total 
                                                                from ur_product
                                                                order by total ASC
                                                                LIMIT 1,4");
        $data['productTerbaru'] = $this->GLobalModel->rawQuery("select * from ur_product
                                                                order by date ASC
                                                                limit 1,4");
        // $data['']
        $this->load->view('main_html/content/catalogs', $data);
    }
    function blog(){
        $data['dataBlog'] = 'false';
        $dataSelect = $this->GLobalModel->get('ur_band');
        if($dataSelect->num_rows() > 0){
            $data['dataBlog'] = $dataSelect;            
        }        
        $this->load->view('main_html/content/blogs', $data);
    }
    function contact_us(){
        $this->load->view('main_html/content/contacts');
    }
    function addtocart(/*$product ='null'*/){
        $params = $this->input->post();
        if($params != null){
            $selectData = $this->GLobalModel->rawQuery("SELECT * FROM ur_product
                                                        INNER JOIN ur_product_detail ON ur_product_detail.product_code = ur_product.product_code
                                                        WHERE ur_product.product_code = '".$params['kode_product']."'
                                                        AND ur_product_detail.size = '".$params['size']."'");
            $data = array(
                    'id'      => $params['kode_product'],
                    'qty'     => $params['quantity'],
                    'price'   => $selectData->row()->harga,
                    'name'    => $selectData->row()->product_name,
                    'options' => array('Size' => $params['size'])
            );
            $insertCart = $this->cart->insert($data);
            if($insertCart){
                echo "SUCCESS";
            }else{
                echo "FAILED";
            }
        }else{
            echo "FAILED";
        }
    }
    function addtocartpost(){
        $params = $this->input->post();
        if($params != null){
            $selectData = $this->GLobalModel->rawQuery("SELECT ur_product.product_name, ur_product_detail.harga,
                                                        ur_product_detail.stock FROM ur_product
                                                        LEFT JOIN ur_product_detail ON ur_product_detail.product_code = ur_product.product_code
                                                        WHERE ur_product.product_code = '".$params['product_code']."'
                                                        AND ur_product_detail.size = '".$params['size']."'");
            if ($selectData->num_rows()>0) {
                if($selectData->row()->stock > 0 && $selectData->row()->stock != ""){
                    $data = array(
                        'id'      => $params['product_code'],
                        'qty'     => $params['quantity'],
                        'price'   => $selectData->row()->harga,
                        'name'    => $selectData->row()->product_name,
                        'options' => array('Size' => $params['size'])
                    );
                    $insertCart = $this->cart->insert($data);
                    if($insertCart){
                        echo json_encode(array("status"=>"success"));
                    }else{
                        echo json_encode(array("status"=>"failed"));
                    }
                }else{
                    echo json_encode(array("status"=>"failed"));
                }
            }else{
                echo json_encode(array("status"=>"failed"));
            }
        }else{
            echo json_encode(array("status"=>"failed"));
        }
    }
    function changecategori()
    {
        $params = $this->input->post();
        if($params != null){
            $q = $this->GLobalModel->rawQuery("SELECT ur_product_detail.* FROM ur_product_detail
                                            WHERE ur_product_detail.product_code = '".$params['product_code']."'
                                            AND ur_product_detail.size = '".$params['size']."'");
            if ($q->num_rows() > 0) {
                $dataSend["product_code"] = $q->row()->product_code;
                $dataSend["size"] = $q->row()->size;
                $dataSend["stock"] = $q->row()->stock;
                $dataSend["harga"] = number_format($q->row()->harga);
                $dataSend["status"] = $q->row()->status;
                echo json_encode(array("data"=>$dataSend));
            }else{
                echo json_encode(array("status"=>"false"));
            }
        }
    }
    function updateCart(){
        $params = $this->input->post();
        if($params!= null){
            $data = array(
                    'rowid'  => $params['id'],
                    'qty'    => $params['quantity'],
            );

            $update = $this->cart->update($data);
            if($update){
                echo "SUCCESS";
            }else{
                echo "FAILED";                
            }
        }else{
            echo "FAILED";
        }
    }
    function deleteCart($id = null){
        if($id != null){
            $remove = $this->cart->remove($id);
            if($remove){
                echo "SUCCESS";
            }else{
                echo "FAILED";
            }
        }else{
            echo "FAILED";
        }
    }
    function emptyCart(){
        $this->cart->destroy();
    }
    function customer_data(){
        $data['view'] = 'main_html/content/customer_data';
        $data['parent'] = $this;
        $this->load->view('main_html/content_dinamis', $data);        
    }
    function detail_product($product_code = null){
        if($product_code != null){        
            $data['table'] = $this->GLobalModel->rawQuery("SELECT ur_product.*, ur_product_detail.size, ur_product_detail.harga, ur_product_detail.status, ur_product_detail.stock FROM ur_product
                                                            LEFT JOIN ur_product_detail ON ur_product_detail.product_code = ur_product.product_code
                                                            WHERE ur_product.product_code = '".$product_code."'");
            $data['view'] = 'main_html/content/detail_product';
        }else{
            // 404 page
        }
        $data['parent'] = $this;
        $this->load->view('main_html/content_dinamis', $data);
    }
    function getHargaDasar($key = null){
        if($key != null){
            $getData = $this->GLobalModel->rawQuery('SELECT * FROM ur_set_up WHERE key = $key');
            return $getData->row()->$key;
        }
    }
    function echoDate(){
        echo date('Y-m-d h:i:sA');
        $date = new DateTime(date('Y-m-d h:i:sA'));
        $date->add(new DateInterval('PT12H'));
        echo "<br>";
        echo $date->format('Y-m-d h:i:sA');

    }
    function convertDate($type, $date){
        $timestamp = strtotime($date);
        $result = date($type, $timestamp);
        return $result;
    }
    function saveCustomer(){
        $customerCode = $this->checkExistOrderCode();
        $orderCode = $this->generateBillingPayment();
        $params = $this->input->post();
        if($params!= null){
            $dateNow = date('Y-m-d h:i:s');

            $dataPropinsi['id'] = $params['provinsi'];
            $getDataPropinsi = $this->GLobalModel->select($dataPropinsi, 'provinsi');

            $dataKabupaten['id'] = $params['kabupaten'];
            $getDataKabupaten = $this->GLobalModel->select($dataKabupaten, 'kabupaten');

            $dataSelect['order_code'] = $orderCode;
            $dataSelect['customer_name'] = $params['name'];
            $dataSelect['customer_address'] = $params['address'];
            $dataSelect['city'] = $getDataKabupaten->row()->nama;
            $dataSelect['province'] = $getDataPropinsi->row()->nama;
            $dataSelect['customer_email'] = $params['email'];
            $dataSelect['customer_telp'] = $params['phone'];
            $dataSelect['delivery_type'] = 'JNE';
            $dataSelect['total_price'] = $this->cart->total() + ($this->cart->total() * (10/100));
            $selectData = $this->GLobalModel->select($dataSelect, 'ur_order');
            if($selectData->num_rows() < 1){                
                $dataInsert['order_code'] = $orderCode;
                $dataInsert['customer_code'] = $customerCode;
                $dataInsert['customer_name'] = $params['name'];
                $dataInsert['customer_address'] = $params['address'];
                $dataInsert['city'] = $getDataKabupaten->row()->nama;
                $dataInsert['province'] = $getDataPropinsi->row()->nama;
                $dataInsert['customer_email'] = $params['email'];
                $dataInsert['customer_telp'] = $params['phone'];
                $dataInsert['order_date'] = $dateNow;
                $dataInsert['delivery_type'] = 'JNE';
                $dataInsert['total_price'] = $this->cart->total() + ($this->cart->total() * (10/100));
                $dataInsert['price_code'] = $this->randCode();
                $dataInsert['status'] = 0;

                $insertData = $this->GLobalModel->insert($dataInsert, 'ur_order');
                if($insertData){
                    $dataSelect['customer_name'] = $params['name'];
                    $dataSelect['customer_address'] = $params['address'];
                    $dataSelect['city'] = $getDataKabupaten->row()->nama;
                    $dataSelect['province'] = $getDataPropinsi->row()->nama;
                    $dataSelect['customer_email'] = $params['email'];
                    $dataSelect['customer_telp'] = $params['phone'];
                    // $dataSelect['order_date'] = $dateNow;
                    $dataSelect['delivery_type'] = 'JNE';
                    $dataSelect['total_price'] = $this->cart->total() + ($this->cart->total() * (10/100));
                    // $dataSelect['status'] = 0;
                    $selectData = $this->GLobalModel->select($dataSelect, 'ur_order');
                    $date = new DateTime($selectData->row()->order_date);
                    $date->add(new DateInterval('PT12H'));
                    
                    $data['customer_code'] = $selectData->row()->order_code;
                    $data['customer_email'] = $selectData->row()->customer_email;
                    $data['order_date'] = $date->format('Y-m-d H:i:s');
                    header("location:".base_url('index/paymentMethod/'.$selectData->row()->order_code));
                }
            }else{
                $date = new DateTime($selectData->row()->order_date);
                $date->add(new DateInterval('PT12H'));
                    
                $data['order_code'] = $selectData->row()->order_code;
                $data['customer_email'] = $selectData->row()->customer_email;
                $data['order_date'] = $date->format('Y-m-d H:i:s');
            }
            header("location:".base_url('index/paymentMethod/'.$selectData->row()->order_code));
        }

    }

    function generateBillingPayment(){
        $dataSelect['order_date >'] = date('Y-m-d');
        $getData = $this->GLobalModel->select($dataSelect, 'ur_order');
        $codeBillingPayment = date('ymd').($getData->num_rows()+1);
        return $codeBillingPayment;
    }
    function band_detail($band_code = 0){
        if($band_code != 0){
            $dataSelect['band_code'] = $band_code;
            $getData = $this->GLobalModel->select($dataSelect, 'ur_band');
            $data['dataBand'] = $getData;
            $getData = $this->GLobalModel->select($dataSelect, 'ur_product');
            $data['dataProduct'] = $getData;
            $data['view'] = 'main_html/content/band_detail';
        }else{
            $data['view'] = 'main_html/content/band_edit';
        }
        $data['parent'] = $this;
        $this->load->view('main_html/content_dinamis', $data);             
    }
    function paymentMethod($orderCode = null){
        if($orderCode != null){

            $dataselect['order_code'] = $orderCode;
            $selectData = $this->GLobalModel->select($dataselect, 'ur_order');            

            $date = new DateTime($selectData->row()->order_date);
            $date->add(new DateInterval('PT12H'));

            $data['order_code'] = $selectData->row()->order_code;
            $data['customer_email'] = $selectData->row()->customer_email;
            $data['order_date'] = $date->format('Y-m-d H:i:s');
        }
        $data['view'] = 'main_html/content/payment_method';
        $data['parent'] = $this;
        $this->load->view('main_html/content_dinamis', $data);        
    }
    function testSubstr(){
        echo substr(1000123, -3, 3);
    }
    function billingPayment($orderCode = null, $customerCode = null){
        $this->emptyCart();
        if($orderCode != null){
            if ($customerCode == null) {
                $dataselect['order_code'] = $orderCode;
                $selectData = $this->GLobalModel->select($dataselect, 'ur_order');            

                $modifPrice = substr($selectData->row()->total_price, -3, 3) == 000?false:true;

                if($modifPrice){            
                    $date = new DateTime($selectData->row()->order_date);
                    $date->add(new DateInterval('PT12H'));

                    $data['order_code'] = $selectData->row()->order_code;
                    $data['customer_code'] = $selectData->row()->customer_code;
                    $data['count'] = $selectData->num_rows();
                    $data['customer_email'] = $selectData->row()->customer_email;
                    $data['customer_name'] = $selectData->row()->customer_name;                
                    $data['order_date'] = $date->format('D, d M Y H:i:s');
                    $data['price'] = $selectData->row()->total_price;
                    $data['price_code'] = $selectData->row()->price_code;
                }else{
                    // update price
                    $dataCondition['order_code'] = $selectData->row()->order_code;
                    $dataUpdate['total_price'] = $selectData->row()->total_price + $this->randCode();
                    $update = $this->GLobalModel->update($dataCondition, $dataUpdate, 'ur_order');

                    $dataselect['order_code'] = $orderCode;
                    $selectData = $this->GLobalModel->select($dataselect, 'ur_order');
                    
                    $date = new DateTime($selectData->row()->order_date);
                    $date->add(new DateInterval('PT12H'));

                    $data['order_code'] = $selectData->row()->order_code;
                    $data['customer_code'] = $selectData->row()->customer_code;
                    $data['count'] = $selectData->num_rows();
                    $data['customer_email'] = $selectData->row()->customer_email;
                    $data['customer_name'] = $selectData->row()->customer_name;
                    $data['order_date'] = $date->format('D, d M Y H:i:s');
                    $data['price'] = $selectData->row()->total_price;
                    $data['price_code'] = $selectData->row()->price_code;                
                }
            }else{
                $dataselect['order_code'] = $orderCode;
                $dataselect['customer_code'] = $customerCode;
                $selectData = $this->GLobalModel->select($dataselect, 'ur_order');
                if ($selectData->num_rows() > 0) {
                    $date = new DateTime($selectData->row()->order_date);
                    $date->add(new DateInterval('PT12H'));

                    $data['order_code'] = $selectData->row()->order_code;
                    $data['customer_code'] = $selectData->row()->customer_code;
                    $data['count'] = $selectData->num_rows();
                    $data['customer_email'] = $selectData->row()->customer_email;
                    $data['customer_name'] = $selectData->row()->customer_name;
                    $data['order_date'] = $date->format('D, d M Y H:i:s');
                    $data['price'] = $selectData->row()->total_price;
                    $data['price_code'] = $selectData->row()->price_code;    
                }else{
                    redirect('index','location');
                }
            }
        }else{
            redirect('index','refresh');
        }
        $data['view'] = 'main_html/content/billing_payment';
        $data['parent'] = $this;
        $this->load->view('main_html/content_dinamis', $data);        
    }
    function check_billingPayment()
    {
        $params = $this->input->post();
        redirect('Index/billingPayment/'.$params["order_code"]."/".$params["customer_code"],'location');
    }
    function randCode(){
        return rand(101, 1999);
    }
    function detail_band($band_code = null, $page_product = 1){
        $data['view'] = 'main_html/content/detail_band';
        $data['parent'] = $this;
        $this->load->view('main_html/content_dinamis', $data);
    }
    function all_band(){
        $data['table'] = $this->GLobalModel->get('ur_band'); 
        $data['view'] = 'main_html/content/all_band';
        $data['parent'] = $this;
        $this->load->view('main_html/content_dinamis', $data);
    }
    function all_product($id_category = 1, $page = 1){
        $page -= 1;
        $limit = 12;
        $offset = $page * $limit;
        $data['currentPage'] = $page + 1;
        $dataProduct = $this->GLobalModel->rawQuery("SELECT *
                                                        FROM ur_product
                                                        INNER JOIN ur_category ON ur_category.category_code = ur_product.category
                                                        WHERE ur_product.category = $id_category
                                                        ORDER BY product_code                                                        
                                                        LIMIT ".$limit." OFFSET ".$offset.";");
        $data['category'] = $id_category;
        $data['row'] = $dataProduct->num_rows();
        $dataCount = $this->GLobalModel->get('ur_product');
        $data['count'] = round($dataCount->num_rows() / $limit, 0, PHP_ROUND_HALF_UP);
        $data['table'] = $dataProduct;
        $data['view'] = 'main_html/content/all_product';
        $data['parent'] = $this;
        $this->load->view('main_html/content_dinamis', $data);
    }
    function getCategory(){
        $getData = $this->GLobalModel->get('ur_category');
        return $getData;
    }
    function cart(){
        $data['view'] = 'main_html/content/cart';
        $data['parent'] = $this;
        $this->load->view('main_html/content_dinamis', $data);
    }
    function billing_payment(){
        $data['view'] = 'main_html/content/billing_payment';
        $data['parent'] = $this;
        $this->load->view('main_html/content_dinamis', $data);
    }
    function payment_method(){
        $data['view'] = 'main_html/content/payment_method';
        $data['parent'] = $this;
        $this->load->view('main_html/content_dinamis', $data);
    }
    function provinsi(){
        $propinsi = $this->db->get('provinsi');
        echo "<select id='provinsi' class='form-control bg-dark' onChange='loadKabupaten()' class='form-control' name='provinsi'>";
        echo "<option value='-' selected>PILIH PROVINSI</option>";
        foreach ($propinsi->result() as $k)
        {
            echo "<option value='$k->id'>$k->nama</option>";
        }
        echo "</select>";
    }
    function sendMail(){
        $this->email->from('mhandharbeni@koperasi-weta.com', 'Muhammad Handharbeni');
        $this->email->to('mhandharbeni@gmail.com');
        // $this->email->cc('another@another-example.com');
        // $this->email->bcc('them@their-example.com');

        $this->email->subject('Email Test');
        $this->email->message('Testing the email class.');

        $this->email->send();        
    }
    function kabupaten(){
        $propinsiID = $this->input->get('id');
        $kabupaten   = $this->db->get_where('kabupaten',array('id_prov'=>$propinsiID));
        echo "<select id='kabupaten' class='form-control bg-dark' onChange='loadKecamatan()' class='form-control' name='kabupaten'>";
        echo "<option value='-' selected>PILIH KABUPATEN</option>";
        foreach ($kabupaten->result() as $k)
        {
            echo "<option value='$k->id'>$k->nama</option>";
        }
        echo "</select>";
    }
    
    function kecamatan(){
        $kabupatenID = $this->input->get('id');
        $kecamatan   = $this->db->get_where('kecamatan',array('id_kabupaten'=>$kabupatenID));
        echo "<select id='kecamatan' class='form-control bg-dark'  onChange='loadDesa()' class='form-control' name='kecamatan'>";
        echo "<option value='-' selected>PILIH KECAMATAN</option>";
        foreach ($kecamatan->result() as $k)
        {
            echo "<option value='$k->id'>$k->nama</option>";
        }
        echo"</select>";
    }
    
    function desa(){
        $kecamatanID  = $this->input->get('id');
        $desa         = $this->db->get_where('desa',array('id_kecamatan'=>$kecamatanID));
        echo "<select class='form-control bg-dark' name='desa'>";
        echo "<option value='-' selected>PILIH DESA</option>";
        foreach ($desa->result() as $d)
        {
            echo "<option value='$d->id'>$d->nama</option>";
        }
        echo"</select>";
    }
    function testRandomString(){
        echo $this->checkExistOrderCode();
    }
    function checkExistOrderCode(){
        $randomString = $this->generateRandomString();
        $dataSelect['order_code'] = $randomString;
        $selectData = $this->GLobalModel->select($dataSelect, 'ur_order');
        if($selectData->num_rows() < 1){
            return $randomString;
        }else{
            $this->checkExistOrderCode();
        }
    }
    function generateRandomString($length = 8) {
        return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
    }
    function getDate(){
        echo date('m') + 1;
    }
}
