<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(){
        return view('students.index');
    }

    public function getData(Request $request){
        if($request->id){
            $data = Student::find($request->id);
            return $this->result('Get Data Success..',$data,true);
        }
        $data = Student::get();
        foreach ($data as $index => $item) {
            $item->no = $index+1;
            $item->date = date("d-M-Y H:i:s");
        }
        return $this->result('Get Data Success..',$data,true);
    }

    public function create(Request $request){
        $validate = $request->validate([
            'name'=>'required',
            'nisn'=>'required',
            'jekel'=>'required'
        ]);

        $data = new Student();
        $data->name = $validate['name'];
        $data->nisn  = $validate['nisn'];
        $data->jekel  = $validate['jekel'];
        $data->save();

        return $this->result('Create Data Success!!',$data,true);

    }

    public function update(Request $request,$id){
        $validate = $request->validate([
            'name'=>'required',
            'nisn'=>'required',
            'jekel'=>'required'
        ]);

        $data = Student::find($id);
        $data->name = $validate['name'];
        $data->nisn  = $validate['nisn'];
        $data->jekel  = $validate['jekel'];

        $data->save();

        return $this->result('Update Data Success!!',$data,true);

    }

    public function delete($id){
        $data = Student::find($id);
        $data->delete();
        return $this->result('Delete Data Success!!',$data,true);
    }

}
