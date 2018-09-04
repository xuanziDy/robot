<?php
namespace Index\Controller;

use Think\Controller;
class IndexController extends Controller{

	public function access_token($value='')
	{
		$url = 'https://aip.baidubce.com/oauth/2.0/token';
	    $post_data['grant_type']       = 'client_credentials';
	    $post_data['client_id']      = 'd2ZXqtVbcK7k0YDA8qQhVXtG';
	    $post_data['client_secret'] = 'AVpGt76d29ETAOgwn9WYagGhApPaoHLT';
	    $o = "";
	    foreach ( $post_data as $k => $v ) 
	    {
	    	$o.= "$k=" . urlencode( $v ). "&" ;
	    }
	    $post_data = substr($o,0,-1);
	    
	    $res = request_post($url, $post_data);

	    var_dump($res);

	    S('robot_access_token' , $res, 3600*24*30);

	    // 服务器返回的JSON文本参数如下：

	    // access_token： 要获取的Access Token；
	    // expires_in： Access Token的有效期(秒为单位，一般为1个月)；
	    // 其他参数忽略，暂时不用;
		// {
		//   "refresh_token": "25.b55fe1d287227ca97aab219bb249b8ab.315360000.1798284651.282335-8574074",
		//   "expires_in": 2592000,
		//   "scope": "public wise_adapt",
		//   "session_key": "9mzdDZXu3dENdFZQurfg0Vz8slgSgvvOAUebNFzyzcpQ5EnbxbF+hfG9DQkpUVQdh4p6HbQcAiz5RmuBAja1JJGgIdJI",
		//   "access_token": "24.6c5e1ff107f0e8bcef8c46d3424a0e78.2592000.1485516651.282335-8574074",
		//   "session_secret": "dfac94a3489fe9fca7c3221cbf7525ff"
		// }

	 //    {
		//     "error": "invalid_client",
		//     "error_description": "unknown client id"
		// }
	}

	public function face()
	{
		header("Content-Type	application/json");
		$token = S('robot_access_token');

		if( empty($token) ){
			$this->access_token();
		}

		$url = 'https://aip.baidubce.com/rest/2.0/face/v3/detect?access_token=' . $token;
		$bodys = "{\"image\":\"027d8308a2ec665acb1bdf63e513bcb9\",\"image_type\":\"FACE_TOKEN\",\"face_field\":\"faceshape,facetype\",\"face_type\":LIVE}"
		$res = request_post($url, $bodys);
		var_dump($res);
	}

	public function upload()
	{
		
	}


}
