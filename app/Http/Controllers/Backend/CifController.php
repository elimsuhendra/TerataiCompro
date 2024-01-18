<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Borrowers;



class CifController extends Controller
{
    private $model;
    private $title = 'Lending CIF';

    public function __construct(Borrowers $model)
    {
        $this->model = $model;
    }

    public function index(Request $request)
    {

        $page = $request->query('page') ?? 1;
        $raw = (bool) $request->query('raw') ?? false;

        $rawData = Borrowers::cif();
        if ($raw) {
            $datas = json_encode($rawData->get());
        } else {
            $datas =json_encode($rawData->paginate(10, ['*'], 'page', $page));
        }

        $data1 = json_decode($datas, true);
        $pages['data']=$data1['data'];
        $pagination = Borrowers::cif()->paginate(10);

        return view('backend.pages.cif.index',compact('pages','pagination'));
    }
}
