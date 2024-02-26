<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Home;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public $user;
    private $model;
    Public $title="Home";

    public function __construct(Home $model)
    {
        $this->model = $model;

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
        // if (is_null($this->user) || !$this->user->can('artikel.list')) {
        //     abort(403, 'Sorry !! You are Unauthorized to This Page !');
    
        // }

        $datas = $this->model::whereNull('deleted_at')->get();
        $title=$this->title;

        return view('backend.pages.home.index', compact('datas','title'));
    }

    public function create()
    {
        if (is_null($this->user) || !$this->user->can('home.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any admin !');
        }

        $title=$this->title;

        return view('backend.pages.home.create',compact('title'));        
    }

    public function store(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('home.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any admin !');
        }
    
        try {
            $input = $request->except(['_token']);
            $input['serial'] = md5(Str::random(14));
            $input['created_at'] = now();
            $input['status'] = "Active";
            $input['created_by'] = Auth::guard('admin')->user()->id;
    
            if ($request->hasFile('image')) {
                $image = $request->file('image');
            
                $directory = 'public/images';
                if (!Storage::exists($directory)) {
                    Storage::makeDirectory($directory, 0755, true);
                }
                $imagePath = $image->store($directory);        
                $input['image'] = basename($imagePath);
            }
    
            $this->model->create($input);
            session()->flash('success', 'Data Sudah Ditambahkan !!');
        } catch (QueryException $e) {
            session()->flash('error', $e->getMessage());
        } catch (\Exception $e) {
            session()->flash('error', 'An unexpected error occurred');
        }
    
        return redirect()->route('admin.homes.index');        
    

        
    }

    public function show($id)
    {
        $datas = $this->model->with('account')->where('serial',$id)->first();
        $title=$this->title;

        return view('backend.pages.home.show', compact('datas','title'));    
    }

    public function edit($serial)
    {
        if (is_null($this->user) || !$this->user->can('admin.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any admin !');
        }

        $data = $this->model->where('serial',$serial)->first();
        $title=$this->title;
        return view('backend.pages.home.edit', compact('data','title'));

    }

    public function update(Request $request, $serial)
    {
        $input = $request->all();
        $input['updated_at'] = now();
        $input = $request->except(['_method', '_token','last_image']);

        $input['image'] = $request->last_image;
        $input['updated_at']=Carbon::now();
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
            } 

            $imagePath = $image->store($directory);
            $input['image'] = basename($imagePath);
        }
        
        $result = $this->model->where('serial',$serial)->update($input);

        if($result) {

            session()->flash('success', 'Data Telah Diubah');

        }else{

            session()->flash('error', 'Gagal Update');
        }

        return redirect()->route('admin.homes.index');        

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


        return redirect()->route('admin.homes.index');        
    }
}
