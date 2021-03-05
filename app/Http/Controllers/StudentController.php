<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentDetail;
use App\Models\Course;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        // return StudentDetail::all();
        $students = StudentDetail::get();
        //return ["First name"=>$student->First_name, "Last name"=>$student->Last_name, "Course name"=>$student->course->Course_name,"Date of joining"=>$student->Date_of_joining];
        //$student = array("First name"=>$student->First_name, "Last name"=>$student->Last_name, "Course name"=>$student->course->Course_name,"Date of joining"=>$student->Date_of_joining);
        foreach($students as $student){
            //$s = array("First name"=>$student->First_name, "Last name"=>$student->Last_name, "Course name"=>$student->course->Course_name,"Date of joining"=>$student->Date_of_joining);
            //return $s;
            $data[] = [
                        "Student id"=>$student->id,
                        "First name"=>$student->First_name,
                        "Last name"=>$student->Last_name,
                        "Course name"=>$student->course->Course_name,
                        "Date of joining"=>$student->Date_of_joining,
                    ];
        }
        return $data;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $addStudent = StudentDetail::create([
            "First_name"=>$request->First_name,
            "Last_name"=>$request->Last_name,
            "Course_id"=>$request->Course_id,
            "Date_of_joining"=>$request->Date_of_joining
        ]);
        if(!$addStudent) {
            return ["Result"=>"Operation Fails!"];
        }
        return ["Result"=>"New Student has been added."];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = StudentDetail::find($id);
        return [
            "Student id"=>$student->id,
            "First name"=>$student->First_name,
            "Last name"=>$student->Last_name,
            "Course name"=>$student->course->Course_name,
            "Date of joining"=>$student->Date_of_joining,
        ];

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $updateStudent = StudentDetail::find($id);
        $updateStudent->update($request->all());
        if(!$updateStudent) {
            return ["Result"=>"Operation Fails!"];
        }
        return ["Result"=>"Student details has been updated."];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteStudent = StudentDetail::find($id)->delete();
        if(!$deleteStudent) {
            return ["Result"=>"Operation Fails!"];
        }
        return ["Result"=>"Post has been deleted."];
    }

    public function searchName($name) {
        $data = [];
        $students = StudentDetail::where("First_name","like","%".$name."%")->get();
        foreach($students as $student){
            $data[] = [
                        "Student id"=>$student->id,
                        "First name"=>$student->First_name,
                        "Last name"=>$student->Last_name,
                        "Course name"=>$student->course->Course_name,
                        "Date of joining"=>$student->Date_of_joining,
                    ];
        }
        return $data;
    }
}
