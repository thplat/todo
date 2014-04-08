<?php namespace Todo\Task;

use Eloquent;

class Task extends Eloquent {

	protected $fillable = ['name', 'text'];
	protected $softDelete = true;

}