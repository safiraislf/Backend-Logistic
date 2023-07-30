<?php

namespace App\Http\Controllers;

use App\Models\Data;
use App\Models\Assets;
use App\Models\User;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use PDF;



class DataTableController extends Controller
{

    public function clientside(Request $request){

        $data = new Assets;

        if($request->get('search')){
            $data = $data->where('name','LIKE','%'.$request->get('search').'%')
            ->orWhere('code','LIKE','%'.$request->get('search').'%');
        }

        $data = $data->get();

        return view ('datatable.clientside', compact('data', 'request'));

    }

    public function cetak_pdf(){
        $data = Assets::all();

        $pdf = PDF::loadView('datatable/cetak_pdf', ['data' => $data])->setOptions(['defaultFont' => 'sans-serif']);;
        return $pdf->download('asset.pdf');
    }

    public function data_pdf(){
        $data = Data::all();

        $pdf = PDF::loadView('datatable/data_pdf', ['data' => $data])->setOptions(['defaultFont' => 'sans-serif']);;
        return $pdf->download('data.pdf');
    }

    public function user_pdf(){
        $data = User::all();

        $pdf = PDF::loadView('datatable/user_pdf', ['data' => $data])->setOptions(['defaultFont' => 'sans-serif']);;
        return $pdf->download('user.pdf');
    }
}

