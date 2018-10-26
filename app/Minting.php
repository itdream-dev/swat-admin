<?php

namespace App;

/******************************************************
 * IM - Vocabulary Builder
 * Version : 1.0.2
 * Copyright© 2016 Imprevo Ltd. All Rights Reversed.
 * This file may not be redistributed.
 * Author URL:http://imprevo.net
 ******************************************************/

use Illuminate\Database\Eloquent\Model;
use App\Device;
class Minting extends Model
{
	protected $fillable = ['device_id', 'address', 'mint_amount'];

	public function device()
	{
		return $this->belongsTo('App\Device');
	}
}
