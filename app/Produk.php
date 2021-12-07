<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Produk extends Model
{
	protected $fillable = [
		"nama",
		"harga",
		"berat",
		"rating",
		"kadaluarsa",
		"picture",
		"topseller",
		"deskripsi",
	];

	protected $hidden = [
	];

}
