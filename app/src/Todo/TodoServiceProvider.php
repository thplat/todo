<?php namespace Todo;

use Illuminate\Support\ServiceProvider;

class TodoServiceProvider extends ServiceProvider {

	public function register()
	{
		$this->app->bind('Todo\Task\TaskRepositoryInterface', function(){
			return new \Todo\Task\EloquentTaskRepository(new \Todo\Task\Task());
		});
	}	

}