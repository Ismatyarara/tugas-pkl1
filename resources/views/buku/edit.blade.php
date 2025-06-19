<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>edit buku</h2>

    <form action="/buku/{{ $buku['id'] }}" method="post">

    @csrf
    @method('PUT')
        <input type="text" name= "judul" value="{{ $buku['judul'] }}" required> <br>
        <input type="number" name="harga" value="{{ $buku['harga'] }}" required><br>
        <select name="kategori" id="" required><br>
            <option >pilih kategori</option><br>
            <option value="self improvment" value="{{ $buku['kategori']=='self Improvment' ? 'selected' :'' }}">
                self improvment</option>
            <option value="bacaan"  value="{{ $buku['kategori']=='bacaan' ? 'selected' :'' }}">bacaan</option>
            <option value="teknologi"  value="{{ $buku['kategori']=='teknologi' ? 'selected' :'' }}">teknologi</option>
        </select>
<br><br>
        <button type="submit">simpan</button>
        <button type="reset">refresh</button>
    </form>
</body>
</html>