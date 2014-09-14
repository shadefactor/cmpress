<?php

class PostbackController extends BaseController {
	public function list_all()
	{	
		$postbacks = Postback::all();
		return $postbacks;
	}

}
