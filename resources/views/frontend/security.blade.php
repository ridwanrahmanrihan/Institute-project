@extends('frontend.layouts.app')
@section('content')
<!doctype html>
<html lang="en">
  <head>
  	<title>Security List</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href=" {{ asset('frontend') }}/assets/table/css/style.css">

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-4">
					<h2 class="heading-section">Security Section</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<h3 class="h5 mb-4 text-center">Table Accordion</h3>
					<div class="table-wrap">
						<table class="table">
						  <thead class="thead-primary">
						    <tr>
						      <th>Serial</th>
						      <th>Name</th>
						      <th>Phone Number</th>
						      <th>Email</th>
						      <th>Degignation</th>
						      <th>&nbsp;</th>
						    </tr>
						  </thead>
						  <tbody>
                            @forelse ($securitys as  $security )
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $security->security_name }}</td>
                                <td>{{ $security->security_phone_number }}</td>
                                <td>{{ $security->security_email }}</td>
                                <td>{{ $security->security_designation }}</td>
                            </tr>
                            @empty
                                
                            @endforelse
						  </tbody>
						</table>
					</div>
                    {{ $securitys->links("pagination::bootstrap-5") }}
				</div>
			</div>
		</div>
	</section>
	</body>
</html>

@endsection

