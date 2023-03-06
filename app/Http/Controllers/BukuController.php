<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Buku;
use Carbon\Carbon;
use PDF;


class BukuController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');
    
        $bukus = Buku::orderBy('id', 'desc')
                      ->when($search, function ($query, $search) {
                          return $query->where('judul', 'like', '%'.$search.'%')
                                       ->orWhere('pengarang', 'like', '%'.$search.'%')
                                       ->orWhere('penerbit', 'like', '%'.$search.'%');
                      })
                      ->paginate(10);
    
        return view('buku.index', compact('bukus', 'search'));
    }
    
    public function indexPublic(Request $request)
    {
    $search = $request->get('search');

    $buku = Buku::where('judul', 'like', "%$search%")
        ->orWhere('pengarang', 'like', "%$search%")
        ->orWhere('penerbit', 'like', "%$search%")
        ->orderBy('created_at', 'desc')
        ->paginate(9);

    return view('buku.public.index', compact('buku'));
    }
    
    public function showPublic($id)
    {
        $buku = Buku::where('id', $id)->first();
        $tanggal_terbit = date('d-M-Y', strtotime($buku->tanggal_terbit));
    
        if ($buku) {
            return view('buku.public.show', compact('buku', 'tanggal_terbit'));
        } else {
            abort(404);
        }
    }
    

    public function create()
    {
        return view('buku.create');
    }


    public function store(Request $request)
    {
        // Validasi input field
        $validatedData = $request->validate([
            'judul' => 'required|max:255',
            'penerbit' => 'required|max:255',
            'pengarang' => 'required|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'tanggal_terbit' => 'required|date',
            'deskripsi' => 'required',
        ]);

        // Proses upload image
        $path = $request->file('image')->store('public/images');

        // Simpan data buku ke database
        $buku = new Buku;
        $buku->judul = $validatedData['judul'];
        $buku->penerbit = $validatedData['penerbit'];
        $buku->pengarang = $validatedData['pengarang'];
        $buku->tanggal_terbit = $validatedData['tanggal_terbit'];
        $buku->deskripsi = $validatedData['deskripsi'];
        $buku->image = $path;
        $buku->save();

        return redirect()->route('buku.index')->with('success', 'Book has been added successfully.');
    
    }


    public function show($id)
    {
        $buku = Buku::findOrFail($id);
    
        return view('buku.show', compact('buku'));
    }
    

    public function edit($id)
    {
        $buku = Buku::findOrFail($id);
    
        return view('buku.update', compact('buku'));
    }


    public function update(Request $request, Buku $buku)
    {
    $request->validate([
        'judul' => 'required',
        'penerbit' => 'required',
        'pengarang' => 'required',
        'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'tanggal_terbit' => 'required|date',
        'deskripsi' => 'required|max:500',
    ]);

    if ($request->hasFile('image')) {
        if ($buku->image) {
            Storage::delete('public/'.$buku->image);
        }
        $image = $request->file('image')->store('public');
        $image = str_replace('public/', '', $image);
    } else {
        $image = $buku->image;
    }

    $buku->update([
        'judul' => $request->judul,
        'penerbit' => $request->penerbit,
        'pengarang' => $request->pengarang,
       'tanggal_terbit' => $request->tanggal_terbit,
       'deskripsi' => $request->deskripsi,
        'image' => $image,
    ]);

    return redirect()->route('buku.index')
                     ->with('success', 'Data buku berhasil diperbarui');
    }


    public function destroy(Buku $buku)
    {
        // Delete the image file from storage if it exists
    if ($buku->image) {
        Storage::delete('public/'.$buku->image);
    }

    // Delete the book
    $buku->delete();

    // Redirect to index page with success message
    return redirect()->route('buku.index')->with('success', 'Book deleted successfully!');

    }

    public function exportPdf()
    {
    $buku = Buku::all();
    $pdf = PDF::loadView('buku.export', compact('buku'));

    return $pdf->download('data-buku.pdf');
    }
}