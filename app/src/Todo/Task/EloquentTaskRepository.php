<?php namespace Todo\Task;

class EloquentTaskRepository implements TaskRepositoryInterface {
	
	private $model;

	public function __construct($model)
	{
		$this->model = $model;
	}

	public function getById($id)
	{
		return $this->model->find($id);
	}

	public function getByStatus($status)
	{
		return $this->model->where('status', $status)->get();
	}

	public function getAll()
	{
		return $this->model->all();
	}

	public function delete($id)
	{
		return $this->model->destroy($id);
	}

	public function create(array $data)
	{
		$model = $this->model->newInstance();
		$model->fill($data);
		return $model->save();
	}

	public function update($id, $data)
	{
		$model = $this->model->find($id);
		$model->fill($data);
		return $model->save();
	}

}