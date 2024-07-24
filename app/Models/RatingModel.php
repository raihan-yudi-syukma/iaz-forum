<?php 

namespace App\Models;

use CodeIgniter\Model;

class RatingModel extends Model
{
	protected $table = 'rating';
	protected $primaryKey = 'id';
	protected $allowedFields = [
		'thread_id',
		'user_id',
		'star',
	];
	protected $returnType = 'object';
}
