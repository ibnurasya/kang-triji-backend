<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Cart extends Model
{

	protected $primaryKey = 'id';

	protected $fillable = [
		"produk_id",
		"user_id",
	];

	protected $hidden = [
	];

}
