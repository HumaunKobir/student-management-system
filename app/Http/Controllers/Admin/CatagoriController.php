<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\catagori;
use Illuminate\Support\Str;
use DB;

class CatagoriController extends Controller
{
   
   //__Create Catagori__//
   public function catagori_create(){
      return view('admin.catagori.create');
   }
   public function store(Request $request) {
      $request->validate([
         'catagori_name'=>'required|unique:catagoris|max:200',
      ]);
      $catagori= new catagori;
      $catagori->catagori_name=$request->catagori_name;
      $catagori->slug_catagori=Str::of($request->catagori_name)->slug('-');
      $catagori->save();
      //   catagori::insert([
      //    'name'=>$request->name,
      //    'slug_catagori'=>Str::of($request->name)->slug('-'),
      //   ]);
        return redirect()->route('catagori.index');
   }
   //__view mathod__//
   public function index(){
     $catagori=catagori::all();
      return view('admin.catagori.index',compact('catagori'));
   }
   //__Edit Category__//
   public function edit($id){
     $data= DB::table('catagoris')->where('id',$id)->first();
     return view('admin.catagori.edit',compact('data'));
   }
   public function update(Request $request,$id){
      $catagori=catagori::find($id);
      $catagori->update([
         'catagori_name'=>$request->catagori_name,
         'slug_catagori'=>Str::of($request->catagori_name)->slug('-'),
      ]);
      return redirect()->route('catagori.index');
      
   }
   public function destroy($id){
      $data=DB::table('catagoris')->where('id',$id)->delete();
      return redirect()->back();
   }
}
