<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Europe/Madrid");
class Admin extends CI_Controller {
    function __construct() {
        parent::__construct();
        define("PER_PAGE",10);
        $this->load->model('admin/admin_model');
        if($this->uri->segment(2)){
            $this->checkLogin();
        }

    }
	public function index() {
        $data['error']='';
        if($this->input->post()){

            $login=$this->admin_model->checkLogin($this->input->post('user'),$this->input->post('pass'));
            if($login){
                $this->session->set_userdata('user',$login);
                redirect(base_url('adm-gst/pages'));
            }else{
                $data['error']='Los datos introducidos son incorrectos.';
            }
        }
        $this->load->view('admin/login',$data);
	}

    public function checkLogin() {
        if(!$this->session->userdata('user')){
            redirect(base_url('adm-gst'));
        }
    }

    public function dashboard() {
        $this->load->view('admin/header');
        $this->load->view('admin/dashboard');
        $this->load->view('admin/footer');
    }

    public function pages()  {
        $data['per_page']=PER_PAGE;
        $data['page']=1;
        $filters=array();
        $data['sites'] = $this->admin_model->get_sites($filters,$data['page'],$data['per_page'],false);

        $count=$this->admin_model->get_sites($filters,$data['page'],$data['per_page'],true);
        $data['items_totales']=$count;
        $data['total']= ceil($count/$data['per_page']);

        $this->load->view('admin/header');
        $this->load->view('admin/pages',$data);
        $this->load->view('admin/footer');
    }

    public function page()  {
        $data['languages'] = $this->util_model->select_where("langs",array("active"=>1));
        $data['my_langs']=array();
        if($this->uri->segment(3) != 0){
            $data['site'] = $this->admin_model->get_site($this->uri->segment(3));
            $aux_langs = $this->util_model->select_where("langs_sites",array("site" => $data['site']->id));
            foreach ($aux_langs as $value) {
                $data['my_langs'][] = $value->lang;
            }
        }
        
        $this->load->view('admin/header');
        $this->load->view('admin/page',$data);
        $this->load->view('admin/footer');
    }

    public function ajax_pages()  {
        $filters=array();
        $data['per_page']=PER_PAGE;
        $data['page']=$this->input->post('page');
        $filters=array();
        $arr_filters=array('search');
        foreach($arr_filters as $item){
            if($this->_hayPost($item)){
                $filters[$item]=$this->input->post($item);
            }
        }
        $data['sites'] = $this->admin_model->get_sites($filters,$data['page'],$data['per_page'],false);
        $count=$this->admin_model->get_sites($filters,$data['page'],$data['per_page'],true);
        $data['items_totales']=$count;
        $data['total']= ceil($count/$data['per_page']);
        $this->load->view('admin/ajax/ajax_sites',$data);
    }

    public function delete_page()  {
        $fields=array(
            "active"=>0
            );
        $this->util_model->edit_table($fields,$this->uri->segment(3),'sites');
    }


    public function save_site()  {
        if($this->input->post()){

            $fields = array(
                "name" => trim($this->input->post('name')),
                "short" => trim($this->input->post('short')),
                "url" => trim($this->input->post('url')),
                "lang" => trim($this->input->post('lang')),
                "link_banner" => trim($this->input->post('link_banner')),
                "link_shop" => trim($this->input->post('link_shop')),
                "rrss_fb" => trim($this->input->post('rrss_fb')),
                "rrss_ig" => trim($this->input->post('rrss_ig'))
            );

            $tmp_flag=$this->do_upload("flag",'./uploads/flags/');
            if($tmp_flag == false){
                if($this->input->post('old_flag')){
                    $fields['flag'] = $this->input->post('old_flag');
                }else{
                    $fields['flag'] = "";
                }    
            }else{
                $fields['flag'] = $tmp_flag['upload_data']['file_name'];
                
            }
            $tmp_banner=$this->do_upload("banner",'./uploads/banners/');
            if($tmp_banner == false){
                if($this->input->post('old_banner')){
                    $fields['banner'] =$this->input->post('old_banner');
                }else{
                    $fields['banner'] = "";
                }    
            }else{
                $fields['banner'] = $tmp_banner['upload_data']['file_name'];
                
            }

            $tmp_banner_mobile=$this->do_upload("banner_mobile",'./uploads/banners/');
            if($tmp_banner_mobile == false){
                if($this->input->post('old_banner_mobile')){
                    $fields['banner_mobile'] =$this->input->post('old_banner_mobile');
                }else{
                    $fields['banner_mobile'] = "";
                }    
            }else{
                $fields['banner_mobile'] = $tmp_banner_mobile['upload_data']['file_name'];
                
            }

            if($this->input->post('edit') != "0"){
                $id_site=$this->input->post('edit');
                $this->util_model->edit_table($fields,$id_site,'sites');
            }else{
                $id_site=$this->util_model->save_table($fields,'sites');
            }

            $this->util_model->delete_table($id_site,'langs_sites');
            $my_lans=$this->input->post('my_langs');
            if(count($my_lans) > 0){
                foreach ($my_lans as $lang) {
                    $fields = array(
                        "site" => $id_site,
                        "lang" => $lang
                    );
                    $this->util_model->save_table($fields,'langs_sites');
                }
            }
            
            
            $return = new stdClass();

            if($id_site !== false){
                $site=$this->util_model->select_row('sites',$id_site);

                $return->error = false;
                $return->obj = $site;
            }else{
                $return->error = true;
            }
            $return->redirection = true;
            echo json_encode($return);
        }
    }

