<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\Produk;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Str;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


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

        $datas = Produk::whereNull('deleted_at')->get();
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


        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust image validation rules as needed
        ]);

        $input = $request->all();
        $input['serial'] =md5(Str::random(14)) ;
        $input['created_at'] = now();
        $input['status'] = 'Active';
        $input['created_by'] = Auth::guard('admin')->user()->id;

        // Handle file upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');        
            $directory = 'public/images';
            // Check if the directory exists, if not, create it
            if (!Storage::exists($directory)) {
                Storage::makeDirectory($directory, 0755, true);
            }
            $imagePath = $image->store($directory);        
            $input['image'] = basename($imagePath);
        }
        
    

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
        $datas = Produk::find($id);
        $title="Product";
        $directory = 'public/images';
        $filename = $datas->image;        
        // Construct the full path of the image
        $imagePath = $directory . '/' . $filename;        
        $imageUrl = Storage::url($imagePath);
        
        return view('backend.pages.produk.show', compact('datas','title','imageUrl'));    
    }

    public function edit($serial)
    {
        if (is_null($this->user) || !$this->user->can('admin.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any admin !');
        }
        $title=$this->title;

        $kategori =Kategori::all();
        $data = Produk::where('serial',$serial)->first();
        dd($data);
        return view('backend.pages.produk.edit', compact('data','title','kategori'));
    }

    public function update(Request $request, $serial)
    {
        $input = $request->except(['_method', '_token','last_image']);
    
        // Validate image if provided
        $input['image'] = $request->last_image;
        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust image validation rules as needed
            ]);
            // Handle file upload
            $image = $request->file('image');
            $directory = 'public/images';
            $filePath = 'public/images/' . $request->last_image;
            if (Storage::exists($filePath)) {
                Storage::delete($filePath);
                // File has been successfully deleted
            } 

            // Store the new image and update input
            $imagePath = $image->store($directory);
            $input['image'] = basename($imagePath);
        }

        $directory = 'public/images'.$request->last_image;
        $input['updated_at']=Carbon::now();
        $result = $this->model->where('serial', $serial)->update($input);

        session()->flash($result === 0 || $result === 1 ? 'success' : 'error', $result === 0 || $result === 1 ? 'Data Telah Diubah' : 'Gagal Update');

        return redirect()->route('admin.produks.index');
    }
    
    public function destroy($serial)
    {
        $data = $this->model->Where('serial',$serial)->first();
        
        $filePath = 'public/images/' . $data->image;
        if (Storage::exists($filePath)) {
            Storage::delete($filePath);
            // File has been successfully deleted
        } 

        $result = $data->update(['deleted_at' => Carbon::now()]);
        if ($result == true) {
            session()->flash('success', 'Data Telah Dihapus');

        }else{

            session()->flash('error', 'Gagal Update');

        }

        return redirect()->route('admin.produks.index');        

    }
}
