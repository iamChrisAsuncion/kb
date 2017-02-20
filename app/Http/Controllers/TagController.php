<?php

namespace App\Http\Controllers;

use Session;
use App\Tag;
use App\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class TagController extends Controller
{

    public function __construct(){
      $this->middleware('librarian');

    }


    public function index()
    {
      $tags = Tag::paginate(10);
      return view('tags.index')->withTags($tags);
    }

    public function store(Request $request)
    {
      $this->validate($request, [
        'name' => 'required|max:191',
      ]);
        $tag = new Tag;
        $tag->name = ucwords($request->name);
        $tag->save();
        Session::flash('Success', 'The tag has been successfuly created');
        return redirect()->route('tags.index');
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
        $tags = Tag::find($id);
        return view('tags.edit')->withTags($tags);
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
        //
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