    public function langs()  {

        $data['per_page']=PER_PAGE;
        $data['page']=1;
        $filters=array();
        
        $data['languages'] = $this->admin_model->get_languages($filters,$data['page'],$data['per_page'],false);
        $count=$this->admin_model->get_languages($filters,$data['page'],$data['per_page'],true);
        $data['items_totales']=$count;
        $data['total']= ceil($count/$data['per_page']);

        $this->load->view('admin/header');
        $this->load->view('admin/languages',$data);
        $this->load->view('admin/footer');
    }

    public function lang()  {
        $data['empty'] = "";
        $data['fonts'] = $this->admin_model->get_fonts();
        if($this->uri->segment(3) != 0){
            $data['lang'] = $this->admin_model->get_language($this->uri->segment(3));
            $data['translates'] = $this->admin_model->get_translates($this->uri->segment(3));
        }
        $this->load->view('admin/header');
        $this->load->view('admin/language',$data);
        $this->load->view('admin/footer');
    }

    public function ajax_langs()  {
        $filters=array();
        $data['per_page']=PER_PAGE;
        $data['page']=$this->input->post('page');
        $filters=array();
        $arr_filters=array('search');
        foreach($arr_filters as $item){
            if($this->_hayPost($item)){
                $filters[$item]=$this->input->post($item);
            }
        }
        $data['languages'] = $this->admin_model->get_languages($filters,$data['page'],$data['per_page'],false);
        $count=$this->admin_model->get_languages($filters,$data['page'],$data['per_page'],true);
        $data['items_totales']=$count;
        $data['total']= ceil($count/$data['per_page']);
        $this->load->view('admin/ajax/ajax_langs',$data);
    }
    public function save_lang()  {
        if($this->input->post()){

            $fields = array(
                "name" => trim($this->input->post('name')),
                "font" => trim($this->input->post('font')),
                "short" => trim(strtolower($this->input->post('short')))
            );
            if($this->input->post('rtl')){
                $fields['rtl'] = 1;
            }else{
                $fields['rtl'] = 0;
            }

            if($this->input->post('edit') != "0"){
                $id_lang=$this->input->post('edit');
                $this->util_model->edit_table($fields,$id_lang,'langs');
            }else{
                $id_lang=$this->util_model->save_table($fields,'langs');
            }

            $return = new stdClass();

            if($id_lang !== false){
                $lang=$this->util_model->select_row('langs',$id_lang);

                $return->error = false;
                $return->obj = $lang;
            }else{
                $return->error = true;
            }
            $return->redirection = true;
            echo json_encode($return);
        }
    }
    public function delete_lang()  {
        $fields=array(
            "active"=>0
            );
        $this->util_model->edit_table($fields,$this->uri->segment(3),'langs');
    }

    public function save_translate()  {
        if($this->input->post()){
            $lang = $this->input->post("lang");
            $items = $this->util_model->select_where('fields',array());
            foreach ($items as $item) {
                if($this->admin_model->exist_translate($item->id,$lang)){
                    $fields = array(
                        "translate" => trim($this->input->post('translate_'.$item->id))
                    );
                    $this->util_model->edit_where($fields,array("field"=>$item->id,"lang"=>$lang),'translates');
                }else{
                    $fields = array(
                        "field" => $item->id,
                        "lang" => $lang,
                        "translate" => trim($this->input->post('translate_'.$item->id))
                    );
                    $this->util_model->save_table($fields,'translates');
                }      
            }
            
            $return = new stdClass();
            $return->error = false;
            $return->redirection = false;
            echo json_encode($return);
        }
    }

