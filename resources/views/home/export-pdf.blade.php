<!doctype html>
<html lang="in">

<head>
    <!-- BOOTSTRAP CSS -->
    <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css'>
    {{-- <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet"> --}}
    {{-- <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"> --}}
    <link rel="stylesheet" href="{{ public_path('css/pdf_style.css') }}">
    {{-- <link rel="icon" href="{{ asset('assets/images/favicon.png') }}"> --}}
    <title>Neosia</title>

    
</head>

<body>
    <div class="sertifikatInfo percetakan">
        <span class="name" style="font-family: 'Maiandra';">{{ $result->name }}</span>
    </div>
    <table class="keterangan">
        <tr>
            <td>Award On {{ $published_at }}</td>
        </tr>
    </table>
    <div class="row">
        <div class="qrSertifikat">
            <img class="img-fluid " src="data:image/png;base64, {!! base64_encode(QrCode::format('svg')->generate($qr_url)) !!}" alt="qr-code">
            {{-- {!! QrCode::format('svg')->generate($qr_url) !!} --}}
            <div class="codesertifikat mt-1">{{ $result->code }}</div>
        </div>
        <div></div>
        {{-- <img class="img-fluid qrSertifikat" src="{{ public_path('assets/images/qr-code.png') }}" alt="qr-code"> --}}
        <img class="img-fluid w-100 bgSertifikatCetak" src="{{ asset('uploads/'.$result->category->image) }}" alt="sertifikat">
    </div>




    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <!-- tambahan -->
</body>

</html>
