<?php

class Mobile extends CI_Controller {

    public $data = array();

    function __construct() {
        parent::__construct();
        header("Access-Control-Allow-Origin: *");
        $this->load->helper(array('form', 'url'));
        $this->load->library('myutil');
        $this->load->library('session');

        $this->load->model("datamodel");
        $this->datamodel->table_name = ' mbrand bb';
        $this->datamodel->field_name = " bb.*,(select count(*) from mproduct where bb.brand_id=brand_id)  cnt ";
        $this->datamodel->condition = ' order by cnt desc ';
        $this->data['list_brand'] = $this->datamodel->list_data_join();

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
        $this->data['session'] = array(
            'session_user' => $this->session->userdata('session_user'),
            'session_time_use' => $this->session->userdata('session_time_use'),
            'session_status' => $this->session->userdata('session_status'),
        );
        /*
         * ************************** Session *********************
         */
    }

    public function initSession() {
        if (empty($_POST)) {
            $this->load->view('header', $this->data);
            $this->load->view('login', $this->data);
            $this->load->view('footer');
        } else {
            if ($_POST['username'] == 'admin' && $_POST['password'] == 'systemadmin') {
                $this->session->set_userdata(array(
                    'session_user' => 'admin',
                    'session_time_use' => date('d-m-Y'),
                    'session_status' => true
                ));
                redirect('mobile/index', 'refresh');
            } else {
                $this->session->set_userdata(array('message' => 'username or password incorrect'));
                $this->data['message'] = $this->session->userdata('message');

                $this->load->view('header', $this->data);
                $this->load->view('login', $this->data);
                $this->load->view('footer');
            }
        }
    }

    public function destroySession() {
        $this->session->set_userdata(array(
            'session_user' => '',
            'session_time_use' => '',
            'session_status' => false
        ));
        redirect('mobile/index', 'refresh');
    }

    public function index() {

        $this->datamodel->table_name = ' mproduct ';
        $this->datamodel->field_name = ' * ';
        $this->datamodel->condition = ' order by last_update desc ';
        $this->data['list_last_update'] = $this->datamodel->list_data();


        $this->datamodel->table_name = ' mproduct bb';
        $this->datamodel->field_name = " cpu_vol data_value,count(*) data_cnt ";
        $this->datamodel->condition = ' group by cpu_vol order by data_value desc';
        $this->data['list_cpu_vol'] = $this->datamodel->list_data_join();

        $this->datamodel->table_name = ' mproduct bb';
        $this->datamodel->field_name = " cpu_core data_value,count(*) data_cnt ";
        $this->datamodel->condition = ' group by cpu_core order by data_value desc';
        $this->data['list_cpu_core'] = $this->datamodel->list_data_join();

        $this->datamodel->table_name = ' mproduct bb';
        $this->datamodel->field_name = " ram data_value,count(*) data_cnt ";
        $this->datamodel->condition = ' group by ram order by data_value desc';
        $this->data['list_ram'] = $this->datamodel->list_data_join();

        $this->datamodel->table_name = ' mproduct bb';
        $this->datamodel->field_name = " batt data_value,count(*) data_cnt ";
        $this->datamodel->condition = ' group by batt order by data_value desc';
        $this->data['list_bat'] = $this->datamodel->list_data_join();
        $this->datamodel->table_name = ' mproduct bb';
        $this->datamodel->field_name = " cam_f data_value,count(*) data_cnt ";
        $this->datamodel->condition = ' group by cam_f order by data_value desc';
        $this->data['list_cam_f'] = $this->datamodel->list_data_join();

        $this->datamodel->table_name = ' mproduct bb';
        $this->datamodel->field_name = " cam_b data_value,count(*) data_cnt ";
        $this->datamodel->condition = ' group by cam_b order by data_value desc';
        $this->data['list_cam_b'] = $this->datamodel->list_data_join();

        $this->datamodel->table_name = ' mproduct bb';
        $this->datamodel->field_name = " rom_in data_value,count(*) data_cnt ";
        $this->datamodel->condition = ' group by rom_in order by data_value desc';
        $this->data['list_rom'] = $this->datamodel->list_data_join();

        $this->datamodel->table_name = ' mproduct bb';
        $this->datamodel->field_name = " rom_ext data_value,count(*) data_cnt ";
        $this->datamodel->condition = ' group by rom_ext order by data_value desc';
        $this->data['list_rom_ext'] = $this->datamodel->list_data_join();

        $this->datamodel->table_name = ' mproduct bb';
        $this->datamodel->field_name = " screen_size data_value,count(*) data_cnt ";
        $this->datamodel->condition = ' group by screen_size order by data_value desc';
        $this->data['list_screen'] = $this->datamodel->list_data_join();

        $this->datamodel->table_name = ' mproduct bb';
        $this->datamodel->field_name = " sim data_value,count(*) data_cnt ";
        $this->datamodel->condition = ' group by sim order by data_value desc';
        $this->data['list_sim'] = $this->datamodel->list_data_join();

        $this->datamodel->table_name = ' mproduct bb';
        $this->datamodel->field_name = " weight data_value,count(*) data_cnt ";
        $this->datamodel->condition = ' group by weight order by data_value desc';
        $this->data['list_weight'] = $this->datamodel->list_data_join();

        $this->data['colors'] = $this->myutil->colors;

        $this->load->view('header', $this->data);
        $this->load->view('main', $this->data);
        $this->load->view('footer');
    }

