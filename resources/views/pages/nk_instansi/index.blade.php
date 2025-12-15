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
                    <h4 class="page-title">List Nota Kesepahaman Instansi</h4>
                </div>
                <div class="page-rightheader ml-auto d-lg-flex d-none">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#" class="d-flex"><svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 3L2 12h3v8h6v-6h2v6h6v-8h3L12 3zm5 15h-2v-6H9v6H7v-7.81l5-4.5 5 4.5V18z"/><path d="M7 10.19V18h2v-6h6v6h2v-7.81l-5-4.5z" opacity=".3"/></svg><span class="breadcrumb-icon"> Home</span></a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.nk_instansi.index') }}">List Nota Kesepahaman Instansi</a></li>
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
                                            <th>Nama</th>
                                            <th>Tanggal</th>
                                            <th class="text-right">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($drafts as $key => $draft)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $draft->name_instansi }}</td>
                                            <td>{{ $draft->start }}</td>
                                            
                                            <td class="text-right">
                                                <a href="{{ route('admin.nk_instansi.download', ['id' => $draft->id]) }}">
                                                    <button class="btn btn-sm btn-primary">Download Dokumen</button>
                                                </a>
                                                <a href="{{ route('admin.nk_instansi.edit', ['id' => $draft->id]) }}">
                                                    <button class="btn btn-sm btn-success">Edit</button>
                                                </a>
    
                                                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                                    data-target="#delete{{ $draft->id }}">
                                                    Delete
                                                </button>
    
                                                <!-- Modal -->
                                                <form action="{{ route('admin.nk_instansi.destroy', ['id' => $draft->id]) }}"
                                                    method="POST"class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="modal fade" id="delete{{ $draft->id }}" tabindex="-1"
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
                                                                    Apakah Anda ingin menghapus data <b>{{ $draft->name_instansi }}</b>
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
                            <h4 class="card-title">Tambah draft Kesepahaman</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ @$edit_mode ? route('admin.nk_instansi.update', ['id' => $detail->id]) : route('admin.nk_instansi.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @if (@$edit_mode)
                                @method('PUT')
                                @endif
                                <div class="">
                                    <div class="form-group">
                                        <label for="image" class="form-label">Logo :</label>
                                        <input type="file" name="image" class="dropify" id="image" placeholder="image"  data-default-file="{{ @$edit_mode ? asset('uploads/' . $detail->image) : '' }}">
                                        @error('image')
                                            <label id="logo-error" class="error mt-2 text-danger" for="image">{{$message}}</label>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="name" class="form-label">Nama Instansi :</label>
                                        <input type="text" name="name_instansi" class="form-control @error('name_instansi') is-invalid @enderror" id="name_instansi" placeholder="Nama Instansi" value="{{ @$edit_mode ? $detail->name_instansi : old('name_instansi') }}">
                                        @error('name_instansi')
                                            <label id="name-error" class="error mt-2 text-danger" for="name_instansi">{{$message}}</label>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="address" class="form-label">Alamat :</label>
                                        <textarea name="address" class="form-control @error('name') is-invalid @enderror" id="address" placeholder="Alamat Instansi" cols="30" rows="10">{{ @$edit_mode ? $detail->address : old('address') }}</textarea>
                                        @error('address')
                                            <label id="address-error" class="error mt-2 text-danger" for="address">{{$message}}</label>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="no_instansi" class="form-label">Nomor Surat Instansi :</label>
                                        <input type="text" name="no_instansi" class="form-control @error('no_instansi') is-invalid @enderror" id="no_instansi" placeholder="HK.03.01/5.11/08/2023" value="{{ @$edit_mode ? $detail->no_instansi : old('no_instansi') }}">
                                        @error('no_instansi')
                                            <label id="no_instansi-error" class="error mt-2 text-danger" for="no_instansi">{{$message}}</label>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="no_poltekes" class="form-label">Nomor Surat Poltekkes :</label>
                                        <input type="text" name="no_poltekes" class="form-control @error('no_poltekes') is-invalid @enderror" id="no_poltekes" placeholder="HK.03.01/5.11/08/2023" value="{{ @$edit_mode ? $detail->no_poltekes : old('no_poltekes') }}">
                                        @error('no_poltekes')
                                            <label id="no_poltekes-error" class="error mt-2 text-danger" for="no_poltekes">{{$message}}</label>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="name" class="form-label">Nama Pihak 1 :</label>
                                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Dr. Iswanto" value="{{ @$edit_mode ? $detail->name : old('name') }}">
                                        @error('name')
                                            <label id="name-error" class="error mt-2 text-danger" for="name">{{$message}}</label>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="position" class="form-label">Jabatan :</label>
                                        <input type="text" name="position" class="form-control @error('position') is-invalid @enderror" id="position" placeholder="Kepala Pimpinan / Sekretaris" value="{{ @$edit_mode ? $detail->position : old('position') }}">
                                        @error('position')
                                            <label id="position-error" class="error mt-2 text-danger" for="position">{{$message}}</label>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="nip" class="form-label">NIP :</label>
                                        <input type="text" name="nip" class="form-control @error('nip') is-invalid @enderror" id="nip" placeholder="111221333232" value="{{ @$edit_mode ? $detail->nip : old('nip') }}">
                                        @error('nip')
                                            <label id="nip-error" class="error mt-2 text-danger" for="nip">{{$message}}</label>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="phone" class="form-label">Nomor Telepon :</label>
                                        <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" id="phone" placeholder="08xx.xxxx.xxxx" value="{{ @$edit_mode ? $detail->phone : old('phone') }}">
                                        @error('phone')
                                            <label id="phone-error" class="error mt-2 text-danger" for="phone">{{$message}}</label>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="form-label">Email :</label>
                                        <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="ahmadYani@gmail.com" value="{{ @$edit_mode ? $detail->email : old('email') }}">
                                        @error('email')
                                            <label id="email-error" class="error mt-2 text-danger" for="email">{{$message}}</label>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="start" class="form-label">Tanggal Mulai :</label>
                                        <input type="date" name="start" class="form-control @error('start') is-invalid @enderror" id="start" placeholder="Dr. Iswanto" value="{{ @$edit_mode ? $detail->start : old('start') }}">
                                        @error('start')
                                            <label id="start-error" class="error mt-2 text-danger" for="start">{{$message}}</label>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="end" class="form-label">Tanggal Selesai :</label>
                                        <input type="date" name="end" class="form-control @error('end') is-invalid @enderror" id="end" placeholder="Dr. Iswanto" value="{{ @$edit_mode ? $detail->end : old('end') }}">
                                        @error('end')
                                            <label id="end-error" class="error mt-2 text-danger" for="end">{{$message}}</label>
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


{{-- {!! $drafts->links() !!} --}}
</section>

</main>
    
@endsection