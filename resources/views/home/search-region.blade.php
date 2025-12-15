@extends('layouts.app')
@section('content')
<img class="img-fluid w-100" src="{{ asset('images/background-pencarian.jpg') }}" alt="pencarian sertifikat">
  <div class="header-center-top2 text-center">
    <h1 class="title-brand">Neosia Training Center</h1>
    <button type="button" class="btn btn-warning button-search-home">SEARCH CERTIFICATE by REGION</button>
    <form class="form-pencarian-sertifikat" action="{{ route('resultbyregion') }}" method="GET">
	    <div class="form-row">
	      <div class="col-md-5">
	        <select class="custom-select" name="category_id">
				@foreach ($categories as $item => $category)
				<option value="{{ $category->category_id }}">{{ $category->category_name }}</option>
					
				@endforeach
	        </select>
	      </div>
	      <div class="col-md-5">
	        <select class="custom-select" name="province">
				@foreach ($province as $item )
				<option value="{{ $item->province }}">{{ $item->province }}</option>
				@endforeach
	        </select>
	      </div>
	      <div class="col-md-2">
	        <button type="submit" class="btn btn-warning w-100 text-light">Search</button>
	      </div>
	    </div>
	</form>

	<img class="img-fluid img-cari-sertifikat" src="{{ asset('images/sertifikat.jpg') }}" alt="sertifikat">
  </div>
@endsection