    public function newsletters()  {

        $data['per_page']=PER_PAGE;
        $data['page']=1;
        $filters=array();
        $data['newsletters'] = $this->admin_model->get_newsletters($filters,$data['page'],$data['per_page'],false);

        $count=$this->admin_model->get_newsletters($filters,$data['page'],$data['per_page'],true);
        $data['items_totales']=$count;
        $data['total']= ceil($count/$data['per_page']);

        $data['sites'] = $this->util_model->select_where("sites",array("active"=>1));

        $this->load->view('admin/header');
        $this->load->view('admin/newsletters',$data);
        $this->load->view('admin/footer');
    }

    public function ajax_newsletters()  {
        $filters=array();
        $data['per_page']=PER_PAGE;
        $data['page']=$this->input->post('page');
        $filters=array();
        $arr_filters=array('search','site');
        foreach($arr_filters as $item){
            if($this->_hayPost($item)){
                $filters[$item]=$this->input->post($item);
            }
        }
        $data['newsletters'] = $this->admin_model->get_newsletters($filters,$data['page'],$data['per_page'],false);
        $count=$this->admin_model->get_newsletters($filters,$data['page'],$data['per_page'],true);
        $data['items_totales']=$count;
        $data['total']= ceil($count/$data['per_page']);

        $this->load->view('admin/ajax/ajax_newsletters',$data);
    }

    public function delete_newsletter()  {
        $fields=array(
            "active"=>0
            );
        $this->util_model->edit_table($fields,$this->uri->segment(3),'subscribers');
    }


    public function feeds()  {

        $filters=array();
        $data['feeds'] = $this->admin_model->get_feeds();

        $this->load->view('admin/header');
        $this->load->view('admin/feeds',$data);
        $this->load->view('admin/footer');
    }
    public function feed(){
        $data['empty'] = "";
        if($this->uri->segment(3) != 0){
            $data['feed'] = $this->admin_model->get_feed($this->uri->segment(3));
        }
        $this->load->view('admin/header');
        $this->load->view('admin/feed',$data);
        $this->load->view('admin/footer');
    }
    public function save_feed()  {
        if($this->input->post()){

            $fields = array(
                "name" => trim($this->input->post('name')),
                "iframe" => trim(html_entity_decode ($this->input->post('iframe')))
            );

            if($this->input->post('edit') != "0"){
                $id_feed=$this->input->post('edit');
                $this->util_model->edit_table($fields,$id_feed,'fbpages');
            }else{
                $id_feed=$this->util_model->save_table($fields,'fbpages');
            }

            $return = new stdClass();

            if($id_feed !== false){
                $feed=$this->util_model->select_row('fbpages',$id_feed);

                $return->error = false;
                $return->obj = $feed;
            }else{
                $return->error = true;
            }
            $return->redirection = true;
            echo json_encode($return);
        }
    }
    public function delete_feed()  {
        $fields=array(
            "active"=>0
            );
        $this->util_model->edit_table($fields,$this->uri->segment(3),'fbpages');
    }

    public function gallery()  {

        $data['per_page']=PER_PAGE;
        $data['page']=1;
        $filters=array();
        $data['gallery'] = $this->admin_model->get_gallery($filters,$data['page'],$data['per_page'],false);

        $count=$this->admin_model->get_gallery($filters,$data['page'],$data['per_page'],true);
        $data['items_totales']=$count;
        $data['total']= ceil($count/$data['per_page']);

        $this->load->view('admin/header');
        $this->load->view('admin/gallery',$data);
        $this->load->view('admin/footer');
    }

    public function gallery_deleted()  {

        $data['per_page']=PER_PAGE;
        $data['page']=1;
        $filters=array();
        $data['gallery'] = $this->admin_model->get_gallery_deleted($filters,$data['page'],$data['per_page'],false);

        $count=$this->admin_model->get_gallery_deleted($filters,$data['page'],$data['per_page'],true);
        $data['items_totales']=$count;
        $data['total']= ceil($count/$data['per_page']);

        $this->load->view('admin/header');
        $this->load->view('admin/gallery',$data);
        $this->load->view('admin/footer');
    }


