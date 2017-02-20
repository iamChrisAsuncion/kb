<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Tag;
use Image;
use Storage;
use File;
use App\Category;
use Session;
use Carbon\Carbon;

class BookController extends Controller
{
  public function __construct()
  {
      $this->middleware('librarian');
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::paginate(10);
        return view('books.index')->withBooks($books);
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
        return view('books.create')->withCategories($categories)->withTags($tags);
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
            'author' => 'required|max:191',
            'description' => 'required|max:1000',
            'category_id' => 'required|integer',
            'copies' => 'required|integer|max:4',
            'publisher' => 'sometimes|max:191',
            'publication_date' => 'sometimes|max:191',
            'serial' => 'required',
            'cover' => 'sometimes|image',
            'tags' => 'required',

          ]);

          $book = new Book;
          $book->title = ucwords(strtolower($request->title));
          $book->author = ucwords(strtolower($request->author));
          $book->description = ucfirst($request->description);
          $book->category_id = $request->category_id;
          $book->copies = $request->copies;
          $book->publisher = ucwords(strtolower($request->publisher));
          $book->publication_date = $request->publication_date;
          $book->serial = strtoupper($request->serial);

          if ($request->hasFile('cover')){
            $image = $request->file('cover');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/cover/' . $filename);
            $save = Image::make($image)->resize(300, null, function ($constraint) {
              $constraint->aspectRatio();
              $constraint->upsize();
            });
            $save->save($location);
            $book->cover = $filename;
          }

          $book->save();
          if (isset($request->tags)) {
            $book->tags()->sync($request->tags, false);
          }

          Session::flash('Success', 'The book has been succesfully created!');
          return redirect()->route('books.show', $book->id);


    }

    public function show($id)
    {
      $book = Book::find($id);
      $categories = Category::all();
      $tags = Tag::all();
      return view('books.show')->withBook($book)->withCategories($categories)->withTags($tags);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $books = Book::find($id);

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

      return view('books.edit')->withBook($books)->withCategories($cats)->withTags($ts);
    }

    public function update(Request $request, $id)
    {

      $books = Book::find($id);
      $this->validate($request, [
        'title' => 'required|max:191',
        'author' => 'required|max:191',
        'description' => 'required|max:1000',
        'category_id' => 'required|integer',
        'copies' => 'required|integer|max:4',
        'publisher' => 'sometimes|max:191',
        'publication_date' => 'sometimes|max:191',
        'serial' => 'required',
        'cover' => 'sometimes|image',
        'tags' => 'required',


      ]);

      $books = Book::find($id);
      $books->title = ucwords(strtolower($request->input('title')));
      $books->author = ucwords(strtolower($request->input('author')));
      $books->description = ucfirst($request->input('description'));
      $books->category_id = $request->input('category_id');
      $books->copies = $request->input('copies');
      $books->publisher = ucwords(strtolower($request->input('publisher')));
      $books->publication_date = $request->input('publication_date');
      $books->serial = strtoupper($request->input('serial'));

      if ($request->hasFile('cover')){
        $image = $request->file('cover');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $location = public_path('images/cover/' . $filename);
        $save = Image::make($image)->resize(300, null, function ($constraint) {
          $constraint->aspectRatio();
          $constraint->upsize();
        });
        $save->save($location);
        $oldFilename = $books->cover;
        $books->cover = $filename;
        if ($oldFilename == 'placeholder.jpg') {

        }
        else {
          $delete = public_path('images/cover').'/'.$oldFilename;
          File::delete($delete);
        }

      }

      $books->save();
      if (isset($request->tags)) {
        $books->tags()->sync($request->tags);
      }

      Session::flash('Success', 'The book has been succesfully updated!');
      return redirect()->route('books.show', $books->id);


    }

    public function destroy($id)
    {
        //
    }
}
