<?php

/**

 * Twitter OAuth library.

 * Sample controller.

 * Requirements: enabled Session library, enabled URL helper

 * Please note that this sample controller is just an example of how you can use the library.

 */

defined('BASEPATH') OR exit('No direct script access allowed');

ini_set('display_errors', true);

date_default_timezone_set('Europe/Madrid');

class Redes_sociales extends CI_Controller{

    private $connection;

    function __construct() {
        parent::__construct();
        $this->load->model('redes_sociales_model');
    }

    public function readInstagram($reload = '') {
        $result = json_decode(file_get_contents('https://www.instagram.com/graphql/query/?query_id=17886322183179102&tag_name=american_tourister&first=100'.(($reload=='')?'':'&after='.$reload)));
        $edges = array_reverse($result->data->hashtag->edge_hashtag_to_media->edges);

        foreach($edges as $instagram) {
            $this->redes_sociales_model->save_instagram($instagram);
        }
    }

    public function codeInstagram() {
        $ig = $this->redes_sociales_model->get_data_ig();

        if($ig->instagram_access_token == '') {
            redirect('https://api.instagram.com/oauth/authorize/?client_id='.$ig->instagram_client_id.'&redirect_uri='.base_url().'redes_sociales/tokenInstagram&response_type=code&scope=public_content');
        } else {
             $this->readInstagram2('', $ig->instagram_access_token);
        }
    }

    public function tokenInstagram() {
        $ig = $this->redes_sociales_model->get_data_ig();

        $params = array('client_id'     => $ig->instagram_client_id,
                   'client_secret' => $ig->instagram_client_secret,
                   'grant_type'    => 'authorization_code',
                   'redirect_uri'  => 'http://www.american-tourister.tbwa.devsite.es/redes_sociales/tokenInstagram',
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
        //print_pre($result);
        $this->redes_sociales_model->set_token_ig($result->access_token);
        $this->readInstagram2('', $result->access_token);
    }

    public function saveInstagram($code) {
        $data = new stdClass();

        $html =  file_get_contents('https://www.instagram.com/p/'.$code.'/');
        $corte = explode('<script type="text/javascript">window._sharedData =', $html);
        $corte2 = explode(';</script>', $corte[1]);

        $_obj = json_decode($corte2[0]);
        $data->id_social      = $_obj->entry_data->PostPage[0]->media->id;
        $data->image          = $_obj->entry_data->PostPage[0]->media->display_src;
        $data->created_at     = date('Y-m-d H:i:s', $_obj->entry_data->PostPage[0]->media->date);
        $data->modify         = date('Y-m-d H:i:s');
        $data->user           = $_obj->entry_data->PostPage[0]->media->owner->username;
        $data->id_user_social = $_obj->entry_data->PostPage[0]->media->owner->id;
        $data->link           = 'https://www.instagram.com/p/'.$code.'/';
        $data->text           = $_obj->entry_data->PostPage[0]->media->caption;
        $data->state          = 1;
        $data->entry          = 2;
        $data->entrada        = 2;
        $data->photo          = $_obj->entry_data->PostPage[0]->media->owner->profile_pic_url;
        $data->photo_normal   = $_obj->entry_data->PostPage[0]->media->owner->profile_pic_url;

        if($_obj->entry_data->PostPage[0]->media->is_video) {
            $data->video = $_obj->entry_data->PostPage[0]->media->video_url;
        }

        $this->redes_sociales_model->save_instagram($data);

        print_pre($data);
    }

    public function readInstagram2($reload = '', $access_token) {

        $ig = $this->redes_sociales_model->get_data_ig();

        if($reload != ''){
            $url = $reload;
        } else {
            $data['q'] = 'bringbackmore';
            $last_item = $this->redes_sociales_model->get_last_redes(1);
            $extra = '';
            if($last_item !== false && $reload === '')
                $extra = '&min_tag_id='.$last_item;
            elseif($reload !== '')
                $extra = '&min_tag_id='.$reload;

            //$url = 'https://api.instagram.com/v1/tags/'.$data['q'].'/media/recent?client_id='.$ig->instagram_client_id .'access_token='.$access_token.'&count=100' . $extra;
            $url = 'https://api.instagram.com/v1/tags/'.$data['q'].'/media/recent?access_token='.$access_token.'&count=100' . $extra;
            //$url = 'https://api.instagram.com/v1/tags/'.$data['q'].'?access_token='.$access_token;
            //$url = 'https://api.instagram.com/v1/tags/search?q='.$data['q'].'&access_token='.$access_token;
            //$url = 'https://api.instagram.com/v1/users/self?access_token='.$access_token;
            // $url = 'https://api.instagram.com/v1/media/558717847597368461_9538472?access_token='.$access_token;
            //echo $url;
        }

        $ch = curl_init();

        curl_setopt_array($ch, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_SSL_VERIFYHOST => 2
        ));

        $results = json_decode(curl_exec($ch), true);
        curl_close($ch);
        // echo $url . '<br>';
        // print_pre($results);


        if(count($results['data'])>0){
            $i=0;
            foreach($results['data'] as $item){
                $username=$item['user']['username'];

                $this->redes_sociales_model->save_instagram((object)$item, $results['pagination']);

                $i++;
            }
        }

       // if($last_item === false || $reload !== 0) {
            // if(isset($results['pagination']['next_url']) && $results['pagination']['next_url'] != ''){
            //     $this->readInstagram($results['pagination']['next_url']);
            // }
        //}
    }

    public function get_likes_winners() {
        $ig = $this->redes_sociales_model->get_data_ig();
        $users = $this->redes_sociales_model->get_winners_week();

        foreach($users as $user) {
            $url = 'https://api.instagram.com/v1/media/'.$user->id_social.'?access_token='.$ig->instagram_access_token;

            $ch = curl_init();

            curl_setopt_array($ch, array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_SSL_VERIFYPEER => false,
                CURLOPT_SSL_VERIFYHOST => 2
            ));

            $results = json_decode(curl_exec($ch), true);
            curl_close($ch);

            $this->redes_sociales_model->set_likes_winners($user->id, (object)$results['data']);
        }
    }
}