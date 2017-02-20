<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Course;
use Session;
use App\User;
class CourseController extends Controller
{
  public function __construct(){
    $this->middleware('admin');

  }

    public function index()
    {
        $courses = Course::all();
        return view('courses.index')->withCourses($courses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
          'course' => 'required|max:191',
          'code' => 'required|max:5',
        ]);
        $course = new Course;
        $course->course = ucwords(strtolower($request->course));
        $course->code = strtoupper($request->code);
        $course->save();
        Session::flash('Success', 'The course has been successfuly added');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $courses = Course::find($id);
      return view('courses.edit')->withCourses($courses);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        //
    }
}
