<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class produce extends Model {
	//
	protected $table = "produce";
	public function type_produce() {
		return $this->belongsTo('App\type_produce', 'id_type', 'id');
	}
	public function manufacturer() {
		return $this->belongsTo('App\manufacturer', 'id_manu', 'id');
	}
}