    public function single_gallery()  {
        $data['empty'] = "";
        if($this->uri->segment(3) != 0){
            $data['gallery'] = $this->admin_model->get_single_gallery($this->uri->segment(3));
        }
        $this->load->view('admin/header');
        $this->load->view('admin/single_gallery',$data);
        $this->load->view('admin/footer');
    }

    public function ajax_gallery()  {
        $filters=array();
        $data['per_page']=PER_PAGE;
        $data['page']=$this->input->post('page');
        $filters=array();
        $arr_filters=array('search','state');
        foreach($arr_filters as $item){
            if($this->_hayPost($item)){
                $filters[$item]=$this->input->post($item);
            }
        }
        if($this->uri->segment(2) != 'ajax-gallery'){

            $data['gallery'] = $this->admin_model->get_gallery_deleted($filters,$data['page'],$data['per_page'],false);
            $count=$this->admin_model->get_gallery_deleted($filters,$data['page'],$data['per_page'],true);    
        }else{
            $data['gallery'] = $this->admin_model->get_gallery($filters,$data['page'],$data['per_page'],false);
            $count=$this->admin_model->get_gallery($filters,$data['page'],$data['per_page'],true);    
        }
        

        $data['items_totales']=$count;
        $data['total']= ceil($count/$data['per_page']);
        $this->load->view('admin/ajax/ajax_gallery',$data);
    }

    public function delete_gallery()  {
        $fields=array(
            "deleted"=>1
            );
        $this->util_model->edit_table($fields,$this->uri->segment(3),'social_networks');
    }
    public function reactive_gallery()  {
        $fields=array(
            "deleted"=>0
            );
        $this->util_model->edit_table($fields,$this->uri->segment(3),'social_networks');
    }

    public function confirm_gallery()  {
        $fields=array(
            "active"=>1
            );
        $this->util_model->edit_table($fields,$this->uri->segment(3),'social_networks');
    }

    public function winners(){

        $data['per_page']=PER_PAGE;
        $data['page']=1;
        $filters=array();
        $date = new DateTime(date('Y-m-d'));
        $data['current_week'] = (int)$date->format("W") -1;
        $data['weeks'] = $this->admin_model->get_weeks();
        $data['winners'] = $this->admin_model->get_winners($data['current_week'],$filters,$data['page'],$data['per_page'],false);
        $count=$this->admin_model->get_winners($data['current_week'],$filters,$data['page'],$data['per_page'],true);
        $data['items_totales']=$count;
        $data['total']= ceil($count/$data['per_page']);

        $data['total_winners'] = $this->admin_model->get_total_winners($data['current_week'],$filters);

        $this->load->view('admin/header');
        $this->load->view('admin/winners',$data);
        $this->load->view('admin/footer');
    }

    public function ajax_winners()  {
        $filters=array();
        $data['per_page']=PER_PAGE;
        $data['page']=$this->input->post('page');
        $filters=array();
        $arr_filters=array('week');
        foreach($arr_filters as $item){
            if($this->_hayPost($item)){
                $filters[$item]=$this->input->post($item);
            }
        }
        $date = new DateTime(date('Y-m-d'));
        $data['current_week'] = (int)$date->format("W");
        $data['winners'] = $this->admin_model->get_winners($data['current_week'],$filters,$data['page'],$data['per_page'],false);
        $count=$this->admin_model->get_winners($data['current_week'],$filters,$data['page'],$data['per_page'],true);
        $data['items_totales']=$count;
        $data['total']= ceil($count/$data['per_page']);
        $data['total_winners'] = $this->admin_model->get_total_winners($data['current_week'],$filters);
        $this->load->view('admin/ajax/ajax_winners',$data);
    }

    public function add_winner(){
        $fields=array(
            "winner"=>$this->input->post('winner')
            );
        $this->util_model->edit_table($fields,$this->input->post('item'),'social_networks');
    }
    public
     function delete_winners_fb()  {
        $fields=array(
            "active"=>0
            );
        $this->util_model->edit_table($fields,$this->uri->segment(3),'facebook');
    }

    public function winners_fb(){
        $data['per_page']=PER_PAGE;
        $data['page']=1;
        $filters=array();
        $date = new DateTime(date('Y-m-d'));
        $data['current_week'] = (int)$date->format("W") -1;
        $data['weeks'] = $this->admin_model->get_weeks_fb();
        $data['winners'] = $this->admin_model->get_winners_fb($data['current_week'],$filters,$data['page'],$data['per_page'],false);
        $count=$this->admin_model->get_winners_fb($data['current_week'],$filters,$data['page'],$data['per_page'],true);
        $data['items_totales']=$count;
        $data['total']= ceil($count/$data['per_page']);

        $data['total_winners'] = $this->admin_model->get_total_winners_fb($data['current_week'],$filters);

        $this->load->view('admin/header');
        $this->load->view('admin/winners_fb',$data);
        $this->load->view('admin/footer');
    }

