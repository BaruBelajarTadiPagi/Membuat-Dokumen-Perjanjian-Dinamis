
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
    <img class="img-fluid logo-member-mobile" src="{{ asset('image/logo neosia training center.png') }}" alt="logo neosia training center">
    <div class="lines"><i class="fa fa-bars text-warning mt-3" aria-hidden="true"></i></div>
  </label>
  <input type="checkbox" id="show-menu">
    <ul class="list-group mb-4" id="menu">
      <li class="list-group-item active" aria-current="true"><a class="href-nav-member" href="#"><i class="fa fa-file-text-o"></i> Portal Neosia</a></li>
      <li class="list-group-item"><a class="href-nav-member" href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Certificate database</a></li>
      <li class="list-group-item"><a class="href-nav-member" href="#"><i class="fa fa-calendar" aria-hidden="true"></i> Tanggal upload</a></li>
      <li class="list-group-item mb-4"><a class="href-nav-member" href="#"><i class="fa fa-users" aria-hidden="true"></i> ID member</a></li>
      <li class="list-group-item border-top"><a class="href-nav-member" href="#"><i class="fa fa-home" aria-hidden="true"></i> Portal Neosia</a></li>
    </ul>
  </nav>

  <div id="wrap-member">
    <div class="container">
      <div class="row">
        <div class="col-md-3 search-navigation">
          <img class="img-fluid logo-member" src="{{ asset('image/logo neosia training center.png') }}" alt="logo neosia training center">
          <ul class="list-group mb-4">
            <li class="list-group-item" aria-current="true"><a class="href-nav-member" href="#"><i class="fa fa-file-text-o"></i> Sertifikat</a></li>
            <li class="list-group-item active"><a class="href-nav-member" href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Certificate database</a></li>
            <li class="list-group-item"><a class="href-nav-member" href="#"><i class="fa fa-calendar" aria-hidden="true"></i> Tanggal upload</a></li>
            <li class="list-group-item mb-4"><a class="href-nav-member" href="#"><i class="fa fa-users" aria-hidden="true"></i> ID member</a></li>
            <li class="list-group-item border-top"><a class="href-nav-member" href="#"><i class="fa fa-home" aria-hidden="true"></i> Portal Neosia</a></li>
          </ul>
        </div>
        <div class="col-md-9 search-result">
          <div class="row">
            <div class="col-lg-8 col-md-12">

              <div class="media mb-4">
                <img src="{{ asset('uploads/'.$result->category->logo) }}" class="align-self-center mr-3" alt="{{ Str::upper($result->name) }}" style="width:8vh;">
                <div class="media-body align-self-center">
                  <h5 class="mt-0 mb-1">{{ Str::upper($result->name) }}</h5>
                  <p class="text-secondary mb-0">Your Certificate ID ({{ Str::upper($result->code) }})</p>
                </div>
              </div>

              <div class="image-container">
                <img src="{{ asset('uploads/'.$result->category->image) }}" alt="{{ Str::upper($result->code) }}" class="responsive-image">
                <div class="image-caption">
                  <h2 style="font-family: 'Maiandra';">{{ $result->name}}</h2>
                  <p style="font-family: 'Maiandra';"> <span class="font-weight-bold font-italic">Awarded on </span> {{ $published_at }}</p>
                </div>
                <div class="qrSertifikat" style="position: absolute;bottom: 12px;">
                  {!! QrCode::format('svg')->size(50)->generate($qr_url) !!}
                  <div class="codesertifikat " style="width: 100%;background-color: rgb(109 109 109);color: white;text-align: center;font-size: 5px;padding:0.2px;font-family: 'Maiandra';" >{{ $result->code }}</div>
              </div>
              </div>


            </div>
            <div class="col-lg-4 col-md-12">
              
              <div class="card bg-light border-0">
                <div class="card-body">
                  <p class="font-weight-bold">Download Sertifikat</p>
                  <hr>
                  <a href="{{ route('sertifikat.cetak', $result->code) }}" class="btn btn-sm btn-block btn-warning">Download</a>
                  <p class="font-weight-bold mt-3">About us</p>
                  <hr>
                  <p>Peserta Training selain mendapatkan Certificate yang dikeluarkan oleh Neosia, peserta juga dapat melengkapi Certificate lain berupa Certificate Internasional yang dikeluarkan oleh SolidWorks, Autodesk Inventor, AutoCAD Mechanical, Bentley AutoPipe, StaadPro yang sangat membantu peserta untuk berkarir di Industri Engineering terkemuka baik didalam negeri maupun diluar negeri.</p>
                  <p class="font-weight-bold">Neosia Media</p>
                  <hr>
                  <div class="socialbtns">
                    <ul>
                      <li><a href="#" class="fa fa-lg fa-facebook"></a></li>
                      <li><a href="#" class="fa fa-lg fa-twitter"></a></li>
                      <li><a href="#" class="fa fa-lg fa-whatsapp"></a></li>
                      <li><a href="#" class="fa fa-lg fa-linkedin"></a></li>
                      <li><a href="#" class="fa fa-lg fa-instagram"></a></li>
                      <li><a href="#" class="fa fa-lg fa-youtube"></a></li>
                    </ul>
                  </div>

                </div>
              </div>

            </div>
          </div>

        </div>
      </div>
    </div>
  </div>

@endsection

