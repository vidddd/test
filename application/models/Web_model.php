<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Web_model extends CI_Model {


	function get_site($domain,$segment){
		$this->db->select('*');
		$this->db->from('sites');
		$this->db->where('active', 1);
		$this->db->where('visible', 1);
		$this->db->where('url',$segment);

		return $this->db->get()->row();
	}

	function get_translations($lang,$site){

		$this->db->select('l.*');
		$this->db->from('sites as s');
		$this->db->join('langs_sites as ls','s.id=ls.site');
		$this->db->join('langs as l','ls.lang=l.id');
		$this->db->where('site', $site);
		if($lang !== false){
			$this->db->where('l.short',$lang);
		}else{
			$this->db->where('l.id = s.lang');
		}

		$item=$this->db->get()->row();
		$item->translates = $this->_getFields($item->id);
		return $item->translates;
	}
	function _getFields($lang){
		$this->db->select('*');
		$this->db->from('fields');
		$items=array();
		foreach ($this->db->get()->result() as $item) {
			$this->db->select('*');
			$this->db->from('translates');
			$this->db->where('field', $item->id);
			$this->db->where('lang', $lang);
			$translate=$this->db->get()->row();
			if($translate){
				$items[$item->name] = $translate->translate;
			}else{
				$items[$item->name] = "";
			}
		}
		return $items;
	}

	function get_languages($site){

		$this->db->select('l.*');
		$this->db->from('sites as s');
		$this->db->join('langs_sites as ls','s.id=ls.site');
		$this->db->join('langs as l','ls.lang=l.id');
		$this->db->where('l.active', 1);
		$this->db->where('s.id', $site);
		return $this->db->get()->result();
	}

	function get_lang_id($str){
		$this->db->select('*');
		$this->db->from('langs');
		$this->db->where('active', 1);
		$this->db->where('short', trim($str));
		$item = $this->db->get()->row();
		return $item->id;
	}


	function get_feeds(){
		$this->db->select('*');
		$this->db->from('fbpages');
		$this->db->where('active', 1);
		$this->db->order_by('id', 'desc');

		$q = $this->db->get();
		return $q->result();
	}

	function getWinners(){
		$date = new DateTime(date('Y-m-d'));
        $week = (int)$date->format("W");
        if ($week > 1) {
        	$week = $week - 1;
        }
		$this->db->select('*');
		$this->db->from('social_networks');
		$this->db->where('winner', 1);
		$this->db->where('week', $week);
		$this->db->limit(5);
		$this->db->order_by('id', 'desc');

		$q = $this->db->get();
		return $q->result();
	}

	function getWinnersFb(){
		$date = new DateTime(date('Y-m-d'));
        $week = (int)$date->format("W");
        if ($week > 1) {
        	$week = $week - 1;
        }
		$this->db->select('*');
		$this->db->from('facebook');
		$this->db->where('week', $week);
		$this->db->where('active', 1);
		$this->db->limit(5);
		$this->db->order_by('id', 'desc');

		$q = $this->db->get();
		return $q->result();
	}


	function get_social_item($id){
		$this->db->select('*');
		$this->db->from('social_networks');
		$this->db->where('id', $id);

		return $this->db->get()->row();
	}

	function get_lang($id){
		$this->db->select('l.*,f.googlefonts,f.fontname,f.id as font_id');
		$this->db->from('langs as l');
		$this->db->join('fonts as f','l.font=f.id','left');
		$this->db->where('l.id', $id);

		return $this->db->get()->row();
	}

	function get_social_networks($page,$per_page,$count=false){
		$this->db->select('*');
		$this->db->from('social_networks');
		$this->db->where('active', 1);
		$this->db->where('deleted', 0);
		$this->db->order_by('id', 'desc');

		if(!$count){
            $this->db->limit($per_page,($page-1)*$per_page);
        }
        $q = $this->db->get();
        if($count){
            return count($q->result());
        }
        return $q->result();
	}

	function verify_subscriber($email){
		$this->db->select('*');
		$this->db->from('subscribers');
		$this->db->where('email', $email);

		$q = $this->db->get();
		foreach ($q->result() as $data){
			return $data;
		}
		return false;
	}

	function add_subscriber($data){
		$this->db->insert('subscribers', $data);
		return ($this->db->affected_rows() != 1) ? false : true;
	}
}