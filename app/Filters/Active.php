<?php 

namespace App\Filters;

use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Active implements FilterInterface
{
	public function before(RequestInterface $request, $arguments = null)
	{
		if (session()->status !== 'Active') {
			session()->setFlashdata('errors', ['errors' => 'Akun anda sedang tidak aktif']);
			return redirect()->to('home');
		}
	}

	public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
	{
		
	}
}
