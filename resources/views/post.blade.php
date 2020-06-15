@extends('layouts.app')

@section('content')


<div class="container">
	<div class="row justify-content-center">
		<div class="col-lg-12 mb-5">

			<div class="card" style="">
				<img class="card-img-top" src="/uploads/articles/{{ $data->image }}" alt="Card image cap">
				<div class="card-body p-5">
					<h4 class="card-title">{{ $data->title }}</h4>
					<div class="mb-5" style="font-size: 14px; margin-top: -10px;">{{ $data->created_at }}</div>
					{{ $data->image }}
					<p class="card-text">{!! $data->body !!}</p>
					
				</div>
			</div>

		</div>
	</div>


	<!-- <div class="row justify-content-center">
		<div class="col-12 mb-5">

		<div class="card" style="max-height: 100%;">
				<div class="card-header text-center bg-dark text-white"><b>Komentar</b></div>

				<div class="card-body row justify-content-center">

				</div>
			</div>
		</div>


		</div>
	</div> -->


</div>

@endsection
