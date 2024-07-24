<?php 

namespace App\Models;

use CodeIgniter\Model;

class ReplyModel extends Model
{
	protected $table = 'reply';
	protected $primaryKey = 'id';
	protected $allowedFields = [
		'thread_id',
		'content',
		'created_at',
		'created_by',
		'updated_at',
		'updated_by',
	];
	protected $returnType = 'object';
}
