@extends('layouts.app')


@section('content')

    <div class="card">
        <div class="card-header">Create a new post</div>
        <div class="card-body">


            <div  style=" text-align: center">
                <x-alert />
            </div>

            <form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">Title</label>
                    <input name="title" type="text" class="form-control">
                </div>

                <div class="form-group">
                    <label for="featured_image">Featured image</label>
                    <input type="file" name="featured_image" id="featured_image" class="form-control-file">
                </div>
                <div class="form-group">
                    <label for="">Select a category</label>
                    <select class="form-control" id="sel1" name="category_id">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Select Tags</label>
                    @foreach($tags as $tag)
                        <div class="form-check ">
                            <label> <input type="checkbox" name="tags[]" class="mr-2 " value="{{$tag->id}}">{{ $tag->tag }} </label>
                        </div>
                    @endforeach
                </div>

                <div class="form-group">
                    <label for="">Content</label>
                    <textarea name="content" id="editor" class="form-control"  rows="5" column="10"></textarea>
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-success "  value="Submit">
                </div>


            </form>

        </div>

    </div>

@endsection


@section('styles')
{{--    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">--}}
@endsection

@section('scripts')
    <script>

        ClassicEditor.create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>

@endsection



