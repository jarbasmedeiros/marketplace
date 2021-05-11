@extends('layouts.app')

@section('content')
    <h1>Criar Loja</h1>
    <form action="{{ route('admin.stores.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label>Nome da loja</label>
            <input type="text" name="name" class="form-control">
        </div>
        <div class="form-group">
            <label>Descrição</label>
            <input type="text" name="description" class="form-control">
        </div>
        <div class="form-group">
            <label>Telefone</label>
            <input type="text" name="phone" class="form-control">
        </div>
        <div class="form-group">
            <label>Celular/Whatsapp</label>
            <input type="text" name="mobile_phone" class="form-control">
        </div>
        <div class="form-group">
            <label>Slug</label>
            <input type="text" name="slug" class="form-control">
        </div>
        <div class="form-group">
            <label>Usuário</label>
            <select name="user" class="form-control">
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Criar Loja</button>
        </div>
    </form>

@endsection

