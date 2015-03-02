<?php

class Item extends Eloquent {

	// MASS ASSIGNMENT -------------------------------------------------------
	// define which attributes are mass assignable (for security)
	protected $fillable = array('title', 'description', 'url', 'client', 'role', 'year');

	// DEFINE RELATIONSHIPS --------------------------------------------------
	// each item HAS one fish to eat
/*
	public function fish() {
		return $this->hasOne('Fish'); // this matches the Eloquent model
	}
*/

	// each item has many images
	public function images() {
		return $this->morphMany('Image', 'imageable');
	}

	// each item BELONGS to many types
	// define our pivot table also
	public function types() {
		return $this->belongsToMany('Type', 'items_types', 'item_id', 'type_id');
	}

}
