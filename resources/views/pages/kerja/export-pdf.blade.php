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
    <title>Perjanjian Kerja Sama</title>
    <style>
        .text-content{
            font-size: 11pt;
            line-height: 1.5;
        }
        .text-cover{
            font-size: 14pt;
        }
        .li-cover{
            font-size: 11pt;
            margin-top:20px;
            margin-bottom:20px;
            line-height: 1.5;
        }
        .border-radius{
            border: 2px solid black;
            border-radius: 100px;
            margin-top: 100px;
        }
        .page{
            margin-top:90px;
            padding-right:40px;
            padding-left:20px;
            padding-top: 50px;
        }
        .paraf{
            font-size: 8px;
            position: absolute;
            bottom:60px;
            right:20px;
        }
        .hal{
            font-size: 8px;
            position: absolute;
            bottom:0;
            right:20px;
        }
        .dasar-hukum td{
            font-size: 10pt;
            vertical-align: top;
            /* padding: 1px; */
            margin: 0;
            padding:2;
        }
        .dasar-hukum p{
            font-size: 10pt;
            margin:0;
        }
        .ol-content {
            font-size: 11pt;
        }
    </style>
    
</head>

<body>
    <div class="cover p-4 border-radius">
        <table border="0" width="100%">
            <tr>
                <td>

                </td>
                <td class="text-right">
                    <img  style="margin-top:50px;width: 100px" src="{{ public_path('images/logopolkesyoo.png') }}" alt="sertifikat">
                </td>
            </tr>
        </table>
        <h2 class="text-center">NASKAH PERJANJIAN KERJA SAMA</h2>
        <div class="text-center" style="margin:40px 0 90px 0">
            <p class="text-cover">Nomor : HK.03.01/5.11/{{ $data->poltekkes_no }}/2023</p>
            <p class="text-cover">Nomor : {{ $data->rs_no }}</p>
            <p class="text-cover font-weight-bold" style="margin:0;">ANTARA</p>
            <br>
            <p class="text-cover font-weight-bold" style="margin:0">POLITEKNIK KESEHATAN</p>
            <p class="text-cover font-weight-bold" style="margin:0">KEMENTERIAN KESEHATAN YOGYAKARTA</p>
            <br>
            <p class="text-cover font-weight-bold" style="margin:0">DENGAN</p>
            <br>
            <p class="text-cover font-weight-bold" style="margin:0">RUMAH SAKIT {{ strtoupper($data->rs_name) }}</p>
            <br>
            <p class="text-cover font-weight-bold" style="margin:0">TENTANG</p>
            <br>
            <p class="text-cover font-weight-bold" style="margin:0">PELAKSANAAN TRI DHARMA PERGURUAN TINGGI</p>
            <br>
            <p class="text-cover font-weight-bold" style="margin:0">PERIODE 01/11/2023  s/d  01/11/2025</p>
        </div>
    </div>
    <div class="page" style="">
        <p class="text-center text-content font-weight-bold" style="">PERJANJIAN KERJA SAMA</p>
        <p class="text-center text-content font-weight-bold" style="margin:0;">Nomor : HK.03.01/5.11/{{ $data->poltekkes_no }}/2023</p>
        <p class="text-center text-content font-weight-bold" style="margin:0;">---------------------------------------------------</p>
        <p class="text-center text-content font-weight-bold" style="margin:0;">Nomor : {{ $data->rs_no }}</p>
        <br>
        <p class="text-center text-content font-weight-bold" style="margin:0;">ANTARA</p>
        <p class="text-center text-content font-weight-bold" style="margin:0">POLITEKNIK KESEHATAN KEMENTERIAN KESEHATAN YOGYAKARTA</p>
        <br>
        <p class="text-center text-content font-weight-bold" style="margin:0">DENGAN</p>
        <p class="text-center text-content font-weight-bold" style="margin:0">RUMAH SAKIT {{ strtoupper($data->rs_name) }}</p>
        <p class="text-center text-content font-weight-bold" style="margin:0">TENTANG</p>
        <p class="text-center text-content font-weight-bold" style="margin:0">PELAKSANAAN TRI DHARMA PERGURUAN TINGGI</p>
        <p class="text-justify text-content" style="margin-top:50px">Dengan Rahmat Tuhan Yang Maha Esa, pada hari ini {{ $hari }} tanggal {{ $tanggal }} bulan {{ $bulan }} Tahun dua ribu dua puluh tiga ( {{ $tanggal }}/{{ $bl }}/2023), yang bertanda tangan di bawah ini :</p>
        <ol type="I" class="" style="margin-left:-20px">
            <li class="text-justify li-cover"><b>Dr. Iswanto, S.Pd., M.Kes.,</b> : Direktur Politeknik Kesehatan Kemenkes Yogyakarta yang diangkat berdasarkan Keputusan Menteri Kesehatan RI Nomor KP.03.03/F/2467/2023 tanggal 14 November 2022, tentang Pemberhentian dan Pengangkatan Dari dan Dalam Jabatan Direktur Politeknik Kesehatan di Lingkungan Kementerian Kesehatan Republik Indonesia berkedudukan di Jalan Tatabumi Nomor 3, Banyuraden, Gamping, Sleman, Daerah Istimewa Yogyakarta dalam hal ini bertindak atas nama Politeknik Kesehatan Kemenkes Yogyakarta yang selanjutnya disebut sebagai <b>PIHAK PERTAMA.</b></li>
            <li class="text-justify li-cover"><b>{{ $data->dr_name }},</b> Direktur RUMAH SAKIT {{ $data->rs_name }}, dalam hal ini bertindak untuk dan atas nama dan sah mewakili Direktur RUMAH SAKIT {{ $data->rs_name }}, berkedudukan di {{ $data->rs_address }}, selanjutnya disebut sebagai <b>PIHAK KEDUA.</b></li>
        </ol>
        <p class="text-justify text-content">PIHAK PERTAMA dan PIHAK KEDUA, secara bersama-sama disebut PARA PIHAK. Selanjutnya PARA PIHAK bersepakat mengadakan Perjanjian Kerja Sama atas dasar saling membantu dan saling menguntungkan dalam bidang peningkatan, pengembangan mutu pelayanan kesehatan di RUMAH SAKIT {{ $data->rs_name }} dan Tri Dharma PerguruanTinggi dengan ketentuan sebagai berikut :</p>
        <table class="paraf" border="1">
            <tr>
                <td>Paraf Pihak Pertama</td>
                <td>Paraf Pihak Kedua</td>
            </tr>
            <tr >
                <td height="30px"></td>
                <td></td>
            </tr>
        </table>
        <span class="hal">Hal 1 of 11</span>
    </div>
    <div class="page" style="">
        <p class="text-center text-content">DASAR HUKUM</p>
        <p class="text-center text-content">Pasal 1</p>
        <table class="dasar-hukum">
            <tr>
                <td>(1)</td>
                <td>
                    <p class="text-justify">Undang-Undang Nomor 20 Tahun 2003 tentang Sistem Pendidikan Nasional (Lembaran Negara Republik Indonesia Tahun 2003 Nomor 78, Tambahan Lembaran Negara Republik Indonesia Nomor 4301);</p>
                </td>
            </tr>
            <tr>
                <td>(2)</td>
                <td>
                    <p class="text-justify">Undang-Undang Nomor 36 Tahun 2009 tentang Kesehatan (Lembaran Negara Republik Indonesia Tahun 2009 Nomor 144, Tambahan Lembaran Negara Republik Indonesia Nomor 5063);</p>
                </td>
            </tr>
            <tr>
                <td>(3)</td>
                <td>
                    <p class="text-justify">Undang-Undang Nomor 12 Tahun 2012 tentang Pendidikan Tinggi (Lembaran Negara Republik Indonesia Tahun 2012 Nomor 158,Tambahan Lembaran Negara Republik Indonesia Nomor 5336);</p>
                </td>
            </tr>
            <tr>
                <td>(4)</td>
                <td>
                    <p class="text-justify">Undang-Undang Nomor 36 Tahun 2014 tentang Tenaga Kesehatan (Lembaran Negara  Republik Indonesia Tahun 2014 Nomor 298,Tambahan Lembaran Negara Republik Indonesia Nomor 5607);</p>
                </td>
            </tr>
            <tr>
                <td>(5)</td>
                <td>
                    <p class="text-justify">Peraturan Presiden   Nomor 72 Tahun 2012 tentang  Sistem Kesehatan Nasional (Lembaran Negara Republik Indonesia Tahun 2012 Nomor 193);</p>
                </td>
            </tr>
            <tr>
                <td>(6)</td>
                <td>
                    <p class="text-justify">Peraturan Menteri Pendidikan dan Kebudayaan RI Nomor 73 Tahun 2013 tentang  Penerapan Kerangka Kualifikasi Nasional Indonesia Bidang Pendidikan Tinggi;</p>
                </td>
            </tr>
            <tr>
                <td>(7)</td>
                <td>
                    <p class="text-justify">Peraturan Menteri Pendidikan dan Kebudayaan RI Nomor 14 Tahun 2014 tentang Kerja Sama Perguruan Tinggi;</p>
                </td>
            </tr>
            <tr>
                <td>(8)</td>
                <td>
                    <p class="text-justify">Peraturan Menteri Keuangan, Nomor 55/PMK.05/2021 tentang Tarif Layanan Badan Layanan Umum Politeknik Kesehatan Kementerian Kesehatan Yogyakarta pada Kementerian Kesehatan;</p>
                </td>
            </tr>
            <tr>
                <td>(9)</td>
                <td>
                    <p class="text-justify">Peraturan Menteri Kesehatan Nomor 83 Tahun 2019 tentang Registrasi Tenaga Kesehatan (Berita Negara Republik Indonesia Tahun 2019 Nomor 16260);</p>
                </td>
            </tr>
            <tr>
                <td>(10)</td>
                <td>
                    <p class="text-justify">Peraturan Menteri Pendidikan dan Kebudayaan Nomor 3 Tahun 2020 tentang Standar Nasional Pendidikan Tinggi ( Berita Negara  Republik Indonesia Tahun 2020 Nomor 4733);</p>
                </td>
            </tr>
            <tr>
                <td>(11)</td>
                <td>
                    <p class="text-justify">Peraturan Menteri Kesehatan  Nomor 71 Tahun 2020 Tentang Organisasi Dan Tata Kerja Politeknik Kesehatan Di Lingkungan Kementerian Kesehatan (Berita Negara Republik Indonesia Tahun 2020 Nomor 1539);</p>
                </td>
            </tr>
            <tr>
                <td>(12)</td>
                <td>
                    <p class="text-justify">Peraturan Menteri Kesehatan  Nomor 5 Tahun 2023 Tentang Organisasi Dan Tata Kerja Kementerian Kesehatan (Berita Negara Republik Indonesia Tahun 2023 Nomor 156);</p>
                </td>
            </tr>
            <tr>
                <td>(13)</td>
                <td>
                    <p class="text-justify">Keputusan Menteri Keuangan Nomor 417/KMK.05/2011 tentang Penetapan Politeknik Kesehatan Yogyakarta pada Kementerian Kesehatan sebagai Instansi Pemerintah yang Menerapkan Pengelolaan Keuangan Badan Layanan Umum;</p>
                </td>
            </tr>
            <tr>
                <td>(14)</td>
                <td>
                    <p class="text-justify">Keputusan Menteri Pendidikan dan Kebudayaan Nomor: 355/E/O/2012 tentang Alih Bina Penyelenggaraan Program Studi yang diselenggarakan Poltekkes Kemenkes dari Kemenkes kepada Kementerian Pendidikan dan Kebudayaan;</p>
                </td>
            </tr>
            <tr>
                <td>(15)</td>
                <td>
                    <p class="text-justify">Keputusan Kepala Badan Pengembangan dan Pemberdayaan Sumber Daya Manusia Kesehatan Kementerian Kesehatan Nomor HK. 01.07/I/004287/2017 tentang Petunjuk Teknis Kerja sama Politeknik Kesehatan Kementerian Kesehatan dengan Perguruan Tinggi, Dunia Usaha dan Pihak Lain di Dalam Negeri.</p>
                </td>
            </tr>
        </table>
        <table class="paraf" border="1">
            <tr>
                <td>Paraf Pihak Pertama</td>
                <td>Paraf Pihak Kedua</td>
            </tr>
            <tr >
                <td height="30px"></td>
                <td></td>
            </tr>
        </table>
        <span class="hal">Hal 2 of 11</span>
    </div>
    <div class="page" style="">
        <p class="text-center text-content">KETENTUAN UMUM</p>
        <p class="text-center text-content">Pasal 2</p>
        <p class="text-justify text-content">Dalam Perjanjian Kerja Sama  ini yang dimaksud dengan:</p>
        <ol type="1" class="ol-content">
            <li class="text-justify">Politeknik Kesehatan Kemenkes Yogyakarta adalah Unit Pelaksana Teknis di lingkungan Kementerian Kesehatan yang berada di bawah dan bertanggung jawab kepada Direktorat Jenderal Tenaga Kesehatan yang menyelenggarakan Pendidikan vokasi di bidang kesehatan;  meliputi  6 (enam) Jurusan, terdiri dari :</li>
            <ol type="a">
                <li>Jurusan Teknologi Laboratorium Medis</li>
                <ol type="1">
                    <li>Program Studi Diploma Tiga Teknologi Laboratorium Medis</li>
                    <li>Program Sarjana Terapan  Teknologi Laboratorium Medis</li>
                </ol>
                <li>Jurusan Gizi</li>
                <ol type="1">
                    <li>Program Studi Diploma Tiga Gizi</li>
                    <li>Program Studi Sarjana Terapan Gizi dan Dietetika</li>
                    <li>Program Studi Pendidikan Profesi Dietisien</li>
                </ol>
                <li>Jurusan Kebidanan</li>
                <ol type="1">
                    <li>Program Studi Diploma Tiga Kebidanan</li>
                    <li>Program Studi Sarjana Terapan Kebidanan</li>
                    <li>Program Studi Profesi Bidan</li>
                    <li>Program Studi Diploma Tiga Rekam Medis dan Informasi Kesehatan</li>
                </ol>
                <li>Jurusan Keperawatan</li>
                <ol type="1">
                    <li>Program Studi Diploma Tiga Keperawatan</li>
                    <li>Program Studi Pendidikan Profesi Ners</li>
                    <li>Program Studi Sarjana Terapan  Keperawatan Anestesiologi</li>
                    <li>Program Studi Sarjana Terapan Keperawatan</li>
                </ol>
                <li>Jurusan Kesehatan Gigi</li>
                <ol type="1">
                    <li>Program Studi Diploma Tiga Kesehatan Gigi</li>
                    <li>Program Studi Sarjana Terapan Terapi Gigi</li>
                </ol>
                <li>Jurusan Kesehatan Lingkungan</li>
                <ol type="1">
                    <li>Program Studi Diploma Tiga Sanitasi Lingkungan</li>
                    <li>Program Studi Sarjana Terapan Sanitasi Lingkungan</li>
                </ol>
            </ol>
            <li class="text-justify">Direktur adalah jabatan tertinggi di Politeknik Kesehatan Kemenkes Yogyakarta yang bertanggung jawab dalam pelaksanaan pendidikan, penelitian, dan pengabdian kepada masyarakat di bidang kesehatan selanjutnya disebut Direktur Polkesyo</li>
        </ol>
        <table class="paraf" border="1">
            <tr>
                <td>Paraf Pihak Pertama</td>
                <td>Paraf Pihak Kedua</td>
            </tr>
            <tr >
                <td height="30px"></td>
                <td></td>
            </tr>
        </table>
        <span class="hal">Hal 3 of 11</span>
    </div>
    <div class="page" style="">
        <ol type="1" start="3" class="ol-content">
            <li class="text-justify">Direktur RUMAH SAKIT {{ $data->rs_name }} adalah jabatan tertinggi di RUMAH SAKIT {{ $data->rs_name }}</li>
            <li class="text-justify">Tri Dharma Perguruan Tinggi adalah kegiatan institusi perguruan tinggi yang meliputi pendidikan, penelitian, dan pengabdian kepada masyarakat.</li>
            <li class="text-justify">Peserta program pendidikan adalah mahasiswa yang mengikuti program pendidikan serta penelitian dan pengabdian kepada masyarakat.</li>
            <li class="text-justify">Pembimbing Lapangan adalah tenaga ahli yang ditunjuk dan diusulkan oleh RUMAH SAKIT {{ $data->rs_name }} kemudian ditetapkan dalam surat keputusan oleh Politeknik Kesehatan Kemenkes Yogyakarta dalam rangka memberikan bimbingan teknis di tempat praktik kepada peserta program pendidikan.</li>
            <li class="text-justify">Pembimbing adalah Dosen Pembimbing yang ditentukan oleh Poltekkes Kemenkes Yogyakarta dalam rangka memberikan bimbingan teknis di Institusi Pendidikan kepada peserta program pendidikan.</li>
        </ol>
        <p class="text-center text-content">DASAR DAN TUJUAN</p>
        <p class="text-center text-content">Pasal 3</p>
        <ol type="1" class="ol-content">
            <li class="text-justify">Perjanjian Kerja Sama ini disusun atas dasar kesamaaan tujuan, kepentingan, hak, dan kewajiban PARA PIHAK sesuai ketentuan yang ditetapkan dalam Perjanjian Kerja Sama  ini;</li>
            <li class="text-justify">Perjanjian Kerja Sama ini bertujuan untuk :</li>
            <ol type="a">
                <li class="text-justify">Meningkatkan pengalaman, pengetahuan, ketrampilan dan sikap peserta program pendidikan dari PIHAK PERTAMA di RUMAH SAKIT {{ $data->rs_name }} dan </li>
                <li class="text-justify">Menunjang dan meningkatkan pelaksanaan program-program kesehatan pada umumnya dan bidang kesehatan masyarakat pada khususnya di PIHAK KEDUA.</li>
            </ol>
        </ol>
        <p class="text-center text-content">RUANG LINGKUP DAN WILAYAH KERJA</p>
        <p class="text-center text-content">Pasal 4</p>
        <ol type="1" class="ol-content">
            <li class="text-justify">Perjanjian Kerja Sama ini disusun atas dasar kesamaaan tujuan, kepentingan, hak, dan kewajiban PARA PIHAK sesuai ketentuan yang ditetapkan dalam Perjanjian Kerja Sama  ini;</li>
            <li class="text-justify">Perjanjian Kerja Sama ini bertujuan untuk :</li>
            <ol type="a">
                <li class="text-justify">Ruang Lingkup Perjanjian Kerja Samaini adalah Pelaksanaan Tri Dharma Perguruan Tinggi yang meliputi Bimbingan Peserta Didik Klinis/Non Klinis dan Praktik Kerja Lapangan, Penelitian, Pengabdian dan Kunjungan Mahasiswa serta bidang lain sepanjang tidak menyimpang dari dasar dan tujuan dari Perjanjian Kerja Sama  ini yang telah disepakati oleh PARA PIHAK.</li>
                <li class="text-justify">Wilayah Kerja dari Perjanjian Kerja Sama ini adalah unit yang berkaitan dengan program pendidikan dan bidang lain yang dianggap perlu yang ada pada lokasi milik PIHAK KEDUA.</li>
            </ol>
        </ol>
        <table class="paraf" border="1">
            <tr>
                <td>Paraf Pihak Pertama</td>
                <td>Paraf Pihak Kedua</td>
            </tr>
            <tr >
                <td height="30px"></td>
                <td></td>
            </tr>
        </table>
        <span class="hal">Hal 4 of 11</span>
    </div>
    <div class="page" style="">
        <p class="text-center text-content">HAK DAN KEWAJIBAN</p>
        <p class="text-center text-content">Pasal 5</p>
        <ol type="1" class="ol-content">
            <li>PIHAK PERTAMA berhak :</li>
            <ol type="a">
                <li class="text-justify">Mengirimkan dan menyerahkan peserta program pendidikan untuk melaksanakan kegiatan Bimbingan Peserta Didik Klinis/Non Klinis dan Praktik Kerja Lapangan, Kerja Pengabdian, Penelitian dan Kunjungan Mahasiswa di lingkungan PIHAK KEDUA;</li>
                <li class="text-justify">Mendapatkan fasilitas, sarana, dan prasarana dari PIHAK KEDUA sesuai dengan tujuan pendidikannya dengan koordinasi dengan pimpinan dari PIHAK KEDUA;</li>
                <li class="text-justify">Mendapatkan koordinasi oleh orang yang ditunjuk oleh PIHAK KEDUA untuk keperluan pendidikan, penelitian, dan pengabdian masyarakat;</li>
                <li class="text-justify">Meminta bantuan kepada Sumber Daya Manusia dari PIHAK KEDUA guna kepentingan kemajuan proses pendidikan selama tidak menggangu jam kerja; dan</li>
                <li class="text-justify">Mendapatkan penilaian hasil kegiatan peserta program pendidikan dari PIHAK KEDUA.</li>
            </ol>
            <li>PIHAK KEDUA berhak : </li>
            <ol type="a">
                <li class="text-justify">Menetapkan kebijakan yang berkaitan dengan kegiatan kerja pengabdian, penelitian, kunjungan mahasiswa dan administrasi keuangan di lingkungan PIHAK KEDUA;</li>
                <li class="text-justify">Mengelola semua jenis penerimaan yang diperoleh sebagai akibat penggunaan Sumber Daya Manusia, Fasilitas/Sarana dan Prasarana dan pasien rumah sakit dalam pelayanan kesehatan untuk kegiatan pendidikan; </li>
                <li class="text-justify">Mengusulkan kepada PIHAK PERTAMA tentang pemberian sanksi atas setiap pelanggaran yang dilakukan oleh peserta program pendidikan atau Dosen PIHAK PERTAMA yang bertugas di lingkungan PIHAK KEDUA terhadap peraturan yang berlaku; dan</li>
                <li class="text-justify">Mengatur jadwal, waktu, dan tempat bagi peserta program pendidikan bedasarkan kesepakatan PIHAK PERTAMA.</li>
                <li class="text-justify">Melibatkan peserta didik dalam program Peningkatan Mutu dan Keselamatan Pasien rumah sakit dan di unit-unit wahana praktik.</li>
                <li class="text-justify">Menjaga keseimbangan rasio antara dosen pembimbing dengan peserta didik dengan ketentuan rasio 1:7.</li>
                <li class="text-justify">Menjaga keseimbangan rasio Peserta Program Pendidikan dengan jumlah pasien agar fungsi pelayanan tetap berjalan dengan baik.</li>
                <li class="text-justify">Berhak mendapatkan biaya/kompensasi yang muncul sebagai akibat adanya Kerja Sama ini.</li>
            </ol>
        </ol>
        <table class="paraf" border="1">
            <tr>
                <td>Paraf Pihak Pertama</td>
                <td>Paraf Pihak Kedua</td>
            </tr>
            <tr >
                <td height="30px"></td>
                <td></td>
            </tr>
        </table>
        <span class="hal">Hal 5 of 11</span>
    </div>
    <div class="page" style="">
        <ol type="1" start="3" class="ol-content">
            <li>PIHAK PERTAMA berkewajiban :</li>
            <ol type="a">
                <li class="text-justify">Menyediakan pedoman praktik, daftar hadir, format evaluasi  kegiatan pengabdian, penelitian dan kunjungan mahasiswa;</li>
                <li class="text-justify">Mengadakan orientasi dan janji peserta didik sebelum melakukan praktik kerja lapangan di rumah sakit.</li>
                <li class="text-justify">Mengadakan pertemuan dengan unit terkait sebagai sarana evaluasi dan koordinasi pelaksanaan sebagai sarana evaluasi dan koordinasi pelaksanaan Perjanjian Kerja Sama ;</li>
                <li class="text-justify">Mengganti kerugian atas peralatan/fasilitas/buku perpustakaan milik PIHAK KEDUA yang rusak/hilang akibat kelalaian/kecerobohan peserta program pendidikan PIHAK PERTAMA;</li>
                <li class="text-justify">Menanggung biaya yang timbul sebagai akibat pelaksanaan Perjanjian Kerja Sama  ini sesuai dengan ketentuan dan peratururan perundang-undangan yang berlaku; </li>
                <li class="text-justify">Melakukan supervisi pada peserta program pendidikan;</li>
                <li class="text-justify">Menjamin peserta program pendidikan yang dikirim dapat mengikuti peraturan dan disiplin yang berlaku di lingkungan PIHAK KEDUA;</li>
                <li class="text-justify">Memberikan pembekalan kepada peserta program pendidikan sebelum pelaksanaan praktik tentang hal-hal yang boleh/tidak boleh dilakukan sesuai dengan kompetensi; dan</li>
                <li class="text-justify">Mematuhi ketentuan yang telah disepakati dan Perjanjian Kerja Sama  ini.</li>
                <li class="text-justify">Menyelesaikan administrasi sebelum kegiatan dilakukan.</li>
                <li class="text-justify">Memberikan kesempatan kepada SDM Pihak KEDUA untuk mengembangkan diri melalui kegiatan pendidikan, pelatihan yang diselenggarakan PIHAK PERTAMA yang diatur tersendiri.</li>
            </ol>
            <li>PIHAK KEDUA berkewajiban : </li>
            <ol type="a">
                <li class="text-justify">Menyediakan tempat sebagai lokasi kerja pengabdian, penelitian dan kunjungan mahasiswa sesuai dengan bidang pendidikan peserta program pendidikan PIHAK PERTAMA; </li>
                <li class="text-justify">Memberikan pembekalan berupa orientasi umum dan khusus kepada peserta didik sebelum melakukan praktik kerja lapangan di rumah sakit, dengan materi orientasi berupa :</li>
                <ol type="1">
                    <li>Program Pencegahan dan pengendalian infeksi</li>
                    <li>Program Peningkatan Mutu dan Keselamatan Pasien</li>
                    <li>Sasaran Keselamatan Pasien</li>
                    <li>Program Keselamatan Penggunaan Obat</li>
                    <li>Program Pencegahan Resistensi Obat</li>
                    <li>Hand Hygiene </li>
                    <li>Bantuan Hidup Dasar</li>
                </ol>
            </ol>
        </ol>
        <table class="paraf" border="1">
            <tr>
                <td>Paraf Pihak Pertama</td>
                <td>Paraf Pihak Kedua</td>
            </tr>
            <tr >
                <td height="30px"></td>
                <td></td>
            </tr>
        </table>
        <span class="hal">Hal 6 of 11</span>
    </div>
    <div class="page" style="">
        <ol type="1" class="ol-content">
            <ol type="a" start="3">
                <ol type="1" start="8" class="ol-content">
                    <li>Penggunaan APAR (Alat Pemadam Api Ringan)</li>
                    <li>Komunikasi Therapeutik dan Komunikasi Efektif</li>
                    <li>Service Exellence</li>
                </ol>
                <li class="text-justify">Mengatur kelancaran pelaksanaan pendidikan, pelatihan, penelitian dan pelayanan yang dikoordinasikan kepada pihak yang ditunjuk oleh PIHAK KEDUA;</li>
                <li class="text-justify">Memberikan kesempatan kepada peserta program pendidikan untuk melakukan kegiatan kerja pengabdian, penelitian dan kunjungan mahasiswa dalam batas kewenangan peserta program pendidikan;</li>
                <li class="text-justify">Menyediakan informasi, sarana dan prasarana kegiatan pendidikan, pelatihan dan penelitian sesuai kemampuan PIHAK KEDUA; </li>
                <li class="text-justify">Memberikan evaluasi dan penilaian sesuai dengan tata cara yang telah ditentukan oleh PARA PIHAK; dan</li>
                <li class="text-justify">Mematuhi ketentuan yang telah disepakati dalam Perjanjian Kerja Sama  ini.</li>
                <li class="text-justify">Mengijinkan peserta program pendidikan dari PIHAK PERTAMA untuk memanfaatkan fasilitas perpustakaan PIHAK KEDUA sesuai dengan ketentuan yang berlaku.</li>
                <li class="text-justify">Melakukan survey kepuasan pasien terhadap keberadaan peserta didik klinis maupun non klinis.</li>
            </ol>
        </ol>
        <br>
        <p class="text-center text-content">PELAKSANAAN KEGIATAN </p>
        <p class="text-center text-content">Pasal 6</p>
        <ol class="ol-content" type="1">
            <li class="text-justify">Pelaksanaan kegiatan ini ditetapkan bersama oleh PARA PIHAK dengan melibatkan unit lain atau bagian yang terkait di lingkungan PARA PIHAK.</li>
            <li class="text-justify">Pengiriman peserta program pendidikan oleh PIHAK PERTAMA sesuai dengan jadwal, jumlah, dan jenis kegiatan yang dilakukan yang diatur dalam Perjanjian Kerja Sama  ini harus mendapatkan persetujuan dari PIHAK KEDUA.</li>
            <li class="text-justify">PARA PIHAK bersama-sama bertanggung jawab dalam menjaga dan meningkatkan sumber daya insani dari pihak masing-masing.</li>
            <li class="text-justify">Dalam hal pelaksanaan kegiatan sebagaimana dimaksud dalam Perjanjian Kerja Sama  ini akan dilakukan evaluasi secara berkala.</li>
        </ol>
        <table class="paraf" border="1">
            <tr>
                <td>Paraf Pihak Pertama</td>
                <td>Paraf Pihak Kedua</td>
            </tr>
            <tr >
                <td height="30px"></td>
                <td></td>
            </tr>
        </table>
        <span class="hal">Hal 7 of 11</span>
    </div>
    <div class="page" style="">
        <p class="text-center text-content">ADMINISTRASI DAN KEUANGAN </p>
        <p class="text-center text-content">Pasal 7</p>
        <ol class="ol-content" type="1">
            <li class="text-justify">Segala sesuatu yang berhubungan dengan administrasi, surat menyurat, tata tertib, pembekalan Praktik, dan koordinasi menjadi tanggung jawab PIHAK KEDUA;</li>
            <li class="text-justify">Segala biaya yang timbul sebagai akibat pelaksanaan Kerja Sama ini dibebankan kepada PIHAK PERTAMA dan atau pihak lain sesuai dengan aturan yang berlaku.</li>
        </ol>
        <p class="text-center text-content">JANGKA WAKTU</p>
        <p class="text-center text-content">Pasal 8</p>
        <ol class="ol-content" type="1">
            <li class="text-justify">Perjanjian Kerja Sama ini berlaku untuk jangka waktu 3 (tiga) Tahun terhitung sejak penandatanganan Perjanjian Kerja Sama ini.</li>
            <li class="text-justify">Jangka waktu Perjanjian Kerja Sama sebagaimana dimaksud pada ayat (1) dapat diperpanjang kembali dengan kesepakatan kedua PARA PIHAK, dengan ketentuan bahwa pihak yang akan mengakhiri atau yang memperpanjang perjanjian Kerja Sama ini harus memberitahukan maksud tersebut secara tertulis kepada pihak lainnya 1 (satu) bulan sebelum masa berakhirnya Perjanjian Kerja Sama ini.</li>
            <li class="text-justify">Pengakhiran Perjanjian Kerja Sama ini tidak membebaskan PARA PIHAK untuk menyelesaikan kewajibannnya yang sedang berjalan.</li>
        </ol>
        <p class="text-center text-content">SANKSI</p>
        <p class="text-center text-content">Pasal 9</p>
        <ol class="ol-content" type="1">
            <li class="text-justify">Apabila peserta program pendidikan dari PIHAK PERTAMA yang menggunakan atau memakai peralatan milik PIHAK KEDUA dalam rangka pelaksanaan kegiatan kerja pengabdian, penelitian dan kunjungan mahasiswa ternyata mengalami kerusakan atau hilang, maka PIHAK PERTAMA wajib mengganti peralatan tersebut.</li>
            <li class="text-justify">Apabila PIHAK PERTAMA tidak memenuhi kewajiban sebagaimana dimaksud pada ayat (1), maka PIHAK KEDUA berhak untuk membatalkan Perjanjian Kerja Sama  ini secara sepihak setelah melalui peringatan secara tertulis.</li>
        </ol>
        <table class="paraf" border="1">
            <tr>
                <td>Paraf Pihak Pertama</td>
                <td>Paraf Pihak Kedua</td>
            </tr>
            <tr >
                <td height="30px"></td>
                <td></td>
            </tr>
        </table>
        <span class="hal">Hal 8 of 11</span>
    </div>
    <div class="page" style="">
        <p class="text-center text-content">SEBAB KAHAR (FORCE MAJEURE) </p>
        <p class="text-center text-content">Pasal 10</p>
        <ol class="ol-content" type="1">
            <li class="text-justify">Apabila terjadi keadaan di luar kekuasaan (Force Majeure) PARA PIHAK yang mengakibatkan tidak dapat dilaksanakannya Perjanjian Kerja Sama ini, maka PARA PIHAK dibebaskan dari tanggung jawab atas keterlambatan atau kegagalan dalam memenuhi kewajiban yang tercantum dalam perjanjian ini;</li>
            <li class="text-justify">Peristiwa yang dapat digolongkan sebagai force majure antara lain adanya bencana alam (Gempa bumi, Banjir, Angin Topan, dll) wabah penyakit, perang, peledakan, revolusi, huru-hara dan kekacauan ekonomi/moneter yang berpengaruh pada perjanjian ini;</li>
            <li class="text-justify">Apabila terjadi force majure maka pihak yang lebih dahulu mengetahui wajib memberitahukan kepada pihak lainnya selambat lambatnya 14 (empat belas) hari kalender setelah terjadinya force majure untuk diselesaikan secara musyawarah untuk mufakat;</li>
            <li class="text-justify">Keadaan force majure sebagaimana dimaksud dalam pasal ini tidak dapat menghapuskan perjanjian, dan berdasarkan kesiapan kondisi, PARA PIHAK dapat melangsungkan Kerja Sama  sebagaimana mestinya.</li>
        </ol>
        <p class="text-center text-content">PENYELESAIAN PERSELISIHAN</p>
        <p class="text-center text-content">Pasal 11</p>
        <ol class="ol-content" type="1">
            <li class="text-justify">Apabila terjadi perselisihan, maka PARA PIHAK memberikan advokasi.</li>
            <li class="text-justify">Setiap perselisihan, pertentangan dan perbedaan pendapat yang timbul sebagai akibat pelaksanaan Perjanjian Kerja Sama ini sepanjang memungkinkan akan diselesaikan secara musyawarah mufakat oleh PARA PIHAK.</li>
        </ol>
        <p class="text-center text-content">PERUBAHAN</p>
        <p class="text-center text-content">Pasal 12</p>
        <ol class="ol-content" type="1">
            <li class="text-justify">Segala perubahan terhadap hal-hal yang diatur dalam Perjanjian Kerja Sama  ini hanya dapat dilakukan atas persetujuan tertulis dari PARA PIHAK dan merupakan bagian yang tidak terpisahkan dari Perjanjian Kerja Sama  ini.</li>
            <li class="text-justify">Hal-hal yang belum cukup diatur dalam Perjanjian Kerja Sama  ini akan diatur dalam perjanjian tersendiri berdasar kesepakatan PARA PIHAK dan akan dituangkan dalam suatu addendum (perjanjian tambahan) yang mengikat setelah ditanda tangani PARA PIHAK dan merupakan bagian yang tidak terpisahkan dari Perjanjian Kerja Sama  ini.</li>
        </ol>
        <table class="paraf" border="1">
            <tr>
                <td>Paraf Pihak Pertama</td>
                <td>Paraf Pihak Kedua</td>
            </tr>
            <tr >
                <td height="30px"></td>
                <td></td>
            </tr>
        </table>
        <span class="hal">Hal 9 of 11</span>
    </div>
    <div class="page" style="">
        <p class="text-center text-content">BERLAKUNYA PERJANJIAN </p>
        <p class="text-center text-content">Pasal 13</p>
        <ol class="ol-content" type="1">
            <li class="text-justify">Perjanjian Kerja Sama  ini berlaku sejak ditandatangani oleh  PARA PIHAK</li>
            <li class="text-justify">Segala ketentuan dan syarat dalam Perjanjian Kerja Sama  ini berlaku serta mengikat PARA PIHAK yang menandatangani sesuai dengan ketentuan yang berlaku.</li>
            <li class="text-justify">Perjanjian Kerja Sama  ini tidak berakhir apabila salah satu pihak yang menandatangani Perjanjian Kerja Sama  ini meninggal dunia atau adanya perubahan dan / atau mutasi jabatan dan / atau perubahan status badan hukum PIHAK PERTAMA maupun PIHAK KEDUA sehingga PARA PIHAK maupun yang menggantikan tetap terikat serta wajib  mentaati Perjanjian Kerja Sama  ini tanpa syarat.</li>
        </ol>
        <p class="text-center text-content">KETENTUAN LAIN-LAIN</p>
        <p class="text-center text-content">Pasal 14</p>
        <ol class="ol-content" type="1">
            <li class="text-justify">Perjanjian Kerja Sama ini tidak dapat dialihkan kepada pihak lain tanpa persetujuan  tertulis terlebih dahulu dari PARA PIHAK.</li>
            <li class="text-justify">Pemberitahuan, surat menyurat, komunikasi dan korespondensi dalam pelaksanaan Perjanjian Kerja Sama  ini akan diberitahukan atau disampaikan oleh salah satu pihak kepada pihak lainnya kepada alamat sebagai berikut:</li>
        </ol>
        <table border="0" style="margin-left:20px">
            <tr>
                <td class="font-weight-bold">PIHAK PERTAMA</td>
                <td>:</td>
            </tr>
            <tr>
                <td colspan="2">Direktur Politeknik Kesehatan Kemenkes Yogyakarta</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>: Jl. Tatabumi Nomor 3 Yogyakarta</td>
            </tr>
            <tr>
                <td>U.P.</td>
                <td>: PJ Kerja Sama</td>
            </tr>
            <tr>
                <td>Nomor Telepon</td>
                <td>: 0274-617601</td>
            </tr>
            <tr>
                <td>Email</td>
                <td>: kerjasama@poltekkesjogja.ac.id</td>
            </tr>
            <tr>
                <td></td>
                <td>  info@poltekkesjogja.ac.id</td>
            </tr>
            <tr>
                <td class="font-weight-bold">PIHAK KEDUA</td>
                <td>:</td>
            </tr>
            <tr>
                <td colspan="2">Direktur RUMAH SAKIT {{ $data->rs_name }}</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>: {{ $data->rs_address }}</td>
            </tr>
            <tr>
                <td>Telp</td>
                <td>: .........</td>
            </tr>
            <tr>
                <td>Email</td>
                <td>: .........</td>
            </tr>
        </table>
        <table class="paraf" border="1">
            <tr>
                <td>Paraf Pihak Pertama</td>
                <td>Paraf Pihak Kedua</td>
            </tr>
            <tr >
                <td height="30px"></td>
                <td></td>
            </tr>
        </table>
        <span class="hal">Hal 10 of 11</span>
    </div>
    <div class="page" style="">
        <ol class="ol-content" type="1" start="3">
            <li class="text-justify">(3)	Apabila setelah penandatanganan Perjanjian Kerja Sama  ini pemberlakuan atau perubahan terhadap suatu undang-undang, keputusan atau peraturan lain di Indonesia merugikan secara material terhadap kewajiban-kewajiban dari salah satu pihak berdasarkan Perjanjian Kerja Sama  ini, PARA PIHAK dengan itikad baik berunding dan melakukan perubahan dalam bentuk Perjanjian Tambahan (Addendum)  Perubahan tersebut setelah ditandatangi sebagaimana mestinya oleh PARA PIHAK akan merupakan satu kesatuan dan bagian yang tidak terpisahkan dari Perjanjian Kerja Sama  ini.</li>
        </ol>
        <p class="text-justify text-content">Perjanjian Kerja Sama ini ditandatangani oleh PARA PIHAK dibuat rangkap 2 (dua) bermeterai cukup yang diperuntukkan bagi PARA PIHAK, masing-masing sebagai aslinya dan mempunyai kekuatan hukum yang sama.</p>
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
        <table class="paraf" border="1">
            <tr>
                <td>Paraf Pihak Pertama</td>
                <td>Paraf Pihak Kedua</td>
            </tr>
            <tr >
                <td height="30px"></td>
                <td></td>
            </tr>
        </table>
        <span class="hal">Hal 11 of 11</span>
    </div>
    
    



    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <!-- tambahan -->
</body>

</html>
