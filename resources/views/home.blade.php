@extends('layouts.app')

@section('content')


<div class="container">
	<div class="row justify-content-center">

		<div class="col-lg-8 mb-5">

			<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

				<ol class="carousel-indicators">
					<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
				</ol>

				<div class="carousel-inner">

					<div class="carousel-item active">
						<img class="d-block w-100" src="https://designrevision.com/docs/shards/images/1.jpg" alt="First slide">
						<div class="carousel-caption d-none d-md-block">
							<h5 class="text-white">Caption Title</h5>
							<p>Caption Subtitle</p>
						</div>
					</div>

					<div class="carousel-item">
						<img class="d-block w-100" src="https://designrevision.com/docs/shards/images/2.jpg" alt="Second slide">
						<div class="carousel-caption d-none d-md-block">
							<h5 class="text-white">Caption Title</h5>
							<p>Caption Subtitle</p>
						</div>
					</div>

				</div>

				<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>

				<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>

			</div>
		</div>


		<div class="col-lg-4 mb-5">

		<div class="card" style="max-height: 100%;">
				<div class="card-header text-center bg-primary text-dark"><b>Top Three</b></div>

				<div class="card-body row">
					<!-- @if (session('status'))
						<div class="alert alert-success" role="alert">
							{{ session('status') }}
						</div>
					@endif -->

					<ol>
						@foreach ($topview as $topview)
							<li class="pt-2 pb-2">
								<a href="/{{ $topview->slug }}">{{ $topview->title }}</a>
								<span class="badge badge-danger">Baru</span>
							</li>
						@endforeach
					</ol>

				</div>
			</div>

		</div>

	</div>


	<div class="row justify-content-center">
		<div class="col-12 mb-5">

		<div class="card" style="max-height: 100%;">
			<div class="card-header text-center bg-primary text-dark"><b>Umum</b></div>

			<div class="card-body row justify-content-center">

				@foreach ($data as $data)
					@if($data->category->name == 'Umum')
						<div class="col-lg-4 mb-5">
							<div class="card" style="">
								<img class="card-img-top" src="/uploads/articles/{{ $data->image }}" alt="Card image cap">
								<div class="card-body">
									<h4 class="card-title">{{ $data->title }}</h4>
									<p class="card-text">{!! \Illuminate\Support\Str::words($data->body, 20, '....') !!}</p>
									<a href="/{{ $data->slug }}" class="btn btn-primary">Baca selengkapnya &rarr;</a>
								</div>
							</div>
						</div>
					@endif
				@endforeach

			</div>
		</div>
	</div>
</div>


<div class="row justify-content-center">
		<div class="col-12 mb-5">

		<div class="card" style="max-height: 100%;">
			<div class="card-header text-center bg-primary text-dark"><b>Internasional</b></div>

			<div class="card-body row justify-content-center">

					@if($data->category->name == 'Internasional')
						<div class="col-lg-4 mb-5">
							<div class="card" style="">
								<img class="card-img-top" src="/uploads/articles/{{ $data->image }}" alt="Card image cap">
								<div class="card-body">
									<h4 class="card-title">{{ $data->title }}</h4>
									<p class="card-text">{!! \Illuminate\Support\Str::words($data->body, 20, '....') !!}</p>
									<a href="/{{ $data->slug }}" class="btn btn-primary">Baca selengkapnya &rarr;</a>
								</div>
							</div>
						</div>
					@endif

			</div>
		</div>
	</div>
</div>


</div>





</div>
@endsection
