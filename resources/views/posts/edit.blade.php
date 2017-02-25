@extends('layouts.app')
@section('title', $post->title)
@section('content')
  @include('_nav')

  <script src="//cdn.ckeditor.com/4.6.2/full/ckeditor.js"></script>
      {!!Form::model($post, [
        'route' => ['posts.update', $post->id],
        'method' => 'put',
        'files' => 'true'
        ])!!}
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
                              {{ Form::text('title', null, ['class' => 'form-control', 'required']) }}
                                <label for="title" class="">Title</label>
                            </div>

                            <div class="md-form">
                              {{ Form::textarea('description', null, ['class' => 'form-control md-textarea', 'required', 'rows' => '5']) }}

                                <label for="description">Description</label>
                            </div>

                            <div class="md-form">
                              {{ Form::textarea('content', null, ['class' => 'form-control md-textarea', 'required', 'id' => 'content']) }}


                            </div>
                            <script>
                                // Replace the <textarea id="editor1"> with a CKEditor
                                // instance, using default configuration.
                                CKEDITOR.replace( 'content' );
                            </script>

                     <div class="">
                            <label for="category_id">Category</label>
                            </div>
                            <div class="md-form">
                              {{ Form::select('category_id', $categories, $post->category_id, ['class' => "form-control md-select"]) }}
                            </div>
                            <div class="">
                            <label for="tags">Tags</label>
                            </div><div class="">
                          @foreach ($post->tags as $tag)
                            <a href="{{ route('tags.edit', $tag->id) }}"><label class="badge badge-default">{{ $tag->name }}</label></a>
                          @endforeach
</div>

                            <div class="md-form">


                              {{ Form::select('tags[]', $tags, null, ['class' => "form-control md-select select-multi", 'multiple' => 'multiple']) }}
                            </div>



                        </div>




                        </div>
                        <div class="col-md-3 offset-md-4"><button type="submit" class="btn btn-danger btn-block">Save</button></div>

                        <div class="col-md-3 offset-md-4 mt-1"><a href="{{ route('posts.show',$post->id) }}" class=" btn grey btn-block ">Cancel</a></div>


                </div>


    {!!Form::close()!!}
@include('_footer')
@endsection
@section('script')


@endsection
