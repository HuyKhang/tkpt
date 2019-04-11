<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class manufacturer extends Model {
	protected $table = "manufacturer";
	public function produce() {
		return $this->hasMany('app\produce', 'id_manu', 'id');
	}
}
