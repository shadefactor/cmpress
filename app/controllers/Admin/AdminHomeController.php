<?php

class AdminHomeController extends BaseController {	

	public function showWelcome()
	{
		return View::make('hello');
	}

}
