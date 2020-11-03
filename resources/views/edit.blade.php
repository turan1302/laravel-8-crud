<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <h2>Laravel 8 CRUD</h2>

    <h4>Üye Bilgileri</h4>
    <form method="post" action="{{route('members.update',$member->id)}}">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="usr">İsim</label>
            <input type="text" name="name" class="form-control" id="usr" value="{{old('name') ?? $member->name }}">
            @error('name')
            <small style="color: red;">{{$message}}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-success btn-sm">Güncelle</button>
        <a href="{{route('members.index')}}" class="btn btn-danger btn-sm">Vazgeç</a>
    </form>
</div>
