<?php
use infrajs\router\Router;
use infrajs\ans\Ans;
use infrajs\config\Config;

if (!is_file('vendor/autoload.php')) {
	chdir('../../../');
	require_once('vendor/autoload.php');
	Router::init();
}
$conf = Config::get('posts2articles');
$fb = new \Facebook\Facebook([
  'app_id' => $conf['app_id'],
  'app_secret' => $conf['app_secret'],
  'default_graph_version' => 'v2.8',
  'default_access_token' => $conf['app_id'].'|'.$conf['app_secret']
]);
$response = $fb->get("/".$conf['group_id']."/feed?fields=full_picture,message,attachments{description,title},created_time,type,link&limit=".($conf['limit']));
$result = $response->getDecodedBody();

foreach ($result['data'] as $key => &$post) {
	if (isset($post['full_picture'])) {
		$post['full_picture'] = $post['full_picture'];
	}
	if (isset($post['attachments'])) {
		if (isset($post['attachments']['data'][0]['description']))
			$post['description'] = $post['attachments']['data'][0]['description'];
	
		if (isset($post['attachments']['data'][0]['title']))
			$post['title'] = $post['attachments']['data'][0]['title'];
		
		unset($result['data'][$key]['attachments']);
	}
	if (isset($post['created_time'])) {
		$post['created_time'] = strtotime($post['created_time']);
	}
}

return Ans::ret($result);