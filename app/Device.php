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

class Device extends Model
{
	protected $fillable = ['id', 'wallet_id', 'current_address', 'phone_imei', 'status', 'is_online'];

	public function wallet()
	{
		return $this->belongsTo('App\Wallet');
	}

	// public function user()
	// {
	// 	return $this->belongsTo('App\User');
	// }
}
