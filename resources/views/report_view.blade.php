<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->


    <title>hello</title>

    <!-- Scripts -->



    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
  <!--  <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('/assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/shared/style.css') }}">
</head>
<body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

	<div class="container">
		<div id="lhead" align="left">
		<div id="add">
				<table >
				<tr>
					<td>Kango Products Division</td>
				</tr>
				<tr>
					<td>Plumtree Rd, NewPort St</td>
				</tr>
				<tr>
					<td>Belmont </td>
				</tr>
        <tr>
					<td>Bulawayo </td>
				</tr>
			</table>
	    </div>

	</div>
  <div>
    <br>
    <b>Week Ending: {{$end_date}}</b>
  </div>

	<div id="app">
		<table class="table table-striped">
			  <thead>
				<tr>
				  <th scope="col">#</th>
          <th scope="col">Works #</th>
          <th scope="col">Last Name</th>
				  <th scope="col">First Name</th>
				  <th scope="col">Mon</th>
				  <th scope="col">Tue</th>
				  <th scope="col">Wed</th>
				  <th scope="col">Thu</th>
				  <th scope="col">Fri</th>
				</tr>
			  </thead>
			  <tbody>

        @foreach ($users as $index => $user)
        <tr>
        <th scope="row" id="row">{{$index+1}}</th>
        <td>{{ $user->works_number }}</td>
        <td>{{ $user->surname }}</td>
        <td>{{ $user->name }}</td>
        <<td>{{ $user->Mon }}</td>
        <td>{{ $user->Tue }}</td>
        <td>{{ $user->Wed }}</td>
        <td>{{ $user->Thu }}</td>
        <td>{{ $user->Fri }}</td>
        </tr>
        @endforeach
			  </tbody>
		</table>
		</div>
	</div>
</body>
</html>
