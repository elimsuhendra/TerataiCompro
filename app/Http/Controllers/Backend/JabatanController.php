<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Jabatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Str;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class JabatanController extends Controller
{
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
        if (is_null($this->user) || !$this->user->can('jabatan.list')) {
            abort(403, 'Sorry !! You are Unauthorized to view any admin !');
    
        }

        $datas = Jabatan::all();

        return view('backend.pages.jabatan.index', compact('datas'));
    }

    public function create()
    {
        if (is_null($this->user) || !$this->user->can('jabatan.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any admin !');
        }

        return view('backend.pages.jabatan.create');        
    }

    public function store(Request $request)
    {

        if (is_null($this->user) || !$this->user->can('jabatan.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any admin !');
        }

        // Validation Data
        $input = $request->all();
        $input['serial'] =md5(Str::random(14)) ;
        $input['created_at'] = now();

        $request->validate([
            'nama' => 'required|max:50',
            'nama_jabatan' => 'required|max:100|unique:jabatan',
        ]);


        try {
          

           Jabatan::create($input);
            session()->flash('success', 'Data Sudah Ditambahkan !!');

        }catch (QueryException $e) {

            session()->flash('error', $e);

        } catch (\Exception $e) {

            session()->flash('error', 'An unexpected error occurred');
        }


        return redirect()->route('admin.jabatans.index');        
    }

    public function show($id)
    {
    
    }

    public function edit($serial)
    {
        if (is_null($this->user) || !$this->user->can('admin.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any admin !');
        }

        $data = Jabatan::where('serial',$serial)->first();
        // $roles  = Role::all();
        return view('backend.pages.jabatan.edit', compact('data'));

    }

    public function update(Request $request, $serial)
    {

        $input = $request->all();
        $result = Jabatan::where('serial',$serial)->update(['nama_jabatan'=>$request->nama_jabatan,'nama'=>$request->nama]);

        if($result) {

            session()->flash('success', 'Data Telah Diubah');

        }else{

            session()->flash('error', 'Gagal Update');
        }

        return redirect()->route('admin.jabatans.index');        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($serial)
    {
        // dd($serial);
        $data = Jabatan::Where('serial',$serial)->first();
        $result = $data->delete();
        if ($result == true) {
            session()->flash('success', 'Data Telah Dihapus');

        }else{

            session()->flash('error', 'Gagal Update');

        }

        return redirect()->route('admin.jabatans.index');        
    }
}
