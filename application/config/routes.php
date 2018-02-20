<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'web';
$route['home'] = "web/index";
$route['actions/addSubscription'] = "web/addSubscription";
$route['actions/get-gallery'] = "web/get_gallery";
$route['actions/get-info'] = "web/get_info";
$route['actions/login-ig'] = "web/login_ig";
$route['actions/callback-ig'] = "web/callback_ig";
$route['actions/read-tag-ig'] = "redes_sociales/codeInstagram";
$route['actions/check-winners-ig'] = "redes_sociales/get_likes_winners";

$route['adm-gst'] = 'admin';
$route['adm-gst/dashboard'] = 'admin/dashboard';
$route['adm-gst/pages'] = 'admin/pages';
$route['adm-gst/pages/(:num)'] = 'admin/page';
$route['adm-gst/pages/(:num)/delete'] = 'admin/delete_page';
$route['adm-gst/save-site'] = 'admin/save_site';

$route['adm-gst/langs'] = 'admin/langs';
$route['adm-gst/langs/(:num)'] = 'admin/lang';
$route['adm-gst/langs/(:num)/delete'] = 'admin/delete_lang';
$route['adm-gst/save-lang'] = 'admin/save_lang';
$route['adm-gst/save-translate'] = 'admin/save_translate';

$route['adm-gst/newsletter'] = 'admin/newsletters';
$route['adm-gst/newsletter/(:num)/delete'] = 'admin/delete_newsletter';
$route['adm-gst/csv-newsletters'] = 'admin/csv_newsletters';

$route['adm-gst/feeds'] = 'admin/feeds';
$route['adm-gst/feeds/(:num)'] = 'admin/feed';
$route['adm-gst/feeds/(:num)/delete'] = 'admin/delete_feed';
$route['adm-gst/save-feed'] = 'admin/save_feed';

$route['adm-gst/gallery'] = 'admin/gallery';
$route['adm-gst/gallery/(:num)'] = 'admin/single_gallery';
$route['adm-gst/gallery/(:num)/delete'] = 'admin/delete_gallery';
$route['adm-gst/gallery/(:num)/confirm'] = 'admin/confirm_gallery';
$route['adm-gst/gallery/(:num)/reactive'] = 'admin/reactive_gallery';
$route['adm-gst/gallery_deleted'] = 'admin/gallery_deleted';

$route['adm-gst/winners'] = 'admin/winners';
$route['adm-gst/winners_fb'] = 'admin/winners_fb';
$route['adm-gst/winners_fb/(:num)'] = 'admin/winner_fb';

$route['adm-gst/ajax-sites'] = 'admin/ajax_pages';
$route['adm-gst/ajax-langs'] = 'admin/ajax_langs';
$route['adm-gst/ajax-newsletters'] = 'admin/ajax_newsletters';
$route['adm-gst/ajax-gallery'] = 'admin/ajax_gallery';
$route['adm-gst/ajax-gallery_deleted'] = 'admin/ajax_gallery';
$route['adm-gst/ajax-winners'] = 'admin/ajax_winners';
$route['adm-gst/add-winner'] = 'admin/add_winner';
$route['adm-gst/save-winner'] = 'admin/save_winner';

$route['adm-gst/winners_fb/(:num)/delete'] = 'admin/delete_winners_fb';
$route['adm-gst/ajax-winners_fb'] = 'admin/ajax_winners_fb';

$route['adm-gst/logout'] = 'admin/logout';


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['styles.css'] = 'core/css';
$route['javascripts.js'] = 'core/js';
$route['robots.txt'] = "core/robots";
$route['(:any)'] = 'web';
$route['(:any)/home'] = 'web';
$route['(:any)/(:any)/home'] = 'web';
$route['(:any)/participation'] = 'web';
$route['(:any)/(:any)/participation'] = 'web';
$route['(:any)/suitcases'] = 'web';
$route['(:any)/(:any)/suitcases'] = 'web';
$route['(:any)/cr7'] = 'web';
$route['(:any)/(:any)/cr7'] = 'web';
$route['(:any)/newsletter'] = 'web';
$route['(:any/(:any))/newsletter'] = 'web';
$route['(:any)/termsandconditions'] = 'web';
$route['(:any)/(:any)/termsandconditions'] = 'web';
$route['(:any)/(:any)'] = 'web';