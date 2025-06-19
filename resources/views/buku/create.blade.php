<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>tambah buku</h2>

    <form action="/buku" method="post">

    @csrf
        <input type="text" name= "judul" placeholder="masukan judul" required> <br>
        <input type="number" name="harga" required><br>
        <select name="kategori" id="" required><br>
            <option >pilih kategori</option><br>
            <option value="self improvment">self improvment</option>
            <option value="bacaan">bacaan</option>
            <option value="teknologi">teknologi</option>
        </select>
<br><br>
        <button type="submit">simpan</button>
        <button type="reset">refresh</button>
    </form>
</body>
</html>