<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>data buku</h2>
    <hr>
    <a href="buku/create">tambah data</a>
    <table>
        <tr>
            <th>no</th>
            <th>judul</th>
            <th>harga</th>
            <th>kategori</th>
            <th>aksi</th>
        </tr>
        @php $no = 1; @endphp
        @foreach ($buku as $data)
        <tr>
            <td>{{$no ++}}</td>
             <td>{{$data['judul']}}</td>
             <td>{{$data['harga']}}</td>
             <td>{{$data['kategori']}}</td>
             <td>
                
                <form action="/buku/{{ $data['id'] }}" method="post">
                    <a href="/buku/{{ $data['id'] }}">show</a>
                    <a href="/buku/{{ $data['id'] }}/edit">edit</a>
                    @csrf
                    @method('DELETE')
               <button type="submit" pmclick="return confirm('apakah anda yakin')"> 
                delete
               </button>
               </form>
             </td>

        </tr>

        @endforeach
    </table>
</body>
</html>