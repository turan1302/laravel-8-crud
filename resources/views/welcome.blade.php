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
    <form method="post" action="{{route('members.store')}}">
        @csrf
        <div class="form-group">
            <label for="usr">İsim</label>
            <input type="text" name="name" class="form-control" id="usr" value="{{old('name')}}">
            @error('name')
                <small style="color: red;">{{$message}}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-success btn-sm">Ekle</button>
    </form>
</div>

<br><br>

<div class="container">
    <h2>Basic Table</h2>
    <p>The .table class adds basic styling (light padding and only horizontal dividers) to a table:</p>
    <table class="table">
        <thead>
        <tr>
            <th>Id</th>
            <th>Ad Soyad</th>
            <th>İşlemler</th>
        </tr>
        </thead>
        <tbody>
        @forelse($members as $member)
            <tr>
                <td>{{$member->id}}</td>
                <td>{{$member->name}}</td>
                <td>
                    <form action="{{route('members.destroy',$member->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-danger">Sil</button>
                    </form>

                    <a href="{{route('members.edit',$member->id)}}" class="btn btn-primary btn-sm">Güncelle</a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="12">Veri Yok</td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>

</body>
</html>
