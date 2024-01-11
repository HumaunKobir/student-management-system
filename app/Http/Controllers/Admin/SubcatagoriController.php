<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\subcatagori;
use App\Models\catagori;
use Illuminate\Support\Str;
use DB;

class SubcatagoriController extends Controller
{
    public function subcatagori_create(){
        $catagori=catagori::get();
        return view('admin.subcatagori.create',compact('catagori'));
    }
    public function store(Request $request){
        $subcatagoris=$request->validate([
            'catagori_id'=>'required',
            'subcatagori_name'=>'required|unique:subcatagoris',
        ]);
        subcatagori::insert([
            'catagori_id'=>$request->catagori_id,
            'subcatagori_name'=>$request->subcatagori_name,
            'subcatagori_slug'=>Str::of($request->subcatagori_name)->slug('-'),
        ]);
        return redirect()->back()->with('success','Subcategory Insrted Successfully!');
    }
    public function index(){
        $subcatagori=subcatagori::all();
        return view('admin.subcatagori.index',compact('subcatagori'));
    }
   public function edit($id){
        $catagori=catagori::get();
        $subcatagori=subcatagori::where('id',$id)->first();
        return view('admin.subcatagori.edit',compact('catagori','subcatagori'));   
   }
   public function update(Request $request,$id){
    $subcatagoris=$request->validate([
        'catagori_id'=>'required',
        'subcatagori_name'=>'required',
    ]);
        $data=array(
            'catagori_id'=>$request->catagori_id,
            'subcatagori_name'=>$request->subcatagori_name,
            'subcatagori_slug'=>Str::of($request->subcatagori_name)->slug('-'),   
        );
        DB::table('subcatagoris')->where('id',$id)->update($data);
        return redirect()->route('subcatagori.index')->with('success','Data Updated Successfully!');
   }
   public function delete($id){
        subcatagori::where('id',$id)->delete();
        return redirect()->back()->with('success','Data Deleted Successfully!');
   }
}
