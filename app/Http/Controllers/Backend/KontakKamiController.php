<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KontakKami;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Str;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use App\Helpers\Formatter;
use App\Models\ReplyMessage;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;


class KontakKamiController extends Controller
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
        if (is_null($this->user) || !$this->user->can('admin.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any admin !');
    
        }

        $datas = KontakKami::all();

        return view('backend.pages.kontakKami.index', compact('datas'));
    }

    public function create()
    {
        if (is_null($this->user) || !$this->user->can('admin.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any admin !');
        }

        return view('backend.pages.kontakKami.create');        
    }

    public function store(Request $request)
    {

        if (is_null($this->user) || !$this->user->can('admin.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any admin !');
        }

        // Validation Data
        $input = $request->all();
        $input['serial'] =md5(Str::random(14)) ;
        $input['created_at'] = now();
        $input['status'] = "Active";
        $input['is_read'] = 0;

        $request->validate([
            'nama' => 'required|max:50',
            'email' => 'required|max:100',
        ]);

        try {
          
           KontakKami::create($input);
            session()->flash('success', 'Data Sudah Ditambahkan !!');

        }catch (QueryException $e) {

            session()->flash('error', $e);

        } catch (\Exception $e) {

            session()->flash('error', 'An unexpected error occurred');
        }


        return redirect()->route('admin.kontakKami.index');        
    }

    public function show($id)
    {
        $datas = KontakKami::find($id);
        $replay = ReplyMessage::where('serial_kontak_kami',$datas->serial)->get();
        $title="Kontak Kami";
        $result = $datas->update(['is_read' => 1]);

        return view('backend.pages.kontakKami.show', compact('datas','title','replay'));
    }

    public function edit($serial)
    {
        if (is_null($this->user) || !$this->user->can('admin.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any admin !');
        }

        $data = KontakKami::where('serial',$serial)->first();

        return view('backend.pages.kontakKami.edit', compact('data'));

    }

    public function replayMessage(Request $request){

        $input = $request->all();
        $findata=KontakKami::find($request->serial_kontak_kami);
        $input['serial'] =md5(Str::random(14));
        $input['created_at'] = date('Y-m-d H:i');
        unset($input['_method']);
        unset($input['_token']);


        $data = [
            'subject' => $findata->subject.' Replay',
            'body' => $findata->pesan,
            'type'=>'replay'
        ];

        Mail::to($findata->email)->send(new SendMail($data));

        try {
          
            ReplyMessage::create($input);
             session()->flash('success', 'Data Sudah Ditambahkan !!');
 
         }catch (QueryException $e) {
 
             session()->flash('error', $e);
 
         } catch (\Exception $e) {
 
             session()->flash('error', 'An unexpected error occurred');
         }

         return redirect()->route('admin.kontakKami.show', $request->serial_kontak_kami);

    }

    public function update(Request $request, $serial)
    {

        $input = $request->all();
        $input['updated_at'] = now();
        unset($input['_method']);
        unset($input['_token']);

        $result = KontakKami::where('serial',$serial)->update($input);

        if($result) {

            session()->flash('success', 'Data Telah Diubah');

        }else{

            session()->flash('error', 'Gagal Update');
        }

        return redirect()->route('admin.kontakKami.index');        
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
        $data = KontakKami::Where('serial',$serial)->first();
        $result = $data->delete();
        if ($result == true) {
            session()->flash('success', 'Data Telah Dihapus');

        }else{

            session()->flash('error', 'Gagal Update');

        }

        return redirect()->route('admin.kontakKami.index');        
    }
}
