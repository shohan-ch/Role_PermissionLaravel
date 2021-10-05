@extends('admin.layout.master')
@section('content')


@section('extra-css')
<!-- summernote -->
<link rel="stylesheet" href="{{ asset('admin-assets/plugins/summernote/summernote-bs4.css') }}">

@endsection



<div class="my-3">
  <h3>Add User</h3>
  <a href="{{ route('user.index') }}" class="btn btn-outline-success">Back</a>
</div>

<div class="row">
  <div class="col-md-12">

    <!-- general form elements -->
    <div class="card card-primary">
      <!-- /.card-header -->
      <!-- form start -->
      <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
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
            <label for="email">Email</label>
            <input type="text" name="email" class="form-control" id="exampleInputEmail1" value="{{ old('email') }}"
              placeholder="Enter a email.">
            @error('email')
            <p class="text-danger font-weight-bold">{{ $message }}</p>
            @enderror
          </div>

          <div class="form-group">
            <label for="role">Select a Role</label>
            <select class="form-control form-control" name="role_id">
              <option>Select a Role</option>
              @foreach ($roles as $data )
              <option value="{{ $data->id }}">{{ $data->name }}</option>

              @endforeach
            </select>
            @error('role')
            <p class="text-danger font-weight-bold">{{ $message }}</p>
            @enderror
          </div>

          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputEmail1"
              placeholder="Enter a passwprd">
            @error('password')
            <p class="text-danger font-weight-bold">{{ $message }}</p>
            @enderror
          </div>

          <div class="form-group">
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" name="password_confirmation" class="form-control" id="confirm_password"
              placeholder="Enter a passwprd">
            @error('password_confirmation')
            <p class="text-danger font-weight-bold">{{ $message }}</p>
            @enderror
          </div>

          <div class="form-group">
            <label for="phone">Phone Number (optional)</label>
            <input type="text" name="phone" class="form-control" id="phone" placeholder="Enter a phone number">
          </div>


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