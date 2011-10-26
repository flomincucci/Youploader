<?php
include('dbfunctions.php');
function do_post_request($url, $data, $optional_headers = null) // Look mum, no cURL!
{
  $params = array('http' => array(
              'method' => 'POST',
              'content' => $data
            ));
  if ($optional_headers !== null) {
    $params['http']['header'] = $optional_headers;
  }
  $ctx = stream_context_create($params);
  $fp = @fopen($url, 'rb', false, $ctx);
  if (!$fp) {
    throw new Exception("Problem with $url, $php_errormsg");
  }
  $response = @stream_get_contents($fp);
  if ($response === false) {
    throw new Exception("Problem reading data from $url, $php_errormsg");
  }
  return $response;
}

function getuserinfo() {
	$fromdb = execute_select('config',array('*'),'`key` = "usr" OR `key` = "passwd"');
	$info = array();
	foreach($fromdb as $clave => $valor) {
		if ($valor['key'] == 'usr') $info['user'] = $valor['value'];
		else if ($valor['key'] == 'passwd') $info['passwd'] = base64_decode($valor['value']);
	}
	return $info;
}

function autentificacion_clientlogin() {
	$info = getuserinfo();
	$auth = do_post_request('https://www.google.com/youtube/accounts/ClientLogin', 'Email='.$info['user'].'&Passwd='.$info['passwd'].'&service=youtube&source=Test', 'Content-Type:application/x-www-form-urlencoded');
	preg_match("/Auth=([A-Za-z0-9_-]*)/", $auth, $token);
	return $token[1];
}

?>
