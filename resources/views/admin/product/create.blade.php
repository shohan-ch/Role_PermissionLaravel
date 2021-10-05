@extends('admin.layout.master')
@section('content')


@section('extra-css')
<!-- summernote -->
<link rel="stylesheet" href="{{ asset('admin-assets/plugins/summernote/summernote-bs4.css') }}">

@endsection



<div class="my-3">
  <h3>Add Product</h3>
  <a href="{{ route('product.index') }}" class="btn btn-outline-success">Back</a>
</div>

<div class="row">
  <div class="col-md-12">

    <!-- general form elements -->
    <div class="card card-primary">
      <!-- /.card-header -->
      <!-- form start -->
      <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" id="exampleInputEmail1" value="{{ old('name') }}"
              placeholder="Enter a name.">
            @error('name')
            <p class="text-danger font-weight-bold">{{ $message }}</p>
            @enderror
          </div>

          <div class="form-group">
            <label for="category">Select a Category</label>
            <select class="form-control form-control" name="category">
              <option>Select a category</option>
              <option value="website">Website</option>
              <option value="seo">SEO</option>
              <option value="smm">SMM</option>
              <option value="lb">LB</option>
              <option value="sem">SEM</option>
              <option value="lsm">LSM</option>
            </select>
            @error('category')
            <p class="text-danger font-weight-bold">{{ $message }}</p>
            @enderror
          </div>

          <div class="form-group">
            <label for="subcategory">Enter a Subcategory</label>
            <input type="text" name="subcategory" class="form-control" id="exampleInputEmail1"
              value="{{ old('subcategory') }}" placeholder="Enter subcategory">
          </div>






          {{-- <div id="editor"></div> --}}
          <div class="form-group">
            <label for="Description">Description</label>
            <textarea class="form-control textarea" id="Description"
              name="description">{{old('description')}}</textarea>
            @error('description')
            <span class="text-danger font-weight-bold">{{$message}}</span>
            @enderror

          </div>

          {{-- <div class="form-group">
            <label for="Description">Description</label>
            <textarea id="Description" name="description"
              class="form-control textarea">{{old('description')}}
          </textarea>
          @error('description')
          <span class="text-danger font-weight-bold">{{$message}}</span>
          @enderror

        </div> --}}


        <div class="form-group">
          <label for="link">Link</label>
          <input type="text" name="link" class="form-control" id="link" value="{{ old('link') }}"
            placeholder="Enter a heading.">
          @error('link')
          <p class="text-danger font-weight-bold">{{ $message }}</p>
          @enderror
        </div>


        <div class="form-group">
          <label for="price">Price</label>
          <input type="text" name="price" class="form-control" id="price" placeholder="Enter a price."
            value="{{ old('price') }}">
          @error('price')
          <p class="text-danger font-weight-bold">{{ $message }}</p>
          @enderror
        </div>

        <div class="form-group">
          <label for="image">Image
            <small class="font-weight-bold text-primary">(Image should be less than 300kb and
              image dimension are
              800x600)</small>
          </label>
          <input type="file" name="image" class="form-control" id="image">
          @error('image')
          <p class="text-danger font-weight-bold">{{ $message }}</p>
          @enderror
        </div>

        {{-- <div class="form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1" name="showFront">
            <label class="form-check-label" for="exampleCheck1">Show front page</label>
          </div> --}}
    </div>
    <!-- /.card-body -->

    <div class="card-footer">

      @if(session()->has('success'))
      <p class="text-danger font-weight-bold">{{ session('success') }}</p>
      @endif
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    </form>
  </div>


</div>
</div>

@endsection




@section('extra-js')
<!-- Summernote -->
<script src="{{ asset('admin-assets/plugins/summernote/summernote-bs4.min.js') }}"></script>

<script>
  $(function () {
        // Summernote
        $('.textarea').summernote({
            height: 350,
            callbacks: {
                onPaste: function (e) {
                    var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData)
                        .getData('Text');
                    e.preventDefault();
                    // Firefox fix
                    setTimeout(function () {
                        document.execCommand('insertText', false, bufferText);
                    }, 10);
                }
            }
        })
    })
</script>
{{-- <script src="https://cdn.ckeditor.com/ckeditor5/29.2.0/classic/ckeditor.js"></script>
<script>
  ClassicEditor
      .create( document.querySelector( '#editor' ) )
      .catch( error => {
          console.error( error );
      } );
</script> --}}

@endsection