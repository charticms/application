<?php

namespace App\Models;

use Charti\Core\Database\Model;

class User extends Model
{
	/**
	 * Table name
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * With timestamps
	 * @var boolean
	 */
    public $timestamps = true;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name', 'email', 'password',
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
        'password', 'remember_token',
	];

	/**
	 * A shortcut method related to the user table,
	 * mainly used by SymfonyConsole to create a new user.
	 * 
	 * @return Void
	 */
	public function createNewUser(string $name, string $email, string $password)
	{

	}

}
