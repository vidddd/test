<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if(!$this->uri->segment(1)){
			redirect(base_url('en'));
		}
		$this->site=$this->web_model->get_site($_SERVER['HTTP_HOST'],$this->uri->segment(1));
	}

	public function index()
	{
		if($this->site){
			$data['section']=false;
			$data['semantic_segment'] = 0;
			$urls=array('home','participation','suitcases','cr7','newsletter','termsandconditions');
			$lang = false;
			if($this->uri->segment(2)){
				if(!in_array($this->uri->segment(2),$urls)){
					if($this->uri->segment(2)){
						$lang=$this->uri->segment(2);
					}
				}
			}

			$this->site->languages = $this->web_model->get_languages($this->site->id);
			$this->site->translations = $this->web_model->get_translations($lang,$this->site->id);
			$data['site']= $this->site;
			if($this->uri->segment(2)){
				if(in_array($this->uri->segment(2),$urls)){
					$data['semantic_segment'] = 2;
					$data['current_lang']=  $this->site->lang;
					$data['section'] = $this->uri->segment(2);
				}else{
					$data['semantic_segment'] = 3;
					$data['current_lang']= $this->web_model->get_lang_id($this->uri->segment(2));
				}
			}else{
				$data['current_lang']= $this->site->lang;
				$data['semantic_segment'] = 2;
			}

			if($this->uri->segment(3)){
				if(in_array($this->uri->segment(3),$urls)){
					$data['semantic_segment'] = 3;
					$data['section'] = $this->uri->segment(3);
				}
			}
			$data['lang']= $this->web_model->get_lang($data['current_lang']);

			$data['feeds'] = $this->web_model->get_feeds();
			$data['per_page']=9;
        	$data['page']=1;
			$data['social_networks'] = $this->web_model->get_social_networks($data['page'],$data['per_page'],false);
			$count=$this->web_model->get_social_networks($data['page'],$data['per_page'],true);
	        $data['items_totales']=$count;
	        $data['total']= ceil($count/$data['per_page']);
	        $data['winners'] = $this->web_model->getWinners();
	        $data['winners_fb'] = $this->web_model->getWinnersFb();

	        $ci = &get_instance();
	        $data['csrf_name'] = $ci->security->get_csrf_token_name();
	        $data['csrf_hash'] = $ci->security->get_csrf_hash();
			$this->load->view('header',$data);
			$this->load->view('home_view',$data);
			$this->load->view('footer',$data);
		}

	}

	public function get_gallery(){
		$data['per_page']=9;
    	$data['page']=$this->input->post('page');
		$social_networks = $this->web_model->get_social_networks($data['page'],$data['per_page'],false);

        foreach ($social_networks as $social) {
		?>
		<a href="<?php echo $social->image; ?>" class="image-gallery" data-id="<?php echo $social->id; ?>">
			<div class="wrap-image" style="background-image: url('<?php echo $social->image; ?>');"></div>
		</a>
		<?php
		}


	}

	public function get_info(){
		$id = $this->input->post('id');
		$item=$this->web_model->get_social_item($id);
		echo json_encode($item);

	}

	public function addSubscription()
	{
		if ($this->input->post()){
			$response['status'] = '';
			$subscriber =  $this->web_model->verify_subscriber($this->input->post("email"));

			if ($subscriber === false) {
				$data = array(
					'email' => $this->input->post("email"),
					'site' => $this->input->post("site"),
					'ip' => $_SERVER['REMOTE_ADDR']
				);
				if($this->input->post("check-condition")){
					$data['info'] = 1;
				}else{
					$data['info'] = 0;
				}

				$insert = $this->web_model->add_subscriber($data);
				if ($insert) {
					$response['status'] = 'ok';
				}else{
					$response['status'] = 'fail';
				}
			}else{
				$response['status'] = 'fail';
			}

			print json_encode($response);
		}

	}
	public function login_ig() {

        $this->load->model('redes_sociales_model');
        $ig = $this->redes_sociales_model->get_data_ig();

        redirect('https://api.instagram.com/oauth/authorize/?client_id='.$ig->instagram_client_id.'&redirect_uri='.base_url().'actions/callback-ig&response_type=code&scope=public_content');

    }

    public function callback_ig() {
        $this->load->model('redes_sociales_model');
        $ig = $this->redes_sociales_model->get_data_ig();

        $params = array('client_id'=> $ig->instagram_client_id,
                   'client_secret' => $ig->instagram_client_secret,
                   'grant_type'    => 'authorization_code',
                   'redirect_uri'  => base_url().'actions/callback-ig',
                   'code'          => $this->input->get('code'));

        $defaults = array( CURLOPT_URL => 'https://api.instagram.com/oauth/access_token',
            CURLOPT_POST => true,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_SSL_VERIFYHOST => 2,
            CURLOPT_POSTFIELDS => $params);

        $ch = curl_init();
        curl_setopt_array($ch, $defaults);
        $result = json_decode(curl_exec($ch));
        curl_close($ch);
        $this->redes_sociales_model->set_token_ig($result->access_token);
        $this->session->set_userdata('user_ig',$result->access_token);


        // $ig = $this->redes_sociales_model->get_data_ig();

        // $data['q'] = 'bringbackmore';
        // $url = 'https://api.instagram.com/v1/tags/'.$data['q'].'/media/recent?access_token='.$result->access_token.'&count=100';

        // // echo $url.'<br>';


        // $ch = curl_init();

        // curl_setopt_array($ch, array(
        //     CURLOPT_URL => $url,
        //     CURLOPT_RETURNTRANSFER => true,
        //     CURLOPT_SSL_VERIFYPEER => false,
        //     CURLOPT_SSL_VERIFYHOST => 2
        // ));

        // $results = json_decode(curl_exec($ch), true);
        // curl_close($ch);

        // if(count($results['data'])>0){
        //     $i=0;
        //     foreach($results['data'] as $item){
        //         $username=$item['user']['username'];
        //         $this->redes_sociales_model->save_instagram((object)$item, $results['pagination']);
        //         $i++;
        //     }
        // }
        // // die();

        // redirect(base_url());

    }


}
