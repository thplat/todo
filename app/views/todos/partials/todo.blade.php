<div class="task-wrapper">
	<strong>{{ $task->name }}</strong>
	<div>
		{{ $task->text }}
	</div>
	<a href="{{ URL::to('task/' . $task->id . '/check') }}" class="button">{{ $task->status === 0 ? 'Erledigt' : 'Öffnen' }}</a>
	<a class="button" href="{{ URL::to('task/' . $task->id . '/edit') }}">Bearbeiten</a>
	<a class="button" onclick="if(!confirm('Diese Aktion wirklich ausführen?')) return false;" href="{{ URL::to('task/' . $task->id . '/delete') }}">Löschen</a>

</div>