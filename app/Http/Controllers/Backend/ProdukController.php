<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Str;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;


class ProdukController extends Controller
{
    public $user;
    private $model;

    Public $title="Produk";

    public function __construct(Produk $model)
    {
        $this->model = $model;

        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }

    public function index()
    {
        if (is_null($this->user) || !$this->user->can('produks.list')) {
            abort(403, 'Sorry !! You are Unauthorized to view Produks !');
    
        }

        $datas = Produk::all();
        $title=$this->title;

        return view('backend.pages.produk.index', compact('datas','title'));
    }

    public function create()
    {
        if (is_null($this->user) || !$this->user->can('admin.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any admin !');
        }

        $kategori=Kategori::select('serial','nama_kategori')->get();
        $title=$this->title;

        return view('backend.pages.produk.create',compact('title','kategori'));        
    }

    public function store(Request $request)
    {

        if (is_null($this->user) || !$this->user->can('produks.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create Produks !');
        }

        // Validation Data
        $input = $request->all();
        $input['serial'] =md5(Str::random(14)) ;
        $input['created_at'] = now();

        $request->validate([
            'nama' => 'required|max:50',
            // 'nama_jabatan' => 'required|max:100|unique:jabatan',
        ]);


        try {
          

           Produk::create($input);
            session()->flash('success', 'Data Sudah Ditambahkan !!');

        }catch (QueryException $e) {

            session()->flash('error', $e);

        } catch (\Exception $e) {

            session()->flash('error', 'An unexpected error occurred');
        }


        return redirect()->route('admin.produks.index');        
    }

    public function show($id)
    {
    
    }

    public function edit($serial)
    {
        if (is_null($this->user) || !$this->user->can('admin.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any admin !');
        }
        $title=$this->title;

        $kategori =Kategori::all();
        $data = Produk::where('serial',$serial)->first();
        return view('backend.pages.produk.edit', compact('data','title','kategori'));
    }

    public function update(Request $request, $serial)
    {
        $input = $request->all();
        unset($input['_method']);
        unset($input['_token']);

        $result = $this->model->where('serial',$serial)->update($input);

        if($result) {

            session()->flash('success', 'Data Telah Diubah');

        }else{

            session()->flash('error', 'Gagal Update');
        }

        return redirect()->route('admin.produks.index');
    }

    public function destroy($serial)
    {
        $data = $this->model->Where('serial',$serial)->first();
        $result = $data->delete();
        if ($result == true) {
            session()->flash('success', 'Data Telah Dihapus');

        }else{

            session()->flash('error', 'Gagal Update');

        }

        return redirect()->route('admin.produks.index');        

    }
}
