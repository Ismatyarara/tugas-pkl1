<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyController extends Controller
{

    //data array
    private $data = [
        ['id'=>1, 'judul'=>'mencari jati diri', 'harga'=>75000, 'kategori'=>'self improvment'],
        ['id'=>2, 'judul'=>'bacaan solat dan dzikir', 'harga'=>25000, 'kategori'=>'bacaan'],
        ['id'=>3, 'judul'=>'laravel 12 fundamental', 'harga'=>350000,  'kategori'=>'teknologi'],
    ];


    //mengambil data arrray lalu dimasukan ke dalam sebuah session 'data_buku'
    public function index(){
        $buku = session('data_buku', $this->data);
        return view('buku.index', compact('buku'));
    }

    public function create(){
        return view('buku.create');
    }

    public function store(Request $request){
        $buku = session('data_buku', $this->data);

        //membuat id baru secara increment
        $newId = collect($buku)->max('id') +1;

        //proses menampung data buku
        $buku[]= [
            'id'=> $newId,
            'judul'=>$request->judul,
            'harga'=>$request->harga, 
            'kategori'=>$request->kategori,

        ];

        //menambahkan buku baru ke session data_buku melalui variabel buku
        session(['data_buku'=> $buku]);

        //mengalihkan halaman ke url buku
        return redirect('buku');
    }

    public function show($id){
        $buku = session('data_buku', $this->data);
        $buku = collect($buku)->firstWhere('id', $id);

        //jika buku tidak di temukan di alihkan ke halaman 404
        if (! $buku) {
            abort(404);

        }
                    return view('buku.show', compact('buku'));

    }

     public function edit($id){
        $buku = session('data_buku', $this->data);
        $buku = collect($buku)->firstWhere('id', $id);

        //jika buku tidak di temukan di alihkan ke halaman 404
        if (! $buku) {
            abort(404);

        }
                    return view('buku.edit', compact('buku'));

    }
           
    public function update(Request $request, $id)
    {

        $buku = session('data_buku', $this->data);

        foreach ($buku as &$data){
            if($data['id']== $id) {
                $data['judul'] = $request->judul;
                $data['harga'] = $request->harga;
                $data['kategori'] = $request->kategori;
                break;
            }
        }

        //pengembalian data
        session(['data_buku'=> $buku]);

        return redirect('/buku');

    }

    public function destroy($id){
        $buku =session('data_buku', $this->data);


        //cari index
        $index = array_search($id, array_column($buku, 'id'));
        array_splice($buku, $index, 1);

        session(['data_buku' => $buku]);

         return redirect('/buku');
    }
}
