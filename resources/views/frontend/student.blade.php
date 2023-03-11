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
					<h2 class="heading-section">Student List</h2>
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
						      <th>Student Name</th>
						      <th>Student Roll</th>
						      <th>Student Registretion</th>
						      <th>Student Email</th>
						      <th>Department</th>
						      <th>Student Shift</th>
						      <th>Student Seemester</th>
						      <th>&nbsp;</th>
						    </tr>
						  </thead>
						  <tbody>
                            @forelse ($students as  $student )
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $student->student_name }}</td>
                                <td>{{ $student->student_roll }}</td>
                                <td>{{ $student->student_registretion }}</td>
                                <td>{{ $student->student_email }}</td>
                                <td>{{ $student->studenRelation->first()->department_name }}</td>
                                <td>{{ $student->student_shift }}</td>
                                <td>{{ $student->student_seemester }}</td>
                            </tr>
                            @empty
                                
                            @endforelse
						  </tbody>
						</table>
					</div>
                    {{ $students->links("pagination::bootstrap-5") }}
				</div>
			</div>
		</div>
	</section>
	</body>
</html>

@endsection

