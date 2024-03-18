<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\TableMailSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;


class TableMailSettingController extends Controller
{
    public $user;

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
        // if (is_null($this->user) || !$this->user->can('kategori.list')) {
        //     abort(403, 'Sorry !! You are Unauthorized to view any admin !');
        // }

        $details = [
            'title' => 'Mail from Laravel',
            'body' => 'This is a test email sent from Laravel using Gmail SMTP.'
        ];

        // dd(33);
        $mail=Mail::to('abdulmfmuti@gmail.com')->send(new SendMail($details));

        dd($mail);

        return 'Email sent successfully!';


        $datas = TableMailSetting::all();

        return view('backend.pages.mailSetting.index', compact('datas'));
    }

    public function create()
    {
        // if (is_null($this->user) || !$this->user->can('kategori.create')) {
        //     abort(403, 'Sorry !! You are Unauthorized to create any admin !');
        // }

        // $kategori = TableMailSetting::where('deleted_at',null)->where('_status','Active')->get();

        return view('backend.pages.mailSetting.create');        
    }

    public function store(Request $request)
    {

        try {
            $input = $request->except(['_token']);
            $input['serial'] = md5(Str::random(14));
            $input['created_at'] = now();
            $input['_status'] = "Active";
    
            TableMailSetting::create($input);
            session()->flash('success', 'Data Sudah Ditambahkan !!');
        } catch (QueryException $e) {
            session()->flash('error', $e->getMessage());
        } catch (\Exception $e) {
            session()->flash('error', 'An unexpected error occurred');
        }

        return redirect()->route('admin.mailSetting.index');        
    }

    public function show($id)
    {
    
        $datas = Kategori::with('kategoriParent')->find($id);
        $title="Kategori";

        return view('backend.pages.kategori.show', compact('datas','title'));
    }

    public function edit($serial)
    {
        if (is_null($this->user) || !$this->user->can('kategori.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any admin !');
        }

        $data = Kategori::where('serial',$serial)->first();
        $kategori = Kategori::where('deleted_at',null)->where('status','Active')->get();
        $title="Kategori";

        return view('backend.pages.kategori.edit', compact('data','title','kategori'));

    }

    public function update(Request $request, $serial)
    {

        $input = $request->all();
        $input['updated_at'] = now();
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
