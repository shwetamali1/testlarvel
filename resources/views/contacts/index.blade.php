<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Laravel crud</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
<div class="container mt-2">
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left">
<h2>Laravel crud</h2>
</div>
<div class="pull-right mb-2">
<a class="btn btn-success" href="{{ route('contacts.create') }}"> Create contacts</a>
</div>
</div>
</div>
@if ($message = Session::get('success'))
<div class="alert alert-success">
<p>{{ $message }}</p>

@error('name')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror 
</div>
@endif
<table class="table table-bordered">
<tr>
<th>S.No</th>
<th>First Name</th>
<th>Last name</th>
<th> Phone</th>
<th width="280px">Action</th>
</tr>
@foreach ($contacts as $contacts)
<tr>
<td>{{ $contacts->id }}</td>
<td>{{ $contacts->name }}</td>
<td>{{ $contacts->lastname }}</td>
<td>{{ $contacts->phone }}</td>
<td>
<form action="{{ route('contacts.destroy',$contacts->id) }}" method="Post">
<a class="btn btn-primary" href="{{ route('contacts.edit',$contacts->id) }}">Edit</a>
@csrf
@method('DELETE')
<button type="submit" class="btn btn-danger">Delete</button>
</form>
</td>
</tr>
@endforeach
</table>
{!! $contacts->links() !!}
</body>
</html>