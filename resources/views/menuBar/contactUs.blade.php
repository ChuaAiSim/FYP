<head>
</head>

<body>
@extends('layouts.naviBar')
@section('content')
<div style="margin-top: 120px;margin-bottom: 50px;margin-left:400px;margin-right:400px">
	<div class="row">
        <div class="col-md-12 col-md-offset">
            <div class="panel panel-default">
                <div class="panel-heading" style="font-size: 20px;text-align: center">Contact Us</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST">

                        <div class="form-group row" style="margin-top: 25px">
                            <label for="email" class="col-md-2 control-label">Type</label>
                            <div class="col-md-9">
							    <select class="form-control" id="exampleSelect1">
							      <option>Complain</option>
							      <option>Suggestion</option>
							      <option>Vacancy</option>
							    </select>
							</div>
  						</div>

                        <div class="form-group row" style="margin-top: 25px">
                            <label for="password" class="col-md-2 control-label">First Name</label>

                            <div class="col-md-3">
                                <input id="firstName" type="text" class="form-control" required>
                            </div>

                            <label for="password" class="col-md-2 control-label">Last Name</label>

                            <div class="col-md-4">
                                <input id="lastName" type="text" class="form-control" required>
                            </div>
                        </div>

						<div class="form-group row" style="margin-top: 25px">
						  <label for="email" class="col-md-2 control-label">Email</label>
						  <div class="col-md-9">
						    <input id="email" type="email" class="form-control" required>
						  </div>
						</div>
                        
                        <div class="form-group row" style="margin-top: 25px">
						  <label for="example-tel-input" class="col-md-2 control-label">Contact Number</label>
						  <div class="col-md-9">
						    <input id="phoneNumber" type="tel" class="form-control" required>
						  </div>
						</div>

						<div class="form-group row" style="margin-top: 25px">
						    <label for="Textarea" class="col-md-2 control-label">Content</label>
						    <div class="col-md-9">
						    	<textarea class="form-control" id="EnquiryContent" rows="5"></textarea>
							</div>
						</div>

                        <div class="form-group" style="margin-top: 25px">
                            <div class="col-md-8 col-md-offset-2">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
