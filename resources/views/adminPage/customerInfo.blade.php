@extends('layouts.admin')

@section('content')

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Customer Informations</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Address</th>
                      <th>State</th>
                      <th>Phone Number</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($users as $i => $customer)
                    <tr>
                      <td>{{$i+1}}</td>
                      <td>{{$customer->firstname . " " . $customer->lastname}}</td>
                      <td>{{$customer->email}}</td>
                      <td>{{$customer->address1 . " " . $customer->address2. " ".  $customer->postcode . " " . $customer->city }}</td>
                      <td>{{$customer->state}}</td>
                      <td>{{$customer->phone}}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
@endsection