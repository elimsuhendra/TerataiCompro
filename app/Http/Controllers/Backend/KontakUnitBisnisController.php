<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KontakUnitBisnis;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Str;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class KontakUnitBisnisController extends Controller
{
    public $user;
    private $model;
    Public $title="Kontak Unit Bisnis";



    public function __construct(KontakUnitBisnis $model)
    {
        $this->model = $model;

        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }

    public function index()
    {
        if (is_null($this->user) || !$this->user->can('kontakBisnis.list')) {
            abort(403, 'Sorry !! You are Unauthorized to This Page !');
    
        }

        $datas = $this->model->all();
        $title=$this->title;

        return view('backend.pages.artikel.index', compact('datas','title'));
    }

    public function create()
    {
        if (is_null($this->user) || !$this->user->can('admin.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any admin !');
        }

        $title=$this->title;

        return view('backend.pages.artikel.create',compact('title'));        
    }

    public function store(Request $request)
    {

        if (is_null($this->user) || !$this->user->can('artikel.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any admin !');
        }

        // Validation Data
        $input = $request->all();
        $input['serial'] =md5(Str::random(14)) ;
        $input['created_at'] = now();

        $request->validate([
            'value' => 'required|max:50',
            'key' => 'required|max:100|unique:option_map',
        ]);


        try {
          
            $this->model->create($input);
            session()->flash('success', 'Data Sudah Ditambahkan !!');

        }catch (QueryException $e) {

            session()->flash('error', $e);

        } catch (\Exception $e) {

            session()->flash('error', 'An unexpected error occurred');
        }


        return redirect()->route('admin.artikels.index');        
    }

    public function show($id)
    {
        $datas = $this->model->find($id);
        $title=$this->title;

        return view('backend.pages.optionMap.show', compact('datas','title'));    
    }

    public function edit($serial)
    {
        if (is_null($this->user) || !$this->user->can('admin.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any admin !');
        }

        $data = $this->model->where('serial',$serial)->first();
        $title=$this->title;
        return view('backend.pages.optionMap.edit', compact('data','title'));

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

        return redirect()->route('admin.artikels.index');        

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

        return redirect()->route('admin.artikels.index');        
    }

}