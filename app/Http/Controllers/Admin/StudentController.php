<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\students;
use DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students=students::orderBy('class_id','ASC')->get();
        return view('admin.students.index',compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $classes=DB::table('classes')->get();
        return view('admin.students.create',compact('classes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $students=$request->validate([
            'student_name'=> 'required|max:40',
            'student_roll'=> 'required|unique:students|',
            'student_phone'=> 'required|max:40',
            'student_email'=> 'required|max:40|unique:students',
            'class_id'=> 'required',   
       ]);
       students::insert([
        'student_name'=> $request->student_name,
        'student_roll'=> $request->student_roll,
        'student_phone'=> $request->student_phone,
        'student_email'=> $request->student_email,
        'class_id'=> $request->class_id,
       ]);
       return redirect()->route('students.index')->with('success','Studant Insert Sccessfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $classes=DB::table('classes')->get();
        $students=DB::table('students')->where('id',$id)->first();
        return view('admin.students.edit',compact('classes','students'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data=array(
            'student_name'=> $request->student_name,
            'student_roll'=> $request->student_roll,
            'student_phone'=> $request->student_phone,
            'student_email'=> $request->student_email,
            'class_id'=> $request->class_id,
        );
        DB::table('students')->where('id',$id)->update($data);
        return redirect()->route('students.index')->with('success','Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('students')->where('id',$id)->delete();
        return redirect()->back()->with('success','Deleted Successfully!');
    }
}
