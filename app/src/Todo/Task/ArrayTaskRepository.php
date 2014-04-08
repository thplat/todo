<?php namespace Todo\Task;

class ArrayTaskRepository implements TaskRepositoryInterface {

	private $data = [

		1 => ['name' => 'Kochen', 'text' => 'Spaghetti Bolognese'],
		2 => ['name' => 'Waschen', 'text' => 'Weiß und Buntwäsche trennen'],
		3 => ['name' => 'Joggen', 'text' => 'Neuen Weg ausprobieren'],

	];

	public function getById($id)
	{
		return $this->arrayToObject($this->data[$id]);
	}

	public function getAll()
	{
		return $this->arrayToObject($this->data);
	}

	public function delete($id)
	{
		unset($this->data[$id]);
	}

	public function create(array $data)
	{
		$this->data[] = $data;
	}

	private function arrayToObject($array)
	{
		return json_decode(json_encode($array));
	}

}