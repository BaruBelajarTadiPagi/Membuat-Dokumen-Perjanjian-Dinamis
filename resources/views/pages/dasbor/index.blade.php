@extends('templates.main')

@section('title')
    {{'List Masa Tenggang Berkas'}}
@endsection
@section('head')
    <!-- Data table css -->
		<link href="{{ asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
		<link href="{{ asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}"  rel="stylesheet">
		<link href="{{ asset('assets/plugins/datatable/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
        
		<!-- File Uploads css-->
        <link href="{{ asset('assets/plugins/fileupload/css/fileupload.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('js')
    <!-- Data tables -->
		<script src="{{ asset('assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>
		<script src="{{ asset('assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
		<script src="{{ asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
		<script src="{{ asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>
		<script src="{{ asset('assets/plugins/datatable/js/jszip.min.js') }}"></script>
		<script src="{{ asset('assets/plugins/datatable/js/pdfmake.min.js') }}"></script>
		<script src="{{ asset('assets/plugins/datatable/js/vfs_fonts.js') }}"></script>
		<script src="{{ asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
		<script src="{{ asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
		<script src="{{ asset('assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
		<script src="{{ asset('assets/plugins/datatable/dataTables.responsive.min.js') }}"></script>
		<script src="{{ asset('assets/plugins/datatable/responsive.bootstrap4.min.js') }}"></script>
		<script src="{{ asset('assets/js/datatables.js') }}"></script>
        <!-- File uploads js -->
		<script src="{{ asset('assets/js/filupload.js') }}"></script>
        <script src="{{ asset('assets/plugins/fileupload/js/dropify.js') }}"></script>
        <script>
            $(document).ready(function() {
                $('.dropify').dropify({
                    messages: {
                        'default': 'Drag and drop a file here or click',
                        'replace': 'Drag and drop or click to replace',
                        'remove': 'Remove',
                        'error': 'Ooops, something wrong appended.'
                    },
                    error: {
                        'fileSize': 'The file size is too big (2M max).'
                    }
                });
            });
        </script>
@endsection

@section('main')
<main id="main" class="main">
<section>
    <div class="app-content page-body">
        <div class="container">

            <!--Page header-->
            <div class="page-header">
                <div class="page-leftheader">
                    <h4 class="page-title">List Masa Tenggang Berkas</h4>
                </div>
                <div class="page-rightheader ml-auto d-lg-flex d-none">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#" class="d-flex"><svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 3L2 12h3v8h6v-6h2v6h6v-8h3L12 3zm5 15h-2v-6H9v6H7v-7.81l5-4.5 5 4.5V18z"/><path d="M7 10.19V18h2v-6h6v6h2v-7.81l-5-4.5z" opacity=".3"/></svg><span class="breadcrumb-icon"> Home</span></a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.draft.index') }}">List Masa Tenggang Berkas</a></li>
                    </ol>
                </div>
            </div>
            <!--End Page header-->

            <!-- Row -->
            <div class="row">

                <div class="col-12">
                    
                    <div class="card">
                        <div class="card-header">
                        </div>
                        <div class="card-body">
                            @include('layouts.alert')

                            <div class="table-responsive">
                                <table class="table table-bordered table-striped text-nowrap mb-0" id="example">
                                    <thead >
                                        <tr>
                                            <th>No</th>
                                            <th>Jenis Berkas</th>
                                            <th>Nama Instansi</th>
                                            <th>Tanggal</th>
                                            <th class="text-right">Masa berlaku</th>
                                            <th class="text-right">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($drafts as $key => $draft)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $draft['jenis_berkas'] }}</td>
                                            <td>{{ $draft['nama_instansi'] }}</td>
                                            <td>{{ date('d M Y', strtotime($draft['start'])) }} - {{ date('d M Y', strtotime($draft['end'])) }}</td>
                                            <td class="text-right"><span class="badge badge-pill badge-warning mt-2">{{ $draft['days'].' Hari' }}</span></td>
                                            <td class="text-right">
                                                <a download="" href="{{ $draft['link'] }}">
                                                    <button class="btn btn-sm btn-primary">Download Dokumen</button>
                                                </a>
                                               
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- table-responsive -->
                        </div>
                    </div>
                </div>

            </div>
            <!-- End Row -->

        </div>
    </div>


{{-- {!! $drafts->links() !!} --}}
</section>

</main>
    
@endsection