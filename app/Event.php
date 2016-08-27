<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['title', 'location', 'time', 'description', 'public', 'image'];

	public function getImageAttribute($value) {
		return "https://s3.amazonaws.com/fskpublic$value";
	}

	public function getTimeAttribute($value) {
		return \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $value);
	}
}
