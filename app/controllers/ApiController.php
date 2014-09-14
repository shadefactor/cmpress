<?php

class ApiController extends BaseController {
	public function receive(){		

		switch ($_POST['type']) {
		  case 'hook.verify':
		    \Podio::setup('podiopress-demo', 'DAbnfrnGqE6GLtMAvIoToj9gPCzXJ54UJdNY8l16M3pH9h9pBG65KK9MRTwWj64y');
			\Podio::authenticate_with_app('9367689', '0ad62c85647c41229b9dba0bd786e868');
		    \PodioHook::validate($_POST['hook_id'], array('code' => $_POST['code']));
		  case 'item.create':
		    $pb = new Postback;
			$pb->data = serialize($_POST);
			$pb->pb_type = $_POST['type'];
			$pb->item_id = $_POST['item_id'];
			$pb->save();		
		  case 'item.update':
		    // Do something. item_id is available in $_POST['item_id']
		  case 'item.delete':
		    // Do something. item_id is available in $_POST['item_id']
		}

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
