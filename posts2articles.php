<?php
use infrajs\router\Router;
use infrajs\ans\Ans;
use infrajs\config\Config;

if (!is_file('vendor/autoload.php')) {
	chdir('../../../');
	require_once('vendor/autoload.php');
	Router::init();
}

$fb = new \Facebook\Facebook([
  'app_id' => $conf['app_id'],
  'app_secret' => $conf['app_secret'],
  'default_graph_version' => 'v2.8',
  'default_access_token' => $conf['app_id'].'|'.$conf['app_secret'], // optional
]);

$response = $fb->get("/603731969822393/feed?fields=full_picture,message,description,caption,attachments{url,media,description,title,type,description_tags,subattachments}&limit=2");
print_r($response->getDecodedBody());
/* handle the result */