<?php

use Todo\Task\TaskRepositoryInterface;

class TodoController extends Controller { 

	private $view;
	private $tasks;
	private $validator;
	private $input;
	private $session;
	private $redirect;

	public function __construct( 
		Illuminate\View\Environment $view, 
		TaskRepositoryInterface $tasks, 
		Illuminate\Validation\Factory $validator,
		Illuminate\Http\Request $input,
		Illuminate\Session\SessionManager $session,
		Illuminate\Routing\Redirector $redirect
		)
	{
		$this->view = $view;
		$this->tasks = $tasks;
		$this->validator = $validator;
		$this->input = $input;
		$this->session = $session;
		$this->redirect = $redirect;
	}

	public function getIndex()
	{
		$tasks = $this->tasks->getByStatus(0);
		$dones = $this->tasks->getByStatus(1);

		return $this->view->make('todos.index', compact('tasks', 'dones'));
	}

	public function getCreate()
	{
		return $this->view->make('todos.create');
	}

	public function postCreate()
	{
		$flash = [
			'type' => 'error', 
			'message' => 'Beim anlegen der Aufgabe ist ein Fehler aufgetreten'
		];

		$validator = $this->validator->make(
			$this->input->all(),
			['name' => 'required|min:3']
		);

		if($validator->fails())
		{
			$this->session->flash('message', $flash);
			return $this->redirect->back();
		}
		else
		{
			$flash = [
				'type' => 'success',
				'message' => 'Aufgabe erfolgreich erstellt'
			];
			$this->session->flash('message', $flash);

			$this->tasks->create($this->input->all());

			return $this->redirect->to('/');
		}
	}

	public function getEdit($id)
	{
		$task = $this->tasks->getById($id);
		return $this->view->make('todos.edit', compact('task'));

	}

	public function postEdit($id)
	{
		$flash = [
			'type' => 'error', 
			'message' => 'Beim bearbeiten der Aufgabe ist ein Fehler aufgetreten'
		];

		$validator = $this->validator->make(
			$this->input->all(),
			['name' => 'required|min:3']
		);

		if($validator->fails())
		{
			$this->session->flash('message', $flash);
			return $this->redirect->back();
		}
		else
		{
			$flash = [
				'type' => 'success',
				'message' => 'Aufgabe erfolgreich bearbeitet'
			];
			$this->session->flash('message', $flash);

			$this->tasks->update($id, $this->input->all());

			return $this->redirect->to('/');
		}
	}

	public function getDelete($id)
	{
		$this->session->flash('message', [
			'type' => 'success',
			'message' => 'Aufgabe erfolgreich gelöscht!'
		]);
		$this->tasks->delete($id);

		return $this->redirect->to('/');
	}

	public function changeStatus($id)
	{
		$task = $this->tasks->getById($id);
	
		if($task->status == 0)
			$task->status = 1;
		else
			$task->status = 0;

		$task->save();

		return $this->redirect->to('/');
	}

}