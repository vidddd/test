<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model {
	public function checkLogin($user,$pass){
        $this->db->select('*');
        $this->db->from('access');
        $this->db->where('email', $user);
        $this->db->where('password', md5($pass));
        $this->db->where('active', 1);

        $q = $this->db->get();

        return $q->row();
    }


    public function get_langs(){
        $this->db->select('*');
        $this->db->from('langs');
        $this->db->where('active', 1);
        $this->db->order_by('name');

        $q = $this->db->get();
        return $q->result();
    }

    public function get_fonts(){
        $this->db->select('*');
        $this->db->from('fonts');
        $this->db->where('active', 1);
        $this->db->order_by('name');

        $q = $this->db->get();

        return $q->result();
    }

    function get_translates($lang) {
        $this->db->select('*');
        $this->db->from('fields');
        $this->db->order_by('order');
        $fields=$this->db->get()->result();
        $aux=array();
        foreach ($fields as $field) {
            $this->db->select('*');
            $this->db->from('translates');    
            $this->db->where('field',$field->id);
            $this->db->where('lang',$lang); 
            $translate=$this->db->get()->row();
            if($translate){
                $field->idTranslate = $translate->id;
                $field->translate = $translate->translate;    
            }
            $aux[] = $field;
        }
        return $aux;
    }
    function exist_translate($field,$lang) {
        $this->db->select('*');
        $this->db->from('translates');
        $this->db->where('field',$field);
        $this->db->where('lang',$lang); 
        
        return $this->db->get()->row();
    }

    public function get_sites($filters,$page,$per_page,$count=false,$pend=false){
        $this->db->select('*');
        $this->db->from('sites');
        $this->db->where('active', 1);
        $this->db->order_by('name');

        /*****FILTROS******/
        if(isset($filters['search'])){
            $this->db->where('name like "%'.$filters['search'].'%"');
        }
        if(!$count){
            $this->db->limit($per_page,($page-1)*$per_page);
        }
        $q = $this->db->get();
        if($count){
            return count($q->result());
        }
        return $q->result();
    }

    public function get_site($id){
        $this->db->select('*');
        $this->db->from('sites');
        $this->db->where('id',$id);
        $this->db->where('active', 1);

        $q = $this->db->get();
        return $q->row();
    }

    public function get_languages($filters,$page,$per_page,$count=false,$pend=false){
        $this->db->select('*');
        $this->db->from('langs');
        $this->db->where('active', 1);
        $this->db->order_by('name');

        /*****FILTROS******/
        if(isset($filters['search'])){
            $this->db->where('name like "%'.$filters['search'].'%"');
        }
        if(!$count){
            $this->db->limit($per_page,($page-1)*$per_page);
        }
        $q = $this->db->get();
        if($count){
            return count($q->result());
        }
        return $q->result();
    }

    public function get_language($id){
        $this->db->select('*');
        $this->db->from('langs');
        $this->db->where('active', 1);
        $this->db->where('id',$id);

        $q = $this->db->get();
        return $q->row();
    }

    function get_translate($lang) {

        $this->db->select('f.*, t.lang, t.translate, t.id as idTranslate');
        $this->db->from('fields f');
        $this->db->join('translate t', 't.field = f.id', 'LEFT');
        $this->db->where('t.lang', $lang);
        $this->db->order_by('f.id');

        return $this->db->get()->result();
    }

    function save_translate() {
        $data = new stdClass();
        $data->translate = $this->input->post('translate');

        $this->db->where('id', $this->input->post('idTranslate'));
        $this->db->update('translates_tmp', $data);

        $this->db->select('*');
        $this->db->from('translates_tmp');
        $this->db->where('id', $this->input->post('idTranslate'));
        $res = $this->db->get()->row();

    }
    function get_newsletters($filters,$page,$per_page,$count=false,$pend=false){
        $this->db->select('s.*,si.name');
        $this->db->from('subscribers as s');
        $this->db->join('sites as si','s.site = si.id');
        $this->db->where('s.active', 1);
        $this->db->order_by('s.id','desc');

        /*****FILTROS******/
        if(isset($filters['search'])){
            $this->db->where('email like "%'.$filters['search'].'%"');
        }
        if(isset($filters['site'])){
            $this->db->where('site',$filters['site']);
        }

        if(!$count){
            $this->db->limit($per_page,($page-1)*$per_page);
        }
        $q = $this->db->get();
        if($count){
            return count($q->result());
        }
        return $q->result();
    }
    public function get_feeds(){
        $this->db->select('*');
        $this->db->from('fbpages');
        $this->db->where('active', 1);
        $this->db->order_by('id');

        $q = $this->db->get();

        return $q->result();
    }

    public function get_feed($id){
        $this->db->select('*');
        $this->db->from('fbpages');
        $this->db->where('active', 1);
        $this->db->where('id',$id);

        $q = $this->db->get();
        return $q->row();
    }

    public function get_gallery($filters,$page,$per_page,$count=false,$pend=false){
        $this->db->select('*');
        $this->db->from('social_networks');
        $this->db->where('deleted','0');
        $this->db->order_by('id','desc');

        /*****FILTROS******/
        if(isset($filters['search'])){
            $this->db->where('name like "%'.$filters['search'].'%" OR user like "%'.$filters['search'].'%" OR text like "%'.$filters['search'].'%"');
        }
        if(isset($filters['state'])){
            $this->db->where('active',$filters['state']);
        }
        if(!$count){
            $this->db->limit($per_page,($page-1)*$per_page);
        }
        $q = $this->db->get();
        if($count){
            return count($q->result());
        }
        return $q->result();
    }
    public function get_gallery_deleted($filters,$page,$per_page,$count=false,$pend=false){
        $this->db->select('*');
        $this->db->from('social_networks');
        $this->db->where('deleted','1');
        $this->db->order_by('id','desc');

        /*****FILTROS******/
        if(isset($filters['search'])){
            $this->db->where('name like "%'.$filters['search'].'%" OR user like "%'.$filters['search'].'%" OR text like "%'.$filters['search'].'%"');
        }
        
        if(!$count){
            $this->db->limit($per_page,($page-1)*$per_page);
        }
        $q = $this->db->get();
        if($count){
            return count($q->result());
        }
        return $q->result();
    }
    public function get_winners($week,$filters,$page,$per_page,$count=false,$pend=false){
        $this->db->select('*');
        $this->db->from('social_networks');
        $this->db->where('deleted','0');
        $this->db->where('active','1');
        $this->db->order_by('id','desc');
       

        /*****FILTROS******/
        if(isset($filters['week'])){
            $this->db->where('week',$filters['week']);
        }else{
            $this->db->where('week',$week);
        }
        if(!$count){
            $this->db->limit($per_page,($page-1)*$per_page);
        }
        $q = $this->db->get();
        if($count){
            return count($q->result());
        }
        return $q->result();
    }

    public function get_total_winners($week,$filters){
        $this->db->select('*');
        $this->db->from('social_networks');
        $this->db->where('deleted','0');
        $this->db->where('active','1');
        $this->db->where('winner','1');
        $this->db->order_by('id','desc');
       

        /*****FILTROS******/
        if(isset($filters['week'])){
            $this->db->where('week',$filters['week']);
        }else{
            $this->db->where('week',$week);
        }
       
        $q = $this->db->get();
        return count($q->result());
    }

    public function get_weeks(){
        $this->db->select('DISTINCT(week) as week');
        $this->db->from('social_networks');
        $this->db->where('deleted','0');
        $this->db->where('active','1');
        $this->db->order_by('week');
        $q = $this->db->get();

        return $q->result();
    }

    public function get_weeks_fb(){
        $this->db->select('DISTINCT(week) as week');
        $this->db->from('facebook');
        $this->db->where('active','1');
        $this->db->order_by('week');
        $q = $this->db->get();

        return $q->result();
    }

    public function get_winners_fb($week,$filters,$page,$per_page,$count=false,$pend=false){
        $this->db->select('*');
        $this->db->from('facebook');
        $this->db->where('active','1');
        $this->db->order_by('id','desc');
       

        /*****FILTROS******/
        if(isset($filters['week'])){
            $this->db->where('week',$filters['week']);
        }else{
            $this->db->where('week',$week);
        }
        if(!$count){
            $this->db->limit($per_page,($page-1)*$per_page);
        }
        $q = $this->db->get();
        if($count){
            return count($q->result());
        }
        return $q->result();
    }

    public function get_total_winners_fb($week,$filters){
        $this->db->select('*');
        $this->db->from('facebook');
        $this->db->where('active','1');
        $this->db->order_by('id','desc');
       

        /*****FILTROS******/
        if(isset($filters['week'])){
            $this->db->where('week',$filters['week']);
        }else{
            $this->db->where('week',$week);
        }
       
        $q = $this->db->get();
        return count($q->result());
    }

    public function get_winner_fb($id){
        $this->db->select('*');
        $this->db->from('facebook');
        $this->db->where('active', 1);
        $this->db->where('id',$id);

        $q = $this->db->get();
        return $q->row();
    }

    function go_production_translate() {
        $this->db->select('COUNT(*) AS total');
        $this->db->from('fields');
        $fiels = $this->db->get()->result();

        $this->db->select('COUNT(*) AS total');
        $this->db->from('translates_tmp');
        $this->db->where('lang', $this->uri->segment(3));
        $this->db->where('translate <>', '');
        $res = $this->db->get()->result();
        if($res[0]->total != $fiels[0]->total){
            return 'KO';
        } else {
            $this->db->query('DELETE FROM translates WHERE lang = '.$this->uri->segment(3));
            $this->db->query("INSERT INTO translates (field, lang, translate) select field, lang, translate FROM translates_tmp WHERE lang = ".$this->uri->segment(3));


            return 'OK';
        }
    }

    function get_translate_micro($lang) {
        $this->db->select('*');
        $this->db->from('translates_micro_tmp');
        $this->db->where('lang', $lang);

        if(count($this->db->get()->result()) == 0) {
            $this->db->query("INSERT INTO translates_micro_tmp (field, lang, translate) select id, ('".$lang."') as lang, '' as name FROM fields_micro");
        }

        $this->db->select('f.*, t.lang, t.translate, t.id as idTranslate');
        $this->db->from('fields_micro f');
        $this->db->join('translates_micro_tmp t', 't.field = f.id', 'LEFT');
        $this->db->where('t.lang', $lang);
        $this->db->order_by('f.id');

        return $this->db->get()->result();
    }

    function save_translate_micro() {
        $data = new stdClass();

        if($this->input->post('isImage') === '1') {
            echo 'entraaaaaaa';
            $config['upload_path']          = './resources/images/uploads/';
            $config['allowed_types']        = 'gif|jpg|png';

            $this->load->library('upload', $config);

            if ( $this->upload->do_upload('image_translate'))
            {
                $d = array('upload_data' => $this->upload->data());
                $data->translate = '/resources/images/uploads/'.$d['upload_data']['file_name'];
            }
        } else {
            echo 'NO';
            $data->translate = $this->input->post('translate');
        }

        if(isset($data->translate)) {
            $this->db->where('id', $this->input->post('idTranslate'));
            $this->db->update('translates_micro_tmp', $data);

            $this->db->select('*');
            $this->db->from('translates_micro_tmp');
            $this->db->where('id', $this->input->post('idTranslate'));
            $res = $this->db->get()->row();

        }
    }

    function go_production_translate_micro() {
        $this->db->select('COUNT(*) AS total');
        $this->db->from('fields_micro');
        $fiels = $this->db->get()->result();

        $this->db->select('COUNT(*) AS total');
        $this->db->from('translates_micro_tmp');
        $this->db->where('lang', $this->uri->segment(3));
        $this->db->where('translate <>', '');
        $res = $this->db->get()->result();
        if($res[0]->total != $fiels[0]->total){
            return 'KO';
        } else {
            $this->db->query('DELETE FROM translates_micro WHERE lang = '.$this->uri->segment(3));
            $this->db->query("INSERT INTO translates_micro (field, lang, translate) select field, lang, translate FROM translates_micro_tmp WHERE lang = ".$this->uri->segment(3));


            return 'OK';
        }
    }

    function get_faqs($lang) {
        $this->db->query("DELETE FROM faq_tmp WHERE lang = ".$lang. " AND title='' AND description=''");

        $this->db->select('*');
        $this->db->from('faq_tmp');
        $this->db->where('lang', $lang);
        $this->db->order_by('orden ASC');

        return $this->db->get()->result();
    }

    function save_faqs() {
        $data = new stdClass();
        $data->title = $this->input->post('title');
        $data->description = $this->input->post('description');
        $this->db->where('id', $this->input->post('idFAQ'));
        $this->db->update('faq_tmp', $data);

        $this->db->select('*');
        $this->db->from('faq_tmp');
        $this->db->where('id', $this->input->post('idFAQ'));
        $res = $this->db->get()->row();

    }

    function delete_faqs() {
        $this->db->query("DELETE FROM faq_tmp WHERE id = ".$this->uri->segment(5));
    }

    function add_faqs() {
        $data = new stdClass();
        $data->title = '';
        $data->description = '';
        $data->lang = $this->uri->segment(3);
        $this->db->insert('faq_tmp', $data);

        return $this->db->insert_id();
    }

    function go_production_faqs() {

        $this->db->select('COUNT(*) AS total');
        $this->db->from('faq_tmp');
        $this->db->where('lang', $this->uri->segment(3));
        $res = $this->db->get()->result();
        if($res[0]->total == 0){
            return 'KO';
        } else {
            $this->db->query('DELETE FROM faq WHERE lang = '.$this->uri->segment(3));
            $this->db->query("INSERT INTO faq (lang, title, description, orden) select lang, title, description, orden FROM faq_tmp WHERE lang = ".$this->uri->segment(3));

            return 'OK';
        }
    }

    function get_legal($lang) {
        $this->db->select('*');
        $this->db->from('legal_tmp');
        $this->db->where('lang', $lang);
        $row = $this->db->get()->row();

        if(count($row) == 0) {
            $data = new stdClass();
            $data->lang = $lang;
            $data->text = '';
            $this->db->insert('legal_tmp', $data);
            $data->id = $this->db->insert_id();
            return $data;
        }

        return $row;
    }

    function save_legal() {
        $data = new stdClass();
        $data->text = $this->input->post('text');
        $this->db->where('id', $this->input->post('idLegal'));
        $this->db->update('legal_tmp', $data);

        $this->db->select('*');
        $this->db->from('legal_tmp');
        $this->db->where('id', $this->input->post('idLegal'));
        $res = $this->db->get()->row();

    }

    function go_production_legal() {

        $this->db->select('*');
        $this->db->from('legal_tmp');
        $this->db->where('lang', $this->uri->segment(3));
        $res = $this->db->get()->result();
        if(count($res) == 0) {
            return 'KO';
        }
        if($res[0]->text == ''){
            return 'KO';
        } else {
            $this->db->query('DELETE FROM legal WHERE lang = '.$this->uri->segment(3));
            $this->db->query("INSERT INTO legal (lang, text) select lang, text FROM legal_tmp WHERE lang = ".$this->uri->segment(3));

            return 'OK';
        }
    }

    function get_csv_newsletters() {
        $this->db->select('s.*,si.name');
        $this->db->from('subscribers as s');
        $this->db->join('sites as si','s.site = si.id');
        $this->db->where('s.active', 1);
        $this->db->order_by('s.id');
        $q = $this->db->get();
        return $q->result();

    }
}