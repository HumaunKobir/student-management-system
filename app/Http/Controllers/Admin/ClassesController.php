<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\classes;
use Illuminate\Support\Str;
use DB;

class ClassesController extends Controller
{
   public function classes_create(){
        return view('admin.classes.create');
   }
   public function store(Request $request){
        $request->validate([
            'class_name'=> 'required|unique:classes|max:30',
        ]);
        classes::insert([
            'class_name'=> $request->class_name,
        ]);
        return redirect()->route('classes.index');
   }
   public function index(){
        $classes=classes::all();
        return view('admin.classes.index',compact('classes'));
   }
   public function edit($id){
        $data=DB::table('classes')->where('id',$id)->first();
        return view('admin.classes.edit', compact('data'));
   }
   public function update(Request $request,$id){
        $classes=classes::find($id);
        $classes->update([
            'class_name'=>$request->class_name,
        ]);
        return redirect()->route('classes.index');
   }
   public function destroy($id){
        DB::table('classes')->where('id',$id)->delete();
        return redirect()->back();
   }
}
