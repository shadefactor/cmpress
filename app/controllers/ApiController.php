<?php

class ApiController extends BaseController {
	public function receive(){
		
		\Podio::setup('podiopress-demo', 'DAbnfrnGqE6GLtMAvIoToj9gPCzXJ54UJdNY8l16M3pH9h9pBG65KK9MRTwWj64y');
		\Podio::authenticate_with_app('9367689', '0ad62c85647c41229b9dba0bd786e868');

		switch ($_POST['type']) {
		  case 'hook.verify':
		    // Validate the webhook
		    \PodioHook::validate($_POST['hook_id'], array('code' => $_POST['code']));
		  case 'item.create':
		    // Do something. item_id is available in $_POST['item_id']
		  case 'item.update':
		    // Do something. item_id is available in $_POST['item_id']
		  case 'item.delete':
		    // Do something. item_id is available in $_POST['item_id']
		}

		$pb = new Postback;
		$pb->data = serialize($_POST);
		$pb->save();		
		return 'hey api received';
	}
	public function test(){
		try{
			\Podio::setup('podiopress-demo', 'DAbnfrnGqE6GLtMAvIoToj9gPCzXJ54UJdNY8l16M3pH9h9pBG65KK9MRTwWj64y');
			\Podio::authenticate_with_app('9367689', '0ad62c85647c41229b9dba0bd786e868');	
		}
		catch(\PodioError $pe){
			return $pe->getMessage();
		}
	}
}
