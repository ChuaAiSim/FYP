@extends('layouts.admin')

@section('content')
       <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Stock Management</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row" style="text-align:right;">
                 <!-- <h6 class="m-0 font-weight-bold text-primary">All Stocks</h6> -->            
                      <a href="{{ route('stocksDetails') }}" style="margin-left: 1280px;"><button type="button" class="btn btn-success">Add Stocks</button></a>
                </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Image</th>
                      <th>Name</th>
                      <th>Category</th>
                      <th>Price(Slide)</th>
                      <th>Price(Whole)</th>
                      <th>Quantity</th>
                      <th colspan="2">Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>No</th>
                      <th>Image</th>
                      <th>Name</th>
                      <th>Category</th>
                      <th>Price(Slide)</th>
                      <th>Price(Whole)</th>
                      <th>Quantity</th>
                      <th colspan="2">Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach ($products as $i => $stock)
                    <tr>
                      <td>{{$i+1}}</td>
                      <td><img style="width:80px;height:80px;" src=<?= $stock->image?>/></td>
                      <td>{{$stock->name}}</td>
                      <td>
                        <?php 

                        $id = $stock->category_id;

                        if($id ==1)
                          echo "Mille Crepe";
                        else if($id ==2)
                          echo "Cheese Cake";
                        else if($id ==3)
                          echo "Sponge Cake";
                        else if($id ==4)
                          echo "Cup Cake";
                        else if($id ==5)
                          echo "Mousse Cake";

                      ?></td>
                      <th>{{$stock->slide_price}}</th>
                      <th>{{$stock->whole_price}}</th>
                      <th>{{$stock->quantity}}</th>
                      <td><a href="{{ route('editStocksDetails',['id' => $stock->id]) }}"><button type="button" class="btn btn-dark" style="text-align: center;width: 100%">Edit</button></a></td>
                      <td>

                        <button type="button" class="btn btn-dark" data-toggle="modal" data-target=<?="#exampleModal" . $stock->id?> style="text-align: center;width: 100%">Delete</button>
                                <!-- Modal -->
                                  <div class="modal fade" id=<?="exampleModal" . $stock->id?> tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                          Do you want to delete this product?
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                          <a href="{{ route('deleteStock',['id' => $stock->id]) }}"><button type="button" class="btn btn-primary">Yes</button></a>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                            </td>
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