<?php 

namespace App\Controllers;

use CodeIgniter\Exceptions\PageNotFoundException;

class Reply extends BaseController
{
	// Models.
	protected $threadModel;
	protected $replyModel;
	protected $categoryModel;
	protected $userModel;

	// Services.
	protected $session;
	protected $validation;

	public function __construct()
	{
		// Models.
		$this->threadModel = model('ThreadModel');
		$this->replyModel = model('ReplyModel');
		$this->categoryModel = model('CategoryModel');
		$this->userModel = model('UserModel');

		// Services.
		$this->session = \Config\Services::session();
		$this->validation = \Config\Services::validation();
	}

	public function index()
	{
		throw PageNotFoundException::forPageNotFound();
	}

	// Add reply.
	public function add($thread_id = null)
	{
		// Get thread.
		$data['thread'] = $this->threadModel->find($thread_id);
		if(!$thread_id || !$data['thread']) {
			throw PageNotFoundException::forPageNotFound();
		}
		
		// Get post.
		if($reply = $this->request->getPost()) {
			// Validation
			$this->validation->run($reply, 'reply');
			$errors = $this->validation->getErrors();
			if(!$errors) {
				// Set field values.
				$reply['thread_id'] = $thread_id;
				$reply['created_at'] = date('Y-m-d H:i:s');
				$reply['created_by'] = $this->session->get('id');

				// Save reply data.
				if($this->replyModel->save($reply)) {
					$this->session->setFlashdata('success', 'Reply Anda berhasil diposting!');
					return redirect()->to(base_url('thread/view/'.$thread_id));
				} else {
					$this->session->setFlashdata('errors', ['errors' => 'Reply Anda gagal diposting!']);
				}
			} else {
				$this->session->setFlashdata('errors', $errors);
			}
		}	
		$data['title'] = 'Buat Reply: '.$data['thread']->title;
		return view('reply/add', $data);
	}

	public function edit($id = null)
	{
		// Get reply.
		$data['reply'] = $this->replyModel->find($id);
		if(!$id || !$data['reply']) {
			throw PageNotFoundException::forPageNotFound();
		}

		// Get Post. 
		if($reply = $this->request->getPost()) {
			// Validation
			$this->validation->run($reply, 'reply');
			$errors = $this->validation->getErrors();
			if(!$errors) {
				// Set field values.
				$reply['updated_at'] = date('Y-m-d H:i:s');
				$reply['updated_by'] = $this->session->get('id');

				// Update reply data.
				if($this->replyModel->update($id, $reply)) {
					$this->session->setFlashdata('success', 'Reply berhasil diupdate!');
					return redirect()->to(base_url('thread/view/'.$data['reply']->thread_id));
				} else {
					$this->session->setFlashdata('errors', ['errors' => 'Reply gagal diupdate!']);
				}
			} else {
				$this->session->setFlashdata('errors', $errors);
			}
		}
		$data['title'] = 'Edit Reply';
		return view('reply/edit', $data);
	}

	// Process uploaded files.
	public function uploadImages()
	{
		// Get uploaded file.
		$file = $this->request->getFile('upload');

		// Validation
		$validated = $this->validate([
			'upload' => [
				'uploaded[upload]',
				'mime_in[upload,image/jpg,image/jpeg,image/gif,image/png]', 
				'max_size[upload, 1024]',
			],
		]);
		if($validated && $file) {
			// Set file.
			$fileName = $file->getRandomName();
			$writePath = './uploads/reply/';
			$file->move($writePath, $fileName);
			$data = [
				'uploaded' => true,
				'url' => base_url('uploads/reply/'.$fileName),
			];
		} else {
			$data = [
				'uploaded' => false,
				'error' => ['messages' => $file],
			];
		}
		return $this->response->setJSON($data);
	}

	// Delete reply.
	public function delete($id = null)
	{
		$reply = $this->replyModel->find($id);
		if(!$id || !$reply) {
			throw PageNotFoundException::forPageNotFound();
		}

		// Delete reply data.
		if($this->replyModel->delete($id)) {
			$this->session->setFlashdata('success', 'Reply berhasil dihapus!');
		} else {
			$this->session->setFlashdata('errors', ['errors' =>'Reply gagal dihapus!']);
		}
		return redirect()->to(base_url('thread/view/'.$reply->thread_id));
	}
}
