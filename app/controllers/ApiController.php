<?php

class ApiController extends BaseController {
	public function receive(){
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
