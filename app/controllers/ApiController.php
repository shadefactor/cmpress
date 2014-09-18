<?php

class ApiController extends BaseController {
	public function receive(){		

		switch ($_POST['type']) {
		  case 'hook.verify':
		    \Podio::setup(
		    	Config::get('podio.client_id'),
		    	Config::get('podio.client_secret')
		       );

			\Podio::authenticate_with_app(
				Config::get('podio.post_app_id'),
				Config::get('podio.post_app_token')
			   );

		    \PodioHook::validate($_POST['hook_id'], array('code' => $_POST['code']));
		  case 'item.create':
		    $pb = new Postback;
			$pb->data = serialize($_POST);
			$pb->pb_type = $_POST['type'];
			$pb->item_id = $_POST['item_id'];
			$pb->save();		
		  case 'item.update':
		    $pb = new Postback;
			$pb->data = serialize($_POST);
			$pb->pb_type = $_POST['type'];
			$pb->item_id = $_POST['item_id'];
			$pb->save();	
		  case 'item.delete':
		    $pb = new Postback;
			$pb->data = serialize($_POST);
			$pb->pb_type = $_POST['type'];
			$pb->item_id = $_POST['item_id'];
			$pb->save();	
		}

		return 'hey api received';
	}
	public function test(){
		try{
			\Podio::setup(
		    	Config::get('podio.client_id'),
		    	Config::get('podio.client_secret')
		       );

			\Podio::authenticate_with_app(
				Config::get('podio.post_app_id'),
				Config::get('podio.post_app_token')
			   );
		}
		catch(\PodioError $pe){
			return $pe->getMessage();
		}
	}
}
