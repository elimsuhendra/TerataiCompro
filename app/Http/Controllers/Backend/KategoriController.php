<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kategori;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Str;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }

    public function index()
    {
        if (is_null($this->user) || !$this->user->can('admin.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any admin !');
    
        }

        $datas = Kategori::all();

        return view('backend.pages.kategori.index', compact('datas'));
    }

    public function create()
    {
        if (is_null($this->user) || !$this->user->can('admin.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any admin !');
        }

        return view('backend.pages.kategori.create');        
    }

    public function store(Request $request)
    {

        $input = $request->all();
        $input['serial'] =md5(Str::random(14)) ;
        $input['created_at'] = now();

        $request->validate([
            'deskripsi' => 'required|max:50',
            'nama_kategori' => 'required|max:100|unique:kategori',
        ]);


        try {
          

           Kategori::create($input);
            session()->flash('success', 'Data Sudah Ditambahkan !!');

        }catch (QueryException $e) {

            session()->flash('error', $e);

        } catch (\Exception $e) {

            session()->flash('error', 'An unexpected error occurred');
        }


        return redirect()->route('admin.kategoris.index');        
    }

    public function show($id)
    {
    
        $datas = Kategori::find($id);
        $title="Kategori";


        return view('backend.pages.kategori.show', compact('datas','title'));
    }

    public function edit($serial)
    {
        if (is_null($this->user) || !$this->user->can('kategori.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any admin !');
        }

        $data = Kategori::where('serial',$serial)->first();
        $title="Kategori";

        return view('backend.pages.kategori.edit', compact('data','title'));

    }

    public function update(Request $request, $serial)
    {

        $input = $request->all();
        unset($input['_method']);
        unset($input['_token']);

        $result = Kategori::where('serial',$serial)->update($input);

        if($result) {

            session()->flash('success', 'Data Telah Diubah');

        }else{

            session()->flash('error', 'Gagal Update');
        }

        return redirect()->route('admin.kategoris.index');        
    }

    public function destroy($serial)
    {
        // dd($serial);
        $data = Kategori::Where('serial',$serial)->first();
        $result = $data->delete();
        if ($result == true) {
            session()->flash('success', 'Data Telah Dihapus');

        }else{
            session()->flash('error', 'Gagal Update');
        }

        return redirect()->route('admin.kategoris.index');        
    }
}
