@extends('layouts.admin')

@section('content')
       <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Categories</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Name</th>
                      <th>Description</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($categories as $i => $c)
                    <tr>
                      <td>{{$i+1}}</td>
                      <td>{{$c->cateogory}}</td>
                      <td>{{$c->description}}</td>
                      <td>{{$c->status}}</td>
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