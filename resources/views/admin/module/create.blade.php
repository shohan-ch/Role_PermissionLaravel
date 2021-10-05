@extends('admin.layout.master')
@section('content')


@section('extra-css')
<!-- summernote -->
<link rel="stylesheet" href="{{ asset('admin-assets/plugins/summernote/summernote-bs4.css') }}">

@endsection



<div class="my-3">
  {{-- {{ dd($modules) }} --}}
  <h3>Add Module & Permission</h3>
  {{-- <a href="{{ route('role.index') }}" class="btn btn-outline-success">Back</a> --}}
</div>

<div class="row">
  <div class="col-md-12">

    <!-- general form elements -->
    <div class="card card-primary">
      <!-- /.card-header -->
      <!-- form start -->
      <form action="{{ route('module.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
          <div class="form-group">
            <label for="name">Module Name</label>
            <input type="text" name="name" class="form-control" id="exampleInputEmail1" value="{{ old('name') }}"
              placeholder="Ex User">
            @error('name')
            <p class="text-danger font-weight-bold">{{ $message }}</p>
            @enderror
          </div>

          <h4>Permissions</h4>

          <div class="form-check mb-2">
            <input class="form-check-input" type="checkbox" value="create" id="flexCheckDefault" name="permissions[]">
            <label class="form-check-label" for="flexCheckDefault">
              create
            </label>
          </div>
          <div class="form-check mb-2">
            <input class="form-check-input" type="checkbox" value="read" id="flexCheckDefault" name="permissions[]">
            <label class="form-check-label" for="flexCheckDefault">
              read
            </label>
          </div>
          <div class="form-check mb-2">
            <input class="form-check-input" type="checkbox" value="update" id="flexCheckDefault" name="permissions[]">
            <label class="form-check-label" for="flexCheckDefault">
              update
            </label>
          </div>
          <div class="form-check mb-2">
            <input class="form-check-input" type="checkbox" value="delete" id="flexCheckDefault" name="permissions[]">
            <label class="form-check-label" for="flexCheckDefault">
              delete
            </label>
          </div>


          {{-- 
          <div class="form-group">
            <label for="permissions">Add Extra Permission</label>
            <input type="text" name="permissions[]" class="form-control">
          </div> --}}





          {{-- 
          <div class="form-group">
            <label for="name">Permission</label>
            <input type="text" name="permission" class="form-control" id="exampleInputEmail1"
              value="{{ old('permission') }}" placeholder="Enter a name.">
          @error('permission')
          <p class="text-danger font-weight-bold">{{ $message }}</p>
          @enderror
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