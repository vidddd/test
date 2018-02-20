<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Redes_sociales_model extends CI_Model {

    public function get_data_ig() {
        $this->db->select('*');
        $this->db->from('config');
        return $this->db->get()->result()[0];
    }

    public function set_token_ig($token) {
        $data = new stdClass();
        $data->instagram_access_token = $token;
        $this->db->where('id', 1);
        $this->db->update('config', $data);
    }

    public function get_winners_week() {
        $week = date('W');
        $this->db->select('*');
        $this->db->from('social_networks');
        $this->db->where('week', $week);
        $this->db->where('winner', 1);
        return $this->db->get()->result();
    }

    public function set_likes_winners($id, $ig) {
        $data = new stdClass();
        $data->fav = $ig->likes['count'];
        $data->comments = $ig->comments['count'];
        $this->db->where('id', $id);
        $this->db->update('social_networks', $data);
    }

    public function save_instagram_old($insta, $pagination) {

        $this->db->select('*');

        $this->db->from('social_networks');

        $this->db->where('id_social', $insta->node->shortcode);

        $this->db->where('entry', 1);

        $q = $this->db->get();



        foreach ($q->result() as $data){

            return false;

        }



        $data = new stdClass();



        $data->id_social= $insta->node->shortcode;

        $data->created_at= date('Y-m-d H:i:s');



        $data->text= $insta->node->edge_media_to_caption->edges[0]->node->text;

        $data->id_user_social= $insta->node->owner->id;

        $result = json_decode(file_get_contents('https://www.instagram.com/p/'.$data->id_social.'/?__a=1'));

        $data->photo = $result->graphql->shortcode_media->owner->profile_pic_url;

        $data->user = $result->graphql->shortcode_media->owner->username;

        $data->image = $insta->node->display_url;

        if($insta->node->is_video) {

            $data->video = $result->graphql->shortcode_media->video_url;

        }



        $data->state = 0;



        $data->fav = $insta->node->edge_liked_by->count;

        $data->comments = $insta->node->edge_media_to_comment;



        $data->entry = 1;

        $data->modify = date('Y-m-d H:i:s');



        $this->db->insert('social_networks', $data);
    }

    public function save_instagram($insta, $pagination) {

        // print_pre($insta);
        $this->db->select('*');
        $this->db->from('social_networks');
        $this->db->where('id_social', $insta->id);
        $this->db->where('entry', 1);
        $q = $this->db->get();
        foreach ($q->result() as $data){
            return false;
        }
        $data = new stdClass();
        $data->id_social= $insta->id;
        $data->created_at= date('Y-m-d H:i:s');
        $date = new DateTime($data->created_at);
        $week = (int)$date->format("W");
        $data->week   = $week;
        $data->text= $insta->caption['text'];
        $data->id_user_social= $insta->user['id'];
        $data->link = $insta->link;
        $data->photo = $insta->user['profile_picture'];
        $data->user = $insta->user['username'];
        $data->name = $insta->user['full_name'];
        $data->image = $insta->images['standard_resolution']['url'];
        $data->state = 0;
        $data->fav = $insta->likes['count'];
        $data->comments = $insta->comments['count'];
        $data->entry = 1;
        $data->modify = date('Y-m-d H:i:s');

        if(array_search('americantourister',$insta->tags) === false) {
            $data->deleted = 1;
        }

        if(!isset($pagination['min_tag_id'])){
            $data->min_tag_id = $this->get_last_redes(1);
        } else {
            $data->min_tag_id = $pagination['min_tag_id'];
        }

        $this->db->insert('social_networks', $data);
    }

    public function get_redes_sociales(){
        $this->db->select('*');
        $this->db->from('social_networks');
        $q = $this->db->get();
        $arr = array();
        foreach ($q->result() as $data){
            $arr[] = $data;
        }
        return $arr;
    }

    public function get_last_redes($type) {
        $this->db->select('min_tag_id');
        $this->db->from('social_networks');
        $this->db->where('id_social IS NOT NULL');
        $this->db->where('entry', $type);
        $this->db->order_by('id DESC');
        $this->db->limit('1');
        $q = $this->db->get();
        foreach ($q->result() as $data){
            return $data->min_tag_id;
        }
        return false;
    }

    private function checkCharacters($str){
        $string="abcdefghijklmnñopqrstuvwxyzáéíóúäëïöüABCDEFGHIJKLMNÑOPQRSTUVWXYZÁÉÍÓÚÄËÏÖÜ";
        $let=true;
        for($i=0;$i<strlen($str);$i++){
            if(strpos($string,$str[$i]) === false){
                $let=false;
            }
        }
        return $let;
    }
}