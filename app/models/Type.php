<?php

class Type extends Eloquent {

	// MASS ASSIGNMENT -------------------------------------------------------
	// define which attributes are mass assignable (for security)
	protected $fillable = array('name', 'description');

	// DEFINE RELATIONSHIPS --------------------------------------------------
	public function items() {
		return $this->belongsToMany('Item', 'items_types', 'type_id', 'item_id');
	}
		
	// each item has many images
	public function image() {
		return $this->morphOne('Image', 'imageable');
	}

}