    public function ajax_winners_fb()  {
        $filters=array();
        $data['per_page']=PER_PAGE;
        $data['page']=$this->input->post('page');
        $filters=array();
        $arr_filters=array('week');
        foreach($arr_filters as $item){
            if($this->_hayPost($item)){
                $filters[$item]=$this->input->post($item);
            }
        }
        $date = new DateTime(date('Y-m-d'));
        $data['current_week'] = (int)$date->format("W");
        $data['winners'] = $this->admin_model->get_winners_fb($data['current_week'],$filters,$data['page'],$data['per_page'],false);
        $count=$this->admin_model->get_winners_fb($data['current_week'],$filters,$data['page'],$data['per_page'],true);
        $data['items_totales']=$count;
        $data['total']= ceil($count/$data['per_page']);
        $data['total_winners'] = $this->admin_model->get_total_winners_fb($data['current_week'],$filters);
        $this->load->view('admin/ajax/ajax_winners_fb',$data);
    }

    public function winner_fb(){
        $data['empty'] = "";
        if($this->uri->segment(3) != 0){
            $data['winner'] = $this->admin_model->get_winner_fb($this->uri->segment(3));
        }
        $this->load->view('admin/header');
        $this->load->view('admin/winner_fb',$data);
        $this->load->view('admin/footer');
    }
    public function save_winner()  {
        if($this->input->post()){

            $fields = array(
                "week" => trim($this->input->post('week')),
                "user" => trim($this->input->post('user')),
                "text" => trim($this->input->post('text')),
                "likes" => trim($this->input->post('likes'))
            );

            $tmp_image=$this->do_upload("image",'./uploads/facebook/');
            if($tmp_image == false){
                if($this->input->post('old_image')){
                    $fields['image'] = $this->input->post('old_image');
                }else{
                    $fields['image'] = "";
                }    
            }else{
                $fields['image'] = $tmp_image['upload_data']['file_name'];
            }

            if($this->input->post('edit') != "0"){
                $id_facebook=$this->input->post('edit');
                $this->util_model->edit_table($fields,$id_facebook,'facebook');
            }else{
                $id_facebook=$this->util_model->save_table($fields,'facebook');
            }
            
            $return = new stdClass();

            if($id_facebook !== false){
                $facebook=$this->util_model->select_row('facebook',$id_facebook);

                $return->error = false;
                $return->obj = $facebook;
            }else{
                $return->error = true;
            }
            $return->redirection = true;
            echo json_encode($return);
        }
    }


    public function do_upload($name,$path)
    {
            $config['upload_path']          = $path;
            $config['allowed_types']        = '*';
            $config['max_size']             = 1000000;
            $config['max_width']            = 1000000;
            $config['max_height']           = 1000000;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload($name))
            {
                $error = array('error' => $this->upload->display_errors());
                return false;
            }else{
                $data = array('upload_data' => $this->upload->data());
                return $data;
            }

    } 

    
    private function _hayPost($post_name){
        //sólo comprueba si existe post y si es distino de vacío
        if($this->input->post($post_name)){
            if($this->input->post($post_name) != ''){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
    public function logout() {
        $this->session->sess_destroy();
        redirect(base_url('adm-gst'));
    }

    public function csv_newsletters(){

        $file="Newsletters-".date('dmYHis').".csv";

        $content="";

        $content.=utf8_decode('"EMAIL";');;
        $content.=utf8_decode('"SITE";');
        $content.=utf8_decode('"DATE";');
        $content.=chr(13).chr(10);
        $result= $this->admin_model->get_csv_newsletters();
        foreach($result as $item){
            $content.='"'.$item->email.'";';
            $content.='"'.utf8_decode($item->name).'";';
            $content.='"'.date("d/m/Y", strtotime($item->date)).'";';
            $content.=chr(13).chr(10);
        }

        header('Content-Description: File Transfer');
        header('Content-type: application/octet-stream');
        header('Content-Disposition: attachment; filename="'.basename($file).'"');
        header('Content-Transfer-Encoding: binary');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Expires: 0');
        header('Pragma: public');
        echo $content;
    }


}
