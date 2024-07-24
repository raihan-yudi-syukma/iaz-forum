<?php 

namespace App\Filters;

use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Admin implements FilterInterface
{
	public function before(RequestInterface $request, $arguments = null)
	{
		if (session()->role !== 'Admin') {
			throw PageNotFoundException::forPageNotFound();
		}
	}

	public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
	{
		
	}
}
