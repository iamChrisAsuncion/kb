<?php

namespace App\Http\Controllers;
use App\User;
use App\Book;
use App\Category;
use App\Tag;
use App\Course;

use Illuminate\Http\Request;

class QueryController extends Controller
{
  public function sortclientID()
  {
    $users = User::orderBy('id', 'asc')->paginate(10);
    return view('clients.index')->withUsers($users);
  }
  public function sortclientIDdesc()
  {
    $users = User::orderBy('id', 'desc')->paginate(10);
    return view('clients.index')->withUsers($users);
  }
  public function sortclientFirst()
  {
    $users = User::orderBy('first_name', 'asc')->paginate(10);
    return view('clients.index')->withUsers($users);
  }
  public function sortclientFirstdesc()
  {
    $users = User::orderBy('first_name', 'desc')->paginate(10);
    return view('clients.index')->withUsers($users);
  }
  public function sortclientLast()
  {
    $users = User::orderBy('last_name', 'asc')->paginate(10);
    return view('clients.index')->withUsers($users);
  }
  public function sortclientLastdesc()
  {
    $users = User::orderBy('last_name', 'desc')->paginate(10);
    return view('clients.index')->withUsers($users);
  }
  public function sortclientPhone()
  {
    $users = User::orderBy('phone', 'asc')->paginate(10);
    return view('clients.index')->withUsers($users);
  }
  public function sortclientPhonedesc()
  {
    $users = User::orderBy('phone', 'desc')->paginate(10);
    return view('clients.index')->withUsers($users);
  }
  public function sortclientEmail()
  {
    $users = User::orderBy('email', 'asc')->paginate(10);
    return view('clients.index')->withUsers($users);
  }
  public function sortclientEmaildesc()
  {
    $users = User::orderBy('email', 'desc')->paginate(10);
    return view('clients.index')->withUsers($users);
  }
  public function sortclientRole()
  {
    $users = User::orderBy('role_id', 'asc')->paginate(10);
    return view('clients.index')->withUsers($users);
  }
  public function sortclientRoledesc()
  {
    $users = User::orderBy('role_id', 'desc')->paginate(10);
    return view('clients.index')->withUsers($users);
  }
  //course
  public function sortcourseID()
  {
    $courses = Course::orderBy('id', 'asc')->paginate(10);
    return view('courses.index')->withCourses($courses);
  }
  public function sortcourseIDdesc()
  {
    $courses = Course::orderBy('id', 'desc')->paginate(10);
    return view('courses.index')->withCourses($courses);
  }
  public function sortcourseCourse()
  {
    $courses = Course::orderBy('course', 'asc')->paginate(10);
    return view('courses.index')->withCourses($courses);
  }
  public function sortcourseCoursedesc()
  {
    $courses = Course::orderBy('course', 'desc')->paginate(10);
    return view('courses.index')->withCourses($courses);
  }
  public function sortcourseCode()
  {
    $courses = Course::orderBy('code', 'asc')->paginate(10);
    return view('courses.index')->withCourses($courses);
  }
  public function sortcourseCodedesc()
  {
    $courses = Course::orderBy('code', 'desc')->paginate(10);
    return view('courses.index')->withCourses($courses);
  }


//librarian
    public function sortbooksSerial()
    {
      $books = Book::orderBy('serial', 'asc')->paginate(10);
      return view('books.index')->withBooks($books);
    }
    public function sortbooksSerialdesc()
    {
      $books = Book::orderBy('serial', 'desc')->paginate(10);
      return view('books.index')->withBooks($books);
    }
    public function sortbooksTitle()
    {
      $books = Book::orderBy('title', 'asc')->paginate(10);
      return view('books.index')->withBooks($books);
    }
    public function sortbooksTitledesc()
    {
      $books = Book::orderBy('title', 'desc')->paginate(10);
      return view('books.index')->withBooks($books);
    }
    public function sortbooksAuthor()
    {
      $books = Book::orderBy('author', 'asc')->paginate(10);
      return view('books.index')->withBooks($books);
    }
    public function sortbooksAuthordesc()
    {
      $books = Book::orderBy('author', 'desc')->paginate(10);
      return view('books.index')->withBooks($books);
    }
//categories
    public function sortcategoriesID()
    {
      $categories = Category::orderBy('id', 'asc')->paginate(10);
      return view('categories.index')->withCategories($categories);
    }
    public function sortcategoriesIDdesc()
    {
      $categories = Category::orderBy('id', 'desc')->paginate(10);
      return view('categories.index')->withCategories($categories);
    }
    public function sortcategoriesName()
    {
      $categories = Category::orderBy('name', 'asc')->paginate(10);
      return view('categories.index')->withCategories($categories);
    }
    public function sortcategoriesNamedesc()
    {
      $categories = Category::orderBy('name', 'desc')->paginate(10);
      return view('categories.index')->withCategories($categories);
    }
//tags
    public function sorttagsID()
    {
      $tags = Tag::orderBy('id', 'asc')->paginate(10);
      return view('tags.index')->withTags($tags);
    }
    public function sorttagsIDdesc()
    {
      $tags = Tag::orderBy('id', 'desc')->paginate(10);
      return view('tags.index')->withTags($tags);
    }
    public function sorttagsName()
    {
      $tags = Tag::orderBy('name', 'asc')->paginate(10);
      return view('tags.index')->withTags($tags);
    }
    public function sorttagsNamedesc()
    {
      $tags = Tag::orderBy('name', 'desc')->paginate(10);
      return view('tags.index')->withTags($tags);
    }

}
