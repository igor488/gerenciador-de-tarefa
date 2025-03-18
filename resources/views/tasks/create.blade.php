@extends('layouts.app')

@section('title', 'Criar Tarefa')

@section('content')
<h2>Nova Tarefa</h2>
<form action="{{ route('tasks.store') }}" method="POST">
    @csrf
    <label for="title">Título:</label>
    <input type="text" id="title" name="title" required>

    <label for="description">Descrição:</label>
    <textarea id="description" name="description"></textarea>

    <label for="status">Status:</label>
    <select id="status" name="status">
        <option value="pendente">Pendente</option>
        <option value="em andamento">Em Andamento</option>
        <option value="concluído">Concluído</option>
    </select>

    <button type="submit">Criar</button>
</form>
@endsection
