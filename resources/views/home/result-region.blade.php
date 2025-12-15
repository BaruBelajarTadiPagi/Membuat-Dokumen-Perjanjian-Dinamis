@extends('layouts.app')
@section('js')
  <script type="text/javascript">
    var activeNavItem = $('.href-nav-member');
    activeNavItem.click(function(){
      activeNavItem.removeClass('active');
      $(this).addClass('active');  
    });
  </script>
@endsection
@section('content')
<nav class="mobile-menu">
  <label for="show-menu" class="show-menu">
    <img class="img-fluid logo-member-mobile" src="{{ asset('images/logo neosia training center.png') }}" alt="logo neosia training center">
    <div class="lines"><i class="fa fa-bars text-warning mt-3" aria-hidden="true"></i></div>
  </label>
  <input type="checkbox" id="show-menu">
    <ul class="list-group mb-4" id="menu">
      <li class="list-group-item active" aria-current="true"><a class="href-nav-member" href="#"><i class="fa fa-home"></i> Portal Neosia</a></li>
      <li class="list-group-item"><a class="href-nav-member" href="#"><i class="fa fa-search" aria-hidden="true"></i> Searching</a></li>
    </ul>
  </nav>

  <div id="wrap-member">
    <div class="container">
      <div class="row">
        <div class="col-md-3 search-navigation">
          <img class="img-fluid logo-member" src="{{ asset('image/logo neosia training center.png') }}" alt="logo neosia training center">
          <ul class="list-group mb-4">
            <li class="list-group-item active" aria-current="true"><a class="href-nav-member" href="#"><i class="fa fa-home"></i> Portal Neosia</a></li>
            <li class="list-group-item"><a class="href-nav-member" href="#"><i class="fa fa-search" aria-hidden="true"></i> Searching</a></li>
          </ul>
        </div>
        <div class="col-md-9 search-result">
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

          {{-- <div class="bg-warning mt-3 mb-4 py-2 px-2">Total of <b>23,432</b> certified Solid works</div> --}}

          <p>Matching users</p>
          <div class="table-responsive">
          <table class="table table-hover border">
            <thead>
              <tr class="bg-warning">
                <th scope="col">Username</th>
                <th scope="col">Nama Lengkap</th>
                <th scope="col">Kode </th>
                <th scope="col">Kota</th>
                <th scope="col" class="text-center">Certificates</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($result as $item)
                  
              <tr>
                <td>{{ $item->username }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->code }}</td>
                <td>{{ $item->province }}</td>
                <td class="text-center"><img class="img-fluid type"" src="{{ asset('uploads/'.$item->category->logo) }}" alt="loto sertifikat"></td>
              </tr>
              @endforeach
              
            </tbody>
          </table>
          </div>

        </div>
      </div>
    </div>
  </div>
@endsection