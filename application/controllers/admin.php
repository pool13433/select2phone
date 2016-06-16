<?php

class Admin extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('session');
        $this->load->library('myutil');
    }

    public function index() {
        echo 'Hello World!';
    }

    public function listExample() {
        $user_name = $this->is_login();
        if ($user_name != false) {
            $data['u_disp'] = $user_name;

            $this->load->model("datamodel");
            $this->datamodel->table_name = 'example';
            $this->datamodel->condition = ' order by code_id';
            $list_data = $this->datamodel->list_data();
            $data['list_data'] = $list_data;
            $this->load->view('example_list', $data);
        }
    }

    public function formExample() {
        $user_name = $this->is_login();
        if ($user_name != false) {
            $data['u_disp'] = $user_name;

            $cmd = $this->input->post('cmd');
            if ($cmd == 'edit') {
                $this->load->model("datamodel");
                $this->datamodel->table_name = 'example';
                $this->datamodel->pk_name = 'code_id';
                $this->datamodel->pk_value = $this->input->post('code_id');
                $obj = $this->datamodel->load();
                $data['cmd'] = "update";
            } else {
                $obj = new MyDto();
                $obj->code_id = 0;
                $obj->tdesc = "";
                $obj->edesc = "";
                $data['cmd'] = "insert";
            }
            $data['obj'] = $obj;
            $this->load->view('example_form', $data);
        }
    }

    public function submitExample() {
        $user_name = $this->is_login();
        if ($user_name != false) {
            $data['u_disp'] = $user_name;

            $cmd = $_POST['cmd'];
            $this->load->model("datamodel");
            $this->datamodel->table_name = 'example';
            $this->datamodel->pk_name = 'code_id';
            $obj = new MyDto();
            $obj->tdesc = $this->input->post('tdesc');
            $obj->edesc = $this->input->post('edesc');
            if ($cmd == 'delete') {
                $this->datamodel->pk_value = $this->input->post('code_id');
                $this->datamodel->delete();
            } else if ($cmd == 'insert') {
                $obj->code_id = 0;
                $this->datamodel->insert($obj);
            } else if ($cmd == 'update') {
                $this->datamodel->pk_value = $this->input->post('code_id');
                $this->datamodel->update($obj);
            }
            $this->listExample();
        }
    }

    public function listConfig() {
        $user_name = $this->is_login();
        if ($user_name != false) {
            $data['u_disp'] = $user_name;

            $this->load->model("datamodel");
            $this->datamodel->table_name = 'config_content';
            $this->datamodel->condition = ' order by config_id';
            $list_data = $this->datamodel->list_data();
            $data['list_data'] = $list_data;
            $this->load->view('config_list', $data);
        }
    }

    public function formConfig() {
        $user_name = $this->is_login();
        if ($user_name != false) {
            $data['u_disp'] = $user_name;

            $cmd = $this->input->post('cmd');
            if ($cmd == 'edit') {
                $this->load->model("datamodel");
                $this->datamodel->table_name = 'config_content';
                $this->datamodel->pk_name = 'config_id';
                $this->datamodel->pk_value = $this->input->post('code_id');
                $obj = $this->datamodel->load();
                $data['cmd'] = "update";
            } else {
                $obj = new MyDto();
                $obj->config_id = 0;
                $obj->config_name = "";
                $obj->header_th = "";
                $obj->header_en = "";
                $obj->content_th = "";
                $obj->content_en = "";
                $data['cmd'] = "insert";
            }
            $data['obj'] = $obj;
            $this->load->view('config_form', $data);
        }
    }

    public function submitConfig() {
        $user_name = $this->is_login();
        if ($user_name != false) {
            $data['u_disp'] = $user_name;

            $cmd = $_POST['cmd'];
            $this->load->model("datamodel");
            $this->datamodel->table_name = 'config_content';
            $this->datamodel->pk_name = 'config_id';
            $obj = new MyDto();
            $obj->config_name = $this->input->post('config_name');
            $obj->header_th = $this->input->post('header_th');
            $obj->header_en = $this->input->post('header_en');
            $obj->content_th = $this->input->post('content_th');
            $obj->content_en = $this->input->post('content_en');

            if ($cmd == 'delete') {
                $this->datamodel->pk_value = $this->input->post('code_id');
                $this->datamodel->delete();
            } else if ($cmd == 'insert') {
                $obj->config_id = 0;
                $this->datamodel->insert($obj);
            } else if ($cmd == 'update') {
                $this->datamodel->pk_value = $this->input->post('code_id');
                $this->datamodel->update($obj);
            }
            $this->listConfig();
        }
    }

    public function listActivityGroup() {
        $user_name = $this->is_login();
        if ($user_name != false) {
            $data['u_disp'] = $user_name;

            $this->load->model("datamodel");
            $this->datamodel->table_name = 'activity_group';
            $this->datamodel->condition = ' order by group_id';
            $list_data = $this->datamodel->list_data();
            $data['list_data'] = $list_data;
            $this->load->view('activity_group_list', $data);
        }
    }

    public function formActivityGroup() {
        $user_name = $this->is_login();
        if ($user_name != false) {
            $data['u_disp'] = $user_name;
            $cmd = $this->input->post('cmd');
            $this->load->model("datamodel");
            if ($cmd == 'edit') {
                $this->datamodel->table_name = 'activity_group';
                $this->datamodel->pk_name = 'group_id';
                $this->datamodel->pk_value = $this->input->post('code_id');
                $obj = $this->datamodel->load();
                $data['cmd'] = "update";
            } else {
                $obj = new MyDto();
                $obj->group_id = "";
                $obj->group_name = "";

                $data['cmd'] = "insert";
            }
            $data['obj'] = $obj;
            $this->load->view('activity_group_form', $data);
        }
    }

    public function submitActivityGroup() {
        $user_name = $this->is_login();
        if ($user_name != false) {
            $data['u_disp'] = $user_name;
            $cmd = $_POST['cmd'];
            $this->load->model("datamodel");
            $this->datamodel->table_name = 'activity_group';
            $this->datamodel->pk_name = 'group_id';
            $obj = new MyDto();
            $obj->group_id = $this->input->post('code_id');
            $obj->group_name = $this->input->post('group_name');

            if ($cmd == 'delete') {
                $this->datamodel->pk_value = $this->input->post('code_id');
                $this->datamodel->delete();
            } else if ($cmd == 'insert') {
                $this->datamodel->insert($obj);
            } else if ($cmd == 'update') {
                $this->datamodel->pk_value = $this->input->post('code_id');
                $this->datamodel->update($obj);
            }
            $this->listActivityGroup();
        }
    }

    public function listActivity() {
        $user_name = $this->is_login();
        if ($user_name != false) {
            $data['u_disp'] = $user_name;

            $this->load->model("datamodel");
            $this->datamodel->table_name = 'activity';
            $this->datamodel->condition = ' order by activity_id';
            $list_data = $this->datamodel->list_data();
            $data['list_data'] = $list_data;
            $this->load->view('activity_list', $data);
        }
    }

    public function formActivity() {
        $user_name = $this->is_login();
        if ($user_name != false) {
            $data['u_disp'] = $user_name;

            $this->load->model("datamodel");
            $this->datamodel->table_name = 'activity_group';
            $this->datamodel->condition = ' order by group_id';
            $list_group = $this->datamodel->list_data();
            $data['list_group'] = $list_group;
            $cmd = $this->input->post('cmd');
            if ($cmd == 'edit') {
                $this->datamodel->table_name = 'activity';
                $this->datamodel->pk_name = 'activity_id';
                $this->datamodel->pk_value = $this->input->post('code_id');
                $obj = $this->datamodel->load();
                $data['cmd'] = "update";
            } else {
                $obj = new MyDto();
                $obj->activity_id = 0;
                $obj->activity_name = "";
                $obj->group_id = "";
                $obj->activity_desc = "";
                $obj->start_date = "";
                $obj->end_date = "";
                $obj->photo1 = "";
                $obj->photo2 = "";
                $obj->photo3 = "";
                $obj->photo4 = "";
                $obj->photo5 = "";
                $obj->photo6 = "";
                $obj->pdesc1 = "";
                $obj->pdesc2 = "";
                $obj->pdesc3 = "";
                $obj->pdesc4 = "";
                $obj->pdesc5 = "";
                $obj->pdesc6 = "";

                $data['cmd'] = "insert";
            }
            $data['obj'] = $obj;
            $this->load->view('activity_form', $data);
        }
    }

    public function submitActivity() {
        $user_name = $this->is_login();
        if ($user_name != false) {
            $data['u_disp'] = $user_name;
            $cmd = $_POST['cmd'];
            $this->load->model("datamodel");
            $this->datamodel->table_name = 'activity';
            $this->datamodel->pk_name = 'activity_id';
            $obj = new MyDto();
            $obj->activity_name = $this->input->post('activity_name');
            $obj->activity_desc = $this->input->post('activity_desc');
            $obj->group_id = $this->input->post('group_id');
            ;
            $start_date = $this->input->post('start_date');
            $end_date = $this->input->post('end_date');

            if ($start_date != "") {
                list($d, $m, $y) = explode('/', $start_date);
                $obj->start_date = $y . "-" . $m . "-" . $d;
            }
            if ($end_date != "") {
                list($d, $m, $y) = explode('/', $end_date);
                $obj->end_date = $y . "-" . $m . "-" . $d;
            }
            $obj->pdesc1 = $this->input->post('pdesc1');
            $obj->pdesc2 = $this->input->post('pdesc2');
            $obj->pdesc3 = $this->input->post('pdesc3');
            $obj->pdesc4 = $this->input->post('pdesc4');
            $obj->pdesc5 = $this->input->post('pdesc5');
            $obj->pdesc6 = $this->input->post('pdesc6');


            if ($cmd != 'delete') {
                $this->load->library('image_lib');
                $config['upload_path'] = 'upload/activity';
                $config['allowed_types'] = '*';
                //$config['max_size']	= '1000';
                $rand = rand(1111, 9999);
                $date = date("Y-m-d ");
                $config['file_name'] = $date . $rand;
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('photo1')) {
                    $data['err'] = $this->upload->display_errors();
                    //echo "dfdfdf1 ".$data['err'];
                } else {

                    $data_upload = $this->upload->data();
                    $fname = $data_upload['file_name'];
                    $this->resize($data_upload);
                    $obj->photo1 = $fname;
                }
                if (!$this->upload->do_upload('photo2')) {
                    $data['err'] = $this->upload->display_errors();
                    //echo "dfdfdf1 ".$data['err'];
                } else {

                    $data_upload = $this->upload->data();
                    $fname = $data_upload['file_name'];
                    $this->resize($data_upload);
                    $obj->photo2 = $fname;
                }

                if (!$this->upload->do_upload('photo3')) {
                    $data['err'] = $this->upload->display_errors();
                    //echo "dfdfdf1 ".$data['err'];
                } else {

                    $data_upload = $this->upload->data();
                    $fname = $data_upload['file_name'];
                    $this->resize($data_upload);
                    $obj->photo3 = $fname;
                }

                if (!$this->upload->do_upload('photo4')) {
                    $data['err'] = $this->upload->display_errors();
                    //echo "dfdfdf1 ".$data['err'];
                } else {

                    $data_upload = $this->upload->data();
                    $fname = $data_upload['file_name'];
                    $this->resize($data_upload);
                    $obj->photo4 = $fname;
                }
                if (!$this->upload->do_upload('photo5')) {
                    $data['err'] = $this->upload->display_errors();
                    //echo "dfdfdf1 ".$data['err'];
                } else {

                    $data_upload = $this->upload->data();
                    $fname = $data_upload['file_name'];
                    $this->resize($data_upload);
                    $obj->photo5 = $fname;
                }
                if (!$this->upload->do_upload('photo6')) {
                    $data['err'] = $this->upload->display_errors();
                    //echo "dfdfdf1 ".$data['err'];
                } else {

                    $data_upload = $this->upload->data();
                    $fname = $data_upload['file_name'];
                    $this->resize($data_upload);
                    $obj->photo6 = $fname;
                }
            }

            if ($cmd == 'delete') {
                $this->datamodel->pk_value = $this->input->post('code_id');
                $this->datamodel->delete();
            } else if ($cmd == 'insert') {
                $obj->activity_id = 0;
                $this->datamodel->insert($obj);
            } else if ($cmd == 'update') {
                $this->datamodel->pk_value = $this->input->post('code_id');
                $this->datamodel->update($obj);
            } else if ($cmd == 'delete_file') {
                $this->datamodel->pk_value = $this->input->post('code_id');
                $this->datamodel->field_clear = $this->input->post('file_id');
                $this->datamodel->update_clear();
            }
            $this->listActivity();
        }
    }

    public function listDocumentGroup() {
        $user_name = $this->is_login();
        if ($user_name != false) {
            $data['u_disp'] = $user_name;

            $this->load->model("datamodel");
            $this->datamodel->table_name = 'document_group';
            $this->datamodel->condition = ' order by group_id';
            $list_data = $this->datamodel->list_data();
            $data['list_data'] = $list_data;
            $this->load->view('document_group_list', $data);
        }
    }

    public function formDocumentGroup() {
        $user_name = $this->is_login();
        if ($user_name != false) {
            $data['u_disp'] = $user_name;
            $cmd = $this->input->post('cmd');
            $this->load->model("datamodel");



            if ($cmd == 'edit') {
                $this->datamodel->table_name = 'document_group';
                $this->datamodel->pk_name = 'group_id';
                $this->datamodel->pk_value = $this->input->post('code_id');
                $obj = $this->datamodel->load();
                $data['cmd'] = "update";
            } else {
                $obj = new MyDto();
                $obj->group_id = "";
                $obj->group_name = "";
                $obj->doc_file = "";
                $data['cmd'] = "insert";
            }
            $data['obj'] = $obj;
            $this->load->view('document_group_form', $data);
        }
    }

    public function submitDocumentGroup() {
        $user_name = $this->is_login();
        if ($user_name != false) {
            $data['u_disp'] = $user_name;

            $cmd = $_POST['cmd'];
            $this->load->model("datamodel");
            $this->datamodel->table_name = 'document_group';
            $this->datamodel->pk_name = 'group_id';
            $obj = new MyDto();
            $obj->group_id = $this->input->post('code_id');
            $obj->group_name = $this->input->post('group_name');

            if ($cmd != 'delete') {
                $config['upload_path'] = 'upload/document';
                $config['allowed_types'] = '*';
                //$config['max_size']	= '1000';
                $rand = rand(1111, 9999);
                $date = date("Y-m-d ");
                $config['file_name'] = $date . $rand;
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('doc_file')) {
                    $data['err'] = $this->upload->display_errors();
                    //echo "xxxxxxxxxxxxxxxxxxxxxxxx ".$data['err'];
                } else {

                    $data_upload = $this->upload->data();
                    $fname = $data_upload['file_name'];
                    //$this->resize($data_upload);				
                    $obj->doc_file = $fname;
                }
            }


            if ($cmd == 'delete') {
                $this->datamodel->pk_value = $this->input->post('code_id');
                $this->datamodel->delete();
            } else if ($cmd == 'insert') {
                $this->datamodel->insert($obj);
            } else if ($cmd == 'update') {
                $this->datamodel->pk_value = $this->input->post('code_id');
                $this->datamodel->update($obj);
            }
            $this->listDocumentGroup();
        }
    }

    public function listDocument() {
        $user_name = $this->is_login();
        if ($user_name != false) {
            $data['u_disp'] = $user_name;

            $this->load->model("datamodel");
            $this->datamodel->table_name = 'document do,document_group dg';
            $this->datamodel->field_name = 'do.*,dg.group_name';
            $this->datamodel->condition = 'where do.group_id=dg.group_id order by do.doc_id';
            $list_data = $this->datamodel->list_data_join();
            $data['list_data'] = $list_data;
            $this->load->view('document_list', $data);
        }
    }

    public function formDocument() {
        $user_name = $this->is_login();
        if ($user_name != false) {
            $data['u_disp'] = $user_name;

            $cmd = $this->input->post('cmd');
            $this->load->model("datamodel");
            $this->datamodel->table_name = 'document_group';
            $this->datamodel->condition = ' order by group_id';
            $list_group = $this->datamodel->list_data();
            $data['list_group'] = $list_group;

            if ($cmd == 'edit') {
                $this->datamodel->table_name = 'document';
                $this->datamodel->pk_name = 'doc_id';
                $this->datamodel->pk_value = $this->input->post('code_id');
                $obj = $this->datamodel->load();
                $data['cmd'] = "update";
            } else {
                $obj = new MyDto();
                $obj->doc_id = 0;
                $obj->group_id = 0;
                $obj->doc_name = "";
                $obj->doc_file = "";
                $obj->doc_desc = "";
                $data['cmd'] = "insert";
            }
            $data['obj'] = $obj;
            $this->load->view('document_form', $data);
        }
    }

    public function submitDocument() {
        $user_name = $this->is_login();
        if ($user_name != false) {
            $data['u_disp'] = $user_name;
            $cmd = $_POST['cmd'];
            $this->load->model("datamodel");
            $this->datamodel->table_name = 'document';
            $this->datamodel->pk_name = 'doc_id';
            $obj = new MyDto();
            //$obj->doc_id=$this->input->post('doc_id');			
            $obj->doc_name = $this->input->post('doc_name');
            $obj->doc_desc = $this->input->post('doc_desc');
            $obj->group_id = $this->input->post('group_id');

            if ($cmd != 'delete') {
                $config['upload_path'] = 'upload/document';
                $config['allowed_types'] = '*';
                //$config['max_size']	= '1000';
                $rand = rand(1111, 9999);
                $date = date("Y-m-d ");
                $config['file_name'] = $date . $rand;
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('doc_file')) {
                    $data['err'] = $this->upload->display_errors();
                    //echo "xxxxxxxxxxxxxxxxxxxxxxxx ".$data['err'];
                } else {

                    $data_upload = $this->upload->data();
                    $fname = $data_upload['file_name'];
                    //$this->resize($data_upload);				
                    $obj->doc_file = $fname;
                }
            }

            if ($cmd == 'delete') {
                $this->datamodel->pk_value = $this->input->post('code_id');
                $this->datamodel->delete();
            } else if ($cmd == 'insert') {
                $obj->doc_id = 0;
                $this->datamodel->insert($obj);
            } else if ($cmd == 'update') {
                $this->datamodel->pk_value = $this->input->post('code_id');
                $this->datamodel->update($obj);
            }
            $this->listDocument();
        }
    }

    public function listKhotho1_cost($khotho_id) {
        $user_name = $this->is_login();
        if ($user_name != false) {
            $data['u_disp'] = $user_name;
            $this->load->model("datamodel");
            $cmd = $this->input->post('cmd');
            $this->datamodel->table_name = ' khotho1 ';
            $this->datamodel->pk_name = 'khotho_id';
            $this->datamodel->pk_value = $khotho_id;
            $obj = $this->datamodel->load();
            $data['khotho_data'] = $obj;




            if ($cmd == 'delete' || $cmd == 'insert' || $cmd == 'update') {
                $this->datamodel->table_name = 'khotho1_cost';
                $this->datamodel->pk_name = 'code_id';
                $obj = new MyDto();
                $obj->detail = $this->input->post('detail');
                $obj->qty = $this->input->post('qty');
                $obj->khotho_id = $khotho_id;
                $obj->unit = $this->input->post('unit');
                $obj->price = $this->input->post('price');
                $obj->total = $obj->qty * $obj->price;
                $obj->remark = $this->input->post('remark');
                if ($cmd == 'delete') {
                    $this->datamodel->pk_value = $this->input->post('code_id');
                    $this->datamodel->delete();
                    $obj->code_id = "0";
                } else if ($cmd == 'insert') {
                    $obj->code_id = 0;
                    $this->datamodel->insert($obj);
                } else if ($cmd == 'update') {
                    $this->datamodel->pk_value = $this->input->post('code_id');
                    $this->datamodel->update($obj);
                }
            }

            if ($cmd == 'edit') {
                $this->datamodel->table_name = 'khotho1_cost';
                $this->datamodel->pk_name = 'code_id';
                $this->datamodel->pk_value = $this->input->post('code_id');
                $obj = $this->datamodel->load();
                $data['cmd'] = "update";
            } else {
                $obj = new MyDto();
                $obj->code_id = "0";
                $obj->detail = "";
                $obj->qty = "0";
                $obj->unit = "";
                $obj->price = "0.00";
                $obj->total = "0.00";
                $obj->remark = "";
                $data['cmd'] = "insert";
            }

            $this->datamodel->table_name = 'khotho1_cost';
            $this->datamodel->condition = " where khotho_id=$khotho_id  order by code_id";
            $list_data = $this->datamodel->list_data();
            $data['list_data'] = $list_data;



            $data['obj'] = $obj;
            $data['khotho_id'] = $khotho_id;
            $this->load->view('khotho1_cost_list', $data);
        }
    }

    public function listKhotho1New_cost($khotho_id) {
        $user_name = $this->is_login();
        if ($user_name != false) {
            $data['u_disp'] = $user_name;
            $this->load->model("datamodel");
            $cmd = $this->input->post('cmd');
            $this->datamodel->table_name = ' khotho1_new ';
            $this->datamodel->pk_name = 'khotho_id';
            $this->datamodel->pk_value = $khotho_id;
            $obj = $this->datamodel->load();
            $data['khotho_data'] = $obj;




            if ($cmd == 'delete' || $cmd == 'insert' || $cmd == 'update') {
                $this->datamodel->table_name = 'khotho1_cost';
                $this->datamodel->pk_name = 'code_id';
                $obj = new MyDto();
                $obj->detail = $this->input->post('detail');
                $obj->qty = $this->input->post('qty');
                $obj->khotho_id = $khotho_id;
                $obj->unit = $this->input->post('unit');
                $obj->price = $this->input->post('price');
                $obj->total = $obj->qty * $obj->price;
                $obj->remark = $this->input->post('remark');
                if ($cmd == 'delete') {
                    $this->datamodel->pk_value = $this->input->post('code_id');
                    $this->datamodel->delete();
                    $obj->code_id = "0";
                } else if ($cmd == 'insert') {
                    $obj->code_id = 0;
                    $this->datamodel->insert($obj);
                } else if ($cmd == 'update') {
                    $this->datamodel->pk_value = $this->input->post('code_id');
                    $this->datamodel->update($obj);
                }
            }

            if ($cmd == 'edit') {
                $this->datamodel->table_name = 'khotho1_cost';
                $this->datamodel->pk_name = 'code_id';
                $this->datamodel->pk_value = $this->input->post('code_id');
                $obj = $this->datamodel->load();
                $data['cmd'] = "update";
            } else {
                $obj = new MyDto();
                $obj->code_id = "0";
                $obj->detail = "";
                $obj->qty = "0";
                $obj->unit = "";
                $obj->price = "0.00";
                $obj->total = "0.00";
                $obj->remark = "";
                $data['cmd'] = "insert";
            }

            $this->datamodel->table_name = 'khotho1_cost';
            $this->datamodel->condition = " where khotho_id=$khotho_id  order by code_id";
            $list_data = $this->datamodel->list_data();
            $data['list_data'] = $list_data;



            $data['obj'] = $obj;
            $data['khotho_id'] = $khotho_id;
            $this->load->view('khotho1new_cost_list', $data);
        }
    }

    public function listKhotho3New_cost($khotho_id) {
        $user_name = $this->is_login();
        if ($user_name != false) {
            $data['u_disp'] = $user_name;
            $this->load->model("datamodel");
            $cmd = $this->input->post('cmd');
            $this->datamodel->table_name = ' khotho1_new ';
            $this->datamodel->pk_name = 'khotho_id';
            $this->datamodel->pk_value = $khotho_id;
            $obj = $this->datamodel->load();
            $data['khotho_data'] = $obj;




            if ($cmd == 'delete' || $cmd == 'insert' || $cmd == 'update') {
                $this->datamodel->table_name = 'khotho3_cost';
                $this->datamodel->pk_name = 'code_id';
                $obj = new MyDto();
                $obj->detail = $this->input->post('detail');
                $obj->khotho_id = $khotho_id;
                $obj->total = $this->input->post('total');
                if ($cmd == 'delete') {
                    $this->datamodel->pk_value = $this->input->post('code_id');
                    $this->datamodel->delete();
                    $obj->code_id = "0";
                } else if ($cmd == 'insert') {
                    $obj->code_id = 0;
                    $this->datamodel->insert($obj);
                } else if ($cmd == 'update') {
                    $this->datamodel->pk_value = $this->input->post('code_id');
                    $this->datamodel->update($obj);
                }
            }

            if ($cmd == 'edit') {
                $this->datamodel->table_name = 'khotho3_cost';
                $this->datamodel->pk_name = 'code_id';
                $this->datamodel->pk_value = $this->input->post('code_id');
                $obj = $this->datamodel->load();
                $data['cmd'] = "update";
            } else {
                $obj = new MyDto();
                $obj->code_id = "0";
                $obj->detail = "";
                $obj->total = "0.00";
                $data['cmd'] = "insert";
            }
            $this->datamodel->table_name = 'khotho3_cost';
            $this->datamodel->condition = " where khotho_id=$khotho_id  order by code_id";
            $list_data = $this->datamodel->list_data();
            $data['list_data'] = $list_data;



            $data['obj'] = $obj;
            $data['khotho_id'] = $khotho_id;
            $this->load->view('khotho3new_cost_list', $data);
        }
    }

    public function listKhotho1_doc($khotho_id) {

        $user_name = $this->is_login();
        if ($user_name != false) {
            $data['u_disp'] = $user_name;
            $this->load->model("datamodel");
            $this->datamodel->table_name = ' khotho1 ';
            $this->datamodel->pk_name = 'khotho_id';
            $this->datamodel->pk_value = $khotho_id;
            $obj = $this->datamodel->load();


            $this->datamodel->table_name = 'khotho1_cost';
            $this->datamodel->condition = " where khotho_id=$khotho_id  order by code_id";
            $list_data = $this->datamodel->list_data();
            $data['list_data'] = $list_data;


            $original = array("objbudgetyeartop", "objprojectname", "objreason", "objobjective", "objtargetnum", "objtargetdesc",
                "objprocess", "objbudget", "objresponsible", "objset11", "objset12", "objset13", "objset21", "objset22", "objset23", "objset31",
                "objset32", "objset33", "objset41", "objset42", "objset43", "objexpected", "objevaluation", "objwriter", "xbjwriterposition", "objprojectowner", "objprojectposition",
                "objcomment", "objchairmanfund", "objchkround", "xbjbudgetyear", "objcommittee", "xbjcomment2", "objchairman");
            $new = array($obj->budget_year_top, $obj->project_name, $obj->reason, $this->myutil->flt($obj->objective), number_format($obj->target_num), $this->myutil->flt($obj->target_desc),
                $this->myutil->flt($obj->process), number_format($obj->budget), $obj->responsible, $obj->set1_1, $obj->set1_2, $obj->set1_3, $obj->set2_1, $obj->set2_2, $obj->set2_3, $obj->set3_1,
                $obj->set3_2, $obj->set3_3, $obj->set4_1, $obj->set4_2, $obj->set4_3, $this->myutil->flt($obj->expected), $this->myutil->flt($obj->evaluation), $obj->writer, $obj->writer_position, $obj->project_owner, $obj->project_position
                , $obj->comment, $obj->chairman_fund, $obj->chk_round, $obj->budget_year, $obj->committee, $obj->comment2, $obj->chairman);
            $template_file = "template/khoto1.xml";
            $handle = fopen($template_file, "r");
            $contents = fread($handle, filesize($template_file));
            $newphrase = str_replace($original, $new, $contents);


            header('Content-disposition: attachment; filename=กท1.doc');
            header("Content-Type: application/vnd.ms-word");
            echo $newphrase;
        }
    }

    public function listKhotho1New_doc($khotho_id) {

        $user_name = $this->is_login();
        if ($user_name != false) {
            $data['u_disp'] = $user_name;
            $this->load->model("datamodel");
            $this->datamodel->table_name = ' khotho1_new ';
            $this->datamodel->pk_name = 'khotho_id';
            $this->datamodel->pk_value = $khotho_id;
            $obj = $this->datamodel->load();


            $this->datamodel->table_name = 'khotho1_cost';
            $this->datamodel->condition = " where khotho_id=$khotho_id  order by code_id";
            $list_data = $this->datamodel->list_data();
            $data['list_data'] = $list_data;


            $no = 1;
            $grand = 0;
            $grand_grp = 0;
            $str_cost = "";
            $chk_grp = 0;
            foreach ($list_data as $row) {
                $grand+=$row->total;
                $grand_grp+=$row->total;
                //if($no>1){
                $str_cost.="<w:br/>";
                //}else{
                //	$str_cost.="<w:br/>";
                //}
                if ($row->total > 0) {
                    $str_cost.="              - " . $row->detail;
                    $str_cost.=" เป็นเงิน  " . number_format((float) $row->total, 2, '.', ',') . "  บาท";
                } else {
                    if ($no > 1) {
                        $str_cost.="              รวมเป็นเงิน  " . number_format((float) $grand_grp, 2, '.', ',') . "  บาท<w:br/>";
                    }
                    $str_cost.=" " . $row->detail;
                    $grand_grp = 0;
                    $chk_grp++;
                }
                $no++;
            }
            if ($no > 1) {
                if ($chk_grp > 1) {
                    $str_cost.="<w:br/>              รวมเป็นเงิน  " . number_format((float) $grand_grp, 2, '.', ',') . "  บาท<w:br/>";
                } else {
                    $str_cost.="<w:br/>";
                }
                $str_cost.="<w:r w:rsidRPr=\"00A447A4\"><w:rPr><w:rFonts w:hint=\"cs\"/><w:b/><w:bCs/><w:cs/></w:rPr>";
                $str_cost.="<w:t xml:space=\"preserve\">              รวมเป็นเงินทั้งสิ้น  </w:t></w:r>";

                $str_cost.="<w:r w:rsidRPr=\"00A447A4\"><w:rPr><w:rFonts w:hint=\"cs\"/><w:b/><w:bCs/>";
                $str_cost.="<w:u w:val=\"double\"/><w:cs/></w:rPr><w:t>" . number_format((float) $grand, 2, '.', ',') . "</w:t></w:r>";

                $str_cost.="<w:r w:rsidRPr=\"00A447A4\"><w:rPr><w:rFonts w:hint=\"cs\"/><w:b/><w:bCs/><w:cs/></w:rPr>";
                $str_cost.="<w:t xml:space=\"preserve\"> บาท</w:t></w:r>";
            }

            //$str_cost.="<w:br/>รวมเป็นเงินทั้งสิ้น ".number_format($grand). " บาท";		
            $obj->budget = $grand;

            $tbs = "<w:br/>             ";
            $str_obj = "";
            if ($obj->obj1 != "") {
                $str_obj.="1.1.1 " . $obj->obj1;
            }
            if ($obj->obj2 != "") {
                $str_obj.=$tbs . "1.1.2 " . $obj->obj2;
            }
            if ($obj->obj3 != "") {
                $str_obj.=$tbs . "1.1.3 " . $obj->obj3;
            }
            if ($obj->obj4 != "") {
                $str_obj.=$tbs . "1.1.4 " . $obj->obj4;
            }
            if ($obj->obj5 != "") {
                $str_obj.=$tbs . "1.1.5 " . $obj->obj5;
            }

            $str_ind = "";
            if ($obj->ind1 != "") {
                $str_ind.="1.2.1 " . $obj->ind1;
            }
            if ($obj->ind2 != "") {
                $str_ind.=$tbs . "1.2.2 " . $obj->ind2;
            }
            if ($obj->ind3 != "") {
                $str_ind.=$tbs . "1.2.3 " . $obj->ind3;
            }
            if ($obj->ind4 != "") {
                $str_ind.=$tbs . "1.2.4 " . $obj->ind4;
            }
            if ($obj->ind5 != "") {
                $str_ind.=$tbs . "1.2.5 " . $obj->ind5;
            }

            $str_expt = "";
            if ($obj->expt1 != "") {
                $str_expt.="1. " . $obj->expt1;
            }
            if ($obj->expt2 != "") {
                $str_expt.=$tbs . "2. " . $obj->expt2;
            }
            if ($obj->expt3 != "") {
                $str_expt.=$tbs . "3. " . $obj->expt3;
            }
            if ($obj->expt4 != "") {
                $str_expt.=$tbs . "4. " . $obj->expt4;
            }
            if ($obj->expt5 != "") {
                $str_expt.=$tbs . "5. " . $obj->expt5;
            }

            $str_solution1 = "";
            $str_solution2 = "";
            $str_solution3 = "";
            if ($obj->solution1 != "") {
                $str_solution1.="- " . $obj->solution1;
            }
            if ($obj->solution2 != "") {
                $str_solution1.=$tbs . "- " . $obj->solution2;
            }
            if ($obj->solution3 != "") {
                $str_solution1.=$tbs . "- " . $obj->solution3;
            }
            if ($obj->solution4 != "") {
                $str_solution2.="- " . $obj->solution4;
            }
            if ($obj->solution5 != "") {
                $str_solution2.=$tbs . "- " . $obj->solution5;
            }
            if ($obj->solution6 != "") {
                $str_solution2.=$tbs . "- " . $obj->solution6;
            }
            if ($obj->solution7 != "") {
                $str_solution3.=$obj->solution7;
            }


            $curr_date = $this->myutil->thai_date(strtotime("now"));
            $str_date = "";
            for ($i = 1; $i <= 12; $i++) {
                $val1 = "period_start" . $i;
                $val2 = "period_end" . $i;
                if ($obj->$val1 != "") {
                    if ($i > 1) {
                        $str_date.= "<w:br/>              ";
                    }
                    $str_date.= "เริ่มวันที่ " . $this->myutil->thai_date(strtotime($obj->$val1)) . " สิ้นสุด " . $this->myutil->thai_date(strtotime($obj->$val2));
                }
            }
            $s1 = $this->myutil->get_mapping_code($obj->s1);
            $s2 = $this->myutil->get_mapping_code($obj->s2);
            $s3 = $this->myutil->get_mapping_code($obj->s3);
            $s4 = $this->myutil->get_mapping_code($obj->s4);
            $s4sub = $this->myutil->get_mapping_code($obj->s4sub);
            $s4suboth = $obj->s4sub_oth;

            $target_num_str = number_format($obj->target_num) . " คน";
            if ($obj->target_desc != "") {
                $target_num_str.="<w:br/>                      " . $obj->target_desc;
            }

            $original = array("objbudgetyeartop", "objprojectname", "objreason", "objtargetnum",
                "objbudget", "objresponsible", "objprojectowner", "objprojectposition",
                "objlocation", "objoobj", "objind", "objexpt", "objcostdet", "objperiod", "objcurrdate",
                "objsone", "objtwo", "objthree", "objfour", "objfoxursub", "objfoxxursuboth", "objsolution", "objxsolution", "objysolution");
            $new = array($obj->budget_year_top, $obj->project_name, $obj->reason, $target_num_str,
                number_format((float) $obj->budget, 2, '.', ',')
                , $obj->responsible, $obj->project_owner, $obj->project_position,
                $obj->location, $str_obj, $str_ind, $str_expt, $str_cost, $str_date, $curr_date,
                $s1, $s2, $s3, $s4, $s4sub, $s4suboth, $str_solution1, $str_solution2, $str_solution3);
            if ($obj->s1 == "s12") {
                $template_file = "template/khoto1New_2.xml";
            } else {
                $template_file = "template/khoto1New.xml";
            }


            $handle = fopen($template_file, "r");
            $contents = fread($handle, filesize($template_file));
            $newphrase = str_replace($original, $new, $contents);


            header('Content-disposition: attachment; filename=กท1.doc');
            header("Content-Type: application/vnd.ms-word");
            echo $newphrase;
        }
    }

    public function listKhotho4_doc($khotho_id) {

        $user_name = $this->is_login();
        if ($user_name != false) {
            $data['u_disp'] = $user_name;
            $this->load->model("datamodel");
            $this->datamodel->table_name = ' khotho1 ';
            $this->datamodel->pk_name = 'khotho_id';
            $this->datamodel->pk_value = $khotho_id;
            $obj = $this->datamodel->load();


            $this->datamodel->table_name = 'khotho1_cost';
            $this->datamodel->condition = " where khotho_id=$khotho_id  order by code_id";
            $list_data = $this->datamodel->list_data();
            $data['list_data'] = $list_data;


            $no = 1;
            $grand = 0;
            $str_cost = "";
            foreach ($list_data as $row) {
                $grand+=$row->total;
                $str_cost.=$no++ . ". " . $row->detail . " จำนวน " . number_format($row->qty) . " " . $row->unit . "ๆละ " . number_format($row->price) . " บาท";
                $str_cost.="<w:br/>เป็นเงิน " . number_format($row->total) . " บาท<w:br/>";
            }
            $str_cost.="<w:br/>รวมเป็นเงินทั้งสิ้น " . number_format($grand) . " บาท";

            $resp = $obj->responsible . "<w:br/>" . $obj->set1_1 . "<w:br/>" . $obj->set1_2 . "<w:br/>" . $obj->set1_3;

            $st_date = strtotime($obj->period_start);
            $en_date = strtotime($obj->period_end);
            $str_date = $this->myutil->thai_date($st_date) . " - " . $this->myutil->thai_date($en_date);


            $original = array("objbudgetyeartop", "objprojectname", "objobjective", "objtargetdesc",
                "objbudget", "objresponsible", "objevaluation", "objcostxx", "objstrdate");
            $new = array($obj->budget_year_top, $obj->project_name, $this->myutil->flt2($obj->objective), $this->myutil->flt2($obj->target_desc),
                number_format($obj->budget), $resp, $this->myutil->flt2($obj->evaluation), $str_cost, $str_date);
            $template_file = "template/khoto4.xml";
            $handle = fopen($template_file, "r");
            $contents = fread($handle, filesize($template_file));
            $newphrase = str_replace($original, $new, $contents);


            header('Content-disposition: attachment; filename=กท4.doc');
            header("Content-Type: application/vnd.ms-word");
            echo $newphrase;
        }
    }

    public function listKhotho4New_doc($khotho_id, $rn) {
        $user_name = $this->is_login();
        if ($user_name != false) {
            $data['u_disp'] = $user_name;
            $this->load->model("datamodel");
            $this->datamodel->table_name = ' khotho1_new ';
            $this->datamodel->pk_name = 'khotho_id';
            $this->datamodel->pk_value = $khotho_id;
            $obj = $this->datamodel->load();

            $this->datamodel->table_name = "khotho1_cost  kc";
            $this->datamodel->field_name = " sum(total) grand";
            $this->datamodel->condition = " where kc.khotho_id=" . $khotho_id;
            $list_grand = $this->datamodel->list_data_join();
            $grand = 0;
            foreach ($list_grand as $row) {
                $grand = $row->grand;
            }
            $obj->budget = $grand;
            $rndata = 0;
            if ($rn == 'all') {
                $rn = 1;
                $rndata = $grand;
            } else if ($rn == '1') {
                $rndata = $obj->rn1;
            } else if ($rn == '2') {
                $rndata = $obj->rn2;
            } else if ($rn == '3') {
                $rndata = $obj->rn3;
            } else if ($rn == '4') {
                $rndata = $obj->rn4;
            } else if ($rn == '5') {
                $rndata = $obj->rn5;
            } else if ($rn == '6') {
                $rndata = $obj->rn6;
            }
            $curr_date = $this->myutil->thai_date(strtotime("now"));
            $rndatastr = $this->myutil->money($rndata);
            $original = array("objbudgetyeartop", "objprojectname", "objreason", "objtargetnum",
                "objbudget", "objresponsible", "objprojectowner", "objprojectposition",
                "objlocation", "objxn", "objrn", "objdatastr", "objcurrdate");
            $new = array($obj->budget_year_top, $obj->project_name, $obj->reason, number_format($obj->target_num),
                number_format((float) $obj->budget, 2, '.', ',')
                , $obj->responsible, $obj->project_owner, $obj->project_position,
                $obj->location, $rn, number_format((float) $rndata, 2, '.', ','), $rndatastr, $curr_date);
            $template_file = "template/khoto4New.xml";
            $handle = fopen($template_file, "r");
            $contents = fread($handle, filesize($template_file));
            $newphrase = str_replace($original, $new, $contents);


            header('Content-disposition: attachment; filename=กท4.doc');
            header("Content-Type: application/vnd.ms-word");
            echo $newphrase;
        }
    }

    public function listKhotho2New_doc($khotho_id) {
        $user_name = $this->is_login();
        if ($user_name != false) {
            $data['u_disp'] = $user_name;
            $this->load->model("datamodel");
            $this->datamodel->table_name = ' khotho1_new ';
            $this->datamodel->pk_name = 'khotho_id';
            $this->datamodel->pk_value = $khotho_id;
            $obj = $this->datamodel->load();

            $this->datamodel->table_name = "khotho1_cost  kc";
            $this->datamodel->field_name = " sum(total) grand";
            $this->datamodel->condition = " where kc.khotho_id=" . $khotho_id;
            $list_grand = $this->datamodel->list_data_join();
            $grand = 0;
            foreach ($list_grand as $row) {
                $grand = $row->grand;
            }
            $obj->budget = $grand;
            $s3 = "";
            if ($obj->s3 == "s31")
                $s3 = "กลุ่มหญิงตั้งครรภ์และหญิงหลังคลอด";
            if ($obj->s3 == "s32")
                $s3 = "กลุ่มเด็กเล็กและเด็กก่อนวัยเรียน";
            if ($obj->s3 == "s33")
                $s3 = "กลุ่มเด็กวัยเรียนและเยาวชน";
            if ($obj->s3 == "s34")
                $s3 = "กลุ่มวัยทำงาน";
            if ($obj->s3 == "s351")
                $s3 = "กลุ่มผู้สูงอายุ";
            if ($obj->s3 == "s352")
                $s3 = "กลุ่มผู้ป่วยโรคเรื้อรัง";
            if ($obj->s3 == "s36")
                $s3 = "กลุ่มคนพิการและทุพพลภาพ";
            if ($obj->s3 == "s37")
                $s3 = "กลุ่มประชาชนทั่วไปที่มีภาวะเสี่ยง";

            $s4sub = "";
            $s4suboth = $obj->s4sub_oth;
            if ($obj->s4sub == "s411")
                $s4sub = "การสำรวจข้อมูลสุขภาพ การจัดทำทะเบียนและฐานข้อมูลสุขภาพ";
            if ($obj->s4sub == "s412")
                $s4sub = "การตรวจคัดกรอง ประเมินภาวะสุขภาพ และการค้นหาผู้มีภาวะเสี่ยง";
            if ($obj->s4sub == "s413")
                $s4sub = "การเยี่ยมติดตามดูแลสุขภาพก่อนคลอดและหลังคลอด";
            if ($obj->s4sub == "s414")
                $s4sub = "การรณรงค์/ประชาสัมพันธ์/ฝึกอบรม/ให้ความรู้";
            if ($obj->s4sub == "s415")
                $s4sub = "การส่งเสริมการเลี้ยงลูกด้วยนมแม่";
            if ($obj->s4sub == "s416")
                $s4sub = "การคัดกรองและดูแลรักษามะเร็งปากมดลูกและมะเร็งเต้านม";
            if ($obj->s4sub == "s417")
                $s4sub = "การส่งเสริมสุขภาพช่องปาก";
            if ($obj->s4sub == "s421")
                $s4sub = "การสำรวจข้อมูลสุขภาพ การจัดทำทะเบียนและฐานข้อมูลสุขภาพ";
            if ($obj->s4sub == "s422")
                $s4sub = "การตรวจคัดกรอง ประเมินภาวะสุขภาพ และการค้นหาผู้มีภาวะเสี่ยง";
            if ($obj->s4sub == "s423")
                $s4sub = "การเยี่ยมติดตามดูแลสุขภาพ";
            if ($obj->s4sub == "s424")
                $s4sub = "การรณรงค์/ประชาสัมพันธ์/ฝึกอบรม/ให้ความรู้";
            if ($obj->s4sub == "s425")
                $s4sub = "การส่งเสริมพัฒนาการตามวัย/กระบวนการเรียนรู้/ความฉลาดทางปัญญาและอารมณ์";
            if ($obj->s4sub == "s426")
                $s4sub = "การส่งเสริมการได้รับวัคซีนป้องกันโรคตามวัย";
            if ($obj->s4sub == "s427")
                $s4sub = "การส่งเสริมสุขภาพช่องปาก";


            if ($obj->s4sub == "s431")
                $s4sub = "การสำรวจข้อมูลสุขภาพ การจัดทำทะเบียนและฐานข้อมูลสุขภาพ";
            if ($obj->s4sub == "s432")
                $s4sub = "การตรวจคัดกรอง ประเมินภาวะสุขภาพ และการค้นหาผู้มีภาวะเสี่ยง";
            if ($obj->s4sub == "s433")
                $s4sub = "การเยี่ยมติดตามดูแลสุขภาพ";
            if ($obj->s4sub == "s434")
                $s4sub = "การรณรงค์/ประชาสัมพันธ์/ฝึกอบรม/ให้ความรู้";
            if ($obj->s4sub == "s435")
                $s4sub = "การส่งเสริมพัฒนาการตามวัย/กระบวนการเรียนรู้/ความฉลาดทางปัญญาและอารมณ์";
            if ($obj->s4sub == "s436")
                $s4sub = "การส่งเสริมการได้รับวัคซีนป้องกันโรคตามวัย";
            if ($obj->s4sub == "s437")
                $s4sub = "การป้องกันและลดปัญหาด้านเพศสัมพันธ์/การตั้งครรภ์ไม่พร้อม";
            if ($obj->s4sub == "s438")
                $s4sub = "การป้องกันและลดปัญหาด้านสารเสพติด/ยาสูบ/เครื่องดื่มแอลกอฮอล์";


            if ($obj->s4sub == "s441")
                $s4sub = "การสำรวจข้อมูลสุขภาพ การจัดทำทะเบียนและฐานข้อมูลสุขภาพ";
            if ($obj->s4sub == "s442")
                $s4sub = "การตรวจคัดกรอง ประเมินภาวะสุขภาพ และการค้นหาผู้มีภาวะเสี่ยง";
            if ($obj->s4sub == "s443")
                $s4sub = "การเยี่ยมติดตามดูแลสุขภาพ";
            if ($obj->s4sub == "s444")
                $s4sub = "การรณรงค์/ประชาสัมพันธ์/ฝึกอบรม/ให้ความรู้";
            if ($obj->s4sub == "s445")
                $s4sub = "การส่งเสริมพฤติกรรมสุขภาพในกลุ่มวัยทำงานและการปรับเปลี่ยนสิ่งแวดล้อมในการทำงาน";
            if ($obj->s4sub == "s446")
                $s4sub = "การส่งเสริมการดูแลสุขภาพจิตแก่กลุ่มวัยทำงาน";
            if ($obj->s4sub == "s447")
                $s4sub = "การป้องกันและลดปัญหาด้านเพศสัมพันธ์/การตั้งครรภ์ไม่พร้อม";
            if ($obj->s4sub == "s448")
                $s4sub = "การป้องกันและลดปัญหาด้านสารเสพติด/ยาสูบ/เครื่องดื่มแอลกอฮอล์";


            if ($obj->s4sub == "s4511")
                $s4sub = "การสำรวจข้อมูลสุขภาพ การจัดทำทะเบียนและฐานข้อมูลสุขภาพ";
            if ($obj->s4sub == "s4512")
                $s4sub = "การตรวจคัดกรอง ประเมินภาวะสุขภาพ และการค้นหาผู้มีภาวะเสี่ยง";
            if ($obj->s4sub == "s4513")
                $s4sub = "การเยี่ยมติดตามดูแลสุขภาพ";
            if ($obj->s4sub == "s4514")
                $s4sub = "การรณรงค์/ประชาสัมพันธ์/ฝึกอบรม/ให้ความรู้";
            if ($obj->s4sub == "s4515")
                $s4sub = "การส่งเสริมพัฒนาทักษะทางกายและใจ";
            if ($obj->s4sub == "s4516")
                $s4sub = "การคัดกรองและดูแลผู้มีภาวะซึมเศร้า";
            if ($obj->s4sub == "s4517")
                $s4sub = "การคัดกรองและดูแลผู้มีภาวะข้อเข่าเสื่อม";
            if ($obj->s4sub == "s4518")
                $s4sub = "อื่นๆ (ระบุ)";

            if ($obj->s4sub == "s4521")
                $s4sub = "การสำรวจข้อมูลสุขภาพ การจัดทำทะเบียนและฐานข้อมูลสุขภาพ";
            if ($obj->s4sub == "s4522")
                $s4sub = "การตรวจคัดกรอง ประเมินภาวะสุขภาพ และการค้นหาผู้มีภาวะเสี่ยง";
            if ($obj->s4sub == "s4523")
                $s4sub = "การเยี่ยมติดตามดูแลสุขภาพ";
            if ($obj->s4sub == "s4524")
                $s4sub = "การรณรงค์/ประชาสัมพันธ์/ฝึกอบรม/ให้ความรู้";
            if ($obj->s4sub == "s4525")
                $s4sub = "การคัดกรองและดูแลผู้ป่วยโรคเบาหวานและความดันโลหิตสูง";
            if ($obj->s4sub == "s4526")
                $s4sub = "การคัดกรองและดูแลผู้ป่วยโรคหัวใจ";
            if ($obj->s4sub == "s4527")
                $s4sub = "การคัดกรองและดูแลผู้ป่วยโรคหลอดเลือดสมอง";
            if ($obj->s4sub == "s4528")
                $s4sub = "การคัดกรองและดูแลผู้ป่วยโรคมะเร็ง";


            if ($obj->s4sub == "s461")
                $s4sub = "การสำรวจข้อมูลสุขภาพ การจัดทำทะเบียนและฐานข้อมูลสุขภาพ";
            if ($obj->s4sub == "s462")
                $s4sub = "การตรวจคัดกรอง ประเมินภาวะสุขภาพ และการค้นหาผู้มีภาวะเสี่ยง";
            if ($obj->s4sub == "s463")
                $s4sub = "การเยี่ยมติดตามดูแลสุขภาพ";
            if ($obj->s4sub == "s464")
                $s4sub = "การรณรงค์/ประชาสัมพันธ์/ฝึกอบรม/ให้ความรู้";
            if ($obj->s4sub == "s465")
                $s4sub = "การส่งเสริมพัฒนาทักษะทางกายและใจ";
            if ($obj->s4sub == "s466")
                $s4sub = "การคัดกรองและดูแลผู้มีภาวะซึมเศร้า";
            if ($obj->s4sub == "s467")
                $s4sub = "การคัดกรองและดูแลผู้มีภาวะข้อเข่าเสื่อม";


            if ($obj->s4sub == "s471")
                $s4sub = "การสำรวจข้อมูลสุขภาพ การจัดทำทะเบียนและฐานข้อมูลสุขภาพ";
            if ($obj->s4sub == "s472")
                $s4sub = "การตรวจคัดกรอง ประเมินภาวะสุขภาพ และการค้นหาผู้มีภาวะเสี่ยง";
            if ($obj->s4sub == "s473")
                $s4sub = "การเยี่ยมติดตามดูแลสุขภาพ";
            if ($obj->s4sub == "s474")
                $s4sub = "การรณรงค์/ประชาสัมพันธ์/ฝึกอบรม/ให้ความรู้";
            if ($obj->s4sub == "s475")
                $s4sub = "การส่งเสริมการปรับเปลี่ยนพฤติกรรมและสิ่งแวดล้อมที่มีผลกระทบต่อสุขภาพ";
            if ($s4suboth != "") {
                $s4 = $s4suboth;
            } else {
                $s4 = $s4sub;
            }

            $original = array("objprojectname", "objbudget", "objresponsible", "objsthree", "objsfour", "objchkround", "xbjbudgetyear", "objchkdate");
            $new = array($obj->project_name,
                number_format((float) $obj->budget, 2, '.', ',')
                , $obj->responsible, $s3, $s4, $obj->chk_round, $obj->budget_year,
                $this->myutil->thai_date(strtotime($obj->chk_date)));
            $template_file = "template/khoto2New.xml";
            $handle = fopen($template_file, "r");
            $contents = fread($handle, filesize($template_file));
            $newphrase = str_replace($original, $new, $contents);


            header('Content-disposition: attachment; filename=กท2.doc');
            header("Content-Type: application/vnd.ms-word");
            echo $newphrase;
        }
    }

    public function listKhotho3New_doc($khotho_id) {
        $user_name = $this->is_login();
        if ($user_name != false) {
            $data['u_disp'] = $user_name;
            $this->load->model("datamodel");
            $this->datamodel->table_name = ' khotho1_new ';
            $this->datamodel->pk_name = 'khotho_id';
            $this->datamodel->pk_value = $khotho_id;
            $obj = $this->datamodel->load();

            $this->datamodel->table_name = "khotho1_cost  kc";
            $this->datamodel->field_name = " sum(total) grand";
            $this->datamodel->condition = " where kc.khotho_id=" . $khotho_id;
            $list_grand = $this->datamodel->list_data_join();
            $grand = 0;
            foreach ($list_grand as $row) {
                $grand = $row->grand;
            }
            $obj->budget = $grand;
            if ($grand > 0) {
                $abj = $obj->apr_budget / $grand * 100;
                $bbj = $obj->real_budget / $grand * 100;
            } else {
                $abj = 0;
                $bbj = 0;
            }
            $curr_date = $this->myutil->thai_date(strtotime("now"));
            $rndatastr = $this->myutil->money($grand);

            $str_cost = "";
            $this->datamodel->table_name = 'khotho3_cost';
            $this->datamodel->condition = " where khotho_id=$khotho_id  order by code_id";
            $list_data = $this->datamodel->list_data();
            $data['list_data'] = $list_data;


            foreach ($list_data as $row) {
                $str_cost.="<w:br/>              - " . $row->detail;
                $str_cost.=" เป็นเงิน  " . number_format((float) $row->total, 2, '.', ',') . "  บาท";
            }
            $tbs = "<w:br/>             ";
            $str_obj = "";
            if ($obj->obj1 != "") {
                $str_obj.="1.1.1 " . $obj->obj1;
            }
            if ($obj->obj2 != "") {
                $str_obj.=$tbs . "1.1.2 " . $obj->obj2;
            }
            if ($obj->obj3 != "") {
                $str_obj.=$tbs . "1.1.3 " . $obj->obj3;
            }
            if ($obj->obj4 != "") {
                $str_obj.=$tbs . "1.1.4 " . $obj->obj4;
            }
            if ($obj->obj5 != "") {
                $str_obj.=$tbs . "1.1.5 " . $obj->obj5;
            }

            $str_ind = "";
            if ($obj->ind1 != "") {
                $str_ind.="1.2.1 " . $obj->ind1;
            }
            if ($obj->ind2 != "") {
                $str_ind.=$tbs . "1.2.2 " . $obj->ind2;
            }
            if ($obj->ind3 != "") {
                $str_ind.=$tbs . "1.2.3 " . $obj->ind3;
            }
            if ($obj->ind4 != "") {
                $str_ind.=$tbs . "1.2.4 " . $obj->ind4;
            }
            if ($obj->ind5 != "") {
                $str_ind.=$tbs . "1.2.5 " . $obj->ind5;
            }

            $str_pass = "";
            if ($obj->is_pass == "2") {
                $str_pass.="ไม่บรรลุตามวัตถุประสงค์ของโครงการ เพราะ " . $obj->result2;
            } else {
                $str_pass = "บรรลุตามวัตถุประสงค์ของโครงการ";
            }

            $str_prob = "";
            if ($obj->is_problem == "2") {
                $str_prob.="ปัญหา/อุปสรรค (ระบุ) " . $obj->result3 . $tbs . "แนวทางการแก้ไข (ระบุ) " . $obj->result4;
            } else {
                $str_prob = "ไม่มี";
            }

            $s2_desc = $this->myutil->get_mapping_desc($obj->s2);
            $original = array("objprojectname", "objoobj", "objind", "objispass", "objisprop", "objbudget", "objresponsible", "objresult1", "objresult2", "objresultb", "objresultc", "objresultd",
                "xbjbudget", "ybjbudget", "abjbudget", "bbjbudget", "objprojectowner", "objprojectposition", "objcurrdate", "objdatastr", "objstrcost", "objxydgetyeartop", "objacct");
            $new = array($obj->project_name, $str_obj, $str_ind, $str_pass, $str_prob,
                number_format((float) $obj->budget, 2, '.', ',')
                , $obj->responsible, $obj->result1, $obj->result11, $obj->result2, $obj->result3, $obj->result4,
                number_format((float) $obj->apr_budget, 2, '.', ',')
                , number_format((float) $obj->real_budget, 2, '.', ',')
                , number_format((float) $abj, 2, '.', ',')
                , number_format((float) $bbj, 2, '.', ',')
                , $obj->project_owner, $obj->project_position, $curr_date, $rndatastr, $str_cost, $obj->budget_year_top, $s2_desc);
            $template_file = "template/khoto3New.xml";
            $handle = fopen($template_file, "r");
            $contents = fread($handle, filesize($template_file));
            $newphrase = str_replace($original, $new, $contents);


            header('Content-disposition: attachment; filename=กท3.doc');
            header("Content-Type: application/vnd.ms-word");
            echo $newphrase;
        }
    }

    public function listKhotho5_doc($khotho_id) {
        $user_name = $this->is_login();
        if ($user_name != false) {
            $data['u_disp'] = $user_name;
            $this->load->model("datamodel");
            $this->datamodel->table_name = ' khotho1 ';
            $this->datamodel->pk_name = 'khotho_id';
            $this->datamodel->pk_value = $khotho_id;
            $obj = $this->datamodel->load();
            $ddm = strtotime("now");
            $original = array("xobjbudgetyeartop", "objddm", "objset11", "objset12", "objset13", "objprojectname", "objtargetdesc", "xbjtargetnum", "objprocess", "objbudget", "objset11", "objset12", "objset13");
            $new = array($obj->budget_year_top, $this->myutil->thai_date($ddm), $obj->set1_1, $obj->set1_2, $obj->set1_3, $obj->project_name, $obj->target_desc, $obj->target_num, $obj->process, number_format($obj->budget), $obj->set1_1, $obj->set1_2, $obj->set1_3);




            $template_file = "template/khoto5.xml";
            $handle = fopen($template_file, "r");
            $contents = fread($handle, filesize($template_file));
            $newphrase = str_replace($original, $new, $contents);


            header('Content-disposition: attachment; filename=กท5.doc');
            header("Content-Type: application/vnd.ms-word");
            echo $newphrase;
        }
    }

    public function listKhotho5New_doc($khotho_id) {
        $user_name = $this->is_login();
        if ($user_name != false) {
            $data['u_disp'] = $user_name;
            $this->load->model("datamodel");
            $this->datamodel->table_name = ' khotho1_new ';
            $this->datamodel->pk_name = 'khotho_id';
            $this->datamodel->pk_value = $khotho_id;
            $obj = $this->datamodel->load();

            $this->datamodel->table_name = "khotho1_cost  kc";
            $this->datamodel->field_name = " sum(total) grand";
            $this->datamodel->condition = " where kc.khotho_id=" . $khotho_id;
            $list_grand = $this->datamodel->list_data_join();
            $grand = 0;
            foreach ($list_grand as $row) {
                $grand = $row->grand;
            }
            $obj->budget = $grand;
            $rndata = 0;
            $str_rn = "";
            $xx = 0;
            if ($obj->rn1 > 0) {
                $str_rn.="<w:br/>       งวดที่  1.    " . number_format((float) $obj->rn1, 2, '.', ',') . " บาท";
                $xx++;
            }
            if ($obj->rn2 > 0) {
                $str_rn.="<w:br/>       งวดที่  2.    " . number_format((float) $obj->rn2, 2, '.', ',') . " บาท";
                $xx++;
            }
            if ($obj->rn3 > 0) {
                $str_rn.="<w:br/>       งวดที่  3.    " . number_format((float) $obj->rn3, 2, '.', ',') . " บาท";
                $xx++;
            }
            if ($obj->rn4 > 0) {
                $str_rn.="<w:br/>       งวดที่  4.    " . number_format((float) $obj->rn4, 2, '.', ',') . " บาท";
                $xx++;
            }
            if ($obj->rn5 > 0) {
                $str_rn.="<w:br/>       งวดที่  5.    " . number_format((float) $obj->rn5, 2, '.', ',') . " บาท";
                $xx++;
            }
            if ($obj->rn6 > 0) {
                $str_rn.="<w:br/>       งวดที่  6.    " . number_format((float) $obj->rn6, 2, '.', ',') . " บาท";
                $xx++;
            }

            if ($str_rn != "") {
                $str_rn = "โดยแบ่งจ่ายเป็น " . $xx . "  งวด" . $str_rn;
            }

            $s3 = $this->myutil->get_mapping_desc($obj->s3);
            $s4 = $this->myutil->get_mapping_desc($obj->s4);
            $s4sub = $this->myutil->get_mapping_desc($obj->s4sub);
            $s4suboth = $obj->s4sub_oth;


            $ddm = strtotime("now");
            $rndatastr = $this->myutil->money($rndata);
            $original = array("objprojectname", "objprojectowner", "objresponsible", "objddm", "objbudget", "objrn", "objsthree", "objfour", "objfoxursub", "objfoxxursuboth");
            $new = array($obj->project_name, $obj->project_owner, $obj->responsible, $this->myutil->thai_date($ddm),
                number_format((float) $obj->budget, 2, '.', ','),
                $str_rn, $s3, $s4, $s4sub, $s4suboth);
            $template_file = "template/khoto5New.xml";
            $handle = fopen($template_file, "r");
            $contents = fread($handle, filesize($template_file));
            $newphrase = str_replace($original, $new, $contents);


            header('Content-disposition: attachment; filename=กท5.doc');
            header("Content-Type: application/vnd.ms-word");
            echo $newphrase;
        }
    }

    public function listKhotho6_doc($khotho_id) {
        $user_name = $this->is_login();
        if ($user_name != false) {
            $data['u_disp'] = $user_name;
            $this->load->model("datamodel");
            $this->datamodel->table_name = ' khotho1 ';
            $this->datamodel->pk_name = 'khotho_id';
            $this->datamodel->pk_value = $khotho_id;
            $obj = $this->datamodel->load();
            $data['obj'] = $obj;

            $this->datamodel->table_name = 'khotho1_cost';
            $this->datamodel->condition = " where khotho_id=$khotho_id  order by code_id";
            $list_data = $this->datamodel->list_data();
            $data['list_data'] = $list_data;
            header("Content-Type: application/vnd.ms-word");
            header("Expires: 0");
            header("Cache-Control:  must-revalidate, post-check=0, pre-check=0");
            header("Content-disposition: attachment; filename=\"กท6.doc\"");
            $this->load->view('doc_khotho6', $data);
        }
    }

    /*
      public function listKhotho6_doc($khotho_id)
      {
      $user_name=$this->is_login();
      if($user_name != false){
      $data['u_disp']=$user_name;
      $this->load->model("datamodel");
      $this->datamodel->table_name=' khotho1 ';
      $this->datamodel->pk_name='khotho_id';
      $this->datamodel->pk_value=$khotho_id;
      $obj=$this->datamodel->load();
      $data['obj']=$obj;

      $this->datamodel->table_name='khotho1_cost';
      $this->datamodel->condition=" where khotho_id=$khotho_id  order by code_id";
      $list_data=$this->datamodel->list_data();

      $this->datamodel->table_name="khotho1_cost  kc";
      $this->datamodel->field_name=" sum(total) grand";
      $this->datamodel->condition=" where kc.khotho_id=".$khotho_id;
      $list_grand=$this->datamodel->list_data_join();
      $grand=0;
      foreach ($list_grand as $row){
      $grand=$row->grand;
      }

      $data['list_data']=$list_data;
      $original= array("objset31","objset32","objset33","objprojectname","objresponsible",
      "objprojectname","objgrand","xbjgrand");
      $new = array($obj->set3_1,$obj->set3_2,$obj->set3_3,$obj->project_name,$obj->responsible,
      $obj->project_name,$this->myutil->money($grand),number_format($grand));




      $template_file = "template/khoto6.xml";
      $handle = fopen($template_file , "r");
      $contents = fread($handle, filesize($template_file));
      $newphrase = str_replace($original, $new, $contents);


      header('Content-disposition: attachment; filename=กท6.doc');
      header("Content-Type: application/vnd.ms-word");
      echo $newphrase;

      }
      }
     */

    public function listKhotho14_doc($khotho_id) {
        $user_name = $this->is_login();
        if ($user_name != false) {
            $data['u_disp'] = $user_name;
            $this->load->model("datamodel");
            $this->datamodel->table_name = ' khotho1 ';
            $this->datamodel->pk_name = 'khotho_id';
            $this->datamodel->pk_value = $khotho_id;
            $obj = $this->datamodel->load();
            $data['obj'] = $obj;

            $this->datamodel->table_name = 'project_group';
            $this->datamodel->condition = " order by group_id";
            $data['list_group'] = $this->datamodel->list_data();

            $this->datamodel->table_name = ' project_group ';
            $this->datamodel->pk_name = 'group_id';
            $this->datamodel->pk_value = $obj->group_id;
            $obj_type = $this->datamodel->load();
            $data['obj_type'] = $obj_type;
            $obj_type = "(" . substr($obj_type->group_id, -1) . ")" . $obj_type->group_name;


            $this->datamodel->table_name = "khotho1_cost  kc";
            $this->datamodel->field_name = " sum(total) grand";
            $this->datamodel->condition = " where kc.khotho_id=" . $khotho_id;
            $list_grand = $this->datamodel->list_data_join();
            $grand = 0;
            foreach ($list_grand as $row) {
                $grand = $row->grand;
            }
            $data['mgrand'] = $grand;
            $nab = ".................................................";
            $original = array("objbudgetyeartop", "objresponsible", "objprojectname", "objset31", "objgroupnametype",
                "objmgrand", "objxgrandtext");
            $new = array($obj->budget_year_top, $obj->responsible, $obj->project_name, $obj->set3_1, $obj_type,
                $grand == "" ? $nab : number_format($grand), $grand == "" ? $nab . $nab : $this->myutil->money($grand));




            $template_file = "template/khoto14.xml";
            $handle = fopen($template_file, "r");
            $contents = fread($handle, filesize($template_file));
            $newphrase = str_replace($original, $new, $contents);


            header('Content-disposition: attachment; filename=กท14.doc');
            header("Content-Type: application/vnd.ms-word");
            echo $newphrase;
        }
    }

    public function listKhotho15_doc($khotho_id) {
        $user_name = $this->is_login();
        if ($user_name != false) {
            $data['u_disp'] = $user_name;
            $this->load->model("datamodel");
            $this->datamodel->table_name = ' khotho1 ';
            $this->datamodel->pk_name = 'khotho_id';
            $this->datamodel->pk_value = $khotho_id;
            $obj = $this->datamodel->load();
            $data['obj'] = $obj;

            $this->datamodel->table_name = 'project_group';
            $this->datamodel->condition = " order by group_id";
            $data['list_group'] = $this->datamodel->list_data();

            $this->datamodel->table_name = ' project_group ';
            $this->datamodel->pk_name = 'group_id';
            $this->datamodel->pk_value = $obj->group_id;

            $obj_type = $this->datamodel->load();
            $data['obj_type'] = $obj_type;
            $obj_type = "(" . substr($obj_type->group_id, -1) . ")" . $obj_type->group_name;


            $grand = $obj->budget;
            $mreturn = $obj->return_money;
            $mnet = $grand - $mreturn;
            $data['mgrand'] = $grand;
            $nab = ".................................................";
            $original = array("objbudgetyeartop", "objresponsible", "objprojectname", "objset31", "objgroupnametype",
                "objmgrand", "objxgrandtext", "objmreturn", "objmnet", "objreturncode");
            $new = array($obj->budget_year_top, $obj->responsible, $obj->project_name, $obj->set3_1, $obj_type,
                $grand == "" ? $nab : number_format($grand, 2, '.', ','), $grand == "" ? $nab . $nab : $this->myutil->money($grand),
                $mreturn == "" ? $nab : number_format($mreturn, 2, '.', ','),
                $mnet == "" ? $nab : number_format($mnet, 2, '.', ','), $obj->return_code);




            $template_file = "template/khoto15.xml";
            $handle = fopen($template_file, "r");
            $contents = fread($handle, filesize($template_file));
            $newphrase = str_replace($original, $new, $contents);


            header('Content-disposition: attachment; filename=กท15.doc');
            header("Content-Type: application/vnd.ms-word");
            echo $newphrase;
        }
    }

    public function calBudget($khotho_id) {
        $this->datamodel->table_name = "khotho1_cost  kc";
        $this->datamodel->field_name = " sum(total) grand";
        $this->datamodel->condition = " where kc.khotho_id=" . $khotho_id;
        $list_grand = $this->datamodel->list_data_join();
        $grand = 0;
        foreach ($list_grand as $row) {
            $grand = $row->grand;
        }
        return $grand;
    }

    public function rep_project() {
        $user_name = $this->is_login();
        if ($user_name != false) {
            $meeting = $this->input->post('meeting');
            $r_mode = $this->input->post('r_mode');
            $year = $this->input->post('p_year');
            if ($meeting != "") {
                $meeting = " budget_year = '$year' and chk_round='$meeting' ";
            } else {
                $meeting = " budget_year_top = '$year' ";
            }
            $data['u_disp'] = $user_name;
            $this->load->model("datamodel");
            $this->datamodel->table_name = 'khotho1_new';
            $this->datamodel->condition = " where approval='Y' and $meeting order by chk_round";
            $list_data = $this->datamodel->list_data();

            $i = 0;
            foreach ($list_data as $row) {
                $list_data[$i++]->budget = $this->calBudget($row->khotho_id);
            }



            $data['list_data'] = $list_data;
            $data['year_budget'] = $year;

            $this->datamodel->table_name = 'mconfig_budget';
            $this->datamodel->condition = "where c_group='BUDGET_CONTROL' order by order_by";
            $data['list_budget'] = $this->datamodel->list_data();



            if ($r_mode == "file") {
                header("Content-Type: application/vnd.ms-word");
                header("Expires: 0");
                header("Cache-Control:  must-revalidate, post-check=0, pre-check=0");
                header("Content-disposition: attachment; filename=\"รายงานสรุปยอดเงินโครงการอนุมัติ.doc\"");
            }

            $this->load->view('rep_project_01', $data);
        }
    }

    public function rep_acp($khotho_id, $r_mode) {
        $user_name = $this->is_login();
        if ($user_name != false) {
            $this->load->model("datamodel");

            $this->datamodel->table_name = 'khotho1_new kt';
            $this->datamodel->field_name = "kt.*,(select c_label from mconfig where c_group='ACP_TYPE' and c_value=kt.acp_type) acp_type_desc,(select c_label from mconfig where c_group='ACP_OJB' and c_value=kt.acp_ojb) acp_ojb_desc";
            $this->datamodel->condition = " where khotho_id='$khotho_id'";
            $list_data = $this->datamodel->list_data_join();
            $list_data = $this->datamodel->list_data_join();
            $data['obj'] = $list_data[0];



            $data['exx'] = '0';

            if ($r_mode == "word") {
                header("Content-Type: application/vnd.ms-word");
                header("Expires: 0");
                header("Cache-Control:  must-revalidate, post-check=0, pre-check=0");
                header("Content-disposition: attachment; filename=\"Action plan.doc\"");
            }
            if ($r_mode == "excel") {
                $data['exx'] = '1';
                header("Content-Type: application/vnd.ms-excel");
                header("Expires: 0");
                header("Cache-Control:  must-revalidate, post-check=0, pre-check=0");
                header("Content-disposition: attachment; filename=\"Action plan.xls\"");
            }


            $this->load->view('acp', $data);
        }
    }

    public function rep_project_det() {
        $user_name = $this->is_login();
        if ($user_name != false) {
            $year = $this->input->post('p_year');
            $meeting = $this->input->post('meeting');
            $r_mode = $this->input->post('r_mode');
            if ($meeting != "") {
                $meeting = " budget_year = '$year' and chk_round='$meeting' ";
            } else {
                $meeting = " budget_year_top = '$year' ";
            }
            $data['u_disp'] = $user_name;
            $this->load->model("datamodel");
            $this->datamodel->table_name = 'khotho1_new';
            $this->datamodel->condition = " where approval='Y' and $meeting order by chk_round";
            $list_data = $this->datamodel->list_data();

            $i = 0;
            foreach ($list_data as $row) {
                $list_data[$i++]->budget = $this->calBudget($row->khotho_id);
            }



            $data['list_data'] = $list_data;
            $data['year_budget'] = $year;

            if ($r_mode == "file") {
                header("Content-Type: application/vnd.ms-word");
                header("Expires: 0");
                header("Cache-Control:  must-revalidate, post-check=0, pre-check=0");
                header("Content-disposition: attachment; filename=\"รายงานโครงการอนุมัติ.doc\"");
            }
            $this->load->view('rep_project_02', $data);
        }
    }

    public function rep_project_det3() {
        $user_name = $this->is_login();
        if ($user_name != false) {
            $meeting = $this->input->post('meeting');
            $r_mode = $this->input->post('r_mode');
            $year = $this->input->post('p_year');
            if ($meeting != "") {
                $meeting = " budget_year = '$year' and chk_round='$meeting' ";
            } else {
                $meeting = " budget_year_top = '$year' ";
            }
            $data['u_disp'] = $user_name;
            $this->load->model("datamodel");

            $this->datamodel->table_name = 'khotho1_new kt';
            $this->datamodel->field_name = "kt.*,(select c_label from mconfig where c_group='APPROVE1' and c_value=kt.approval) approvaldesc";
            $this->datamodel->condition = " where $meeting order by chk_round";
            $list_data = $this->datamodel->list_data_join();

            $i = 0;
            foreach ($list_data as $row) {
                $list_data[$i++]->budget = $this->calBudget($row->khotho_id);
            }


            $data['list_data'] = $list_data;
            $data['year_budget'] = $year;

            $this->datamodel->table_name = 'khotho1_new kt';
            $this->datamodel->field_name = "count(*) cnum,(select c_label from mconfig where c_group='APPROVE1' and c_value=kt.approval) approvaldesc";
            $this->datamodel->condition = " where $meeting group by (select c_label from mconfig where c_group='APPROVE1' and c_value=kt.approval)";
            $sum_data = $this->datamodel->list_data_join();
            $data['sum_data'] = $sum_data;

            if ($r_mode == "file") {
                header("Content-Type: application/vnd.ms-word");
                header("Expires: 0");
                header("Cache-Control:  must-revalidate, post-check=0, pre-check=0");
                header("Content-disposition: attachment; filename=\"รายงานโครงการ.doc\"");
            }
            $this->load->view('rep_project_03', $data);
        }
    }

    public function rep_project_det4() {
        $user_name = $this->is_login();
        if ($user_name != false) {
            $meeting = $this->input->post('meeting');
            $r_mode = $this->input->post('r_mode');
            $year = $this->input->post('p_year');
            if ($meeting != "") {
                $meeting = " budget_year = '$year' and chk_round='$meeting' ";
            } else {
                $meeting = " budget_year_top = '$year' ";
            }

            $data['u_disp'] = $user_name;
            $this->load->model("datamodel");
            $this->datamodel->table_name = 'khotho1_new';
            $this->datamodel->condition = " where approval='Y' and $meeting order by chk_round";
            $list_data = $this->datamodel->list_data();

            $i = 0;
            foreach ($list_data as $row) {
                $list_data[$i++]->budget = $this->calBudget($row->khotho_id);
            }


            $data['list_data'] = $list_data;
            $data['year_budget'] = $year;

            if ($r_mode == "file") {
                header("Content-Type: application/vnd.ms-word");
                header("Expires: 0");
                header("Cache-Control:  must-revalidate, post-check=0, pre-check=0");
                header("Content-disposition: attachment; filename=\"รายงานส่งใช้เงินยืม.doc\"");
            }

            $this->load->view('rep_project_04', $data);
        }
    }

    public function listKhotho2_doc($khotho_id) {

        $user_name = $this->is_login();
        if ($user_name != false) {
            $data['u_disp'] = $user_name;
            $this->load->model("datamodel");
            $this->datamodel->table_name = ' khotho1 ';
            $this->datamodel->pk_name = 'khotho_id';
            $this->datamodel->pk_value = $khotho_id;
            $obj = $this->datamodel->load();


            $this->datamodel->table_name = 'khotho1_cost';
            $this->datamodel->condition = " where khotho_id=$khotho_id  order by code_id";
            $list_data = $this->datamodel->list_data();
            $data['list_data'] = $list_data;


            $no = 1;
            $grand = 0;
            $str_cost = "";
            foreach ($list_data as $row) {
                $grand+=$row->total;
                $str_cost.=$no++ . ". " . $row->detail . " จำนวน " . number_format($row->qty) . " " . $row->unit . "ๆละ " . number_format($row->price) . " บาท";
                $str_cost.="<w:br/>เป็นเงิน " . number_format($row->total) . " บาท<w:br/>";
            }
            $str_cost.="<w:br/>รวมเป็นเงินทั้งสิ้น " . number_format($grand) . " บาท";

            $resp = $obj->responsible . "<w:br/>" . $obj->set1_1 . "<w:br/>" . $obj->set1_2 . "<w:br/>" . $obj->set1_3;

            $st_date = strtotime($obj->period_start);
            $en_date = strtotime($obj->period_end);
            $str_date = $this->myutil->thai_date($st_date) . " - " . $this->myutil->thai_date($en_date);


            $original = array("objbudgetyeartop", "objprojectname", "objobjective", "objtargetdesc",
                "objbudget", "objresponsible", "objevaluation", "objcostxx", "objstrdate");
            $new = array($obj->budget_year_top, $obj->project_name, $this->myutil->flt2($obj->objective), $this->myutil->flt2($obj->target_desc),
                number_format($obj->budget), $resp, $this->myutil->flt2($obj->evaluation), $str_cost, $str_date);
            $template_file = "template/khoto2.xml";
            $handle = fopen($template_file, "r");
            $contents = fread($handle, filesize($template_file));
            $newphrase = str_replace($original, $new, $contents);


            header('Content-disposition: attachment; filename=กท2.doc');
            header("Content-Type: application/vnd.ms-word");
            echo $newphrase;
        }
    }

    public function listKhotho1() {
        $user_name = $this->is_login();
        if ($user_name != false) {
            $data['u_disp'] = $user_name;
            $u_level = $this->session->userdata('u_level');
            $where = " where 1=1 ";
            if ($u_level != "1" && $u_level != "5") {
                $u_id = $this->session->userdata('u_am_id');
                $where.=" and user_id=$u_id ";
            }


            $year = $this->input->post('p_year');
            if ($year == "") {
                $month = date("m");
                $year = date("Y");
                if ($month >= 8)
                    $year+=1;
                $year = $year + 543;
            }

            $data['p_year'] = $year;
            $where.= "AND budget_year_top = '$year'";





            $this->load->model("datamodel");
            $this->datamodel->table_name = 'khotho1';
            $this->datamodel->condition = $where . " order by khotho_id";
            $list_data = $this->datamodel->list_data();
            $data['list_data'] = $list_data;
            $this->load->view('khotho1_list', $data);
        }
    }

    public function formKhotho1() {
        $user_name = $this->is_login();
        if ($user_name != false) {
            $data['u_disp'] = $user_name;
            $this->load->model("datamodel");

            $this->datamodel->table_name = 'project_group';
            $this->datamodel->condition = " order by group_id";
            $data['list_group'] = $this->datamodel->list_data();

            $this->datamodel->table_name = 'mconfig';
            $this->datamodel->condition = "where c_group='VALID' order by order_by";
            $data['list_valid'] = $this->datamodel->list_data();

            $this->datamodel->condition = "where c_group='APPROVE' order by order_by";
            $data['list_approve'] = $this->datamodel->list_data();

            $this->datamodel->condition = "where c_group='APPROVE1' order by order_by";
            $data['list_approve1'] = $this->datamodel->list_data();

            $this->datamodel->condition = "where c_group='PROJECT_STATUS' order by order_by";
            $data['list_status'] = $this->datamodel->list_data();


            $cmd = $this->input->post('cmd');
            if ($cmd == 'edit') {
                $this->datamodel->table_name = 'khotho1';
                $this->datamodel->pk_name = 'khotho_id';
                $this->datamodel->pk_value = $this->input->post('code_id');
                $obj = $this->datamodel->load();
                $data['cmd'] = "update";
            } else {
                $obj = new MyDto();
                $obj->khotho_id = 0;
                $obj->project_name = "";
                $obj->budget_year_top = "";
                $obj->group_id = "";
                $obj->reason = "";
                $obj->objective = "";
                $obj->target_num = "";
                $obj->target_desc = "";
                $obj->location = "";
                $obj->process = "";
                //$obj->period="";
                $obj->budget = "";
                $obj->responsible = "";
                $obj->set1_1 = "";
                $obj->set1_2 = "";
                $obj->set1_3 = "";
                $obj->set2_1 = "";
                $obj->set2_2 = "";
                $obj->set2_3 = "";
                $obj->set3_1 = "";
                $obj->set3_2 = "";
                $obj->set3_3 = "";
                $obj->set4_1 = "";
                $obj->set4_2 = "";
                $obj->set4_3 = "";
                $obj->expected = "";
                $obj->evaluation = "";
                $obj->writer = "";
                $obj->writer_position = "";
                $obj->project_owner = "";
                $obj->project_position = "";
                $obj->result_chk = "";
                $obj->comment = "";
                $obj->chairman = "นายธีรวุฒิ  กลิ่นกุสุม";
                $obj->chk_round = "";
                $obj->chk_date = "";
                $obj->committee = "นางสาวพลาพร  สมพรบรรจง";
                $obj->approval = "";
                $obj->chairman_fund = "นายเอกชัย  กลิ่นกุสุม";
                $obj->budget_year = "";

                $obj->approve_chk = "";
                $obj->comment2 = "";
                $obj->period_start = "";
                $obj->period_end = "";
                $obj->project_status = "1001";
                $obj->return_money = "";
                $obj->return_code = "";
                //$obj->indicator="";			
                $data['cmd'] = "insert";
            }
            $data['obj'] = $obj;
            $this->load->view('khotho1_form', $data);
        }
    }

    public function submitKhotho1() {
        $user_name = $this->is_login();
        if ($user_name != false) {
            $data['u_disp'] = $user_name;

            $cmd = $_POST['cmd'];
            $this->load->model("datamodel");
            $this->datamodel->table_name = 'khotho1';
            $this->datamodel->pk_name = 'khotho_id';
            $obj = new MyDto();
            //$obj->khotho_id=$this->input->post('khotho_id');	


            $obj->project_name = $this->input->post('project_name');
            $obj->budget_year_top = $this->input->post('budget_year_top');
            $obj->group_id = $this->input->post('group_id');
            $obj->reason = $this->input->post('reason');
            $obj->objective = $this->input->post('objective');
            $obj->target_num = $this->input->post('target_num');
            $obj->target_desc = $this->input->post('target_desc');
            $obj->location = $this->input->post('location');
            $obj->process = $this->input->post('process');
            //$obj->period=$this->input->post('period');
            $obj->budget = $this->input->post('budget');
            $obj->responsible = $this->input->post('responsible');
            $obj->set1_1 = $this->input->post('set1_1');
            $obj->set1_2 = $this->input->post('set1_2');
            $obj->set1_3 = $this->input->post('set1_3');
            $obj->set2_1 = $this->input->post('set2_1');
            $obj->set2_2 = $this->input->post('set2_2');
            $obj->set2_3 = $this->input->post('set2_3');
            $obj->set3_1 = $this->input->post('set3_1');
            $obj->set3_2 = $this->input->post('set3_2');
            $obj->set3_3 = $this->input->post('set3_3');
            $obj->set4_1 = $this->input->post('set4_1');
            $obj->set4_2 = $this->input->post('set4_2');
            $obj->set4_3 = $this->input->post('set4_3');
            $obj->expected = $this->input->post('expected');
            $obj->evaluation = $this->input->post('evaluation');
            $obj->writer = $this->input->post('writer');
            $obj->writer_position = $this->input->post('writer_position');
            $obj->project_owner = $this->input->post('project_owner');
            $obj->project_position = $this->input->post('project_position');
            $obj->result_chk = $this->input->post('result_chk');
            $obj->comment = $this->input->post('comment');
            $obj->chairman = $this->input->post('chairman');
            $obj->chk_round = $this->input->post('chk_round');
            $chk_date = $this->input->post('chk_date');
            if ($chk_date != "") {
                list($d, $m, $y) = explode('/', $chk_date);
                $obj->chk_date = $y . "-" . $m . "-" . $d;
                ;
            }

            $obj->committee = $this->input->post('committee');
            $obj->approval = $this->input->post('approval');
            $obj->chairman_fund = $this->input->post('chairman_fund');
            $obj->budget_year = $this->input->post('budget_year');

            $obj->approve_chk = $this->input->post('approve_chk');
            $obj->comment2 = $this->input->post('comment2');
            $period_start = $this->input->post('period_start');
            if ($period_start != "") {
                list($d, $m, $y) = explode('/', $period_start);
                $obj->period_start = $y . "-" . $m . "-" . $d;
                ;
            }
            $period_end = $this->input->post('period_end');
            if ($period_end != "") {
                list($d, $m, $y) = explode('/', $period_end);
                $obj->period_end = $y . "-" . $m . "-" . $d;
                ;
            }

            $obj->project_status = $this->input->post('project_status');
            $obj->return_money = $this->input->post('return_money');

            $obj->return_code = $this->input->post('return_code');
            //$obj->indicator=$this->input->post('Indicator');

            if ($cmd == 'delete') {
                $this->datamodel->pk_value = $this->input->post('code_id');
                $this->datamodel->delete();
            } else if ($cmd == 'insert') {
                $obj->khotho_id = 0;
                $obj->user_id = $this->session->userdata('u_am_id');
                $this->datamodel->insert($obj);
            } else if ($cmd == 'update') {
                $this->datamodel->pk_value = $this->input->post('code_id');
                $this->datamodel->update($obj);
            }
            $this->listKhotho1();
        }
    }

    public function listKhotho1New() {
        $user_name = $this->is_login();
        if ($user_name != false) {
            $data['u_disp'] = $user_name;
            $u_level = $this->session->userdata('u_level');
            $where = " where 1=1 ";
            if ($u_level != "1" && $u_level != "5") {
                $u_id = $this->session->userdata('u_am_id');
                $where.=" and user_id=$u_id ";
            }


            $year = $this->input->post('p_year');
            if ($year == "") {
                $month = date("m");
                $year = date("Y");
                if ($month >= 8)
                    $year+=1;
                $year = $year + 543;
            }

            $data['p_year'] = $year;
            $where.= "AND budget_year_top = '$year'";





            $this->load->model("datamodel");
            $this->datamodel->table_name = 'khotho1_new';
            $this->datamodel->condition = $where . " order by khotho_id";
            $list_data = $this->datamodel->list_data();
            $data['list_data'] = $list_data;
            $this->load->view('khotho1new_list', $data);
        }
    }

    public function formKhotho1New() {
        $user_name = $this->is_login();
        if ($user_name != false) {
            $data['u_disp'] = $user_name;
            $this->load->model("datamodel");

            $this->datamodel->table_name = 'project_group';
            $this->datamodel->condition = " order by group_id";
            $data['list_group'] = $this->datamodel->list_data();

            $this->datamodel->table_name = 'mconfig';
            $this->datamodel->condition = "where c_group='VALID' order by order_by";
            $data['list_valid'] = $this->datamodel->list_data();

            $this->datamodel->condition = "where c_group='APPROVE' order by order_by";
            $data['list_approve'] = $this->datamodel->list_data();

            $this->datamodel->condition = "where c_group='APPROVE1' order by order_by";
            $data['list_approve1'] = $this->datamodel->list_data();

            $this->datamodel->condition = "where c_group='PROJECT_STATUS' order by order_by";
            $data['list_status'] = $this->datamodel->list_data();

            $this->datamodel->condition = "where c_group='MOD_ROUND' order by order_by";
            $data['list_mod'] = $this->datamodel->list_data();


            $cmd = $this->input->post('cmd');
            if ($cmd == 'edit') {
                $this->datamodel->table_name = 'khotho1_new';
                $this->datamodel->pk_name = 'khotho_id';
                $this->datamodel->pk_value = $this->input->post('code_id');
                $obj = $this->datamodel->load();
                $data['cmd'] = "update";

                $this->datamodel->table_name = "khotho1_cost  kc";
                $this->datamodel->field_name = " sum(total) grand";
                $this->datamodel->condition = " where kc.khotho_id=" . $this->input->post('code_id');
                $list_grand = $this->datamodel->list_data_join();
                $grand = 0;
                foreach ($list_grand as $row) {
                    $grand = $row->grand;
                }
                $obj->budget = $grand;
            } else {
                $obj = new MyDto();
                $obj->khotho_id = 0;
                $obj->project_name = "";
                $obj->budget_year_top = "";
                $obj->reason = "";
                $obj->obj1 = "";
                $obj->obj2 = "";
                $obj->obj3 = "";
                $obj->obj4 = "";
                $obj->obj5 = "";
                $obj->ind1 = "";
                $obj->ind2 = "";
                $obj->ind3 = "";
                $obj->ind4 = "";
                $obj->ind5 = "";
                $obj->expt1 = "";
                $obj->expt2 = "";
                $obj->expt3 = "";
                $obj->expt4 = "";
                $obj->expt5 = "";
                $obj->target_num = "";
                $obj->location = "";
                $obj->budget = "";
                $obj->rn_num = "";
                $obj->rn1 = "";
                $obj->rn2 = "";
                $obj->rn3 = "";
                $obj->rn4 = "";
                $obj->rn5 = "";
                $obj->rn6 = "";

                $obj->solution1 = "";
                $obj->solution2 = "";
                $obj->solution3 = "";
                $obj->solution4 = "";
                $obj->solution5 = "";
                $obj->solution6 = "";
                $obj->solution7 = "";


                $obj->responsible = "";
                $obj->period_start1 = "";
                $obj->period_start2 = "";
                $obj->period_start3 = "";
                $obj->period_start4 = "";
                $obj->period_start5 = "";
                $obj->period_start6 = "";
                $obj->period_start7 = "";
                $obj->period_start8 = "";
                $obj->period_start9 = "";
                $obj->period_start10 = "";
                $obj->period_start11 = "";
                $obj->period_start12 = "";
                $obj->period_end1 = "";
                $obj->period_end2 = "";
                $obj->period_end3 = "";
                $obj->period_end4 = "";
                $obj->period_end5 = "";
                $obj->period_end6 = "";
                $obj->period_end7 = "";
                $obj->period_end8 = "";
                $obj->period_end9 = "";
                $obj->period_end10 = "";
                $obj->period_end11 = "";
                $obj->period_end12 = "";
                $obj->change1 = "";
                $obj->change2 = "";
                $obj->change3 = "";
                $obj->change4 = "";
                $obj->change5 = "";
                $obj->change6 = "";
                $obj->change7 = "";
                $obj->change8 = "";
                $obj->change9 = "";
                $obj->change10 = "";
                $obj->change11 = "";
                $obj->change12 = "";

                $obj->acc1 = "";
                $obj->acc2 = "";
                $obj->acc3 = "";
                $obj->acc4 = "";
                $obj->acc5 = "";
                $obj->acc6 = "";
                $obj->acc7 = "";
                $obj->acc8 = "";
                $obj->acc9 = "";
                $obj->acc10 = "";
                $obj->acc11 = "";
                $obj->acc12 = "";

                $obj->s1 = "";
                $obj->s2 = "";
                $obj->s3 = "";
                $obj->s4 = "";
                $obj->s4sub = "";
                $obj->s4sub_oth = "";
                $obj->project_owner = "";
                $obj->project_position = "";

                $obj->result_chk = "";
                $obj->chk_round = "";
                $obj->approve_chk = "";
                $obj->budget_year = "";
                $obj->comment = "";
                $obj->comment2 = "";
                $obj->chk_date = "";
                $obj->approval = "";

                $obj->project_status = "1001";
                $obj->return_money = "";
                $obj->return_code = "";

                $obj->doc1 = "";
                $obj->doc2 = "";
                $obj->doc3 = "";

                $obj->target_desc = "";

                $data['cmd'] = "insert";
            }
            $data['obj'] = $obj;
            $this->load->view('khotho1new_form', $data);
        }
    }

    public function submitKhotho1New() {
        $user_name = $this->is_login();
        if ($user_name != false) {
            $data['u_disp'] = $user_name;

            $cmd = $_POST['cmd'];
            $this->load->model("datamodel");
            $this->datamodel->table_name = 'khotho1_new';
            $this->datamodel->pk_name = 'khotho_id';
            $obj = new MyDto();
            $obj->project_name = $this->input->post('project_name');
            $obj->budget_year_top = $this->input->post('budget_year_top');
            $obj->reason = $this->input->post('reason');
            $obj->target_num = $this->input->post('target_num');
            $obj->target_desc = $this->input->post('target_desc');
            $obj->location = $this->input->post('location');
            $obj->budget = $this->input->post('budget');

            $obj->responsible = $this->input->post('responsible');
            $obj->project_owner = $this->input->post('project_owner');
            $obj->project_position = $this->input->post('project_position');


            $obj->obj1 = $this->input->post('obj1');
            $obj->obj2 = $this->input->post('obj2');
            $obj->obj3 = $this->input->post('obj3');
            $obj->obj4 = $this->input->post('obj4');
            $obj->obj5 = $this->input->post('obj5');

            $obj->rn1 = $this->input->post('rn1');
            $obj->rn2 = $this->input->post('rn2');
            $obj->rn3 = $this->input->post('rn3');
            $obj->rn4 = $this->input->post('rn4');
            $obj->rn5 = $this->input->post('rn5');
            $obj->rn6 = $this->input->post('rn6');


            $obj->ind1 = $this->input->post('ind1');
            $obj->ind2 = $this->input->post('ind2');
            $obj->ind3 = $this->input->post('ind3');
            $obj->ind4 = $this->input->post('ind4');
            $obj->ind5 = $this->input->post('ind5');

            $obj->expt1 = $this->input->post('expt1');
            $obj->expt2 = $this->input->post('expt2');
            $obj->expt3 = $this->input->post('expt3');
            $obj->expt4 = $this->input->post('expt4');
            $obj->expt5 = $this->input->post('expt5');

            $obj->solution1 = $this->input->post('solution1');
            $obj->solution2 = $this->input->post('solution2');
            $obj->solution3 = $this->input->post('solution3');
            $obj->solution4 = $this->input->post('solution4');
            $obj->solution5 = $this->input->post('solution5');
            $obj->solution6 = $this->input->post('solution6');
            $obj->solution7 = $this->input->post('solution7');



            $obj->s1 = $this->input->post('s1');
            $obj->s2 = $this->input->post('s2');
            $obj->s3 = $this->input->post('s3');
            $obj->s4 = $this->input->post('s4');
            $obj->s4sub = $this->input->post('s4sub');

            $obj->s4sub_oth = "";
            if ($this->input->post('s4sub_oth1') != "") {
                $obj->s4sub_oth = $this->input->post('s4sub_oth1');
            }
            if ($this->input->post('s4sub_oth2') != "") {
                $obj->s4sub_oth = $this->input->post('s4sub_oth2');
            }
            if ($this->input->post('s4sub_oth3') != "") {
                $obj->s4sub_oth = $this->input->post('s4sub_oth3');
            }
            if ($this->input->post('s4sub_oth4') != "") {
                $obj->s4sub_oth = $this->input->post('s4sub_oth4');
            }
            if ($this->input->post('s4sub_oth5') != "") {
                $obj->s4sub_oth = $this->input->post('s4sub_oth5');
            }
            if ($this->input->post('s4sub_oth6') != "") {
                $obj->s4sub_oth = $this->input->post('s4sub_oth6');
            }
            if ($this->input->post('s4sub_oth7') != "") {
                $obj->s4sub_oth = $this->input->post('s4sub_oth7');
            }
            if ($this->input->post('s4sub_oth8') != "") {
                $obj->s4sub_oth = $this->input->post('s4sub_oth8');
            }



            $period_start = $this->input->post('period_start1');
            if ($period_start != "") {
                list($d, $m, $y) = explode('/', $period_start);
                $obj->period_start1 = $y . "-" . $m . "-" . $d;
            } else {
                $obj->period_start1 = null;
            }
            $period_start = $this->input->post('period_start2');
            if ($period_start != "") {
                list($d, $m, $y) = explode('/', $period_start);
                $obj->period_start2 = $y . "-" . $m . "-" . $d;
            } else {
                $obj->period_start2 = null;
            }
            $period_start = $this->input->post('period_start3');
            if ($period_start != "") {
                list($d, $m, $y) = explode('/', $period_start);
                $obj->period_start3 = $y . "-" . $m . "-" . $d;
            } else {
                $obj->period_start3 = null;
            }
            $period_start = $this->input->post('period_start4');
            if ($period_start != "") {
                list($d, $m, $y) = explode('/', $period_start);
                $obj->period_start4 = $y . "-" . $m . "-" . $d;
            } else {
                $obj->period_start4 = null;
            }
            $period_start = $this->input->post('period_start5');
            if ($period_start != "") {
                list($d, $m, $y) = explode('/', $period_start);
                $obj->period_start5 = $y . "-" . $m . "-" . $d;
            } else {
                $obj->period_start5 = null;
            }
            $period_start = $this->input->post('period_start6');
            if ($period_start != "") {
                list($d, $m, $y) = explode('/', $period_start);
                $obj->period_start6 = $y . "-" . $m . "-" . $d;
            } else {
                $obj->period_start6 = null;
            }
            $period_start = $this->input->post('period_start7');
            if ($period_start != "") {
                list($d, $m, $y) = explode('/', $period_start);
                $obj->period_start7 = $y . "-" . $m . "-" . $d;
            } else {
                $obj->period_start7 = null;
            }
            $period_start = $this->input->post('period_start8');
            if ($period_start != "") {
                list($d, $m, $y) = explode('/', $period_start);
                $obj->period_start8 = $y . "-" . $m . "-" . $d;
            } else {
                $obj->period_start8 = null;
            }
            $period_start = $this->input->post('period_start9');
            if ($period_start != "") {
                list($d, $m, $y) = explode('/', $period_start);
                $obj->period_start9 = $y . "-" . $m . "-" . $d;
            } else {
                $obj->period_start9 = null;
            }
            $period_start = $this->input->post('period_start10');
            if ($period_start != "") {
                list($d, $m, $y) = explode('/', $period_start);
                $obj->period_start10 = $y . "-" . $m . "-" . $d;
            } else {
                $obj->period_start10 = null;
            }
            $period_start = $this->input->post('period_start11');
            if ($period_start != "") {
                list($d, $m, $y) = explode('/', $period_start);
                $obj->period_start11 = $y . "-" . $m . "-" . $d;
            } else {
                $obj->period_start11 = null;
            }
            $period_start = $this->input->post('period_start12');
            if ($period_start != "") {
                list($d, $m, $y) = explode('/', $period_start);
                $obj->period_start12 = $y . "-" . $m . "-" . $d;
            } else {
                $obj->period_start12 = null;
            }


            $period_end = $this->input->post('period_end1');
            if ($period_end != "") {
                list($d, $m, $y) = explode('/', $period_end);
                $obj->period_end1 = $y . "-" . $m . "-" . $d;
            } else {
                $obj->period_end1 = null;
            }
            $period_end = $this->input->post('period_end2');
            if ($period_end != "") {
                list($d, $m, $y) = explode('/', $period_end);
                $obj->period_end2 = $y . "-" . $m . "-" . $d;
            } else {
                $obj->period_end2 = null;
            }
            $period_end = $this->input->post('period_end3');
            if ($period_end != "") {
                list($d, $m, $y) = explode('/', $period_end);
                $obj->period_end3 = $y . "-" . $m . "-" . $d;
            } else {
                $obj->period_end3 = null;
            }
            $period_end = $this->input->post('period_end4');
            if ($period_end != "") {
                list($d, $m, $y) = explode('/', $period_end);
                $obj->period_end4 = $y . "-" . $m . "-" . $d;
            } else {
                $obj->period_end4 = null;
            }
            $period_end = $this->input->post('period_end5');
            if ($period_end != "") {
                list($d, $m, $y) = explode('/', $period_end);
                $obj->period_end5 = $y . "-" . $m . "-" . $d;
            } else {
                $obj->period_end5 = null;
            }
            $period_end = $this->input->post('period_end6');
            if ($period_end != "") {
                list($d, $m, $y) = explode('/', $period_end);
                $obj->period_end6 = $y . "-" . $m . "-" . $d;
            } else {
                $obj->period_end6 = null;
            }
            $period_end = $this->input->post('period_end7');
            if ($period_end != "") {
                list($d, $m, $y) = explode('/', $period_end);
                $obj->period_end7 = $y . "-" . $m . "-" . $d;
            } else {
                $obj->period_end7 = null;
            }
            $period_end = $this->input->post('period_end8');
            if ($period_end != "") {
                list($d, $m, $y) = explode('/', $period_end);
                $obj->period_end8 = $y . "-" . $m . "-" . $d;
            } else {
                $obj->period_end8 = null;
            }
            $period_end = $this->input->post('period_end9');
            if ($period_end != "") {
                list($d, $m, $y) = explode('/', $period_end);
                $obj->period_end9 = $y . "-" . $m . "-" . $d;
            } else {
                $obj->period_end9 = null;
            }
            $period_end = $this->input->post('period_end10');
            if ($period_end != "") {
                list($d, $m, $y) = explode('/', $period_end);
                $obj->period_end10 = $y . "-" . $m . "-" . $d;
            } else {
                $obj->period_end10 = null;
            }
            $period_end = $this->input->post('period_end11');
            if ($period_end != "") {
                list($d, $m, $y) = explode('/', $period_end);
                $obj->period_end11 = $y . "-" . $m . "-" . $d;
            } else {
                $obj->period_end11 = null;
            }
            $period_end = $this->input->post('period_end12');
            if ($period_end != "") {
                list($d, $m, $y) = explode('/', $period_end);
                $obj->period_end12 = $y . "-" . $m . "-" . $d;
            } else {
                $obj->period_end12 = null;
            }

            $obj->change1 = $this->input->post('change1');
            $obj->change2 = $this->input->post('change2');
            $obj->change3 = $this->input->post('change3');
            $obj->change4 = $this->input->post('change4');
            $obj->change5 = $this->input->post('change5');
            $obj->change6 = $this->input->post('change6');
            $obj->change7 = $this->input->post('change7');
            $obj->change8 = $this->input->post('change8');
            $obj->change9 = $this->input->post('change9');
            $obj->change10 = $this->input->post('change10');
            $obj->change11 = $this->input->post('change11');
            $obj->change12 = $this->input->post('change12');

            $obj->acc1 = $this->input->post('acc1');
            $obj->acc2 = $this->input->post('acc2');
            $obj->acc3 = $this->input->post('acc3');
            $obj->acc4 = $this->input->post('acc4');
            $obj->acc5 = $this->input->post('acc5');
            $obj->acc6 = $this->input->post('acc6');
            $obj->acc7 = $this->input->post('acc7');
            $obj->acc8 = $this->input->post('acc8');
            $obj->acc9 = $this->input->post('acc9');
            $obj->acc10 = $this->input->post('acc10');
            $obj->acc11 = $this->input->post('acc11');
            $obj->acc12 = $this->input->post('acc12');



            $obj->result_chk = $this->input->post('result_chk');
            $obj->approve_chk = $this->input->post('approve_chk');
            $obj->chk_round = $this->input->post('chk_round');
            $obj->budget_year = $this->input->post('budget_year');
            $obj->comment = $this->input->post('comment');
            $obj->comment2 = $this->input->post('comment2');
            $chk_date = $this->input->post('chk_date');
            //echo $chk_date;	
            if ($chk_date != "") {
                list($d, $m, $y) = explode('/', $chk_date);
                $obj->chk_date = $y . "-" . $m . "-" . $d;
                ;
            }
            $obj->approval = $this->input->post('approval');

            $obj->project_status = $this->input->post('project_status');
            $obj->return_money = $this->input->post('return_money');

            $obj->return_code = $this->input->post('return_code');
            //$obj->indicator=$this->input->post('Indicator');


            if ($cmd != 'delete') {
                $config['upload_path'] = 'upload/khotho1';
                $config['allowed_types'] = '*';
                $rand = rand(1111, 9999);
                $date = date("Y-m-d ");
                $config['file_name'] = $date . $rand;
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('doc1')) {
                    $data['err'] = $this->upload->display_errors();
                } else {
                    $data_upload = $this->upload->data();
                    $fname = $data_upload['file_name'];
                    $obj->doc1 = $fname;
                }
                if (!$this->upload->do_upload('doc2')) {
                    $data['err'] = $this->upload->display_errors();
                } else {
                    $data_upload = $this->upload->data();
                    $fname = $data_upload['file_name'];
                    $obj->doc2 = $fname;
                }
                if (!$this->upload->do_upload('doc3')) {
                    $data['err'] = $this->upload->display_errors();
                } else {
                    $data_upload = $this->upload->data();
                    $fname = $data_upload['file_name'];
                    $obj->doc3 = $fname;
                }
            }





            if ($cmd == 'delete') {
                $this->datamodel->pk_value = $this->input->post('code_id');
                $this->datamodel->delete();
            } else if ($cmd == 'insert') {
                $obj->khotho_id = 0;
                $obj->user_id = $this->session->userdata('u_am_id');
                $this->datamodel->insert($obj);
            } else if ($cmd == 'update') {
                $this->datamodel->pk_value = $this->input->post('code_id');
                $this->datamodel->update($obj);
            }
            $this->listKhotho1New();
        }
    }

    public function listKhotho12() {
        $user_name = $this->is_login();
        if ($user_name != false) {
            $data['u_disp'] = $user_name;
            $where = " where approval='Y' ";

            $year = $this->input->post('p_year');
            if ($year == "") {
                $month = date("m");
                $year = date("Y");
                if ($month >= 10)
                    $year+=1;
                $year = $year + 543;
            }

            $data['p_year'] = $year;
            $where.= "AND budget_year_top = '$year'";

            $this->load->model("datamodel");
            $this->datamodel->table_name = 'khotho1';
            $this->datamodel->condition = $where . " order by khotho_id";
            $list_data = $this->datamodel->list_data();
            $data['list_data'] = $list_data;
            $this->load->view('khotho12_list', $data);
        }
    }

    public function listKhotho3New() {
        $user_name = $this->is_login();
        if ($user_name != false) {
            $data['u_disp'] = $user_name;
            $where = " where approval='Y' ";

            $year = $this->input->post('p_year');
            if ($year == "") {
                $month = date("m");
                $year = date("Y");
                if ($month >= 10)
                    $year+=1;
                $year = $year + 543;
            }

            $data['p_year'] = $year;
            $where.= "AND budget_year_top = '$year'";

            $this->load->model("datamodel");
            $this->datamodel->table_name = 'khotho1_new';
            $this->datamodel->condition = $where . " order by khotho_id";
            $list_data = $this->datamodel->list_data();
            $data['list_data'] = $list_data;
            $this->load->view('khotho3New_list', $data);
        }
    }

    public function listACP() {
        $user_name = $this->is_login();
        if ($user_name != false) {
            $data['u_disp'] = $user_name;
            $where = " where approval='Y' ";

            $year = $this->input->post('p_year');
            if ($year == "") {
                $month = date("m");
                $year = date("Y");
                if ($month >= 10)
                    $year+=1;
                $year = $year + 543;
            }

            $data['p_year'] = $year;
            $where.= "AND budget_year_top = '$year'";

            $this->load->model("datamodel");
            $this->datamodel->table_name = 'khotho1_new';
            $this->datamodel->condition = $where . " order by khotho_id";
            $list_data = $this->datamodel->list_data();
            $data['list_data'] = $list_data;
            $this->load->view('acp_list', $data);
        }
    }

    public function formKhotho12() {
        $user_name = $this->is_login();
        if ($user_name != false) {
            $data['u_disp'] = $user_name;
            $cmd = $this->input->post('cmd');
            $this->load->model("datamodel");

            $this->datamodel->table_name = 'khotho1';
            $this->datamodel->pk_name = 'khotho_id';
            $this->datamodel->pk_value = $this->input->post('code_id');
            $obj = $this->datamodel->load();
            $data['cmd'] = "update";
            $data['obj'] = $obj;
            $this->load->view('khotho12_form', $data);
        }
    }

    public function submitKhotho12() {
        $user_name = $this->is_login();
        if ($user_name != false) {
            $data['u_disp'] = $user_name;
            $cmd = $_POST['cmd'];
            $this->load->model("datamodel");
            $this->datamodel->table_name = 'khotho1';
            $this->datamodel->pk_name = 'khotho_id';
            $obj = new MyDto();

            $config['upload_path'] = 'upload/khotho12';
            $config['allowed_types'] = '*';
            $rand = rand(1111, 9999);
            $date = date("Y-m-d ");
            $config['file_name'] = $date . $rand;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('summary_file')) {
                $data['err'] = $this->upload->display_errors();
            } else {
                $data_upload = $this->upload->data();
                $fname = $data_upload['file_name'];
                $obj->summary_file = $fname;
                $this->datamodel->pk_value = $this->input->post('code_id');
                $this->datamodel->update($obj);
            }
        }
        $this->listKhotho1();
    }

    public function formKhotho3New() {
        $user_name = $this->is_login();
        if ($user_name != false) {
            $data['u_disp'] = $user_name;
            $cmd = $this->input->post('cmd');
            $this->load->model("datamodel");

            $this->datamodel->table_name = 'mconfig';
            $this->datamodel->condition = "where c_group='IS_PASS' order by order_by";
            $data['list_pass'] = $this->datamodel->list_data();

            $this->datamodel->condition = "where c_group='IS_PROBLEM' order by order_by";
            $data['list_prob'] = $this->datamodel->list_data();



            $this->datamodel->table_name = 'khotho1_new';
            $this->datamodel->pk_name = 'khotho_id';
            $this->datamodel->pk_value = $this->input->post('code_id');
            $obj = $this->datamodel->load();
            $data['cmd'] = "update";
            $data['obj'] = $obj;
            $this->load->view('khotho3New_form', $data);
        }
    }

    public function formAcp() {
        $user_name = $this->is_login();
        if ($user_name != false) {
            $data['u_disp'] = $user_name;
            $cmd = $this->input->post('cmd');
            $this->load->model("datamodel");

            $this->datamodel->table_name = 'mconfig';
            $this->datamodel->condition = "where c_group='ACP_OJB' order by order_by";
            $data['list_acp_ojb'] = $this->datamodel->list_data();

            $this->datamodel->condition = "where c_group='ACP_TYPE' order by order_by";
            $data['list_acp_type'] = $this->datamodel->list_data();



            $this->datamodel->table_name = 'khotho1_new';
            $this->datamodel->pk_name = 'khotho_id';
            $this->datamodel->pk_value = $this->input->post('code_id');
            $obj = $this->datamodel->load();
            $data['cmd'] = "update";
            $data['obj'] = $obj;
            $this->load->view('acp_form', $data);
        }
    }

    public function submitAcp() {
        $user_name = $this->is_login();
        if ($user_name != false) {
            $data['u_disp'] = $user_name;
            $cmd = $_POST['cmd'];
            $this->load->model("datamodel");
            $this->datamodel->table_name = 'khotho1_new';
            $this->datamodel->pk_name = 'khotho_id';
            $obj = new MyDto();

            $obj->acp_ojb = $this->input->post('acp_ojb');
            if ($obj->acp_ojb == "4") {
                $obj->acp_ojb_oth = $this->input->post('acp_ojb_oth');
            } else {
                $obj->acp_ojb_oth = "";
            }
            $obj->acp_type = $this->input->post('acp_type');


            $acp_chk_date = $this->input->post('acp_chk_date');
            $acp_return_date = $this->input->post('acp_return_date');

            if ($acp_chk_date != "") {
                list($d, $m, $y) = explode('/', $acp_chk_date);
                $obj->acp_chk_date = $y . "-" . $m . "-" . $d;
            }
            if ($acp_return_date != "") {
                list($d, $m, $y) = explode('/', $acp_return_date);
                $obj->acp_return_date = $y . "-" . $m . "-" . $d;
            }
            $this->datamodel->pk_value = $this->input->post('code_id');
            $this->datamodel->update($obj);
        }
        $this->listKhotho1New();
    }

    public function submitKhotho3New() {
        $user_name = $this->is_login();
        if ($user_name != false) {
            $data['u_disp'] = $user_name;
            $cmd = $_POST['cmd'];
            $this->load->model("datamodel");
            $this->datamodel->table_name = 'khotho1_new';
            $this->datamodel->pk_name = 'khotho_id';
            $obj = new MyDto();

            $obj->result1 = $this->input->post('result1');
            $obj->result11 = $this->input->post('result11');
            $obj->result2 = $this->input->post('result2');
            $obj->result3 = $this->input->post('result3');
            $obj->result4 = $this->input->post('result4');
            $obj->is_pass = $this->input->post('is_pass');
            $obj->is_problem = $this->input->post('is_problem');

            $obj->apr_budget = $this->input->post('apr_budget');
            $obj->real_budget = $this->input->post('real_budget');

            $this->load->library('image_lib');
            $config['upload_path'] = 'upload/khotho12';
            $config['allowed_types'] = '*';
            //$config['max_size']	= '1000';
            $rand = rand(1111, 9999);
            $date = date("Y-m-d ");
            $config['file_name'] = $date . $rand;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('photo1')) {
                $data['err'] = $this->upload->display_errors();
                //echo "dfdfdf1 ".$data['err'];
            } else {

                $data_upload = $this->upload->data();
                $fname = $data_upload['file_name'];
                $this->resize($data_upload);
                $obj->photo1 = $fname;
            }
            if (!$this->upload->do_upload('photo2')) {
                $data['err'] = $this->upload->display_errors();
                //echo "dfdfdf1 ".$data['err'];
            } else {

                $data_upload = $this->upload->data();
                $fname = $data_upload['file_name'];
                $this->resize($data_upload);
                $obj->photo2 = $fname;
            }

            if (!$this->upload->do_upload('photo3')) {
                $data['err'] = $this->upload->display_errors();
                //echo "dfdfdf1 ".$data['err'];
            } else {

                $data_upload = $this->upload->data();
                $fname = $data_upload['file_name'];
                $this->resize($data_upload);
                $obj->photo3 = $fname;
            }

            if (!$this->upload->do_upload('photo4')) {
                $data['err'] = $this->upload->display_errors();
                //echo "dfdfdf1 ".$data['err'];
            } else {

                $data_upload = $this->upload->data();
                $fname = $data_upload['file_name'];
                $this->resize($data_upload);
                $obj->photo4 = $fname;
            }
            if (!$this->upload->do_upload('photo5')) {
                $data['err'] = $this->upload->display_errors();
                //echo "dfdfdf1 ".$data['err'];
            } else {

                $data_upload = $this->upload->data();
                $fname = $data_upload['file_name'];
                $this->resize($data_upload);
                $obj->photo5 = $fname;
            }
            if (!$this->upload->do_upload('photo6')) {
                $data['err'] = $this->upload->display_errors();
                //echo "dfdfdf1 ".$data['err'];
            } else {
                $data_upload = $this->upload->data();
                $fname = $data_upload['file_name'];
                $this->resize($data_upload);
                $obj->photo6 = $fname;
            }
            if (!$this->upload->do_upload('file1')) {
                $data['err'] = $this->upload->display_errors();
            } else {
                $data_upload = $this->upload->data();
                $fname = $data_upload['file_name'];
                $obj->file1 = $fname;
            }
            if (!$this->upload->do_upload('file2')) {
                $data['err'] = $this->upload->display_errors();
            } else {
                $data_upload = $this->upload->data();
                $fname = $data_upload['file_name'];
                $obj->file2 = $fname;
            }
            if (!$this->upload->do_upload('file3')) {
                $data['err'] = $this->upload->display_errors();
            } else {
                $data_upload = $this->upload->data();
                $fname = $data_upload['file_name'];
                $obj->file3 = $fname;
            }


            $this->datamodel->pk_value = $this->input->post('code_id');
            $this->datamodel->update($obj);
        }
        $this->listKhotho1New();
    }

    public function listKhotho17_bar() {
        $user_name = $this->is_login();
        if ($user_name != false) {
            $data['u_disp'] = $user_name;

            $this->load->model("datamodel");
            $this->datamodel->table_name = 'khotho17 kt,supply_type st ';
            $this->datamodel->field_name = "kt.*,st.type_name";
            $this->datamodel->condition = ' where kt.type_id=st.type_id order by type_id,khotho17_id';
            $list_data = $this->datamodel->list_data_join();
            $data['list_data'] = $list_data;

            header("Content-Type: application/vnd.ms-word");
            header("Expires: 0");
            header("Cache-Control:  must-revalidate, post-check=0, pre-check=0");
            header("Content-disposition: attachment; filename=\"BarCode.doc\"");

            $this->load->view('khotho17_list_bar', $data);
        }
    }

    public function listKhotho17_bar2($type_id) {
        $user_name = $this->is_login();
        if ($user_name != false) {
            $data['u_disp'] = $user_name;

            $this->load->model("datamodel");
            $this->datamodel->table_name = 'khotho17 kt,supply_type st ';
            $this->datamodel->field_name = "kt.*,st.type_name";
            $this->datamodel->condition = " where kt.type_id=st.type_id and kt.type_id='$type_id' order by type_id,khotho17_id";
            $list_data = $this->datamodel->list_data_join();
            $data['list_data'] = $list_data;

            header("Content-Type: application/vnd.ms-word");
            header("Expires: 0");
            header("Cache-Control:  must-revalidate, post-check=0, pre-check=0");
            header("Content-disposition: attachment; filename=\"BarCode.doc\"");

            $this->load->view('khotho17_list_bar', $data);
        }
    }

    public function listKhotho17_check_main() {
        $user_name = $this->is_login();
        if ($user_name != false) {
            $data['u_disp'] = $user_name;
            $this->load->view('khotho17_list_check_main', $data);
        }
    }

    public function listKhotho17_check() {
        $user_name = $this->is_login();
        if ($user_name != false) {
            $data['u_disp'] = $user_name;
            $khotho17_id = $this->input->post('khotho17_id');
            $this->load->model("datamodel");
            $this->datamodel->table_name = 'khotho17 kt,supply_type st ';
            $this->datamodel->field_name = "kt.*,st.type_name";
            $this->datamodel->condition = " where kt.type_id=st.type_id and khotho17_id='สปสช.ทร.$khotho17_id' order by type_id,khotho17_id";
            $list_data = $this->datamodel->list_data_join();
            $data['list_data'] = $list_data;
            $data['khotho17_id'] = "สปสช.ทร." . $khotho17_id;
            $this->load->view('khotho17_list_check', $data);
        }
    }

    public function listKhotho17() {
        $user_name = $this->is_login();
        if ($user_name != false) {
            $data['u_disp'] = $user_name;

            $this->load->model("datamodel");
            $this->datamodel->table_name = 'khotho17 kt,supply_type st ';
            $this->datamodel->field_name = "kt.*,st.type_name,(select c_label from mconfig where c_group='SUPPLY_STATUS' and c_value=kt.status) statusdesc";
            $this->datamodel->condition = ' where kt.type_id=st.type_id order by type_id,khotho17_id';
            $list_data = $this->datamodel->list_data_join();
            $data['list_data'] = $list_data;
            $this->load->view('khotho17_list', $data);
        }
    }

    public function listKhotho17_doc($type_id) {
        $user_name = $this->is_login();
        if ($user_name != false) {
            $data['u_disp'] = $user_name;

            $this->load->model("datamodel");
            $this->datamodel->table_name = 'khotho17 kt,supply_type st ';
            $this->datamodel->field_name = "kt.*,st.type_name,DATE_FORMAT(buy_date,'%d/%m/%Y')buy_date_str,DATE_FORMAT(sale_date,'%d/%m/%Y')sale_date_str,DATE_FORMAT(guarantee_enddate,'%d/%m/%Y')guarantee_enddate_str,(select c_label from mconfig where c_group='SUPPLY_STATUS' and c_value=kt.status) statusdesc,(select c_label from mconfig where c_group='SUPPLY_BUDGET' and c_value=kt.supply_budget) budgetdesc";
            $this->datamodel->condition = " where kt.type_id=st.type_id and kt.type_id='$type_id' order by type_id,khotho17_id";
            $list_data = $this->datamodel->list_data_join();
            $data['list_data'] = $list_data;

            header("Content-Type: application/vnd.ms-word");
            header("Expires: 0");
            header("Cache-Control:  must-revalidate, post-check=0, pre-check=0");
            header("Content-disposition: attachment; filename=\"กท17.doc\"");


            $this->load->view('doc_khotho17', $data);
        }
    }

    public function listKhotho17_doc2($code_id) {
        $user_name = $this->is_login();
        if ($user_name != false) {
            $data['u_disp'] = $user_name;

            $this->load->model("datamodel");
            $this->datamodel->table_name = 'khotho17 kt,supply_type st ';
            $this->datamodel->field_name = "kt.*,st.type_name,DATE_FORMAT(buy_date,'%d/%m/%Y')buy_date_str,DATE_FORMAT(sale_date,'%d/%m/%Y')sale_date_str,DATE_FORMAT(guarantee_enddate,'%d/%m/%Y')guarantee_enddate_str,(select c_label from mconfig where c_group='SUPPLY_STATUS' and c_value=kt.status) statusdesc,(select c_label from mconfig where c_group='SUPPLY_BUDGET' and c_value=kt.supply_budget) budgetdesc";
            $this->datamodel->condition = " where kt.type_id=st.type_id and kt.code_id='$code_id' order by type_id,khotho17_id";
            $list_data = $this->datamodel->list_data_join();
            $data['list_data'] = $list_data;
            $row = $list_data[0];
            $file_name = $row->supply_photo;
            $file_name = "upload/khotho17/$file_name";
            $content = file_get_contents($file_name);
            $objimgxx = base64_encode($content);

            $original = array("objimgxxx", "objtypename", "objkhothoid", "objsupplyname", "objbuyfrom", "objbillid", "objbuydatestr",
                "objbrandname", "objsupplyprice", "objsupplyuser", "objheadname", "objsupplytype", "objbudgetdesc",
                "objsupplyno", "objsupplyid", "objsupplyround", "objsupplyregist", "objsupplycolor", "objsupplyother", "objsaledatestr",
                "objguaranteeenddatestr", "objhowtosupply", "objguaranteecompany", "objapproveid");
            $new = array($objimgxx, $row->type_name, $row->khotho17_id, $row->supply_name, $row->buy_from, $row->bill_id, $row->buy_date_str,
                $row->brand_name, number_format($row->supply_price), $row->supply_user, $row->head_name, $row->supply_type, $row->budgetdesc,
                $row->supply_no, $row->supply_id, $row->supply_round, $row->supply_regist, $row->supply_color, $row->supply_other, $row->sale_date_str,
                $row->guarantee_enddate_str, $row->howto_supply, $row->guarantee_company, $row->approve_id);
            $template_file = "template/khoto17.xml";
            $handle = fopen($template_file, "r");
            $contents = fread($handle, filesize($template_file));
            $newphrase = str_replace($original, $new, $contents);


            header('Content-disposition: attachment; filename=กท17.doc');
            header("Content-Type: application/vnd.ms-word");
            echo $newphrase;
            /*
              header("Content-Type: application/vnd.ms-word");
              header("Expires: 0");
              header("Cache-Control:  must-revalidate, post-check=0, pre-check=0");
              header("Content-disposition: attachment; filename=\"กท17.doc\"");
             */

            //$this->load->view('doc_khotho17', $data);
        }
    }

    public function listKhotho18_doc($type_id) {
        $user_name = $this->is_login();
        if ($user_name != false) {
            $data['u_disp'] = $user_name;

            $this->load->model("datamodel");
            $this->datamodel->table_name = 'khotho17 kt,supply_type st ';
            $this->datamodel->field_name = "kt.*,st.type_name,DATE_FORMAT(buy_date,'%d/%m/%Y')buy_date_str,DATE_FORMAT(sale_date,'%d/%m/%Y')sale_date_str,DATE_FORMAT(guarantee_enddate,'%d/%m/%Y')guarantee_enddate_str,(select c_label from mconfig where c_group='SUPPLY_STATUS' and c_value=kt.status) statusdesc,(select c_label from mconfig where c_group='SUPPLY_BUDGET' and c_value=kt.supply_budget) budgetdesc";
            $this->datamodel->condition = " where kt.type_id=st.type_id and kt.type_id='$type_id' order by type_id,khotho17_id";
            $list_data = $this->datamodel->list_data_join();
            $data['list_data'] = $list_data;

            header("Content-Type: application/vnd.ms-word");
            header("Expires: 0");
            header("Cache-Control:  must-revalidate, post-check=0, pre-check=0");
            header("Content-disposition: attachment; filename=\"กท18.doc\"");


            $this->load->view('doc_khotho18', $data);
        }
    }

    public function listKhotho19_doc($type_id) {
        $user_name = $this->is_login();
        if ($user_name != false) {
            $data['u_disp'] = $user_name;

            $this->load->model("datamodel");
            $this->datamodel->table_name = 'khotho17 kt,supply_type st ';
            $this->datamodel->field_name = "kt.*,st.type_name";
            $this->datamodel->condition = " where kt.type_id=st.type_id and kt.type_id='$type_id' order by type_id,khotho17_id";
            $list_data = $this->datamodel->list_data_join();
            $data['list_data'] = $list_data;

            header("Content-Type: application/vnd.ms-word");
            header("Expires: 0");
            header("Cache-Control:  must-revalidate, post-check=0, pre-check=0");
            header("Content-disposition: attachment; filename=\"กท19.doc\"");


            $this->load->view('doc_khotho19', $data);
        }
    }

    public function listKhotho20_doc($req_id) {
        $user_name = $this->is_login();
        if ($user_name != false) {
            $data['u_disp'] = $user_name;

            $this->load->model("datamodel");

            $this->datamodel->table_name = 'supply_request';
            $this->datamodel->pk_name = 'req_id';
            $this->datamodel->pk_value = $req_id;
            $obj = $this->datamodel->load();
            $data['obj'] = $obj;
            $req_list = explode(",", $obj->req_list);
            $filter = " where type_id in ( ";
            for ($kk = 0; $kk < sizeof($req_list); $kk++) {
                $tmp1 = $req_list[$kk];
                if ($tmp1 != "") {
                    $filter.="'$tmp1',";
                }
            }
            $filter.="'xxx'";
            $filter.=")";
            $this->datamodel->table_name = 'supply_type';
            $this->datamodel->condition = "$filter order by type_id";
            $list_type = $this->datamodel->list_data();
            $data['list_type'] = $list_type;

            $typetxt = "";
            foreach ($list_type as $row) {
                $typetxt.= $row->type_name . "  ";
            }

            $req_date = strtotime($obj->req_date);
            list($y, $m, $d) = explode('-', $obj->req_date);
            $nno = $obj->req_no . " / " . $m . " พ.ศ. " . ($y + 543);

            $repatriate_date = $obj->repatriate_date;
            if ($repatriate_date != "") {
                list($y, $m, $d) = explode('-', $repatriate_date);
                $repatriate_date = $d . "/" . $m . "/" . $y;
            }

            $original = array("objreqname", "objreqaddr", "objtel", "objreqforname", "objreqfordisease", "objreqforlocal",
                "objrno", "objfixtxt1", "objreqdate", "objtypename", "objreqatriatedate");
            $new = array($obj->req_name, $obj->req_addr, $obj->tel, $obj->req_for_name, $obj->req_for_disease, $obj->req_for_local,
                $nno, "กองทุนหลักประกันสุขภาพเทศบาลนครรังสิต", $this->myutil->thai_date_long($req_date), $typetxt, $repatriate_date);

            $template_file = "template/khoto20.xml";
            $handle = fopen($template_file, "r");
            $contents = fread($handle, filesize($template_file));
            $newphrase = str_replace($original, $new, $contents);

            header('Content-disposition: attachment; filename=กท20.doc');
            header("Content-Type: application/vnd.ms-word");
            echo $newphrase;
        }
    }

    public function formKhotho17() {
        $user_name = $this->is_login();
        if ($user_name != false) {
            $data['u_disp'] = $user_name;
            $this->load->model("datamodel");
            $this->datamodel->table_name = 'mconfig';
            $this->datamodel->condition = "where c_group='SUPPLY_STATUS' order by order_by";
            $data['list_status'] = $this->datamodel->list_data();

            $this->datamodel->condition = "where c_group='SUPPLY_BUDGET' order by order_by";
            $data['list_budget'] = $this->datamodel->list_data();


            $this->datamodel->table_name = 'supply_type';
            $this->datamodel->condition = "order by type_id";
            $data['list_type'] = $this->datamodel->list_data();


            $cmd = $this->input->post('cmd');
            if ($cmd == 'edit') {
                $this->datamodel->table_name = 'khotho17';
                $this->datamodel->pk_name = 'code_id';
                $this->datamodel->pk_value = "'" . $this->input->post('code_id') . "'";
                $obj = $this->datamodel->load();
                $data['cmd'] = "update";
            } else {
                $obj = new MyDto();

                $obj->code_id = 0;
                $obj->khotho17_id = "";
                $obj->type_id = "";
                $obj->supply_name = "";
                $obj->buy_from = "";
                //$obj->used_control="";
                $obj->bill_id = "";
                $obj->buy_date = "";
                $obj->supply_user = "";
                $obj->head_name = "";
                $obj->brand_name = "";
                $obj->supply_price = "";
                $obj->supply_type = "";
                $obj->supply_budget = "";
                $obj->supply_no = "";
                $obj->supply_id = "";
                $obj->supply_round = "";
                $obj->supply_regist = "";
                $obj->supply_color = "";
                $obj->supply_other = "";
                //	$obj->supply_sale="";
                $obj->supply_cond = "";
                $obj->sale_date = "";
                $obj->guarantee_enddate = "";
                $obj->howto_supply = "";
                $obj->guarantee_company = "";
                $obj->approve_id = "";
                //	$obj->garantee_startdate="";
                //	$obj->sale_price="";
                $obj->supply_photo = "";
                $obj->status = "";

                $data['cmd'] = "insert";
            }
            $data['obj'] = $obj;
            $this->load->view('khotho17_form', $data);
        }
    }

    public function submitKhotho17() {
        $user_name = $this->is_login();
        if ($user_name != false) {
            $data['u_disp'] = $user_name;

            $cmd = $_POST['cmd'];
            $this->load->model("datamodel");
            $this->datamodel->table_name = 'khotho17';
            $this->datamodel->pk_name = 'code_id';
            $obj = new MyDto();
            $obj->khotho17_id = $this->input->post('khotho17_id');
            $obj->type_id = $this->input->post('type_id');
            $obj->supply_name = $this->input->post('supply_name');
            $obj->buy_from = $this->input->post('buy_from');
            //$obj->used_control=$this->input->post('used_control');	
            $obj->bill_id = $this->input->post('bill_id');
            $buy_date = $this->input->post('buy_date');
            if ($buy_date != "") {
                list($d, $m, $y) = explode('/', $buy_date);
                $obj->buy_date = $y . "-" . $m . "-" . $d;
                ;
            }



            $obj->supply_user = $this->input->post('supply_user');
            $obj->head_name = $this->input->post('head_name');
            $obj->brand_name = $this->input->post('brand_name');
            $obj->supply_price = $this->input->post('supply_price');
            $obj->supply_type = $this->input->post('supply_type');
            $obj->supply_budget = $this->input->post('supply_budget');
            $obj->supply_no = $this->input->post('supply_no');
            $obj->supply_id = $this->input->post('supply_id');
            $obj->supply_round = $this->input->post('supply_round');
            $obj->supply_regist = $this->input->post('supply_regist');
            $obj->supply_color = $this->input->post('supply_color');
            $obj->supply_other = $this->input->post('supply_other');
            //	$obj->supply_sale=$this->input->post('supply_sale');
            $obj->supply_cond = $this->input->post('supply_cond');
            $sale_date = $this->input->post('sale_date');
            if ($sale_date != "") {
                list($d, $m, $y) = explode('/', $sale_date);
                $obj->sale_date = $y . "-" . $m . "-" . $d;
                ;
            }


            $guarantee_enddate = $this->input->post('guarantee_enddate');
            if ($guarantee_enddate != "") {
                list($d, $m, $y) = explode('/', $guarantee_enddate);
                $obj->guarantee_enddate = $y . "-" . $m . "-" . $d;
                ;
            }


            $obj->howto_supply = $this->input->post('howto_supply');
            $obj->guarantee_company = $this->input->post('guarantee_company');
            $obj->approve_id = $this->input->post('approve_id');



            //$obj->sale_price=$this->input->post('sale_price');			
            //$obj->supply_sale=$this->input->post('supply_sale');
            //$obj->supply_photo=$this->input->post('supply_photo');
            $obj->status = $this->input->post('status');

            //$obj->statusxx=$this->input->post('status');
            if ($cmd != 'delete') {
                $config['upload_path'] = 'upload/khotho17';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '1000';
                $rand = rand(1111, 9999);
                $date = date("Y-m-d ");
                $config['file_name'] = $date . $rand;
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('supply_photo')) {
                    $data['err'] = $this->upload->display_errors();

                    $obj->supply_photo = $this->input->post('old_supply_photo');
                } else {

                    $data_upload = $this->upload->data();
                    $fname = $data_upload['file_name'];
                    //	$this->resize($data_upload);				
                    $obj->supply_photo = $fname;
                }
            }



            if ($cmd == 'delete') {
                $this->datamodel->pk_value = $this->input->post('code_id');
                $this->datamodel->delete();
            } else if ($cmd == 'insert') {
                $obj->code_id = $this->input->post('code_id');
                $this->datamodel->insert($obj);
                //$this->genBarCode($this->input->post('code_id'));
            } else if ($cmd == 'update') {
                $this->datamodel->pk_value = $this->input->post('code_id');
                $this->datamodel->update($obj);
                //$this->genBarCode($this->input->post('code_id'));
            }
            $this->listKhotho17();
        }
    }

    public function genBarCode($code_id) {
        $text = $code_id;
        $font_size = 50;
        $height = 80;
        $width = 100;
        $im = ImageCreate($width, $height);
        $grey = ImageColorAllocate($im, 230, 230, 230);
        $black = ImageColorAllocate($im, 0, 0, 0);
        $text_bbox = ImageTTFBBox($font_size, 0, "font/FRE3OF9X.TTF", $text);
        $image_centerx = $width / 2;
        $image_centery = $height / 2;
        $text_x = $image_centerx - round(($text_bbox[4] / 2));
        $text_y = $image_centery;
        ImageTTFText($im, $font_size, 0, $text_x, $text_y, $black, "font/FRE3OF9X.TTF", $text);
        ImagePng($im, "barcode/bc_$code_id.png");
        ImageDestroy($im);

        //echo "<img src=image.png>";

        /*
          $str="1234";
          putenv('GDFONTPATH=' . realpath('.'));
          $font = "FRE3OF9X.TTF";
          $image = imagecreate(100,30);
          $bg = imagecolorallocate($image,100,220,220);
          $black = imagecolorallocate($image, 0, 0, 0);
          imagettftext($image,28,0,2,25,$black,$font,$str);
          header("Content-type:image/png");
          imagepng($image);
          imagedestroy($image); */
    }

    public function listMuser() {
        $user_name = $this->is_login();
        if ($user_name != false) {
            $data['u_disp'] = $user_name;

            $this->load->model("datamodel");
            $this->datamodel->table_name = 'muser';
            $this->datamodel->condition = ' order by user_level , user_id';
            $list_data = $this->datamodel->list_data();
            $data['list_data'] = $list_data;
            $this->load->view('muser_list', $data);
        }
    }

    public function formMuser() {
        $user_name = $this->is_login();
        if ($user_name != false) {
            $data['u_disp'] = $user_name;

            $cmd = $this->input->post('cmd');
            $this->load->model("datamodel");

            $this->datamodel->table_name = 'mconfig';
            $this->datamodel->condition = "where c_group='USER_LEVEL' order by order_by";
            $data['list_level'] = $this->datamodel->list_data();

            $this->datamodel->condition = "where c_group='USER_STATUS' order by order_by";
            $data['list_status'] = $this->datamodel->list_data();



            if ($cmd == 'edit') {
                $this->datamodel->table_name = 'muser';
                $this->datamodel->pk_name = 'user_id';
                $this->datamodel->pk_value = $this->input->post('code_id');
                $obj = $this->datamodel->load();
                $data['cmd'] = "update";
            } else {
                $obj = new MyDto();
                $obj->user_id = 0;
                $obj->fl_name = "";
                $obj->position = "";
                $obj->tel = "";
                $obj->email = "";
                $obj->org_name = "";
                $obj->dep_name = "";
                $obj->user_name = "";
                $obj->user_pass = "";
                $obj->photo = "";
                $obj->user_level = "";
                $obj->user_status = "";

                $data['cmd'] = "insert";
            }
            $data['obj'] = $obj;
            $this->load->view('muser_form', $data);
        }
    }

    public function submitMuser() {
        $user_name = $this->is_login();
        if ($user_name != false) {
            $data['u_disp'] = $user_name;

            $cmd = $_POST['cmd'];
            $this->load->model("datamodel");
            $this->datamodel->table_name = 'muser';
            $this->datamodel->pk_name = 'user_id';
            $obj = new MyDto();

            //$obj->user_id=$this->input->post('user_id');		
            $obj->fl_name = $this->input->post('fl_name');
            $obj->position = $this->input->post('position');
            $obj->tel = $this->input->post('tel');
            $obj->email = $this->input->post('email');
            $obj->org_name = $this->input->post('org_name');
            $obj->dep_name = $this->input->post('dep_name');
            $obj->user_name = $this->input->post('user_name');
            $obj->user_pass = $this->input->post('user_pass');
            $obj->user_level = $this->input->post('user_level');
            $obj->user_status = $this->input->post('user_status');

            if ($cmd != 'delete') {
                $config['upload_path'] = 'upload/users';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '1000';
                $rand = rand(1111, 9999);
                $date = date("Y-m-d ");
                $config['file_name'] = $date . $rand;
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('photo')) {
                    $data['err'] = $this->upload->display_errors();
                    //echo "dfdfdf ".$data['err'];
                } else {

                    $data_upload = $this->upload->data();
                    $fname = $data_upload['file_name'];
                    //$this->resize($data_upload);				
                    $obj->photo = $fname;
                }
            }

            if ($cmd == 'delete') {
                $this->datamodel->pk_value = $this->input->post('code_id');
                $this->datamodel->delete();
            } else if ($cmd == 'insert') {
                $obj->user_id = 0;
                $this->datamodel->insert($obj);
            } else if ($cmd == 'update') {
                $this->datamodel->pk_value = $this->input->post('code_id');
                $this->datamodel->update($obj);
            }
            $this->listMuser();
        }
    }

    public function listNews() {
        $user_name = $this->is_login();
        if ($user_name != false) {
            $data['u_disp'] = $user_name;

            $this->load->model("datamodel");
            $this->datamodel->table_name = 'news';
            $this->datamodel->condition = ' order by news_id';
            $list_data = $this->datamodel->list_data();
            $data['list_data'] = $list_data;
            $this->load->view('news_list', $data);
        }
    }

    public function formNews() {
        $user_name = $this->is_login();
        if ($user_name != false) {
            $data['u_disp'] = $user_name;

            $cmd = $this->input->post('cmd');
            if ($cmd == 'edit') {
                $this->load->model("datamodel");
                $this->datamodel->table_name = 'news';
                $this->datamodel->pk_name = 'news_id';
                $this->datamodel->pk_value = $this->input->post('code_id');
                $obj = $this->datamodel->load();
                $data['cmd'] = "update";
            } else {
                $obj = new MyDto();
                $obj->news_id = 0;
                $obj->title = "";
                $obj->detail = "";
                $obj->start_date = "";
                $obj->end_date = "";
                $obj->photo = "";
                $data['cmd'] = "insert";
            }
            $data['obj'] = $obj;
            $this->load->view('news_form', $data);
        }
    }

    public function submitNews() {
        $user_name = $this->is_login();
        if ($user_name != false) {
            $data['u_disp'] = $user_name;

            $cmd = $_POST['cmd'];
            $this->load->model("datamodel");
            $this->datamodel->table_name = 'news';
            $this->datamodel->pk_name = 'news_id';
            $obj = new MyDto();
            $obj->title = $this->input->post('title');
            $obj->detail = $this->input->post('detail');
            $start_date = $this->input->post('start_date');
            $end_date = $this->input->post('end_date');

            if ($start_date != "") {
                list($d, $m, $y) = explode('/', $start_date);
                $obj->start_date = $y . "-" . $m . "-" . $d;
            }
            if ($end_date != "") {
                list($d, $m, $y) = explode('/', $end_date);
                $obj->end_date = $y . "-" . $m . "-" . $d;
            }



            if ($cmd != 'delete') {
                $this->load->library('image_lib');
                $config['upload_path'] = 'upload/news';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '10000';
                $rand = rand(1111, 9999);
                $date = date("Y-m-d ");
                $config['file_name'] = $date . $rand;
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('photo')) {
                    $data['err'] = $this->upload->display_errors();
                    //echo "dfdfdf ".$data['err'];
                } else {

                    $data_upload = $this->upload->data();
                    $fname = $data_upload['file_name'];
                    $this->resize_news($data_upload);
                    $obj->photo = $fname;
                }
            }




            if ($cmd == 'delete') {
                $this->datamodel->pk_value = $this->input->post('code_id');
                $this->datamodel->delete();
            } else if ($cmd == 'insert') {
                $obj->news_id = 0;
                $this->datamodel->insert($obj);
            } else if ($cmd == 'update') {
                $this->datamodel->pk_value = $this->input->post('code_id');
                $this->datamodel->update($obj);
            }
            $this->listNews();
        }
    }

    public function listPersonGroup() {
        $user_name = $this->is_login();
        if ($user_name != false) {
            $data['u_disp'] = $user_name;
            $this->load->model("datamodel");
            $this->datamodel->table_name = 'person_group';
            $this->datamodel->condition = ' order by group_id';
            $list_data = $this->datamodel->list_data();
            $data['list_data'] = $list_data;
            $this->load->view('person_group_list', $data);
        }
    }

    public function formPersonGroup() {
        $user_name = $this->is_login();
        if ($user_name != false) {
            $data['u_disp'] = $user_name;
            $cmd = $this->input->post('cmd');
            $this->load->model("datamodel");



            if ($cmd == 'edit') {
                $this->datamodel->table_name = 'person_group';
                $this->datamodel->pk_name = 'group_id';
                $this->datamodel->pk_value = $this->input->post('code_id');
                $obj = $this->datamodel->load();
                $data['cmd'] = "update";
            } else {
                $obj = new MyDto();
                $obj->group_id = "";
                $obj->group_name = "";

                $data['cmd'] = "insert";
            }
            $data['obj'] = $obj;
            $this->load->view('person_group_form', $data);
        }
    }

    public function submitPersonGroup() {
        $user_name = $this->is_login();
        if ($user_name != false) {
            $data['u_disp'] = $user_name;

            $cmd = $_POST['cmd'];
            $this->load->model("datamodel");
            $this->datamodel->table_name = 'person_group';
            $this->datamodel->pk_name = 'group_id';
            $obj = new MyDto();
            $obj->group_id = $this->input->post('code_id');
            $obj->group_name = $this->input->post('group_name');


            if ($cmd == 'delete') {
                $this->datamodel->pk_value = $this->input->post('code_id');
                $this->datamodel->delete();
            } else if ($cmd == 'insert') {
                $this->datamodel->insert($obj);
            } else if ($cmd == 'update') {
                $this->datamodel->pk_value = $this->input->post('code_id');
                $this->datamodel->update($obj);
            }
            $this->listPersonGroup();
        }
    }

    public function listPerson() {
        $user_name = $this->is_login();
        if ($user_name != false) {
            $data['u_disp'] = $user_name;

            $this->load->model("datamodel");
            $this->datamodel->table_name = 'person p,person_group pg';
            $this->datamodel->field_name = 'p.*,pg.group_name';
            $this->datamodel->condition = ' where p.group_id=pg.group_id  order by p.person_id';
            $list_data = $this->datamodel->list_data_join();
            $data['list_data'] = $list_data;
            $this->load->view('person_list', $data);
        }
    }

    public function formPerson() {
        $user_name = $this->is_login();
        if ($user_name != false) {
            $data['u_disp'] = $user_name;

            $this->load->model("datamodel");
            $this->datamodel->table_name = 'person_group';
            $this->datamodel->condition = ' order by group_id';
            $list_data = $this->datamodel->list_data();
            $data['list_group'] = $list_data;



            $cmd = $this->input->post('cmd');
            if ($cmd == 'edit') {

                $this->datamodel->table_name = 'person';
                $this->datamodel->pk_name = 'person_id';
                $this->datamodel->pk_value = $this->input->post('code_id');
                $obj = $this->datamodel->load();
                $data['cmd'] = "update";
            } else {
                $obj = new MyDto();
                $obj->person_id = 0;
                $obj->group_id = "";
                $obj->person_name = "";
                $obj->position = "";
                $obj->photo = "";
                $obj->order = "";
                $data['cmd'] = "insert";
            }
            $data['obj'] = $obj;
            $this->load->view('person_form', $data);
        }
    }

    public function submitPerson() {
        $user_name = $this->is_login();
        if ($user_name != false) {
            $data['u_disp'] = $user_name;

            $cmd = $_POST['cmd'];
            $this->load->model("datamodel");
            $this->datamodel->table_name = 'person';
            $this->datamodel->pk_name = 'person_id';

            $obj = new MyDto();
            $obj->person_name = $this->input->post('person_name');
            $obj->group_id = $this->input->post('group_id');
            $obj->position = $this->input->post('position');
            $obj->order = $this->input->post('order');


            if ($cmd != 'delete') {
                $config['upload_path'] = 'upload/personel';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '1000';
                $rand = rand(1111, 9999);
                $date = date("Y-m-d ");
                $config['file_name'] = $date . $rand;
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('photo')) {
                    $data['err'] = $this->upload->display_errors();
                } else {

                    $data_upload = $this->upload->data();
                    $fname = $data_upload['file_name'];
                    //	$this->resize($data_upload);				
                    $obj->photo = $fname;
                }
            }

            if ($cmd == 'delete') {
                $this->datamodel->pk_value = $this->input->post('code_id');
                $this->datamodel->delete();
            } else if ($cmd == 'insert') {
                $obj->person_id = 0;
                $this->datamodel->insert($obj);
            } else if ($cmd == 'update') {
                $this->datamodel->pk_value = $this->input->post('code_id');
                $this->datamodel->update($obj);
            }
            $this->listPerson();
        }
    }

    public function listQa() {
        $user_name = $this->is_login();
        if ($user_name != false) {
            $data['u_disp'] = $user_name;

            $this->load->model("datamodel");
            $this->datamodel->table_name = 'qa';
            $this->datamodel->condition = ' order by qa_id';
            $list_data = $this->datamodel->list_data();
            $data['list_data'] = $list_data;
            $this->load->view('qa_list', $data);
        }
    }

    public function formQa() {
        $user_name = $this->is_login();
        if ($user_name != false) {
            $data['u_disp'] = $user_name;

            $cmd = $this->input->post('cmd');
            if ($cmd == 'edit') {
                $this->load->model("datamodel");
                $this->datamodel->table_name = 'qa';
                $this->datamodel->pk_name = 'qa_id';
                $this->datamodel->pk_value = $this->input->post('code_id');
                $obj = $this->datamodel->load();
                $data['cmd'] = "update";
            } else {
                $obj = new MyDto();
                $obj->qa_id = 0;
                $obj->question = "";
                $obj->answer = "";

                $data['cmd'] = "insert";
            }
            $data['obj'] = $obj;
            $this->load->view('qa_form', $data);
        }
    }

    public function submitQa() {
        $user_name = $this->is_login();
        if ($user_name != false) {
            $data['u_disp'] = $user_name;

            $cmd = $_POST['cmd'];
            $this->load->model("datamodel");
            $this->datamodel->table_name = 'qa';
            $this->datamodel->pk_name = 'qa_id';
            $obj = new MyDto();
            $obj->question = $this->input->post('question');
            $obj->answer = $this->input->post('answer');


            if ($cmd == 'delete') {
                $this->datamodel->pk_value = $this->input->post('code_id');
                $this->datamodel->delete();
            } else if ($cmd == 'insert') {
                $obj->qa_id = 0;
                $this->datamodel->insert($obj);
            } else if ($cmd == 'update') {
                $this->datamodel->pk_value = $this->input->post('code_id');
                $this->datamodel->update($obj);
            }
            $this->listQa();
        }
    }

    public function listWorkGroup() {
        $user_name = $this->is_login();
        if ($user_name != false) {
            $data['u_disp'] = $user_name;

            $this->load->model("datamodel");
            $this->datamodel->table_name = 'work_group';
            $this->datamodel->condition = ' order by group_id';
            $list_data = $this->datamodel->list_data();
            $data['list_data'] = $list_data;
            $this->load->view('work_group_list', $data);
        }
    }

    public function formWorkGroup() {
        $user_name = $this->is_login();
        if ($user_name != false) {
            $data['u_disp'] = $user_name;
            $cmd = $this->input->post('cmd');
            $this->load->model("datamodel");
            if ($cmd == 'edit') {
                $this->datamodel->table_name = 'work_group';
                $this->datamodel->pk_name = 'group_id';
                $this->datamodel->pk_value = $this->input->post('code_id');
                $obj = $this->datamodel->load();
                $data['cmd'] = "update";
            } else {
                $obj = new MyDto();
                $obj->group_id = "";
                $obj->group_name = "";

                $data['cmd'] = "insert";
            }
            $data['obj'] = $obj;
            $this->load->view('work_group_form', $data);
        }
    }

    public function submitWorkGroup() {
        $user_name = $this->is_login();
        if ($user_name != false) {
            $data['u_disp'] = $user_name;
            $cmd = $_POST['cmd'];
            $this->load->model("datamodel");
            $this->datamodel->table_name = 'work_group';
            $this->datamodel->pk_name = 'group_id';
            $obj = new MyDto();
            $obj->group_id = $this->input->post('code_id');
            $obj->group_name = $this->input->post('group_name');

            if ($cmd == 'delete') {
                $this->datamodel->pk_value = $this->input->post('code_id');
                $this->datamodel->delete();
            } else if ($cmd == 'insert') {

                $this->datamodel->insert($obj);
            } else if ($cmd == 'update') {
                $this->datamodel->pk_value = $this->input->post('code_id');
                $this->datamodel->update($obj);
            }
            $this->listWorkGroup();
        }
    }

    public function listWorkPerson() {
        $user_name = $this->is_login();
        if ($user_name != false) {
            $data['u_disp'] = $user_name;

            $this->load->model("datamodel");
            $this->datamodel->table_name = ' wp.*,wg.group_name ';
            $this->datamodel->table_name = 'work_person wp,work_group wg';
            $this->datamodel->condition = ' where wp.group_id=wg.group_id order by wp.group_id,wp.order';
            $list_data = $this->datamodel->list_data();
            $data['list_data'] = $list_data;
            $this->load->view('work_person_list', $data);
        }
    }

    public function formWorkPerson() {
        $user_name = $this->is_login();
        if ($user_name != false) {
            $data['u_disp'] = $user_name;

            $this->load->model("datamodel");
            $this->datamodel->table_name = 'work_group';
            $this->datamodel->condition = ' order by group_id';
            $list_group = $this->datamodel->list_data();
            $data['list_group'] = $list_group;

            $cmd = $this->input->post('cmd');
            if ($cmd == 'edit') {
                $this->datamodel->table_name = 'work_person';
                $this->datamodel->pk_name = 'person_id';
                $this->datamodel->pk_value = $this->input->post('code_id');
                $obj = $this->datamodel->load();
                $data['cmd'] = "update";
            } else {
                $obj = new MyDto();
                $obj->person_id = "0";
                $obj->group_id = "";
                $obj->person_name = "";
                $obj->position = "";
                $obj->role = "";
                $obj->order = "";
                $data['cmd'] = "insert";
            }
            $data['obj'] = $obj;
            $this->load->view('work_person_form', $data);
        }
    }

    public function submitWorkPerson() {
        $user_name = $this->is_login();
        if ($user_name != false) {
            $data['u_disp'] = $user_name;
            $cmd = $_POST['cmd'];
            $this->load->model("datamodel");
            $this->datamodel->table_name = 'work_person';
            $this->datamodel->pk_name = 'person_id';
            $obj = new MyDto();
            $obj->group_id = $this->input->post('group_id');
            $obj->person_name = $this->input->post('person_name');
            $obj->position = $this->input->post('position');
            $obj->role = $this->input->post('role');
            $obj->order = $this->input->post('order');

            if ($cmd == 'delete') {
                $this->datamodel->pk_value = $this->input->post('code_id');
                $this->datamodel->delete();
            } else if ($cmd == 'insert') {
                $obj->person_id = 0;
                $this->datamodel->insert($obj);
            } else if ($cmd == 'update') {
                $this->datamodel->pk_value = $this->input->post('code_id');
                $this->datamodel->update($obj);
            }
            $this->listWorkPerson();
        }
    }

    public function listContact() {
        $user_name = $this->is_login();
        if ($user_name != false) {
            $data['u_disp'] = $user_name;

            $this->load->model("datamodel");
            $this->datamodel->table_name = 'contact';
            $this->datamodel->condition = ' order by c_id desc';
            $list_data = $this->datamodel->list_data();
            $data['list_data'] = $list_data;
            $this->load->view('contact_list', $data);
        }
    }

    public function formContact() {
        $user_name = $this->is_login();
        if ($user_name != false) {
            $data['u_disp'] = $user_name;

            $cmd = $this->input->post('cmd');
            if ($cmd == 'edit') {
                $this->load->model("datamodel");
                $this->datamodel->table_name = 'contact';
                $this->datamodel->pk_name = 'c_id';
                $this->datamodel->pk_value = $this->input->post('code_id');
                $obj = $this->datamodel->load();
                $data['cmd'] = "update";
            } else {
                $obj = new MyDto();
                $obj->c_id = 0;
                $obj->c_name = "";
                $obj->email = "";
                $obj->phone_number = "";
                $obj->content = "";
                $obj->c_status = "";
                $data['cmd'] = "insert";
            }
            $data['obj'] = $obj;
            $this->load->view('contact_form', $data);
        }
    }

    public function submitContact() {
        $user_name = $this->is_login();
        if ($user_name != false) {
            $data['u_disp'] = $user_name;

            $cmd = $_POST['cmd'];
            $this->load->model("datamodel");
            $this->datamodel->table_name = 'contact';
            $this->datamodel->pk_name = 'c_id';
            $obj = new MyDto();
            $obj->c_name = $this->input->post('c_name');
            $obj->email = $this->input->post('email');
            $obj->phone_number = $this->input->post('phone_number');
            $obj->content = $this->input->post('content');
            $obj->c_status = $this->input->post('c_status');

            if ($cmd == 'delete') {
                $this->datamodel->pk_value = $this->input->post('code_id');
                $this->datamodel->delete();
            } else if ($cmd == 'insert') {
                $obj->c_id = 0;
                $obj->create_date = date("Y-m-d H:i:s");
                $this->datamodel->insert($obj);
            } else if ($cmd == 'update') {
                $this->datamodel->pk_value = $this->input->post('code_id');
                $this->datamodel->update($obj);
            }
            $this->listContact();
        }
    }

    public function listKhotho20() {
        $user_name = $this->is_login();
        if ($user_name != false) {
            $data['u_disp'] = $user_name;

            $this->load->model("datamodel");
            $this->datamodel->table_name = 'khotho20';
            $this->datamodel->condition = ' order by khotho20_id';
            $list_data = $this->datamodel->list_data();
            $data['list_data'] = $list_data;
            $this->load->view('khotho20_list', $data);
        }
    }

    public function formKhotho20() {
        $user_name = $this->is_login();
        if ($user_name != false) {
            $data['u_disp'] = $user_name;

            $cmd = $this->input->post('cmd');
            if ($cmd == 'edit') {
                $this->load->model("datamodel");
                $this->datamodel->table_name = 'khotho20';
                $this->datamodel->pk_name = 'khotho20_id';
                $this->datamodel->pk_value = $this->input->post('code_id');
                $obj = $this->datamodel->load();
                $data['cmd'] = "update";
            } else {
                $obj = new MyDto();
                $obj->khotho20_id = 0;
                $obj->application_num = "";
                $obj->application_year = "";
                $obj->write_at = "";
                $obj->write_date = "";
                $obj->topic = "";
                $obj->write_by = "";
                $obj->writer_addr = "";
                $obj->tel = "";
                $obj->mobile = "";
                $obj->objective = "";
                $obj->objective_for = "";
                $obj->send_date = "";
                $obj->from_tel = "";
                $obj->requester = "";
                $obj->approve_for = "";
                $obj->approve_by = "";
                $obj->approve_for_2 = "";
                $obj->approve_sts = "";
                $obj->approve_by_2 = "";
                $obj->delegate = "";
                $obj->investor = "";
                $obj->supply_id = "";



                $data['cmd'] = "insert";
            }
            $data['obj'] = $obj;
            $this->load->view('khotho20_form', $data);
        }
    }

    public function submitKhotho20() {
        $user_name = $this->is_login();
        if ($user_name != false) {
            $data['u_disp'] = $user_name;

            $cmd = $_POST['cmd'];
            $this->load->model("datamodel");
            $this->datamodel->table_name = 'khotho20';
            $this->datamodel->pk_name = 'khotho20_id';
            $obj = new MyDto();
            $obj->khotho20_id = $this->input->post('khotho20_id');

            $obj->application_num = $this->input->post('application_num');
            $obj->application_year = $this->input->post('application_year');
            $obj->write_at = $this->input->post('write_at');
            $obj->write_date = $this->input->post('write_date');
            $obj->topic = $this->input->post('topic');
            $obj->write_by = $this->input->post('write_by');
            $obj->writer_addr = $this->input->post('writer_addr');
            $obj->tel = $this->input->post('tel');
            $obj->mobile = $this->input->post('mobile');
            $obj->objective = $this->input->post('objective');
            $obj->objective_for = $this->input->post('objective_for');
            $obj->send_date = $this->input->post('send_date');
            $obj->from_tel = $this->input->post('from_tel');
            $obj->requester = $this->input->post('requester');
            $obj->approve_for = $this->input->post('approve_for');
            $obj->approve_by = $this->input->post('approve_by');
            $obj->approve_for_2 = $this->input->post('approve_for_2');
            $obj->approve_sts = $this->input->post('approve_sts');
            $obj->approve_by_2 = $this->input->post('approve_by_2');
            $obj->delegate = $this->input->post('delegate');
            $obj->investor = $this->input->post('investor');
            $obj->supply_id = $this->input->post('supply_id');

            if ($cmd == 'delete') {
                $this->datamodel->pk_value = $this->input->post('code_id');
                $this->datamodel->delete();
            } else if ($cmd == 'insert') {
                $obj->khotho20_id = 0;
                $this->datamodel->insert($obj);
            } else if ($cmd == 'update') {
                $this->datamodel->pk_value = $this->input->post('code_id');
                $this->datamodel->update($obj);
            }
            $this->listKhotho20();
        }
    }

    public function listProjectGroup() {
        $user_name = $this->is_login();
        if ($user_name != false) {
            $data['u_disp'] = $user_name;

            $this->load->model("datamodel");
            $this->datamodel->table_name = 'project_group';
            $this->datamodel->condition = ' order by group_id';
            $list_data = $this->datamodel->list_data();
            $data['list_data'] = $list_data;
            $this->load->view('project_group_list', $data);
        }
    }

    public function formProjectGroup() {
        $user_name = $this->is_login();
        if ($user_name != false) {
            $data['u_disp'] = $user_name;
            $cmd = $this->input->post('cmd');
            $this->load->model("datamodel");



            if ($cmd == 'edit') {
                $this->datamodel->table_name = 'project_group';
                $this->datamodel->pk_name = 'group_id';
                $this->datamodel->pk_value = $this->input->post('code_id');
                $obj = $this->datamodel->load();
                $data['cmd'] = "update";
            } else {
                $obj = new MyDto();
                $obj->group_id = "";
                $obj->group_name = "";

                $data['cmd'] = "insert";
            }
            $data['obj'] = $obj;
            $this->load->view('project_group_form', $data);
        }
    }

    public function submitProjectGroup() {
        $user_name = $this->is_login();
        if ($user_name != false) {
            $data['u_disp'] = $user_name;
            $cmd = $_POST['cmd'];
            $this->load->model("datamodel");
            $this->datamodel->table_name = 'project_group';
            $this->datamodel->pk_name = 'group_id';
            $obj = new MyDto();
            $obj->group_id = $this->input->post('code_id');
            $obj->group_name = $this->input->post('group_name');

            if ($cmd == 'delete') {
                $this->datamodel->pk_value = $this->input->post('code_id');
                $this->datamodel->delete();
            } else if ($cmd == 'insert') {
                $this->datamodel->insert($obj);
            } else if ($cmd == 'update') {
                $this->datamodel->pk_value = $this->input->post('code_id');
                $this->datamodel->update($obj);
            }
            $this->listProjectGroup();
        }
    }

    public function listSupplyType() {
        $user_name = $this->is_login();
        if ($user_name != false) {
            $data['u_disp'] = $user_name;



            $this->load->model("datamodel");
            $this->datamodel->table_name = 'supply_type st';
            $this->datamodel->field_name = "st.*,(select count(*) from khotho17 where type_id=st.type_id) allx,(select count(*) from khotho17 where type_id=st.type_id and status='A') active,(select count(*) from khotho17 where type_id=st.type_id and status='F') fail,(select count(*) from khotho17 where type_id=st.type_id and status='U') un ";
            $this->datamodel->condition = ' order by type_id';
            $list_data = $this->datamodel->list_data_join();
            $data['list_data'] = $list_data;
            $this->load->view('supply_type_list', $data);
        }
    }

    public function formSupplyType() {
        $user_name = $this->is_login();
        if ($user_name != false) {
            $data['u_disp'] = $user_name;
            $cmd = $this->input->post('cmd');
            $this->load->model("datamodel");
            if ($cmd == 'edit') {
                $this->datamodel->table_name = 'supply_type';
                $this->datamodel->pk_name = 'type_id';
                $this->datamodel->pk_value = $this->input->post('code_id');
                $obj = $this->datamodel->load();
                $data['cmd'] = "update";
            } else {
                $obj = new MyDto();
                $obj->type_id = "";
                $obj->type_name = "";
                $data['cmd'] = "insert";
            }
            $data['obj'] = $obj;
            $this->load->view('supply_type_form', $data);
        }
    }

    public function submitSupplyType() {
        $user_name = $this->is_login();
        if ($user_name != false) {
            $data['u_disp'] = $user_name;
            $cmd = $_POST['cmd'];
            $this->load->model("datamodel");
            $this->datamodel->table_name = 'supply_type';
            $this->datamodel->pk_name = 'type_id';
            $obj = new MyDto();
            $obj->type_id = $this->input->post('code_id');
            $obj->type_name = $this->input->post('type_name');

            if ($cmd == 'delete') {
                $this->datamodel->pk_value = $this->input->post('code_id');
                $this->datamodel->delete();
            } else if ($cmd == 'insert') {
                $this->datamodel->insert($obj);
            } else if ($cmd == 'update') {
                $this->datamodel->pk_value = $this->input->post('code_id');
                $this->datamodel->update($obj);
            }
            $this->listSupplyType();
        }
    }

    public function supply_remain() {
        $user_name = $this->is_login();
        if ($user_name != false) {
            $data['u_disp'] = $user_name;

            $this->load->model("datamodel");
            $this->datamodel->table_name = 'supply_type st';
            $this->datamodel->field_name = "st.*,(select  supply_photo from khotho17 where type_id=st.type_id and supply_photo <>''  limit 0,1) photo,(select count(*) from khotho17 where type_id=st.type_id) allx,(select count(*) from khotho17 where type_id=st.type_id and status='A') active ";
            $this->datamodel->condition = ' order by type_id';
            $data['data_list'] = $this->datamodel->list_data_join();
            $data['s_index'] = 1;
            $this->load->view('admin_supply_remain', $data);
        }
    }

    public function supply_req_list() {
        $user_name = $this->is_login();
        if ($user_name != false) {
            $data['u_disp'] = $user_name;

            $month = $this->input->post('p_month');
            $year = $this->input->post('p_year');
            if ($month == "") {
                $month = date("m");
            }
            if ($year == "") {
                $year = date("Y");
            }
            $data['p_month'] = $month;
            $data['p_year'] = $year;

            $where = " WHERE DATE_FORMAT(req_date, '%Y%m' ) = '" . $year . $month . "'";


            $this->load->model("datamodel");
            $this->datamodel->table_name = 'supply_request st';
            $this->datamodel->field_name = "st.*,DATE_FORMAT(req_date,'%d/%m/%Y')req_date_str,DATE_FORMAT(repatriate_date,'%d/%m/%Y')repatriate_date_str,(select c_label from mconfig where c_group='REQ_CENTER' and c_value=st.req_center) req_center_msg,(select c_label from mconfig where c_group='REQ_STATUS' and c_value=st.req_status) req_status_msg ";
            $this->datamodel->condition = $where . ' order by req_id desc';
            $data['data_list'] = $this->datamodel->list_data_join();
            $this->load->view('admin_supply_req_list', $data);
        }
    }

    public function submit_supply_req_list() {
        $user_name = $this->is_login();
        if ($user_name != false) {
            $data['u_disp'] = $user_name;
            $cmd = $_POST['cmd'];
            $this->load->model("datamodel");
            $this->datamodel->table_name = 'supply_request';
            $this->datamodel->pk_name = 'req_id';
            if ($cmd == 'delete') {
                $this->datamodel->pk_value = $this->input->post('code_id');
                $this->datamodel->delete();
            }
            $this->supply_req_list();
        }
    }

    public function supply_req_list2() {
        $user_name = $this->is_login();
        if ($user_name != false) {
            $data['u_disp'] = $user_name;
            $this->load->model("datamodel");
            $cmd = $this->input->post('cmd');
            $data['err_msg'] = "";
            if ($cmd == "update") {
                $c_update = true;
                if ($this->input->post('req_status') == "1002") {
                    $this->datamodel->table_name = 'supply_request';
                    $this->datamodel->pk_name = 'req_id';
                    $this->datamodel->pk_value = $this->input->post('req_id');
                    $obj = $this->datamodel->load();
                    $req_list = $obj->req_list;
                    $req_list = explode(",", $req_list);
                    for ($kk = 0; $kk < sizeof($req_list); $kk++) {
                        $tmp1 = $req_list[$kk];
                        if ($tmp1 != "") {
                            $this->datamodel->table_name = 'khotho17 st';
                            $this->datamodel->field_name = "st.*";
                            $this->datamodel->condition = " where st.type_id='$tmp1' and status='A'  order by type_id limit 0,1";
                            $list_data = $this->datamodel->list_data_join();
                            if (sizeof($list_data) == 0) {
                                $c_update = false;
                                $data['err_msg'] = "ไม่สามารถอนุมัติได้เนื่องจากครุภัณฑ์คงเหลือ";
                                break;
                            }
                        }
                    }
                    if ($c_update == true) {
                        for ($kk = 0; $kk < sizeof($req_list); $kk++) {
                            $tmp1 = $req_list[$kk];
                            if ($tmp1 != "") {
                                $this->datamodel->table_name = 'khotho17 st';
                                $this->datamodel->field_name = "st.*";
                                $this->datamodel->condition = " where st.type_id='$tmp1' and status='A'  order by type_id limit 0,1";
                                $list_data = $this->datamodel->list_data_join();
                                foreach ($list_data as $row) {
                                    $this->datamodel->pk_name = 'code_id';
                                    $this->datamodel->pk_value = $row->code_id;
                                    $obj = new MyDto();
                                    $obj->status = "U";
                                    $this->datamodel->update($obj);
                                }
                            }
                        }
                    }
                }

                if ($this->input->post('req_status') == "1004" || $this->input->post('req_status') == "1006") {
                    $this->datamodel->table_name = 'supply_request';
                    $this->datamodel->pk_name = 'req_id';
                    $this->datamodel->pk_value = $this->input->post('req_id');
                    $obj = $this->datamodel->load();
                    $req_list = $obj->req_list;
                    $req_list = explode(",", $req_list);
                    for ($kk = 0; $kk < sizeof($req_list); $kk++) {
                        $tmp1 = $req_list[$kk];
                        if ($tmp1 != "") {
                            $this->datamodel->table_name = 'khotho17 st';
                            $this->datamodel->field_name = "st.*";
                            $this->datamodel->condition = " where st.type_id='$tmp1' and status='U'  order by type_id limit 0,1";
                            $list_data = $this->datamodel->list_data_join();
                            foreach ($list_data as $row) {
                                $this->datamodel->pk_name = 'code_id';
                                $this->datamodel->pk_value = $row->code_id;
                                $obj = new MyDto();
                                $obj->status = "A";
                                $this->datamodel->update($obj);
                            }
                        }
                    }
                }



                if ($c_update == true) {
                    $this->datamodel->table_name = 'supply_request';
                    $this->datamodel->pk_name = 'req_id';
                    $this->datamodel->pk_value = $this->input->post('req_id');
                    $obj = new MyDto();
                    $obj->req_status = $this->input->post('req_status');
                    $this->datamodel->update($obj);
                }
            }
            $month = $this->input->post('p_month');
            $year = $this->input->post('p_year');
            if ($month == "") {
                $month = date("m");
            }
            if ($year == "") {
                $year = date("Y");
            }
            $data['p_month'] = $month;
            $data['p_year'] = $year;

            $where = " WHERE DATE_FORMAT(req_date, '%Y%m' ) = '" . $year . $month . "'";

            $this->datamodel->table_name = 'supply_request st';
            $this->datamodel->field_name = "st.*,DATE_FORMAT(req_date,'%d/%m/%Y')req_date_str,DATE_FORMAT(repatriate_date,'%d/%m/%Y')repatriate_date_str,(select c_label from mconfig where c_group='REQ_CENTER' and c_value=st.req_center) req_center_msg,(select c_label from mconfig where c_group='REQ_STATUS' and c_value=st.req_status) req_status_msg ";
            $this->datamodel->condition = $where . ' order by req_id desc';
            $data['data_list'] = $this->datamodel->list_data_join();
            $this->load->view('admin_supply_req_list2', $data);
        }
    }

    public function supply_req_form($req_id, $p_month, $p_year) {
        $user_name = $this->is_login();
        if ($user_name != false) {
            $data['u_disp'] = $user_name;

            $this->load->model("datamodel");
            $this->datamodel->table_name = 'mconfig';
            $this->datamodel->condition = "where c_group='REQ_CENTER' order by order_by";
            $data['list_center'] = $this->datamodel->list_data();
            $this->datamodel->table_name = 'supply_type';
            $this->datamodel->condition = "order by type_id";
            $data['list_type'] = $this->datamodel->list_data();
            $this->datamodel->table_name = 'supply_request';
            $this->datamodel->pk_name = 'req_id';
            $this->datamodel->pk_value = $req_id;
            $obj = $this->datamodel->load();
            $data['obj'] = $obj;
            $data['p_month'] = $p_month;
            $data['p_year'] = $p_year;
            $this->load->view('admin_supply_req_form', $data);
        }
    }

    public function submitReq() {
        $user_name = $this->is_login();
        if ($user_name != false) {
            $data['u_disp'] = $user_name;

            $this->load->model("datamodel");
            $this->datamodel->table_name = 'supply_request';
            $this->datamodel->pk_name = 'req_id';
            $this->datamodel->pk_value = $this->input->post('code_id');
            $obj = new MyDto();
            $obj->admin_comment = $this->input->post('admin_comment');
            $obj->admin_name = $this->input->post('admin_name');
            $obj->admin_position = $this->input->post('admin_position');
            $req_list = $this->input->post('chk_req');
            $selected = "";
            for ($kk = 0; $kk < sizeof($req_list); $kk++) {
                $selected.="," . $req_list[$kk];
            }
            if ($selected != "") {
                $obj->req_list = $selected;
            }
            $repatriate_date = $this->input->post('repatriate_date');
            $req_date = $this->input->post('req_date');
            // echo "xxx ".$repatriate_date;
            if ($repatriate_date != "") {
                list($d, $m, $y) = explode('/', $repatriate_date);
                $obj->repatriate_date = $y . "-" . $m . "-" . $d;
            }
            if ($req_date != "") {
                list($d, $m, $y) = explode('/', $req_date);
                $obj->req_date = $y . "-" . $m . "-" . $d;
            }
            $this->datamodel->update($obj);
            $this->supply_req_list();
        }
    }

    public function formChangePWD($msg) {
        $user_name = $this->is_login();
        if ($user_name != false) {
            $data['u_disp'] = $user_name;
            $this->load->model("datamodel");
            $this->datamodel->table_name = 'muser';
            $this->datamodel->pk_name = 'user_id';
            $this->datamodel->pk_value = $this->session->userdata('u_am_id');
            $obj = $this->datamodel->load();
            $data['obj'] = $obj;
            $data['msg'] = $msg;
            $this->load->view('chpwd_form', $data);
        }
    }

    public function submitChangePWD() {
        $user_name = $this->is_login();
        if ($user_name != false) {
            $data['u_disp'] = $user_name;
            $this->load->model("datamodel");
            $this->datamodel->table_name = 'muser';
            $this->datamodel->pk_name = 'user_id';
            $obj = new MyDto();
            $obj->user_pass = $this->input->post('user_pass');
            $this->datamodel->pk_value = $this->session->userdata('u_am_id');
            $this->datamodel->update($obj);
            $this->formChangePWD("เปลี่ยนรหัสผ่านเรียบร้อยแล้ว");
        }
    }

    public function projectRep() {
        $user_name = $this->is_login();
        if ($user_name != false) {
            $data['u_disp'] = $user_name;
            $year = $this->input->post('p_year');

            if ($year == "") {
                $month = date("m");
                $year = date("Y");
                if ($month >= 8)
                    $year+=1;
                $year = $year + 543;
            }
            $data['p_year'] = $year;
            $this->load->view('rep_project', $data);
        }
    }

    public function formLogin($cmd) {
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->helper('html');
        $data['u_disp'] = "";
        $data['msg'] = "";
        $data['user_name'] = "";
        $data['pwd'] = "";
        if ($cmd == 'login') {
            $user_name = $this->input->post('user_name');
            $pwd = $this->input->post('pwd');
            $this->load->model('datamodel');
            $this->datamodel->table_name = 'muser';
            $this->datamodel->condition = " where user_name='$user_name' and user_pass='$pwd'  and user_status='A'";
            $list_data = $this->datamodel->list_data();
            $u_pwd = "";
            $u_am_id = "";
            $u_am_name = "";
            $user_level = "";
            $have_data = false;
            foreach ($list_data as $row) {
                $u_am_id = $row->user_id;
                $u_am_name = $row->fl_name;
                $u_pwd = $row->user_pass;
                $user_level = $row->user_level;
                $have_data = true;
            }
            if ($have_data && $u_pwd == $pwd) {
                $this->session->set_userdata('user_name', $user_name);
                $this->session->set_userdata('u_am_id', $u_am_id);
                $this->session->set_userdata('u_am_name', $u_am_name);
                $this->session->set_userdata('u_level', $user_level);
                redirect(site_url('index.php/admin/listKhotho1New'), 'refresh');
                //$this->listProductCat();					
            } else {
                $data['err'] = " กรอกข้อมูลไม่ถูกต้องไม่สามารถใช้งานได้ ";
                $data['user_name'] = $user_name;
                $data['pwd'] = $pwd;
                $this->load->view('login_form', $data);
            }
        } else if ($cmd == 'logout') {
            $data['err'] = " ออกจากระบบเรียบร้อยแล้ว ";
            $this->session->unset_userdata('user_name');
            $this->session->unset_userdata('u_am_id');
            $this->session->unset_userdata('u_am_name');
            $this->session->unset_userdata('u_level');
            $this->load->view('login_form', $data);
        } else if ($cmd == 'w') {
            $data['err'] = "";
            $this->load->view('login_form', $data);
        } else {
            $data['err'] = "";
            $this->load->view('login_form', $data);
        }
    }

    function is_login() {

        $user_name = $this->session->userdata('u_am_name');
        if ($user_name == '') {
            $this->formLogin('w');
            return false;
        } else {
            return $user_name;
        }

        //return "test";			
    }

    function resize($data_upload) {
        $configr['image_library'] = 'gd2';
        $configr['source_image'] = $data_upload['full_path'];
        $configr['new_image'] = 'tb_' . $data_upload['file_name'];
        //	echo $configr['source_image'];
        $configr['create_thumb'] = false;
        $configr['maintain_ratio'] = TRUE;
        $configr['width'] = 250;
        $configr['height'] = 300;
        $this->image_lib->initialize($configr);
        $this->image_lib->resize();
        unset($configr);
        $this->image_lib->clear();
    }

    function resize_news($data_upload) {

        $configr['image_library'] = 'gd2';
        $configr['source_image'] = $data_upload['full_path'];
        $configr['new_image'] = 'tb_' . $data_upload['file_name'];
        //	echo $configr['source_image'];
        $configr['create_thumb'] = false;
        $configr['maintain_ratio'] = TRUE;
        $configr['width'] = 396;
        $configr['height'] = 350;
        $this->image_lib->initialize($configr);
        $this->image_lib->resize();
        unset($configr);
        $this->image_lib->clear();
    }

}

?>
