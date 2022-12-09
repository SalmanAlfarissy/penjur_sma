<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        return view('users.index');
    }

    public function getData(Request $request){
        if($request->id){
            $data = User::find($request->id);
            return $this->result('Get Data Success..',$data,true);
        }
        $data = User::get();
        foreach ($data as $index => $item) {
            $item->no = $index+1;
            $item->date = $item->created_at->format("d-M-Y H:i:s");
        }
        return $this->result('Get Data Success..',$data,true);
    }

    public function create(Request $request){
        $validate = $request->validate([
            'name'=>'required',
            'nip'=>'required|unique:users,nip',
            'password'=>'required|min:6',
            'level'=>'required'
        ]);

        $data = new User();
        $data->name = $validate['name'];
        $data->nip  = $validate['nip'];
        $password = Hash::make($validate['password']);
        $data->password = $password;
        $data->level  = $validate['level'];
        $data->save();

        return $this->result('Create Data Success!!',$data,true);

    }

    public function update(Request $request,$id){
        $validate = $request->validate([
            'name'=>'required',
            'nip'=>'required',
            'password'=>'required|min:6',
            'level'=>'required'
        ]);

        $data = User::find($id);
        $data->name = $validate['name'];
        $data->nip  = $validate['nip'];
        $password = Hash::make($validate['password']);
        $data->password = $password;
        $data->level  = $validate['level'];
        $data->save();

        return $this->result('Update Data Success!!',$data,true);

    }

    public function delete($id){
        $data = User::find($id);
        $data->delete();
        return $this->result('Delete Data Success!!',$data,true);
    }


}
