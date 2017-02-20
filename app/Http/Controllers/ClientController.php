<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Password;
use Redirect;
use Illuminate\Http\Request;
use App\User;
use Session;
use App\Course;
class ClientController extends Controller
{

  public function __construct()
  {
      $this->middleware('admin');
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $users = User::paginate(10);
        return view('clients/index')->withUsers($users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clients/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
          'first_name' => 'required|max:191',
          'last_name' => 'required|max:191',
          'id_number' => 'required|max:20|unique:users',
          'email' => 'required|email|max:191|unique:users',
          'role_id' => 'required|max:10'
        ));

        $user = new User;
        $user->id_number = strtoupper($request->id_number);
        $user->email = strtolower($request->email);
        $user->role_id = $request->role_id;
        $user->first_name = ucwords(strtolower($request->first_name));
        $user->last_name = ucwords(strtolower($request->last_name));

        $user->save();
        try{
          $response = $this->broker()->sendResetLink($request->only('email'));
          $message = 'Password Token has been successfully sent to '.$request->email;
        }
        catch(\Exception $e){
          $message = 'The account has been succesfully created with default password';
        }
        Session::flash('Success', $message);
        return redirect()->route('clients.show', $user->id);
    }

    public function broker()
    {
        return Password::broker();
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


      $user = User::find($id);
      $course = Course::find($user->course);
        return view('clients.show')->withUser($user)->withCourse($course);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('clients.edit')->withUser($user);
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
      $user = User::find($id);
        $this->validate($request, array(
          'first_name' => 'required|max:191',
          'last_name' => 'required|max:191',
          'id_number' => "required|max:20|unique:users,id_number,$id",
          'email' => "required|email|max:191|unique:users,email,$id",
          'role_id' => 'required|max:10'
        ));


      $user->id_number = strtoupper($request->input('id_number'));
      $user->role_id = $request->input('role_id');
      $user->first_name = ucwords(strtolower($request->input('first_name')));
      $user->last_name = ucwords(strtolower($request->input('last_name')));
      $user->email = strtolower($request->input('email'));

      $user->save();
      Session::flash('Success', 'The account has been succesfully updated!');
      return redirect()->route('clients.show', $user->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
