@extends('admin.layout.master')
@section('content')
<div class="my-3">

  <h3>Services</h3>
  <a href="{{ route('product.create') }}" class="btn btn-outline-success">Add Product</a>
</div>


<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        @if(session()->has('success'))
        <h3 class="card-title text-danger font-weight-bold">
          {{ session('success') }}
        </h3> @endif

        <div class="card-tools">
          <div class="input-group input-group-sm" style="width: 150px;">
            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

            <div class="input-group-append">
              <button type="submit" class="btn btn-default">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Category</th>
              <th>Subcategory</th>
              <th>Description</th>
              {{-- <th>link</th> --}}
              <th>Price</th>
              <th>Image</th>
              <th width='200'>Action</th>
            </tr>
          </thead>
          <tbody>

            @php
            $count = 1;
            @endphp
            @forelse ( $products as $data )

            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $data->name }}</td>
              <td> {{ strtoupper($data->category ) }}</td>
              <td>{{ $data->subcategory }}</td>

              <td>
                {!! strip_tags( Str::words($data->description, 9, '...')) !!}


              </td>
              {{-- <td>{{ $data->link }}</td> --}}
              <td>{{ $data->price }}</td>
              <td>
                @if($data->image != null)

                <img src="{{asset($data->image)}}" alt="img" width="100" height="70">
                @else
                <p>No image</p>
                @endif
              </td>


              <td class="d-flex justify-content-between">
                <a href="{{ route('product.edit',$data->id) }}" class="btn btn-primary"><i class="fas fa-pencil-alt">
                  </i> Edit</a>
                <form action="{{ route('product.destroy', $data->id) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete!')">
                    <i class="fas fa-trash">
                    </i>
                    Delete
                  </button>
                </form>


              </td>

            </tr>

            @empty
            <tr>
              <td>No data available</td>

            </tr>

            @endforelse



          </tbody>
        </table>


      </div>
      <!-- /.card-body -->

    </div>
    <!-- /.card -->

    <div style="display: flex;justify-content: center;">

      {{ $products->onEachSide(5)->links() }}
    </div>
  </div>
</div>


@endsection