    public function search() {
        $param1 = (empty($_GET['param1']) ? '' : $_GET['param1']);
        $param2 = (empty($_GET['param2']) ? '' : $_GET['param2']);
        $param3 = (empty($_GET['param3']) ? '' : $_GET['param3']);
        $param4 = (empty($_GET['param4']) ? '' : $_GET['param4']);
        $param5 = (empty($_GET['param5']) ? '' : $_GET['param5']);
        //$param5 = $_GET['param5'];
        $productId = (empty($_GET['productId']) ? '' : $_GET['productId']);

        $this->load->model('datamodel');
        $this->datamodel->field_name = ' * ';
        $this->datamodel->table_name = ' mproduct';


        $conditions = ' WHERE 1=1';
        if (!empty($param1)) {
            $conditions .= ' AND (';
            $conditions .= " product_name like '%" . $param1 . "%' ";
            $conditions .= " OR weight like '%" . $param1 . "%' ";
            $conditions .= " OR series like '%" . $param1 . "%' ";
            $conditions .= " OR screen_size like '%" . $param1 . "%' ";
            $conditions .= " OR sim like '%" . $param1 . "%' ";
            $conditions .= " OR batt like '%" . $param1 . "%' ";
            $conditions .= " OR cpu_core like '%" . $param1 . "%' ";
            $conditions .= " OR cpu_vol like '%" . $param1 . "%' ";
            $conditions .= " OR ram like '%" . $param1 . "%' ";
            $conditions .= " OR rom_in like '%" . $param1 . "%' ";
            $conditions .= " OR rom_ext like '%" . $param1 . "%' ";
            $conditions .= " OR cam_f like '%" . $param1 . "%' ";
            $conditions .= " OR cam_b like '%" . $param1 . "%' ";
            $conditions .= " OR price_url like '%" . $param1 . "%' ";
            $conditions .= " OR prod_url like '%" . $param1 . "%' ";
            $conditions .= ' ) ';
        }
        if (!empty($param2)) {
            $conditions .= ' AND brand_id = ' . $param2;
        }
        if (!empty($param3)) {
            $conditions .= ' AND product_id = ' . $param3;
        }
        if (!empty($param4)) {
            $conditions .= ' AND ' . $param4 . ' = \'' . $param5 . '\'';
        }
        if (intval($productId)) {
            $conditions .= ' AND product_id != ' . $productId;
        }
        $conditions .= " ORDER BY  cpu_vol desc,rom_in desc,ram desc,screen_size desc";
        //var_dump($conditions);

        $this->datamodel->condition = $conditions;

        $this->data['mobiles'] = $this->datamodel->list_data();

        $this->datamodel->field_name = ' * ';
        $this->datamodel->table_name = ' mbrand';
        $this->datamodel->condition = ' ORDER BY name_th ASC';
        $this->data['brands'] = $this->datamodel->list_data();

        if (empty($param2)) {
            $this->data['brand'] = (object) array(
                        'brand_id' => '',
                        'name_th' => '',
                        'name_en' => '',
                        'logo' => '',
                        'cnt' => '',
            );
        } else {
            $this->datamodel->table_name = ' mbrand bb';
            $this->datamodel->field_name = " bb.*,(select count(*) from mproduct where bb.brand_id=brand_id)  cnt ";
            $this->datamodel->condition = ' where bb.brand_id = ' . $param2;
            $this->data['brand'] = $this->datamodel->data();
        }

        $this->data['params'] = array(
            'param1' => $param1,
            'param2' => $param2,
            'param3' => $param3,
            'param4' => $param4,
            'param5' => $param5,
        );

        $this->data['param1'] = $param1;
        $this->data['param2'] = $param2;
        $this->data['param3'] = $param3;
        $this->data['param4'] = $param4;
        $this->data['param5'] = $param5;
        $this->data['colors'] = $this->myutil->colors;

        $this->load->view('header', $this->data);
        $this->load->view('items', $this->data);
        $this->load->view('footer');
    }

    public function item($id) {

        $param1 = $_GET['param1'];
        $param2 = $_GET['param2'];


        $this->load->model('datamodel');

        $this->datamodel->table_name = ' mproduct p,mbrand b';
        $this->datamodel->field_name = ' p.*,b.name_th brand_name ';
        $this->datamodel->condition = ' WHERE p.brand_id = b.brand_id AND product_id = ' . $id;
        $this->data['product'] = $this->datamodel->data();

        $this->datamodel->field_name = ' * ';
        $this->datamodel->table_name = ' mbrand';
        $this->datamodel->condition = ' ORDER BY name_th ASC';
        $this->data['brands'] = $this->datamodel->list_data();

        $this->data['performanc_attr'] = $this->myutil->performanc_attr;
        $this->data['mutimedia_attr'] = $this->myutil->mutimedia_attr;
        $this->data['ass_attr'] = $this->myutil->ass_attr;
        $this->data['feature'] = $this->myutil->features;

        $this->data['params']['param1'] = $param1;
        $this->data['params']['param2'] = $param2;

        $this->load->view('header', $this->data);
        $this->load->view('item_detail', $this->data);
        $this->load->view('footer');
    }

}
