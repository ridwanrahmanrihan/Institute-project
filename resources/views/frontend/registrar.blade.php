@extends('frontend.layouts.app')
@section('content')
<!doctype html>
<html lang="en">
  <head>
  	<title>Student List</title>
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
					<h2 class="heading-section">Registrar List</h2>
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
                            @forelse ($registars as  $registar )
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $registar->registrar_name }}</td>
                                <td>{{ $registar->registrar_phone_number }}</td>
                                <td>{{ $registar->registrar_email }}</td>
                                <td>{{ $registar->registrar_designation }}</td>
                            </tr>
                            @empty
                                
                            @endforelse
						  </tbody>
						</table>
					</div>
                    {{ $registars->links("pagination::bootstrap-5") }}
				</div>
			</div>
		</div>
	</section>
	</body>
</html>

@endsection

