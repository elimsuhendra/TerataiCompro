<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Models\OptionMap;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Str;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class OptionMapController extends Controller
{
    public $user;

    Public $title="Option Map";

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
    
            if (!$this->user) {
                return redirect()->route('admin.login'); 
            }
    
            return $next($request);
        });
    }

    public function index()
    {
        if (is_null($this->user) || !$this->user->can('optionMap.list')) {
            abort(403, 'Sorry !! You are Unauthorized to view This Page !');
    
        }

        $datas = OptionMap::with('kategori','account')->get();
        // dd($datas);
        $title=$this->title;

        return view('backend.pages.optionMap.index', compact('datas','title'));
    }

    public function create()
    {
        if (is_null($this->user) || !$this->user->can('admin.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any admin !');
        }

        $title=$this->title;
        $kategori=Kategori::select('serial','nama_kategori')->get();


        return view('backend.pages.optionMap.create',compact('title','kategori'));        
    }

    public function store(Request $request)
    {

        if (is_null($this->user) || !$this->user->can('admin.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any admin !');
        }

        // Validation Data
        try {
            $input = $request->except(['_token']);
            $input['serial'] = md5(Str::random(14));
            $input['created_at'] = now();
            $input['status'] = "Active";
            $input['created_by'] = Auth::guard('admin')->user()->id;
    
            OptionMap::create($input);
            session()->flash('success', 'Data Sudah Ditambahkan !!');
        } catch (QueryException $e) {
            session()->flash('error', $e->getMessage());
        } catch (\Exception $e) {
            session()->flash('error', 'An unexpected error occurred');
        }
    
        return redirect()->route('admin.optionMaps.index');            
    }

    public function show($id)
    {
        $datas = OptionMap::find($id);
        $title=$this->title;

        return view('backend.pages.optionMap.show', compact('datas','title'));    
    }

    public function edit($serial)
    {
        if (is_null($this->user) || !$this->user->can('admin.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any admin !');
        }

        $data = OptionMap::where('serial',$serial)->first();
        $title=$this->title;
        return view('backend.pages.optionMap.edit', compact('data','title'));

    }

    public function update(Request $request, $serial)
    {
        $input = $request->all();
        unset($input['_method']);
        unset($input['_token']);

        $result = OptionMap::where('serial',$serial)->update($input);

        if($result) {

            session()->flash('success', 'Data Telah Diubah');

        }else{

            session()->flash('error', 'Gagal Update');
        }

        return redirect()->route('admin.optionMaps.index');        

    }
    public function destroy($serial)
    {
        $data = OptionMap::Where('serial',$serial)->first();
        $result = $data->delete();
        if ($result == true) {
            session()->flash('success', 'Data Telah Dihapus');

        }else{

            session()->flash('error', 'Gagal Update');

        }

        return redirect()->route('admin.optionMaps.index');        
    }
}
