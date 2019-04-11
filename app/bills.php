<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bills extends Model {
	protected $table = "bills";
	public function customer() {
		return $this->belongsTo('app\customer', 'id_customer', 'id');
	}
	public function bill_detail() {
		return $this->hasMany('app\bill_detail', 'id_bills', 'id');
	}
}
