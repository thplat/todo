<?php namespace Todo\Task;

interface TaskRepositoryInterface {
	
	public function getById($id);
	public function getAll();
	public function delete($id);
	public function create(array $data);

}