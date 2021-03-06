@extends('layouts.app')

@section('title', 'Catalog')

@section('content')

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Document</title>

	{{-- fontawesome --}}
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
</head>
<body>
	<div class="container">

	<h1>Catalog Page</h1>
	<h2>Categories</h2>
	{{-- <a href="#" class="btn btn-primary">All</a> --}}
	@foreach(\App\Category::all() as $category)
		<a href="/menu/categories/{{$category->id}}" class="btn btn-primary">{{ $category->name }}</a>
	@endforeach

	<hr>
		<a href="/menu/add" class="btn btn-primary mb-2"><i class="fas fa-plus"></i> Add new item</a>
		@if(Session::has("success_message"))
			<div class="alert alert-success">{{ Session::get("success_message") }}</div>
		@endif

		<div class="row">

			@foreach($items as $indiv_item)
				<div class="col-sm-4">
					<div class="card mb-3">
						<div class="card-body">
							<h5 class="card-title ">{{ $indiv_item->name }}</h5>
							<img src="/{{ $indiv_item->image_path }}">

							<p>{{ $indiv_item->description }}</p>
							<p>{{ $indiv_item->category_id }}</p>
							

							{{-- <form action="addToCart/{{$indiv_item->id}}" method="POST">
								{{csrf_field()}}
								<div class="form-group">
									<label for="quantity">Quantity:</label>
									<input type="number" name="quantity" id="quantity" class="form-control mb-2">
									<button type="submit" class="btn btn-outline-success add-to-cart mb-3 " data-id=""><i class="fas fa-cart-plus"></i> Add to cart</button>
								</div>
							</form> --}}

							<input type="number" name="quantity" id="quantity_{{$indiv_item->id}}" class="form-control">

							<button type="button" class="btn btn-block btn-outline-success" onclick="addToCart({{$indiv_item->id}})">Add to Cart</button>

						<a href="/menu/{{ $indiv_item->id }}" class="btn btn-block bg-primary text-white"> View Details <i class="fas fa-eye"></i></a>
						</div>

						
					</div>
				</div>
			@endforeach
		</div>

	</div>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>


</body>
</html>
@endsection