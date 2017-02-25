@extends('layouts.app')
@section('title', 'Add a Post')
@section('content')
  @include('_nav')

  <script src="//cdn.ckeditor.com/4.6.2/full/ckeditor.js"></script>
  <form class="form-horizontal" role="form" method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
      {{ csrf_field() }}

<div class="container mt-2">
    <div class="row">
        <div class="col-md-10 offset-md-1">
                            <div class="file-field text-center mb-3">
                              <p>Upload a featured image</p>
                                <div class="btn btn-primary btn-sm">
                                    <input type="file" name="cover">
                                </div>
                            </div>

                            <div class="md-form mt-1">

                                <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" required>
                                <label for="title" class="">Title</label>
                            </div>

                            <div class="md-form">
                                <textarea id="description" type="text" class="form-control md-textarea" name="description" value="{{ old('description') }}" required maxlength="1000"></textarea>
                                <label for="description">Description</label>
                            </div>

                            <div class="md-form">
                                <textarea id="content" type="text" class="form-control md-textarea content" name="content" value="{{ old('content') }}" required maxlength="1000" rows="15"></textarea>

                            </div>
                            <script>
                                // Replace the <textarea id="editor1"> with a CKEditor
                                // instance, using default configuration.
                                CKEDITOR.replace( 'content' );
                            </script>
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

                            <div class=" mt-2 col-md-3 offset-md-4">
                              <button type="submit" class="btn btn-primary btn-block">Post</button>
                            </div>

                        </div>


                        </div>
                </div>
            </div>

    </div>
</div>

        </form>
@include('_footer')
@endsection
@section('script')


@endsection
