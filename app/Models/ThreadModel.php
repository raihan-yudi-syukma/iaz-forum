<?php 

namespace App\Models;

use CodeIgniter\Model;

class ThreadModel extends Model
{
	protected $table = 'thread';
	protected $primaryKey = 'id';
	protected $allowedFields = [
		'title',
		'content',
		'category_id',
		'created_at',
		'created_by',
		'updated_at',
		'updated_by',
	];
	protected $returnType = 'object';
}
