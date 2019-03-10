@extends('layouts.admin')

@section('content')
       <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">All Orders</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Date</th>
                      <th>Amount</th>
                      <th>Status</th>
                      <th>Delivery Type</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                     @foreach($orders as $i=> $order)
                     <?php
                        if($order->deliverytype ==1)
                          $deliverytype = "Pickup";
                        else if($order->deliverytype ==0)
                          $deliverytype = "Delivery";

                        
                     if($order->status =="pending")
                        $status = "Pending Process";
                      else if($order->status =="processing")
                        $status = "Processing";
                      else if($order->status =="shipping")
                        $status = "Shipping";
                      else if($order->status =="delivered")
                        $status = "Delivered";
                      else if($order->status =="pickup")
                        $status = "Waiting For Pick Up";
                      else if($order->status =="pickedup")
                        $status = "Picked Up";
                      else if($order->status =="completed")
                        $status = "Completed";
                      ?>
                    <tr>
                      <td>{{$i+1}}</td>
                      <td>{{$order->date}}</td>
                      <td>{{$order->amount}}</td>
                      <td>{{$status}}</td>
                      <td>{{$deliverytype}}</td>
                      <td><a href="{{ route('orderDetails',['id' => $order->id]) }}"><button type="button" class="btn btn-dark" style="text-align: center;width: 100%">View Details</button></a></td>
                    </tr>
                   @endforeach                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

@endsection