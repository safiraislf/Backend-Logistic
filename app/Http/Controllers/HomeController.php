<?php

namespace App\Http\Controllers;

use App\Models\Data;
use App\Models\Assets;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;



class HomeController extends Controller
{
    public function dashboard(){

        return view('dashboard');
    }

    public function index(Request $request){

        $data = new Data;

        if($request->get('search')){
            $data = $data->where('name','LIKE','%'.$request->get('search').'%')
            ->orWhere('event','LIKE','%'.$request->get('search').'%');
        }

        $data = $data->get();

        return view ('index', compact('data', 'request'));

    }

    public function asset(Request $request){

        $data = new Assets;

        if($request->get('search')){
            $data = $data->where('name','LIKE','%'.$request->get('search').'%')
            ->orWhere('code','LIKE','%'.$request->get('search').'%');
        }

        $data = $data->get();

        return view ('asset', compact('data', 'request'));

    }

    public function user(Request $request){

        $data = new User;

        if($request->get('search')){
            $data = $data->where('name','LIKE','%'.$request->get('search').'%')
            ->orWhere('email','LIKE','%'.$request->get('search').'%');
        }

        $data = $data->get();

        return view ('user', compact('data', 'request'));
    }

    public function create(){

        return view('create');
    }


    public function buat(){

        return view('buat');
    }

    public function make(){

        return view('make');
    }

    public function store(Request $request){
    $validator = Validator::make($request->all(),[
        'name'      => 'required',
        'unit'      => 'required',
        'item'      => 'required',
        'event'     => 'required',
        'pinjam'    => 'required',
        'kembali'   => 'required',
        'status'    => 'required',
    ]);

    if($validator->Fails()) return redirect()->back()->withInput()->withErrors($validator);

    $data['name']           = $request->name;
    $data['unit']           = $request->unit;
    $data['item']           = $request->item;
    $data['event']           = $request->event;
    $data['pinjam']           = $request->pinjam;
    $data['kembali']           = $request->kembali;
    $data['status']           = $request->status;

    Data::create($data);

    return redirect()->route('admin.index');
    }

    public function setor(Request $request){
        $validator = Validator::make($request->all(),[
            'photo'     => 'required|mimes:png,jpg,jpeg|max:2048',
            'code'      => 'required',
            'name'      => 'required',
            'status'    => 'required',
        ]);

        if($validator->Fails()) return redirect()->back()->withInput()->withErrors($validator);

        $photo          = $request->file('photo');
        $filename       = date('Y-m-d').$photo->getClientOriginalName();
        $path           = 'photo-asset/'.$filename;

        Storage::disk('public')->put($path,file_get_contents($photo));

        $data['code']           = $request->code;
        $data['name']           = $request->name;
        $data['status']         = $request->status;
        $data['photo']          = $filename;

        Assets::create($data);

        return redirect()->route('admin.asset');
    }


    public function fund(Request $request){
        $validator = Validator::make($request->all(),[
            'email'         => 'required|email',
            'name'          => 'required',
            'password'      => 'required',
        ]);

        if($validator->Fails()) return redirect()->back()->withInput()->withErrors($validator);

        $data['email']              = $request->email;
        $data['name']               = $request->name;
        $data['password']           = Hash::make($request->password);

        User::create($data);

        return redirect()->route('admin.user');
    }

    public function edit(Request $request,$id){
        $data = Data::find($id);

        return view('edit',compact('data'));
    }


    public function ubah(Request $request,$id){
        $data = Assets::find($id);

        return view('ubah',compact('data'));
    }

    public function change(Request $request,$id){
        $data = User::find($id);

        return view('change',compact('data'));
    }

    public function update(Request $request,$id){
        $validator = Validator::make($request->all(),[
            'name'      => 'required',
            'unit'      => 'required',
            'item'      => 'required',
            'event'     => 'required',
            'pinjam'    => 'required',
            'kembali'   => 'required',
            'status'    => 'required',
        ]);

        if($validator->Fails()) return redirect()->back()->withInput()->withErrors($validator);

        $data['name']           = $request->name;
        $data['unit']           = $request->unit;
        $data['item']           = $request->item;
        $data['event']           = $request->event;
        $data['pinjam']           = $request->pinjam;
        $data['kembali']           = $request->kembali;
        $data['status']           = $request->status;

        Data::whereId($id)->update($data);

        return redirect()->route('admin.index');
    }

    public function upgrade(Request $request,$id){
        $validator = Validator::make($request->all(),[
            'code'      => 'required',
            'name'      => 'required',
            'status'    => 'required',
        ]);

        if($validator->Fails()) return redirect()->back()->withInput()->withErrors($validator);


        $data['code']           = $request->code;
        $data['name']           = $request->name;
        $data['status']         = $request->status;

        Assets::whereId($id)->update($data);

        return redirect()->route('admin.asset');
    }

    public function uptodate(Request $request,$id){
        $validator = Validator::make($request->all(),[
            'email'         => 'required|email',
            'name'          => 'required',
            'password'      => 'required',
        ]);

        if($validator->Fails()) return redirect()->back()->withInput()->withErrors($validator);

        $data['email']           = $request->email;
        $data['name']           = $request->name;

        if($request->password){
            $data['password'] = Hash::make($request->password);
        }

        User::whereId($id)->update($data);

        return redirect()->route('admin.user');
    }

    public function delete(Request $request,$id){
        $data = Data::find($id);

        if($data){
            $data->delete();
        }

        return redirect()->route('admin.index');
    }

    public function hapus(Request $request,$id){
        $data = Assets::find($id);

        if($data){
            $data->delete();
        }

        return redirect()->route('admin.asset');
    }

    public function hilang(Request $request,$id){
        $data = User::find($id);

        if($data){
            $data->delete();
        }

        return redirect()->route('admin.user');
    }
}

