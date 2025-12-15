@extends('templates.main')

@section('title')
    {{'List Category'}}
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
                    <h4 class="page-title">List Perjanjian Kerja Sama</h4>
                </div>
                <div class="page-rightheader ml-auto d-lg-flex d-none">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#" class="d-flex"><svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 3L2 12h3v8h6v-6h2v6h6v-8h3L12 3zm5 15h-2v-6H9v6H7v-7.81l5-4.5 5 4.5V18z"/><path d="M7 10.19V18h2v-6h6v6h2v-7.81l-5-4.5z" opacity=".3"/></svg><span class="breadcrumb-icon"> Home</span></a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.kerja.index') }}">List Perjanjian Kerja Sama</a></li>
                    </ol>
                </div>
            </div>
            <!--End Page header-->

            <!-- Row -->
            <div class="row">

                <div class="col-md-8 col-lg-8">
                    
                    <div class="card">
                        <div class="card-header">
                        </div>
                        <div class="card-body">
                            @include('layouts.alert')

                            <div class="table-responsive">
                                <table class="table table-bordered table-striped text-nowrap mb-0" id="example1">
                                    <thead >
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th class="text-right">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($kerjas as $key => $kerja)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $kerja->rs_name }}</td>
                                            
                                            <td class="text-right">
                                                <a href="{{ route('admin.kerja.cetak', ['id' => $kerja->id]) }}">
                                                    <button class="btn btn-sm btn-primary">Cetak</button>
                                                </a>
                                                <a href="{{ route('admin.kerja.edit', ['id' => $kerja->id]) }}">
                                                    <button class="btn btn-sm btn-success">Edit</button>
                                                </a>
    
                                                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                                    data-target="#delete{{ $kerja->id }}">
                                                    Delete
                                                </button>
    
                                                <!-- Modal -->
                                                <form action="{{ route('admin.kerja.destroy', ['id' => $kerja->id]) }}"
                                                    method="POST"class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="modal fade" id="delete{{ $kerja->id }}" tabindex="-1"
                                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Peringatan
                                                                    </h5>
                                                                    <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body text-left">
                                                                    Apakah Anda ingin menghapus data <b>{{ $kerja->rs_name }}</b>
                                                                    ?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit"
                                                                        class="btn btn-danger">Delete</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
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

                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Tambah Perjanjian Kerja Sama</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ @$edit_mode ? route('admin.kerja.update', ['id' => $detail->id]) : route('admin.kerja.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @if (@$edit_mode)
                                @method('PUT')
                                @endif
                                <div class="">
                                    <div class="form-group">
                                        <label for="name" class="form-label">Rumah Sakit :</label>
                                        <input type="text" name="rs_name" class="form-control @error('rs_name') is-invalid @enderror" id="rs_name" placeholder="RS. poltekkes" value="{{ @$edit_mode ? $detail->rs_name : old('rs_name') }}">
                                        @error('rs_name')
                                            <label id="name-error" class="error mt-2 text-danger" for="rs_name">{{$message}}</label>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="rs_address" class="form-label">Alamat :</label>
                                        <textarea name="rs_address" class="form-control @error('name') is-invalid @enderror" id="rs_address" placeholder="Alamat Rumah Sakit" cols="30" rows="10">{{ @$edit_mode ? $detail->rs_address : old('rs_address') }}</textarea>
                                        @error('rs_address')
                                            <label id="address-error" class="error mt-2 text-danger" for="rs_address">{{$message}}</label>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="rs_no" class="form-label">Nomor Surat Rs :</label>
                                        <input type="text" name="rs_no" class="form-control @error('rs_no') is-invalid @enderror" id="rs_no" placeholder="HK.03.01/5.11/08/2023" value="{{ @$edit_mode ? $detail->rs_no : old('rs_no') }}">
                                        @error('rs_no')
                                            <label id="rs_no-error" class="error mt-2 text-danger" for="rs_no">{{$message}}</label>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="poltekkes_no" class="form-label">Nomor Surat poltekkes :</label>
                                        <input type="text" name="poltekkes_no" class="form-control @error('poltekkes_no') is-invalid @enderror" id="poltekkes_no" placeholder="HK.03.01/5.11/08/2023" value="{{ @$edit_mode ? $detail->poltekkes_no : old('poltekkes_no') }}">
                                        @error('poltekkes_no')
                                            <label id="poltekkes_no-error" class="error mt-2 text-danger" for="poltekkes_no">{{$message}}</label>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="dr_name" class="form-label">Direktur :</label>
                                        <input type="text" name="dr_name" class="form-control @error('dr_name') is-invalid @enderror" id="dr_name" placeholder="Dr. Iswanto" value="{{ @$edit_mode ? $detail->dr_name : old('dr_name') }}">
                                        @error('dr_name')
                                            <label id="dr_name-error" class="error mt-2 text-danger" for="dr_name">{{$message}}</label>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="dr_nip" class="form-label">NIP :</label>
                                        <input type="text" name="dr_nip" class="form-control @error('dr_nip') is-invalid @enderror" id="dr_nip" placeholder="19280012882812" value="{{ @$edit_mode ? $detail->dr_nip : old('dr_nip') }}">
                                        @error('dr_nip')
                                            <label id="dr_nip-error" class="error mt-2 text-danger" for="dr_nip">{{$message}}</label>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="published_at" class="form-label">Tanggal Keluar :</label>
                                        <input type="date" name="published_at" class="form-control @error('published_at') is-invalid @enderror" id="published_at" placeholder="Dr. Iswanto" value="{{ @$edit_mode ? $detail->published_at : old('published_at') }}">
                                        @error('published_at')
                                            <label id="published_at-error" class="error mt-2 text-danger" for="published_at">{{$message}}</label>
                                        @enderror
                                    </div>
                                    
                                </div>
                                <button type="submit" class="btn btn-primary mt-2 mb-0">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
            <!-- End Row -->

        </div>
    </div>


{{-- {!! $kerjas->links() !!} --}}
</section>

</main>
    
@endsection