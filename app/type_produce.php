<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class type_produce extends Model {
	protected $table = "type_produce";
	public function produce() {
		return $this->hasMany('App\produce', 'id_type', 'id');
	}
}
