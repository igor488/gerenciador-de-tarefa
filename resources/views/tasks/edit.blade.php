@extends('layouts.app')

@section('title', 'Editar Tarefa')

@section('content')
<h2>Editar Tarefa</h2>
<form action="{{ route('tasks.update', $task->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="title">Título:</label>
    <input type="text" id="title" name="title" value="{{ $task->title }}" required>

    <label for="description">Descrição:</label>
    <textarea id="description" name="description">{{ $task->description }}</textarea>

    <label for="status">Status:</label>
    <select id="status" name="status">
        <option value="pendente" {{ $task->status == 'pendente' ? 'selected' : '' }}>Pendente</option>
        <option value="em andamento" {{ $task->status == 'em andamento' ? 'selected' : '' }}>Em Andamento</option>
        <option value="concluído" {{ $task->status == 'concluído' ? 'selected' : '' }}>Concluído</option>
    </select>

    <button type="submit">Atualizar</button>
</form>
@endsection
