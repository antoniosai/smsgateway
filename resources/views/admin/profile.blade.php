@extends('admin.layout.app')

@section('title')
Dashboard Administrator
@endsection

@section('content')
<div class="container">
    <div class="row">
        
        <div class="col-md-8">
            <form action="/admin/profile/save" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username" value="{{ $data->username }}"> 
                </div>

                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" class="form-control" name="name" value="{{ $data->name }}"> 
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" value="{{ $data->email }}"> 
                </div>

                <hr>
                <div class="alert alert-warning">
                    Kosongkan password jika tidak ingin diganti
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password">Konfirmasi Password</label>
                            <input type="password" class="form-control" name="password_confirmation">
                        </div>
                    </div>
                </div>

                <button class="btn btn-block btn-primary" type="submit">Simpan</button>
                
            </form>
        </div>
    </div>
</div>
@endsection

@section('breadcrumbs')
<li>
    <a href="/admin/home">Dashboard</a>
</li>
@endsection