@extends('layouts.app')
@section('title', 'Add a book')
@section('content')
  @include('_nav')
  <form class="form-horizontal" role="form" method="POST" action="{{ route('books.store') }}" enctype="multipart/form-data">
      {{ csrf_field() }}

<div class="container mt-2">
    <div class="row mx-1">
        <div class="col-md-4 offset-md-2 pt-2 pb-3">



                            <div class="md-form">
                                <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" required>
                                <label for="title" class="">Title</label>
                            </div>

                            <div class="md-form">
                            <input id="author" type="text" class="form-control" name="author" value="{{ old('author') }}" required >
                            <label for="author" class="">Author</label>
                        </div>

                        <div class="md-form">
                                <textarea id="description" type="text" class="form-control md-textarea" name="description" value="{{ old('description') }}" required maxlength="1000"></textarea>
                                <label for="description">Description</label>
                            </div>

                            <div class="file-field">
                                <div class="btn btn-primary btn-sm">
                                    <input type="file" name="cover">
                                </div>
                            </div>
                              <select class="form-control mdb-select" name="category_id">
                                  @foreach ($categories as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                  @endforeach
                              </select>

                            <select class="form-control select-multi" name="tags[]" multiple="true">
                                  @foreach ($tags as $tag)
                                  <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                @endforeach
                            </select>



                        </div>
                        <div class="form-group col-md-4 pt-2 mt-2">
                          <div class="md-form">
                            <input type="text" name="publisher">
                            <label for="publisher">Publisher</label>
                          </div>
                          <div class="md-form">
                            <input type="text" name="publication_date">
                            <label for="publication_date">Publication date</label>
                          </div>
                          <div class="md-form">
                            <input type="text" name="serial">
                            <label for="serial">Serial</label>
                          </div>
                          <div class="md-form">
                            <input type="text" name="copies">
                            <label for="copies">Copies</label>
                          </div>
                          <div class="">
                            <button type="submit" class="btn btn-primary btn-block">Add book</button>
                          </div>
                        </div>
                </div>
            </div>

    </div>
</div>

        </form>
@include('_footer')
@endsection
