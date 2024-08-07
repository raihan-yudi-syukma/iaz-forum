<?php 

namespace App\Models;

use CodeIgniter\Model;

class RatingViewModel extends Model
{
	protected $table = 'rating_view';
	protected $allowedFields = [
		'thread_id',
		'star_sum',
		'star_count',
		'rating',
	];
	protected $returnType = 'object';
}
