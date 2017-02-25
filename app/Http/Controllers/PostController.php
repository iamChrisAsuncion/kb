<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\Book;
use App\Tag;
use Image;
use Storage;
use File;
use App\Category;
use Session;
use Carbon\Carbon;
use Auth;
use App\User;
use Purifier;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $categories = Category::all();
      $tags = Tag::all();
      return view('posts.create')->withCategories($categories)->withTags($tags);
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
        'title' => 'required|max:191',
        'description' => 'required|max:500',
        'content' => 'required',
        'category_id' => 'required|integer',
        'cover' => 'sometimes|image',
        'tags' => 'required',

      ]);
      $user = Auth::user()->id;
      $post = new Post;
      $post->title = ucwords(strtolower($request->title));
      $post->author = $user;
      $post->update = $user;
      $post->description = ucfirst($request->description);
      $post->content = Purifier::clean($request->content);
      $post->category_id = $request->category_id;

      if ($request->hasFile('cover')){
        $image = $request->file('cover');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $location = public_path('images/featured/' . $filename);
        $save = Image::make($image)->resize(600, null, function ($constraint) {
          $constraint->aspectRatio();
          $constraint->upsize();
        });
        $save->save($location);
        $post->cover = $filename;
      }

      $post->save();
      if (isset($request->tags)) {
        $post->tags()->sync($request->tags, false);
      }

      Session::flash('Success', 'The book has been succesfully created!');
      return redirect()->route('posts.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
      $categories = Category::all();
      $tags = Tag::all();
      $users = User::find($post->update);

      return view('posts.show')->withPost($post)->withCategories($categories)->withTags($tags)->withUsers($users);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {


      $categories = Category::all();
      $cats = array();
      foreach ($categories as $category)
      {
      $cats[$category->id] = $category->name;
      }
      $tags = Tag::all();

      $ts = array();
      foreach ($tags as $tag)
      {
      $ts[$tag->id] = $tag->name;
      }

      return view('posts.edit')->withPost($post)->withCategories($cats)->withTags($ts);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {


            $this->validate($request, [
              'title' => 'required|max:191',
              'description' => 'required|max:1000',
              'content' => 'required',
              'category_id' => 'required|integer',
              'tags' => 'required',


            ]);

            $user = Auth::user()->id;
            $post->title = ucwords(strtolower($request->input('title')));
            $post->update = $user;
            $post->description = ucfirst($request->input('description'));
            $post->content = Purifier::clean($request->input('content'));
            $post->category_id = $request->input('category_id');

            if ($request->hasFile('cover')){
              $image = $request->file('cover');
              $filename = time() . '.' . $image->getClientOriginalExtension();
              $location = public_path('images/featured/' . $filename);
              $save = Image::make($image)->resize(600, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
              });
              $save->save($location);
              $oldFilename = $post->cover;
              $post->cover = $filename;
              if ($oldFilename == 'placeholder.jpg') {

              }
              else {
                $delete = public_path('images/featured').'/'.$oldFilename;
                File::delete($delete);
              }

            }

            $post->save();
            if (isset($request->tags)) {
              $post->tags()->sync($request->tags);
            }

            Session::flash('Success', 'The book has been succesfully updated!');
            return redirect()->route('posts.show', $post->id);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
