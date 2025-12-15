@extends('layouts.app')
@section('content')
<img class="img-fluid bannerHome" src="https://certificates.neosia.com/images/bghome.jpeg" alt="pencarian sertifikat">
  <div class="header-center-top text-center">
    <h1 class="title-brand text-light">Neosia Training Center</h1>
    <button type="button" class="btn btn-warning button-search-home">SEARCH CERTIFICATE</button>
    <form class="form-pencarian-sertifikat" action="{{ route('searchbyname') }}" method="GET"> 
      <div class="form-row">
        <div class="col-md-9 col-8">
          <input type="text" name="keyword" class="form-control" placeholder="ID certificate">
          @error('keyword')
              <label id="keyword-error" class="error mt-2 text-danger" for="keyword">{{$message}}</label>
          @enderror
        </div>
        <div class="col-md-3 col-4">
          <button type="submit" class="btn btn-warning w-100 text-light">Search</button>
        </div>
      </div>
    </form>
  </div> 
@endsection

