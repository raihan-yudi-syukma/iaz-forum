<?php

namespace App\Controllers;

use CodeIgniter\Exceptions\PageNotFoundException;

class Auth extends BaseController
{
	// Models.
	protected $userModel;

	// Services.
	protected $validation;
	protected $session;
	
	public function __construct()
	{
		// Models.
		$this->userModel = model('UserModel');

		// Services.
		$this->validation = service('Validation');
		$this->session = service('session');
	}

	public function index()
	{
		throw PageNotFoundException::forPageNotFound();
	}

	// User login.
	public function login()
	{
		$data['title'] = 'Login';
		// Get post.
		if($auth = $this->request->getPost()) {
			// Validation.
			$this->validation->run($auth, 'login');
			$errors = $this->validation->getErrors();
			if(!$errors) {
				$username = $auth['username'];
				$password = $auth['password'];

				// Authentication.
				$user = $this->userModel->where('username', $username)
					->orWhere('email', $username)
					->first();
				if(!$user) {
					$this->session->setFlashdata('errors', ['Login gagal, pastikan username atau password sudah benar!']);
					return view('login', $data);
				}
				$salt = $user->salt;
				if ($user->password !== md5($salt.$password) ) {
					$this->session->setFlashdata('errors', ['Login gagal, pastikan username atau password sudah benar!']);
					return view('login', $data);
				}
				if ($user->status === 'Not active') {
					$this->session->setFlashdata('errors', ['Akun anda sedang tidak aktif.']);
					return view('login', $data);
				}

				// Set session.
				$sessData = [
					'id' => $user->id,
					'username' => $user->username,
					'salt' => $user->salt,
					'password' => $user->password,
					'name' => $user->name,
					'email' => $user->email,
					'birthdate' => $user->birthdate,
					'address' => $user->address,
					'phone_number' => $user->phone_number,
					'avatar' => $user->avatar,
					'role' => $user->role,  
					'status' => $user->status,
					'loggedIn' => true,
					'passwordVerified' => false,
				];
				$this->session->set($sessData);
				$this->session->setFlashdata('success', 'Login Behasil!');

				return redirect()->to(base_url());
			} else {
				$this->session->setFlashdata('errors', $errors);
			}
		}
		return view('login', $data);
	}

	// User logout.
	public function logout() 
	{
		// Destroy session.
		if ($this->session->has('loggedIn')) {
			$this->session->destroy();
		}
		return redirect()->to(base_url());
	}

	// User registration.
	public function register()
	{
		// Page title.
		$data['title'] = 'Register';

		// Get post.
		if($user = $this->request->getPost()) {
			// Validation
		  $this->validation->run($user, 'userAdd');
			$errors = $this->validation->getErrors();
			if(!$errors) {	
				// Set avatar.
				$file = $this->request->getFile('avatar');
				$fileName = $file->getRandomName();
				$writePath = './uploads/avatar';
				$file->move($writePath, $fileName);
				$user['avatar']	= $fileName;

				// Set field values.
				$salt = uniqid('', true);
				$user['salt'] = $salt;
				$user['password'] = md5($salt.$user['password']);
				$user['created_by'] = 0;
				$user['created_at'] = date('Y-m-d H:i:s');

				// Save user data
				if ($this->userModel->save($user)) {
					$this->session->setFlashdata('success', 'Akun anda telah terdaftar. Mohon tunggu untuk disetujui oleh admin.');
					return redirect()->to(base_url('auth/login'));
				} else {
					$this->session->setFlashdata('errors', ['errors' => 'Gagal untuk mendaftarkan user!']);
				}
			} else {
				$this->session->setFlashdata('errors', $errors);
			}
		}
		return view('register', $data);
	}
}
