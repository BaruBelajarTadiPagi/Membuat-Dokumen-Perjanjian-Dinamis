<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nota;
use Storage;
use Validator;
use File;
use Carbon\Carbon;
use PDF;
use SimpleSoftwareIO\QrCode\Generator;
use Illuminate\Routing\UrlGenerator;
use Illuminate\Support\Facades\Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\DB;

class NotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['notas'] = Nota::latest()->get();
        return view('pages.nota.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'rs_name' => 'required',
            'rs_address' => 'required',
            'rs_no' => 'required',
            'poltekkes_no' => 'required',
            'dr_name' => 'required',
            'dr_nip' => 'required',
            'published_at' => 'required',
            'rs_logo' => 'required|file|mimes:jpg,png|max:10240',
        );
        $validator = Validator::make($request->all(), $rules, $messages = [
            'required' => 'The :attribute field is required.',
            'file' => 'The :attribute must be a file.',
            'mimes' => 'The :attribute must be a file of type: :values.',
            'max' => 'Maksimal ukuran 10 mb.',
        ]);

        // dd($request->all());
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->with(['notif_status' => '0', 'notif' => 'Insert data failed.'])
                ->withInput();
        }
        $object = array(
            'rs_name' => $request->rs_name,
            'rs_no' => $request->rs_no,
            'rs_address' => $request->rs_address,
            'poltekkes_no' => $request->poltekkes_no,
            'dr_name' => $request->dr_name,
            'dr_nip' => $request->dr_nip,
            'published_at' => $request->published_at,
        );
        if ($request->has('rs_logo')) {
            $logo = Storage::disk('uploads')->put('logo-rs', $request->rs_logo);
            $object['rs_logo'] = $logo;
        }
        Nota::create($object);
        return redirect()->route('admin.nota.index')
            ->with(['notif_status' => '1', 'notif' => 'Insert data succeed.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $detail = Nota::find($id);
        // dd($article->toArray());
        $data['page_title'] = 'Update Category';
        $data['edit_mode'] = true;
        $data['edit_password'] = false;
        $data['detail'] = $detail;
        $data['notas'] = Nota::latest()->get();
        return view('pages.nota.index', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $rules = array(
            'rs_name' => 'required',
            'rs_address' => 'required',
            'rs_no' => 'required',
            'poltekkes_no' => 'required',
            'dr_name' => 'required',
            'dr_nip' => 'required',
            'published_at' => 'required',
        );
        $validator = Validator::make($request->all(), $rules, $messages = [
            'required' => 'The :attribute field is required.',
            'file' => 'The :attribute must be a file.',
            'mimes' => 'The :attribute must be a file of type: :values.',
            'max' => 'Maksimal ukuran 10 mb.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->with(['notif_status' => '0', 'notif' => 'Insert data failed.'])
                ->withInput();
        }
        $object = array(
            'rs_name' => $request->rs_name,
            'rs_no' => $request->rs_no,
            'rs_address' => $request->rs_address,
            'poltekkes_no' => $request->poltekkes_no,
            'dr_name' => $request->dr_name,
            'dr_nip' => $request->dr_nip,
            'published_at' => $request->published_at,
        );
        
        $current = Nota::findOrFail($id);
        
        if ($request->has('rs_logo')) {
            $logo = Storage::disk('uploads')->put('logo-rs', $request->rs_logo);
            $object['rs_logo'] = $logo;
            // dd($object['avatar']);
            if ($current->rs_logo) {
                File::delete('./uploads/' . $current->rs_logo);
            }
        }
        
        $lastpost = $current->update($object);
        return redirect()->route('admin.nota.index')
            ->with(['notif_status' => '1', 'notif' => 'Update data succeed.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $category = Nota::where('id', $id)->firstOrFail();
        File::delete('./uploads/' . $category->rs_logo);
        $category->delete();
        return redirect()->route('admin.nota.index')
            ->with(['notif_status' => '1', 'notif' => 'Delete data succeed.']);
    }
    public function cetak($id)
    {
        //
        $result = Nota::where('id',$id)->firstOrFail();
        $hari = Carbon::parse($result->published_at)->isoFormat('dddd');
        $tanggal = Carbon::parse($result->published_at)->isoFormat('D');
        $bulan = Carbon::parse($result->published_at)->isoFormat('MMMM');
        $bl = Carbon::parse($result->published_at)->isoFormat('M');
        $tahun = Carbon::parse($result->published_at)->isoFormat('Y');
        // $qr_url = url('/sertifikat', $result->code);

        // $data["qr_url"] = $qr_url;
        $data['hari'] = $hari;
        $data['tanggal'] = $tanggal;
        $data['bulan'] = $bulan;
        $data['tahun'] = $tahun;
        $data['bl'] = $bl;
        $data['data'] = $result;
        // dd($data);  
        // $customPaper = array(0, 0, 581.28, 433.00);
        $pdf = PDF::loadview('pages.nota.export-pdf', $data)->setPaper('A4','potrait');
        return $pdf->stream();
        // return $pdf->download('lbaganesha_.pdf');
        // return view('pages.nota.export-pdf', $data);
    }
}
