<?php

namespace App\Http\Controllers;
use Auth;
use Session;
use Image;
use Storage;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Course;
use File;
class ProfileController extends Controller
{
  public function __construct()
  {
    $this->middleware('login');
  }
    public function index()
    {
      $courses = Course::all();
      $cs = [];
      foreach ($courses as $course) {
        $cs[$course->id] = $course->course;
      }
      return view('profile.index')->withCourses($cs);
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


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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

  $this->validate($request, [
      'middle_name' => 'max:191',
      'course' => 'required',
      'address' => 'required|max:191',
      'city' => 'required|max:191',
      'image' => 'image',


  ]);
  $profile = Auth::user();
  $profile->middle_name = ucwords(strtolower($request->input('middle_name')));
  $profile->course = ucwords(strtolower($request->input('course')));
  $profile->address = ucwords(strtolower($request->input('address')));
  $profile->city = ucwords(strtolower($request->input('city')));



if ($request->hasFile('image')){
  $image = $request->file('image');
  $filename = time() . '.' . $image->getClientOriginalExtension();
  $location = public_path('images/avatar/' . $filename);

  $save = Image::make($image)->resize(300, null, function ($constraint) {
    $constraint->aspectRatio();
    $constraint->upsize();
  });
  $save->save($location);
  $oldFilename = $profile->image;
  $profile->image = $filename;
  if ($oldFilename == 'placeholder.jpg') {

  }
  else {
    $delete = public_path('images/avatar').'/'.$oldFilename;
    File::delete($delete);
  }




}

$profile->save();
Session::flash('Success', 'Profile has been successfully updated');
  return redirect()->route('profile.index');


}

    public function destroy($id)
    {
        //
    }
}
