<?php

class MyDto {
    
}

class Main extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('myutil');
        $this->load->library('session');
        $lang_cmd = $this->input->post('lang_cmd');
        if ($lang_cmd == 'en')
            $this->session->set_userdata('s_lang', 'en');
        else if ($lang_cmd == 'th')
            $this->session->set_userdata('s_lang', 'th');

        if ($this->session->userdata('s_lang') == null)
            $this->session->set_userdata('s_lang', 'th');
    }

    public function lotto() {

        $this->load->model("datamodel");
        $data = null;

        $this->datamodel->table_name = ' lotto ';
        $this->datamodel->condition = "  ";
        $data['list_lot'] = $this->datamodel->list_data();
        $this->load->helper('date');
        $datestring = "Year: %Y Month: %m Day: %d - %h:%i %a";
        $curr_year = mdate("%Y", time());
        $curr_mon = mdate("%m", time());
        $curr_day = mdate("%d", time());
        echo $curr_year . " " . $curr_mon . " " . $curr_day;
        $time = time();
        echo mdate($datestring, time());

        /*

          $this->datamodel->table_name=' khotho1_new ';
          $this->datamodel->condition=" where project_status<>'1001' order by khotho_id desc limit 0,5 ";
          $data['list_pro']=$this->datamodel->list_data();
          -----------------------------------
          $this->datamodel->table_name=' activity ';
          $this->datamodel->condition=" where group_id<>'9999' order by start_date desc,activity_id desc limit 0,5 ";
          $data['list_act']=$this->datamodel->list_data();

          $this->datamodel->table_name=' activity ';
          $this->datamodel->condition=" where group_id='9999' order by start_date desc,activity_id desc limit 0,5 ";
          $data['list_act_news']=$this->datamodel->list_data();

          $this->datamodel->table_name=' news ';
          $this->datamodel->condition=' WHERE  now() between start_date and end_date order by news_id desc ';
          $data['list_news']=$this->datamodel->list_data();



          $this->datamodel->table_name=' activity ';
          $this->datamodel->condition="where photo1<>'' and group_id<>'9999' order by start_date desc,activity_id desc limit 0,5 ";
          $data['list_act_left']=$this->datamodel->list_data();



          $this->datamodel->table_name=' document_group ';
          $this->datamodel->condition=' order by group_id ';
          $data['list_doc']=$this->datamodel->list_data();

          $data['s_index']=1;
         */
        $this->load->view('home', $data);
    }

    public function news() {

        $this->load->model("datamodel");




        $this->datamodel->table_name = ' news ';
        $this->datamodel->condition = ' WHERE  now() between start_date and end_date order by news_id desc ';
        $data['list_news'] = $this->datamodel->list_data();



        $this->datamodel->table_name = ' activity ';
        $this->datamodel->condition = "where photo1<>'' order by start_date desc,activity_id desc limit 0,5 ";
        $data['list_act_left'] = $this->datamodel->list_data();




        $data['s_index'] = 1;
        $this->load->view('home_news', $data);
    }

    public function qa() {
        $this->load->model("datamodel");
        $this->datamodel->table_name = ' qa ';
        $this->datamodel->condition = ' order by qa_id ';
        $data['list_qa'] = $this->datamodel->list_data();
        $this->datamodel->table_name = ' activity ';
        $this->datamodel->condition = "where photo1<>'' order by start_date desc,activity_id desc limit 0,5 ";
        $data['list_act_left'] = $this->datamodel->list_data();
        $data['s_index'] = 1;
        $this->load->view('home_qa', $data);
    }

    public function about() {
        $this->load->model("datamodel");
        $this->datamodel->table_name = 'config_content';
        $this->datamodel->pk_name = 'config_name';
        $this->datamodel->pk_value = " 'ABOUT_US' ";
        $data['obj'] = $this->datamodel->load();
        $data['s_index'] = 2;
        $this->load->view('home_about', $data);
    }

    public function committee($group_id) {
        $this->load->model("datamodel");

        $this->datamodel->table_name = ' person_group ';
        $this->datamodel->pk_name = 'group_id';
        $this->datamodel->pk_value = $group_id;
        $obj = $this->datamodel->load();
        $group_name = $obj->group_name;
        $data['group_name'] = $group_name;

        $this->datamodel->table_name = ' work_group ';
        $this->datamodel->condition = ' order by group_id ';
        $data['list_wgroup'] = $this->datamodel->list_data();

        $this->datamodel->table_name = '  person_group ';
        $this->datamodel->condition = " where group_id<>'1003' order by group_id ";
        $data['list_pgroup'] = $this->datamodel->list_data();



        $this->datamodel->table_name = ' person pp ';
        $this->datamodel->condition = "where group_id='$group_id' order by pp.order ";
        $data['list_data'] = $this->datamodel->list_data();

        if ($group_id == "1002") {
            $this->datamodel->condition = "where group_id='1003' order by pp.order ";
            $data['list_consult'] = $this->datamodel->list_data();
        }
        $data['gg_id'] = $group_id;
        $data['s_index'] = 2;
        $this->load->view('home_committee', $data);
    }

    public function workgroup($group_id) {
        $this->load->model("datamodel");

        $this->datamodel->table_name = ' work_group ';
        $this->datamodel->pk_name = 'group_id';
        $this->datamodel->pk_value = $group_id;
        $obj = $this->datamodel->load();
        $group_name = $obj->group_name;
        $data['group_name'] = $group_name;

        $this->datamodel->table_name = ' work_group ';
        $this->datamodel->condition = ' order by group_id ';
        $data['list_wgroup'] = $this->datamodel->list_data();

        $this->datamodel->table_name = '  person_group ';
        $this->datamodel->condition = " where group_id<>'1003' order by group_id ";
        $data['list_pgroup'] = $this->datamodel->list_data();



        $this->datamodel->table_name = ' work_person pp ';
        $this->datamodel->condition = "where group_id='$group_id' order by pp.order ";
        $data['list_data'] = $this->datamodel->list_data();

        $data['s_index'] = 2;
        $this->load->view('home_workgroup', $data);
    }

    public function doc($group_id) {
        $this->load->model("datamodel");
        $where = " where 1=1 ";
        if ($group_id == "all") {
            $grup_name = "";
        } else {
            $this->datamodel->table_name = ' document_group ';
            $this->datamodel->pk_name = 'group_id';
            $this->datamodel->pk_value = $group_id;
            $obj = $this->datamodel->load();
            $grup_name = $obj->group_name;
            $doc_file = $obj->doc_file;
            $where.=" and group_id='$group_id' ";
        }

        $this->datamodel->table_name = ' document_group ';
        $this->datamodel->condition = ' order by group_id';
        $data['list_group'] = $this->datamodel->list_data();

        $this->datamodel->table_name = ' document ';
        $this->datamodel->condition = $where . " order by doc_id limit 0,30 ";
        $data['list_doc'] = $this->datamodel->list_data();
        $data['s_index'] = 3;
        $data['grup_name'] = $grup_name;
        $data['doc_file'] = $doc_file;
        $this->load->view('home_doc', $data);
    }

    public function supply($page) {
        $this->load->model("datamodel");
        $this->datamodel->table_name = ' config_content ';
        $this->datamodel->pk_name = 'config_name';
        $this->datamodel->pk_value = "'$page'";
        $obj = $this->datamodel->load();
        $data['cobj'] = $obj;
        $data['s_index'] = 1;
        $this->load->view('home_supply', $data);
    }

    public function supply_list() {
        $this->load->model("datamodel");
        $this->datamodel->table_name = 'supply_type st';
        $this->datamodel->field_name = "st.*,(select  supply_photo from khotho17 where type_id=st.type_id and supply_photo <>''  limit 0,1) photo ";
        $this->datamodel->condition = ' order by type_id';
        $data['data_list'] = $this->datamodel->list_data_join();
        $data['s_index'] = 1;
        $this->load->view('home_supply_list', $data);
    }

    public function supply_det($type_id) {
        $this->load->model("datamodel");

        $this->datamodel->table_name = ' khotho17 ';
        $this->datamodel->condition = " where type_id='$type_id' order by khotho17_id ";
        $data['data_list'] = $this->datamodel->list_data();

        $data['s_index'] = 1;
        $this->load->view('home_supply_det', $data);
    }

    public function supply_remain() {
        $this->load->model("datamodel");
        $this->datamodel->table_name = 'supply_type st';
        $this->datamodel->field_name = "st.*,(select  supply_photo from khotho17 where type_id=st.type_id and supply_photo <>''  limit 0,1) photo,(select count(*) from khotho17 where type_id=st.type_id) allx,(select count(*) from khotho17 where type_id=st.type_id and status='A') active ";
        $this->datamodel->condition = ' order by type_id';
        $data['data_list'] = $this->datamodel->list_data_join();
        $data['s_index'] = 1;
        $this->load->view('home_supply_remain', $data);
    }

    public function supply_req_list() {
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
        $data['s_index'] = 1;
        $this->load->view('home_supply_req_list', $data);
    }

    public function supply_req_form($msg) {
        if ($msg == "Y") {
            $data['msg'] = " บันทึกข้อมูลเรียบร้อยแล้ว ";
        } else {
            $data['msg'] = "";
        }
        $this->load->model("datamodel");
        $this->datamodel->table_name = 'mconfig';
        $this->datamodel->condition = "where c_group='REQ_CENTER' order by order_by";
        $data['list_center'] = $this->datamodel->list_data();
        $this->datamodel->table_name = 'supply_type';
        $this->datamodel->condition = "order by type_id";
        $data['list_type'] = $this->datamodel->list_data();

        $data['s_index'] = 1;
        $this->load->view('home_supply_req_form', $data);
    }

    public function project($group_id) {
        $this->load->model("datamodel");
        $where = " where 1=1 ";
        if ($group_id == "all") {
            $grup_name = "";
        } else {
            $this->datamodel->table_name = 'mconfig';
            $this->datamodel->condition = "where c_group='PROJECT_TYPE' and c_value='$group_id' order by order_by";
            $list_data = $this->datamodel->list_data();
            $grup_name = $list_data[0]->c_label;
            $where.=" and s2='$group_id' ";
        }
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

        $this->datamodel->table_name = 'mconfig';
        $this->datamodel->condition = "where c_group='PROJECT_TYPE' order by order_by";
        $data['list_group'] = $this->datamodel->list_data();

        $this->datamodel->table_name = ' khotho1_new ';
        $this->datamodel->condition = $where . " and project_status<>'1001' order by khotho_id limit 0,100 ";
        $data['list_project'] = $this->datamodel->list_data();
        $data['s_index'] = 1;
        $data['grup_name'] = $grup_name;
        $data['group_id'] = $group_id;
        $this->load->view('home_project', $data);
    }

    public function project_calendar($group_id) {
        $this->load->model("datamodel");
        $where = " where 1=1 ";
        if ($group_id == "all") {
            $grup_name = "";
        } else {
            $this->datamodel->table_name = 'mconfig';
            $this->datamodel->condition = "where c_group='PROJECT_TYPE' and c_value='$group_id' order by order_by";
            $list_data = $this->datamodel->list_data();
            $grup_name = $list_data[0]->c_label;
            $where.=" and s2='$group_id' ";
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

        $where.= "AND (DATE_FORMAT( period_start1, '%Y%m' ) <= '" . $year . $month . "'";
        $where.= " AND DATE_FORMAT( period_end1, '%Y%m' ) >= '" . $year . $month . "')";

        $this->datamodel->table_name = 'mconfig';
        $this->datamodel->condition = "where c_group='PROJECT_TYPE' order by order_by";
        $data['list_group'] = $this->datamodel->list_data();

        $this->datamodel->table_name = ' khotho1_new kt';
        $this->datamodel->field_name = "kt.* ,(select sum(total) from khotho1_cost where khotho_id=kt.khotho_id) tot_bud ";
        $this->datamodel->condition = $where . " and project_status<>'1001'  order by khotho_id limit 0,100 ";
        $data['list_project'] = $this->datamodel->list_data_join();
        $data['s_index'] = 1;
        $data['grup_name'] = $grup_name;
        $data['group_id'] = $group_id;
        $this->load->view('home_project_calendar', $data);
    }

    public function acc($group_id) {
        $this->load->model("datamodel");
        $where = " where 1=1 ";
        if ($group_id == "all") {
            $grup_name = "";
        } else {
            $this->datamodel->table_name = ' activity_group ';
            $this->datamodel->pk_name = 'group_id';
            $this->datamodel->pk_value = $group_id;
            $obj = $this->datamodel->load();
            $grup_name = $obj->group_name;
            $where.=" and group_id='$group_id' ";
        }

        $this->datamodel->table_name = ' activity_group ';
        $this->datamodel->condition = " where group_id<>'9999' order by group_id";
        $data['list_group'] = $this->datamodel->list_data();

        $this->datamodel->table_name = ' activity ';
        $this->datamodel->condition = $where . " order by start_date desc,activity_id desc limit 0,100 ";
        $data['list_acc'] = $this->datamodel->list_data();

        $this->datamodel->table_name = ' khotho1_new ';
        $this->datamodel->condition = " where budget_year_top IN ( SELECT c_value FROM mconfig WHERE c_group='MAP_ACC' AND c_label='$group_id')
AND photo1 <>'' order by khotho_id desc limit 0,100 ";
        $data['list_proj'] = $this->datamodel->list_data();


        $data['s_index'] = 4;
        $data['grup_name'] = $grup_name;
        $this->load->view('home_acc', $data);
    }

    public function acc_det($activity_id) {
        $this->load->model("datamodel");
        $this->datamodel->table_name = ' activity ';
        $this->datamodel->pk_name = 'activity_id';
        $this->datamodel->pk_value = $activity_id;
        $obj = $this->datamodel->load();
        $data['obj'] = $obj;

        if ($obj->group_id == "9999") {
            $this->datamodel->table_name = ' activity ';
            $this->datamodel->condition = "where photo1<>'' and group_id='9999' order by start_date desc,activity_id desc limit 0,5 ";
            $data['list_act_left'] = $this->datamodel->list_data();
        }

        $this->datamodel->table_name = ' activity_group ';
        $this->datamodel->condition = " where group_id<>'9999' order by group_id";
        $data['list_group'] = $this->datamodel->list_data();

        $data['s_index'] = 4;

        $this->load->view('home_acc_det', $data);
    }

    public function acc_det2($activity_id) {
        $this->load->model("datamodel");
        $this->datamodel->table_name = ' khotho1_new ';
        $this->datamodel->pk_name = 'khotho_id';
        $this->datamodel->pk_value = $activity_id;
        $obj = $this->datamodel->load();
        $data['obj'] = $obj;

        if ($obj->group_id == "9999") {
            $this->datamodel->table_name = ' activity ';
            $this->datamodel->condition = "where photo1<>'' and group_id='9999' order by start_date desc,activity_id desc limit 0,5 ";
            $data['list_act_left'] = $this->datamodel->list_data();
        }

        $this->datamodel->table_name = ' activity_group ';
        $this->datamodel->condition = " where group_id<>'9999' order by group_id";
        $data['list_group'] = $this->datamodel->list_data();

        $data['s_index'] = 4;

        $this->load->view('home_acc_det2', $data);
    }

    public function news_frm($news_id) {
        $this->load->model("datamodel");
        $this->datamodel->table_name = ' news ';
        $this->datamodel->pk_name = 'news_id';
        $this->datamodel->pk_value = $news_id;
        $obj = $this->datamodel->load();
        $data['obj'] = $obj;


        $this->load->view('home_news_frm', $data);
    }

    public function contact($msg) {
        $this->load->model("datamodel");
        $this->datamodel->table_name = 'config_content';
        $this->datamodel->pk_name = 'config_name';
        $this->datamodel->pk_value = " 'CONTACT_HOME' ";
        $data['c_obj'] = $this->datamodel->load();

        $data['msg'] = $msg;
        $data['s_index'] = 5;
        $this->load->view('home_contact', $data);
    }

    public function submitContact() {
        $this->load->model("datamodel");
        $this->datamodel->table_name = 'contact';
        $this->datamodel->pk_name = 'c_id';
        $obj = new MyDto();
        $obj->c_name = $this->input->post('c_name');
        $obj->email = $this->input->post('email');
        $obj->phone_number = $this->input->post('phone_number');
        $obj->content = $this->input->post('content');
        $obj->c_id = 0;
        $obj->create_date = date("Y-m-d H:i:s");
        $obj->c_status = "A";
        $this->datamodel->insert($obj);
        $this->contact("บันทึกข้อมูลเรียบร้อยแล้ว");
    }

    public function submitComment() {
        $this->load->model("datamodel");
        $this->datamodel->table_name = 'mcomment';
        $this->datamodel->pk_name = 'code_id';
        $obj = new MyDto();
        $obj->user_id = $this->session->userdata('u_am_id');
        $obj->khotho1_id = $this->input->post('khotho1_id');
        $obj->msg = $this->input->post('msg');
        $obj->code_id = 0;
        $obj->create_date = date("Y-m-d H:i:s");
        $this->datamodel->insert($obj);
        $this->khotho1_Detail($obj->khotho1_id, "บันทึกข้อมูลเรียบร้อยแล้ว");
    }

    public function submitReq() {
        $this->load->model("datamodel");
        $req_date = $this->input->post('req_date');
        list($ddd, $month, $year) = explode('/', $req_date);
        $this->datamodel->table_name = 'supply_request';
        $this->datamodel->condition = " where DATE_FORMAT( req_date, '%Y%m' ) = '" . $year . $month . "' ";
        $n_row = $this->datamodel->list_data_count();
        $this->datamodel->table_name = 'supply_request';
        $this->datamodel->pk_name = 'req_id';
        $obj = new MyDto();
        $obj->req_id = 0;
        $obj->req_no = $n_row + 1;



        $obj->req_name = $this->input->post('req_name');
        $obj->req_addr = $this->input->post('req_addr');
        $obj->req_center = $this->input->post('req_center');
        $obj->tel = $this->input->post('tel');
        $req_list = $this->input->post('chk_req');
        $selected = "";
        for ($kk = 0; $kk < sizeof($req_list); $kk++) {
            $selected.="," . $req_list[$kk];
        }
        if ($selected != "") {
            $obj->req_list = $selected;
        }




        $obj->req_for_name = $this->input->post('req_for_name');
        $obj->req_for_local = $this->input->post('req_for_local');
        $obj->req_for_disease = $this->input->post('req_for_disease');
        $repatriate_date = $this->input->post('repatriate_date');

        // echo "xxx ".$repatriate_date;
        if ($repatriate_date != "") {
            list($d, $m, $y) = explode('/', $repatriate_date);
            $obj->repatriate_date = $y . "-" . $m . "-" . $d;
        }
        if ($req_date != "") {
            list($d, $m, $y) = explode('/', $req_date);
            $obj->req_date = $y . "-" . $m . "-" . $d;
        }
        $obj->req_status = "1001";
        $this->datamodel->insert($obj);

        $this->supply_req_form("Y");
    }

    public function product($catagory_id) {
        $sub_cate = $this->input->post('sub_cate');
        $data['sub_cate'] = $sub_cate;
        $this->load->model("datamodel");
        $this->datamodel->table_name = 'product';

        if ($sub_cate == "" || $sub_cate == "all") {
            $cond = ' where sub_cat_id in (select sub_cat_id from sub_catagory where catagory_id=' . $catagory_id . ')';
        } else {
            $cond = ' where sub_cat_id =' . $sub_cate;
        }

        $cond.= ' order by sub_cat_id ';
        $this->datamodel->condition = $cond;
        $data['list_data'] = $this->datamodel->list_data();

        $this->datamodel->table_name = 'product_catagory';
        $this->datamodel->condition = ' order by catagory_id ';
        $data['list_cate'] = $this->datamodel->list_data();

        $this->datamodel->table_name = 'sub_catagory';
        $this->datamodel->condition = ' where catagory_id=' . $catagory_id . '  order by sub_cat_id ';
        $data['list_subcate'] = $this->datamodel->list_data();



        $this->datamodel->table_name = 'product_catagory';
        $this->datamodel->pk_name = 'catagory_id';
        $this->datamodel->pk_value = $catagory_id;
        $cate_obj = $this->datamodel->load();
        $data['cate_name'] = $cate_obj->title_en;

        $data['s_index'] = 3;
        $this->load->view('home_product', $data);
    }

    public function prod_det($product_id) {

        $this->load->model("datamodel");
        $this->datamodel->table_name = 'product';

        $this->datamodel->pk_name = 'product_id';
        $this->datamodel->pk_value = $product_id;
        $data['prod_obj'] = $this->datamodel->load();

        $this->datamodel->table_name = 'product_catagory';
        $this->datamodel->condition = ' order by catagory_id ';
        $data['list_cate'] = $this->datamodel->list_data();
        $data['s_index'] = 3;
        $this->load->view('home_product_det', $data);
    }

    public function cert() {
        $this->load->model("datamodel");
        $this->datamodel->table_name = 'personnel';
        $this->datamodel->condition = ' order by person_id';
        $data['list_data'] = $this->datamodel->list_data();
        $data['s_index'] = 6;
        $this->load->view('home_cert', $data);
    }

    public function cert_det($person_id) {
        $this->load->model("datamodel");
        $this->datamodel->table_name = 'personnel';
        $this->datamodel->pk_name = 'person_id';
        $this->datamodel->pk_value = $person_id;
        $data['person_obj'] = $this->datamodel->load();
        $this->datamodel->table_name = 'certificate';
        $this->datamodel->condition = ' where person_id=' . $person_id;
        $data['list_data'] = $this->datamodel->list_data();

        $this->datamodel->table_name = 'personnel';
        $this->datamodel->condition = ' order by person_id';
        $data['list_person'] = $this->datamodel->list_data();

        $data['s_index'] = 6;
        $this->load->view('home_cert_det', $data);
    }

    public function event_det($news_event_id) {
        $this->load->model("datamodel");
        $this->datamodel->table_name = 'news_event';
        $this->datamodel->pk_name = 'news_event_id';
        $this->datamodel->pk_value = $news_event_id;
        $data['event_obj'] = $this->datamodel->load();

        $this->datamodel->table_name = 'event_photo';
        $this->datamodel->condition = ' where news_event_id=' . $news_event_id;
        $data['list_event_photo'] = $this->datamodel->list_data();

        $this->datamodel->table_name = 'news_event';
        $this->datamodel->condition = ' order by news_event_id desc limit 0,20 ';
        $data['list_event'] = $this->datamodel->list_data();
        $data['s_index'] = 1;
        $this->load->view('home_event_det', $data);
    }

    public function faq($qa_id) {
        $this->load->model("datamodel");
        $this->datamodel->table_name = 'config_content';
        $this->datamodel->pk_name = 'config_name';
        $this->datamodel->pk_value = " 'INTRO_FAQ' ";
        $data['intro_obj'] = $this->datamodel->load();

        $this->datamodel->table_name = 'qa';
        $this->datamodel->condition = ' order by qa_id ';
        $data['list_data'] = $this->datamodel->list_data();

        if ($qa_id != 'n') {
            $this->datamodel->table_name = 'qa';
            $this->datamodel->pk_name = 'qa_id';
            $this->datamodel->pk_value = $qa_id;
            $data['qa_obj'] = $this->datamodel->load();
        }
        $data['qa_id'] = $qa_id;
        $data['s_index'] = 4;
        $this->load->view('home_faq', $data);
    }

    public function article($article_cat_id) {
        $this->load->model("datamodel");
        $this->datamodel->table_name = 'article';
        $cond = "";
        $data['cate_name'] = "";
        if ($article_cat_id != "n") {
            $cond = ' where article_cat_id=' . $article_cat_id;
            $this->datamodel->table_name = 'article_catagory';
            $this->datamodel->pk_name = 'article_cat_id';
            $this->datamodel->pk_value = $article_cat_id;
            $cate_obj = $this->datamodel->load();
            $data['cate_name'] = $cate_obj->title_en;
        }
        $this->datamodel->table_name = 'article';
        $cond.=' order by article_id ';
        $this->datamodel->condition = $cond;
        $data['list_data'] = $this->datamodel->list_data();

        $this->datamodel->table_name = 'article_catagory';
        $this->datamodel->condition = ' order by article_cat_id ';
        $data['list_cate'] = $this->datamodel->list_data();

        $data['s_index'] = 5;
        $this->load->view('home_article', $data);
    }

    public function khotho1_Detail($khotho_id, $msg) {
        $this->load->model("datamodel");
        $this->datamodel->table_name = ' khotho1_new ';
        $this->datamodel->pk_name = 'khotho_id';
        $this->datamodel->pk_value = $khotho_id;
        $obj = $this->datamodel->load();
        $data['obj'] = $obj;


        $this->datamodel->table_name = 'mcomment c,muser u';
        $this->datamodel->field_name = 'c.*,u.fl_name';
        $this->datamodel->condition = 'where c.user_id=u.user_id and khotho1_id=' . $khotho_id . ' order by code_id';
        $data['list_comment'] = $this->datamodel->list_data_join();



        $this->datamodel->table_name = 'mconfig';
        $this->datamodel->condition = "where c_group='PROJECT_TYPE' order by order_by";
        $data['list_group'] = $this->datamodel->list_data();


        $this->datamodel->table_name = 'khotho1_cost';
        $this->datamodel->condition = " where khotho_id=$khotho_id  order by code_id";
        $list_data = $this->datamodel->list_data();
        $data['list_data'] = $list_data;
        $data['s_index'] = 1;
        $data['msg'] = $msg;
        $user_id = $this->session->userdata('u_am_id');
        $data['u_chk'] = $user_id;
        $this->load->view('home_khotho1_det', $data);
    }

}

?>
