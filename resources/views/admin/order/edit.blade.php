@extends('admin.layout.master')
@section('content')

<div class="my-3">
  <h3>Edit</h3>
  <a href="{{ route('product.index') }}" class="btn btn-outline-success">Back</a>
</div>

<div class="row">
  <div class="col-md-12">

    <!-- general form elements -->
    <div class="card card-primary">
      <!-- /.card-header -->
      <!-- form start -->
      <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="card-body">
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" id="exampleInputEmail1" value="{{ $product->name }}">
            @error('name')
            <p class="text-danger font-weight-bold">{{ $message }}</p>
            @enderror
          </div>



          {{-- <div class="form-group">
                <label for="description">Description</label>
                <input type="text" name="description" class="form-control" id="description"
                  value="{{ $product->description }}">
          @error('description')
          <p class="text-danger font-weight-bold">{{ $message }}</p>
          @enderror
        </div> --}}


        <div class="form-group">
          <label for="Description">Description</label>
          <textarea id="Description" name="description"
            class="form-control textarea">{{$product->description}}</textarea>
          @error('description')
          <span class="text-danger">{{$message}}</span>
          @enderror

        </div>

        <div class="form-group">
          <label for="link">Link</label>
          <input type="text" name="link" class="form-control" id="exampleInputEmail1" value="{{ $product->link }}">
          @error('link')
          <p class="text-danger font-weight-bold">{{ $message }}</p>
          @enderror
        </div>




        <div class="form-group">
          <label for="heading">Price</label>
          <input type="text" name="price" class="form-control" id="exampleInputEmail1" value="{{ $product->price }}">
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

          <img src=" {{ asset( $product->image) }}" alt="img" width="220" height="170">
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
      <button type="submit" class="btn btn-primary">Edit</button>
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

@endsection