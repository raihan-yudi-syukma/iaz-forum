<?php 

namespace App\Controllers;

use CodeIgniter\Exceptions\PageNotFoundException;

class User extends BaseController
{
	// Models
	protected $userModel;
	protected $threadModel;
	protected $replyModel;

	// Controllers.
	protected $auth;

	// Services.
	protected $session;
	protected $validation;
	protected $pager;
	
	public function __construct()
	{
		// Models.
		$this->userModel = model('UserModel');
		$this->threadModel = model('ThreadModel');
		$this->replyModel = model('ReplyModel');

		// Controllers.
		$this->auth = new Auth();
		
		// Services.
		$this->session = service('session');
		$this->validation = service('validation');
		$this->pager = service('pager');
	}

	// Show all users.
	public function index()
	{
		// Set roles and statuses.
		$data['roles'] = [
			'All roles' => 'All roles',
			'Admin' => 'Admin',
			'Member' => 'Member'
		];
		$data['statuses'] = [
			'All statuses' => 'All statuses',
			'Active' => 'Active',
			'Not active' => 'Not active'
		];

		// Add user.
		if($user = $this->request->getPost()) {
			$this->validation->run($user, 'userAdd');

			$errors = $this->validation->getErrors();

			if(!$errors) {
				// Set avatar.
				$file = $this->request->getFile('avatar');
				$fileName = $file->getRandomName();
				$writePath = './uploads/avatar';
				$file->move($writePath, $fileName);

				// Set field values.
				$user['avatar']	= $fileName;
				$salt = uniqid('', true);
				$user['salt'] = $salt;
				$user['password'] = md5($salt.$user['password']);
				$user['created_by'] = 0;
				$user['created_at'] = date('Y-m-d H:i:s');

				// Save user data.
				if ($this->userModel->save($user)) {
					$this->session->setFlashdata('success', 'User berhasil ditambahkan!');
					return redirect()->to(base_url('user'));
				} else {
					$this->session->setFlashdata('errors', ['errors' => 'User gagal ditambahkan!']);
				}
			} else {
				$this->session->setFlashdata('errors', $errors);
			}
		}

		// Get search keywords.
		$data['keyword'] = $this->request->getGet('keyword') ?? '';
		$data['roleKey'] = $this->request->getGet('roleKey') ?? 'All roles';
		$data['statusKey'] = $this->request->getGet('statusKey') ?? 'All statuses';

		// Get all users.
		if($data['roleKey'] !== 'All roles' || $data['statusKey'] !== 'All statuses') {
			$where = ['role' => $data['roleKey'], 'status' => $data['statusKey']];

			if($data['roleKey'] !== 'All roles' && $data['statusKey'] === 'All statuses') {
				$where = ['role' => $data['roleKey']];
			} 
			elseif($data['roleKey'] === 'All roles' && $data['statusKey'] !== 'All statuses') {
				$where = ['status' => $data['statusKey']];
			}

			$data['users'] = $this->userModel
				->groupStart()
					->like('name', $data['keyword'])
					->orLike('username', $data['keyword'])
					->orLike('email', $data['keyword'])
					->orLike('birthdate', $data['keyword'])
					->orLike('address', $data['keyword'])
					->orLike('phone_number', $data['keyword'])
				->groupEnd()
				->where($where)
				->paginate(10);
		} else {
			$data['users'] = $this->userModel
				->groupStart()
					->like('name', $data['keyword'])
					->orLike('username', $data['keyword'])
					->orLike('email', $data['keyword'])
					->orLike('birthdate', $data['keyword'])
					->orLike('address', $data['keyword'])
					->orLike('phone_number', $data['keyword'])
					->groupEnd()
				->paginate(10);
		}
		$data['pager'] = $this->userModel->pager;
		$data['title'] = 'Daftar User';
		return view('user/index', $data);
	}

	// Show user data.
	public function view($id = null)
	{
		// Get user by id.
		$data['user'] = $this->userModel->find($id);
		if(!$id || !$data['user']) {
			throw PageNotFoundException::forPageNotFound();
		}

		// Get threads by user id.
		$data['threadCount'] = $this->threadModel
			->where('created_by', $id)
			->countAllResults();

		// Get replies by user id.
		$data['replyCount'] = $this->replyModel
			->where('created_by', $id)
			->countAllResults();

		// Set roles and statuses.
		if ($this->session->role === 'Admin') {
			$data['roles'] = [
				'Admin' => 'Admin',
				'Member' => 'Member'
			];
			$data['statuses'] = [
				'Active' => 'Active',
				'Not active' => 'Not active'
			];

			// Update role and status.
			if($user = $this->request->getPost()) {
				if($this->userModel->update($id, $user)) {
					if($this->session->id === $user['id']) {
						$this->session->role = $user['role'];
						$this->session->status = $user['status'];

						// User logout.
						if($user['status'] === 'Not active') {
							$this->auth->logout();
						}
					}
					$this->session->setFlashdata('success', 'Data user diubah!');
					return redirect()->to(base_url('user/view/'.$id));
				} else {
					$this->session->setFlashdata('errors', ['errors => Data user gagal diubah!']);
				}
			}
		}

		$data['title'] = 'Profil User: '.$data['user']->username;
		return view('user/view', $data);
	}

