<?php

namespace App\Http\Controllers;

use App\Models\ListStudent;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = new ListStudent;
        $data = $students->all();
        return view("students.list", compact("data"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|min:2|max:100",
            'class' => 'required|string|max:3|min:1',
            "major" => "required|string|max:5",
            "birth_date" => "required|date",
            "profile_picture" => "required|mimes:jpg,png,svg,jpeg,webp|max:1024",
        ]);

        $time = Carbon::now();
        $doc = str_replace(" ", "-", $time) . '.' . $request->profile_picture->extension();
        $request->file("profile_picture")->move(public_path("upload/profile"), $doc);

        $student = new ListStudent;
        $student->name = $request->name;    
        $student->class = $request->class;
        $student->major = $request->major;
        $student->birth_date = $request->birth_date;
        $student->profile_picture = url('/upload/profile') . "/" . $doc;
        $student->save();
        return redirect('/list-siswa')->with('success', 'Activity ges ditambahkeun');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
