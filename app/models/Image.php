<?php

class Image extends Eloquent {

	// MASS ASSIGNMENT -------------------------------------------------------
	// define which attributes are mass assignable (for security)
	protected $fillable = array('title', 'path', 'imageable_id', 'imageable_type');

	// DEFINE RELATIONSHIPS --------------------------------------------------
	public function imageable() {
		return $this->morphTo();
	}

}