	// Edit user data.
	public function edit()
	{
		$id = $this->session->id;
		$data['user'] = $this->userModel->find($id);

		// Update user.
		if($user = $this->request->getPost()) {
			$this->validation->run($user, 'userEdit');
			$errors = $this->validation->getErrors();

			if(!$errors) {
				// Set avatar.
				if($file = $this->request->getFile('avatar')) {
					$oldFile = $data['user']->avatar;
					if(file_exists(FCPATH."uploads/avatar/$oldFile")) {
						unlink(FCPATH."uploads/avatar/$oldFile");
					}
					$fileName = $file->getRandomName();
					$writePath = './uploads/avatar';
					$file->move($writePath, $fileName);
					$user['avatar'] = $fileName;	
				}

				// Set field values.
				$user['updated_by'] = 0;
				$user['updated_at'] = date('Y-m-d H:i:s');

				// Edit user data.
				if($this->userModel->update($id, $user)) {
					// Update session data.
					if($file) {
						$this->session->avatar = $user['avatar'];
					}
					$this->session->username = $user['username'];
					$this->session->name = $user['name'];
					$this->session->email = $user['email'];
					$this->session->birthdate = $user['birthdate'];
					$this->session->address = $user['address'];
					$this->session->phone_number = $user['phone_number'];

					// Redirect.
					$this->session->setFlashdata('success', 'Profil Anda telah diperbarui!');
					return redirect()->to(base_url('user/view/'.$id));
				} else {
					$this->session->setFlashdata('errors', ['errors' => 'Gagal mengupdate profil!']);
				}
			} else {
				$this->session->setFlashdata('errors', $errors);
			}
		}
		$data['title'] = 'Edit Profil: '.$data['user']->username;
		return view('user/edit', $data);
	}

	// Edit user password.
	public function passwordEdit()
	{
		// Verify password.
		if($this->session->passwordVerified === false) {
			return redirect()->to('user/passwordVerify');
		}

		// Get post.
		if($user = $this->request->getPost()) {
			// Validation.
			$this->validation->run($user, 'passwordEdit');
			$errors = $this->validation->getErrors();
			if(!$errors) {
				// Set field values.
				$user['id'] = $this->session->id;
				$salt = uniqid('', true);
				$user['salt'] = $salt;
				$user['password'] = md5($salt.$user['password']);
				// Update password.
				if($this->userModel->update($user['id'], $user)) {
					// Redirect.
					$this->session->passwordVerified = false;
					$this->session->salt =  $user['salt'];
					$this->session->password = $user['password'];
					$this->session->setFlashdata('success', 'Password berhasil diubah!');
					return redirect()->to(base_url('user/view/'.$user['id']));
				} else {
					$this->session->setFlashdata('errors', ['errors' => 'Password gagal diubah!']);
				}
			}
		}
		$data['title'] = 'Ubah Password';
		return view('user/passwordEdit', $data);
	}

	// User password verify.
	public function passwordVerify()
	{
		// Get Post.
		if($user = $this->request->getPost()) {
			// Validation.
			$this->validation->run($user, 'passwordVerify');
			$errors = $this->validation->getErrors();
			if(!$errors) {
				// Check password.
				$salt = $this->session->salt;
				$password = $this->session->password;
				if($password === md5($salt.$user['password'])) {
					$this->session->passwordVerified = true;
					return redirect()->to('user/passwordEdit');
				} else {
					$this->session->setFlashdata('errors', ['errors' => 'Password tidak tepat!']);
				}
			} else {
				$this->session->setFlashdata('errors', $errors);
			}
		}
		$data['title'] = 'Verifikasi Password';
		return view('user/passwordVerify', $data);
	}

	// Delete user data.
	public function delete($id = null)
	{
		$user = $this->userModel->find($id);
		if(!$id || !$user) {
			throw PageNotFoundException::forPageNotFound();
		}

		// Delete user data. 
		if($this->userModel->delete($id)) {
			if(file_exists(FCPATH."uploads/avatar/$user->avatar")) {
				unlink(FCPATH."uploads/avatar/$user->avatar");
			}
			$this->session->setFlashdata('success', 'User dihapus!');
		} else {
			$this->session->setFlashdata('errors', ['errors' =>'User gagal dihapus!']);
		}
		// Redirect to index.
		return redirect()->to(base_url('user'));
	}
}
