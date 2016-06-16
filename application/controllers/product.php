<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Product extends CI_Controller {

    public $data = array();

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('session');
        $this->load->library('myutil');
        $this->load->database();

        $this->data['params'] = array(
            'param1' => '',
            'param2' => '',
            'param3' => '',
            'param4' => '',
            'param5' => '',
        );

        /*
         * ************************** Session *********************
         */
        if ($this->session->userdata('session_status')) {
            $this->data['session'] = array(
                'session_user' => $this->session->userdata('session_user'),
                'session_time_use' => $this->session->userdata('session_time_use'),
                'session_status' => $this->session->userdata('session_status'),
            );
        }
        /*
         * ************************** Session *********************
         */
    }

    public function index($id = null) {
        $session_status = $this->session->userdata('session_status');
        if (!$session_status) {
            redirect('mobile/initSession', 'refresh');
        } else {
            $this->load->model('datamodel');
            $fields = " m.*,";
            $fields .= " b.name_th brand_name_th";
            $this->datamodel->field_name = $fields;
            $this->datamodel->table_name = ' mproduct m';
            $this->datamodel->condition = ' left join mbrand b ON b.brand_id = m.brand_id';
            $this->data['list_product'] = $this->datamodel->list_data_join();

            if ($id != null) {
                $this->datamodel->field_name = " * ";
                $this->datamodel->table_name = ' mproduct bb';
                $this->datamodel->condition = 'where bb.product_id=' . $id;
                $this->datamodel->order = '';
                $this->data['data_product'] = $this->datamodel->data();
            } else {
                $this->data['data_product'] = (object) array(
                            'product_id' => '',
                            'brand_id' => '',
                            'product_name' => '',
                            'series' => '',
                            'weight' => '',
                            'screen_size' => '',
                            'sim' => '',
                            'batt' => '',
                            'cpu_core' => '',
                            'cpu_vol' => '',
                            'ram' => '',
                            'rom_in' => '',
                            'rom_ext' => '',
                            'cam_f' => '',
                            'cam_b' => '',
                            'price_url' => '',
                            'prod_url' => '',
                            'comment' => '',
                            'relatelink' => '',
                            'embed' => '',
                            'last_update' => '',
                );
            }

            /*
             * Load BrandModel
             */
            $this->datamodel->field_name = ' * ';
            $this->datamodel->table_name = ' mbrand';
            $this->datamodel->condition = ' order by name_en asc';
            $this->data['data_brand'] = $this->datamodel->list_data();

            $this->load->view('header', $this->data);
            $this->load->view('/admin/product', $this->data);
            $this->load->view('footer');
        }
    }

    public function saveProduct() {
        $product_id = $_POST['product_id'];

        $this->data = array(
            'brand_id' => $_POST['brand_id'],
            'product_name' => $_POST['product_name'],
            'series' => $_POST['series'],
            'weight' => $_POST['weight'],
            'screen_size' => $_POST['screen_size'],
            'sim' => $_POST['sim'],
            'batt' => $_POST['batt'],
            'cpu_core' => $_POST['cpu_core'],
            'cpu_vol' => $_POST['cpu_vol'],
            'ram' => $_POST['ram'],
            'rom_in' => $_POST['rom_in'],
            'rom_ext' => $_POST['rom_ext'],
            'cam_f' => $_POST['cam_f'],
            'cam_b' => $_POST['cam_b'],
            'price_url' => $_POST['price_url'],
            'prod_url' => $_POST['prod_url'],
            'comment' => $_POST['comment'],
            'relatelink' => $_POST['relatelink'],
            'embed' => $_POST['embed'],
            'last_update' => date('Y-m-d'),
        );
        if (empty($product_id)) {
            $exe = $this->db->insert('mproduct', $this->data);
        } else {
            $this->db->where('product_id', $product_id);
            $exe = $this->db->update('mproduct', $this->data);
        }
        redirect('product/index', 'refresh');
    }

    public function deleteProduct($id) {
        $this->db->delete('mproduct', array('product_id' => $id));
        redirect('product/index', 'refresh');
    }

}
