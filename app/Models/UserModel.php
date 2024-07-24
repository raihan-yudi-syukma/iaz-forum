<?php 

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
	protected $table = 'user';
	protected $primaryKey = 'id';
	protected $allowedFields = [
		'username',
		'password',
		'salt',
		'name',
		'email',
		'birthdate',
		'address',
		'phone_number',
		'avatar',
		'role',
		'status',
		'created_at',
		'created_by',
		'updated_at',
		'updated_by',
	];
	protected $returnType = 'object';
}
