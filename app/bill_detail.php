<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bill_detail extends Model {
	protected $table = "bill_detail";
	public function bills() {
		return $this->belongsTo('app\bills', 'id_bills', 'id');
	}
	public function produce() {
		return $this->belongsTo('app\produce', 'id_produce', 'id');
	}
}
