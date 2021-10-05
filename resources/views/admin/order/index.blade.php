@extends('admin.layout.master')
@section('content')
<div class="my-3">

  <h3>Orders</h3>

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
              <th>Customer Name</th>
              <th>Customer Email</th>
              <th>Product Name</th>
              <th>Checkout Price</th>
              <th>Order Status</th>
              <th width='200'>Action</th>
            </tr>
          </thead>
          <tbody>

            @php
            $count = 1;
            @endphp
            @forelse ( $orders as $data )

            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $data->user->name }}</td>
              <td>{{ $data->user->email }}</td>
              <td>{{ $data->product->name }}</td>
              <td>{{ $data->checkout_price }}</td>
              <td>
                @if( $data->order_status== 1)
                Completed
                @else
                Cancel
                @endif
              </td>


              <td class="d-flex justify-content-between">



                <form action="{{ route('order.destroy', $data->id) }}" method="POST">
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
  </div>
</div>


@endsection