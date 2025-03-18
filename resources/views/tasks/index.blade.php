@extends('layouts.app')

@section('title', 'Lista de Tarefas')

@section('content')

<div class="add-task-container">
    <a href="{{ route('tasks.create') }}" class="add-task-btn">+ Adicionar Nova Tarefa</a>
</div>

<table>
    <tr>
        <th>Título</th>
        <th>Descrição</th>
        <th>Status</th>
        <th>Ações</th>
    </tr>
    @foreach ($tasks as $task)
    <tr>
        <td>{{ $task->title }}</td>
        <td>{{ $task->description }}</td>
        <td>{{ ucfirst($task->status) }}</td>
        
<td
 class="action-buttons">
    <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-edit">Editar</a>
    
    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Excluir</button>
    </form>
</td>
    </tr>
    @endforeach
</table>
@endsection
