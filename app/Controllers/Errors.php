<?php

namespace App\Controllers;

use CodeIgniter\Exceptions\PageNotFoundException;

class Errors extends BaseController
{
	public function index()
	{
		throw PageNotFoundException::forPageNotFound();	
	}

	// Show 404 page.
	public function error404()
	{
		$data['title'] = '404';
		return view('errors/error404', $data);
	}
}
