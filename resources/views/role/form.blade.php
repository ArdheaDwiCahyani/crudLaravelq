@extends('layouts.app')

@section('title', 'Form Tambah Role')

@section('content')
<form action="{{ isset($role) ? route('role.tambah.update', $role->id) : route('role.tambah.simpan') }}" method="post">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama_role">User Role</label>
                        <input type="text" class="form-control" id="role_user" name="role_user" value="{{ isset($role) ? $role->role_user : '' }}">
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn tema-sidebar text-light">Simpan</button>
                </div>
            </div>
        </div>
    </div>
    
</form>

@endsection