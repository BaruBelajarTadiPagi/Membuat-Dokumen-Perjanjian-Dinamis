<!doctype html>
<html lang="in">

<head>
    <!-- BOOTSTRAP CSS -->
    <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css'>
    {{-- <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet"> --}}
    {{-- <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"> --}}
    {{-- <link rel="stylesheet" href="{{ public_path('css/pdf_style.css') }}"> --}}
    {{-- <link rel="icon" href="{{ asset('assets/images/favicon.png') }}"> --}}
    <title>Nota Kesepahaman</title>
    <style>
        p{
            font-size: 11pt;
        }
        li{
            font-size: 11pt;
        }
    </style>
    
</head>

<body>
    <div class="mt-1 pr-2">
        <table style="" border="0">
            <tr>
                <td width="15%">
                    <img class="img-fluid w-100" src="{{ public_path('uploads/'.$data->rs_logo) }}" alt="sertifikat">
                </td>
                <td width="70%" class="text-center">
                    <h4>NOTA KESEPAHAMAN</h4>
                    <p class="font-weight-bold" style="margin:0">ANTARA</p>
                </td>
                <td width="15%">
                    <img class="img-fluid w-100" src="{{ public_path('images/logopolkesyoo.png') }}" alt="sertifikat">
                </td>
            </tr>
            <tr>
                <td colspan="3" class="text-center">
                    <p class="font-weight-bold" style="margin:0">RUMAH SAKIT {{ strtoupper($data->rs_name) }}</p>
                    <p class="font-weight-bold" style="margin:0">DENGAN</p>
                    <p class="font-weight-bold" style="margin:0">POLITEKNIK KESEHATAN KEMENKES YOGYAKARTA</p>
                    <p class="font-weight-bold" style="margin:0">TENTANG</p>
                    <p class="font-weight-bold" style="margin:0">PELAKSANAAN TRI DHARMA PERGURUAN TINGGI</p>
                    <p style="margin:0">Nomor : HK.03.01/5.11/{{ $data->poltekkes_no }}/2023</p>
                    <p style="margin:0">Nomor : {{ $data->rs_no }}</p>
                </td>
            </tr>
        </table>
        <div class="row">
            <div class="col-12">
                <p class="text-justify" style="margin-right:20px">Pada hari {{ $hari }} tanggal {{ $tanggal }} bulan {{ $bulan }} tahun dua ribu dua puluh tiga ({{ $tanggal }}/{{ $bl }}/{{ $tahun }}) kami yang bertandatangan dibawah ini:</p>
                <ol type="I" style="margin-left:-20px;margin-right:20px">
                    <li class="text-justify"><b>Dr. Iswanto, S.Pd., M.Kes.,</b> Direktur Politeknik Kesehatan Kemenkes Yogyakarta dalam hal ini bertindak untuk dan atas nama Politeknik Kesehatan Kemenkes Yogyakarta berkedudukan dii Yogyakarta Jl. Tatabumi no 3 Banyuraden Gamping Sleman, selanjutnya dalam nota kesepahaman ini disebut sebagai <b>PIHAK PERTAMA.</b></li>
                    <li class="text-justify"><b>{{ $data->dr_name }},</b> Direktur RUMAH SAKIT {{ $data->rs_name }}, dalam hal ini bertindak untuk dan atas nama dan sah mewakili Direktur RUMAH SAKIT {{ $data->rs_name }}, berkedudukan di {{ $data->rs_address }}, selanjutnya dalam nota kesepahaman ini disebut sebagai <b>PIHAK KEDUA.</b></li>
                </ol>
                <p class="text-justify" style="margin-right:20px">PIHAK PERTAMA dan PIHAK KEDUA selanjutnya disebut PARA PIHAK.</p>
                <p class="text-justify" style="margin-right:20px">Bersepakat untuk mengadakan kerja sama dalam Pelaksanaan Tri Dharma Perguruan Tinggi dan Pendayagunaan Institusi, saling menunjang dalam pelaksanaan tugas dan fungsi PARA PIHAK, sesuai dengan kewenangannya masing-masing.</p>
                <p class="text-justify" style="margin-right:20px">Hal-hal yang menyangkut tindak lanjut dari Nota Kesepahaman ini diatur dalam perjanjian tersendiri yang dilaksanakan oleh pejabat/pegawai yang diberi tugas / kuasa oleh PARA PIHAK dan merupakan bagian dari satu kesatuan yang tidak terpisahkan dari Nota Kesepahaman ini.</p>
                <p class="text-justify" style="margin-right:20px">Nota Kesepahaman ini berlaku untuk jangka waktu 3 (tiga) tahun dan dapat diperbaharui atas kesepakatan PARA PIHAK, dibuat dalam rangkap 2 (dua) masing-masing bermeterai cukup yang mempunyai kekuatan hukum yang sama.</p>
            </div>
        </div>
        <table border="0" width="100%">
            <tr>
                <td class="text-center font-weight-bold">
                    <p style="margin:0">PIHAK KEDUA</p>
                    <p style="margin:0">Direktur</p>
                    <p style="margin-bottom:80px">RS {{ $data->rs_name }}</p>
                    <p style="margin:0">{{ $data->dr_name }}</p>
                    <p style="margin:0">NIP {{ $data->dr_nip }}</p>
                </td>
                <td class="text-center font-weight-bold">
                    <p style="margin:0">PIHAK PERTAMA</p>
                    <p style="margin:0">Direktur Poltekkes Kemenkes</p>
                    <p style="margin-bottom:80px">Yogyakarta</p>
                    <p style="margin:0">Dr. Iswanto, S.Pd., M.Kes.</p>
                    <p style="margin:0">NIP 197009131993031001</p>
                </td>
            </tr>
        </table>
    </div>
    



    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <!-- tambahan -->
</body>

</html>
