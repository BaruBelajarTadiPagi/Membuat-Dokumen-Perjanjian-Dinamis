<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\N_kesepahaman;
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
use PhpOffice\PhpWord\TemplateProcessor;
use WordTemplate;

class NKesepahamanController extends Controller
{
    public function index()
    {
        //
        $data['drafts'] = N_kesepahaman::latest()->get();
        return view('pages.nota_kesepahaman.index', $data);
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
            'name_instansi' => 'required',
            'no_instansi' => 'required',
            'no_poltekes' => 'required',
            'start' => 'required',
            'end' => 'required',
            'name' => 'required',
            'position' => 'required',
            'address' => 'required',
            'image' => 'required|file|mimes:jpg,png|max:10240',
            'nip' => 'required',
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
            'name_instansi' => $request->name_instansi,
            'no_instansi' => $request->no_instansi,
            'no_poltekes' => $request->no_poltekes,
            'start' => $request->start,
            'end' => $request->end,
            'name' => $request->name,
            'position' => $request->position,
            'address' => $request->address,
            'nip' => $request->nip,
        );
        if ($request->has('image')) {
            $image = Storage::disk('uploads')->put('n_kesepahaman', $request->image);
            $object['image'] = $image;
        }
        N_kesepahaman::create($object);
        return redirect()->route('admin.nota_kesepahaman.index')
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
        $detail = N_kesepahaman::findorfail($id);
        // dd($article->toArray());
        $data['page_title'] = 'Update Category';
        $data['edit_mode'] = true;
        $data['edit_password'] = false;
        $data['detail'] = $detail;
        $data['drafts'] = N_kesepahaman::latest()->get();
        return view('pages.nota_kesepahaman.index', $data);
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
            'name_instansi' => 'required',
            'no_instansi' => 'required',
            'no_poltekes' => 'required',
            'start' => 'required',
            'end' => 'required',
            'name' => 'required',
            'position' => 'required',
            'address' => 'required',
            'image' => 'required|file|mimes:jpg,png|max:10240',
            'nip' => 'required',
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
            'name_instansi' => $request->name_instansi,
            'no_instansi' => $request->no_instansi,
            'no_poltekes' => $request->no_poltekes,
            'start' => $request->start,
            'end' => $request->end,
            'name' => $request->name,
            'position' => $request->position,
            'address' => $request->address,
            'nip' => $request->nip,
        );
        
        $current = N_kesepahaman::findOrFail($id);
        
        if ($request->has('image')) {
            $image = Storage::disk('uploads')->put('n_kesepahaman', $request->image);
            $object['image'] = $image;
            // dd($object['avatar']);
            if ($current->image) {
                File::delete('./uploads/' . $current->image);
            }
        }
        
        $lastpost = $current->update($object);
        return redirect()->route('admin.nota_kesepahaman.index')
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
        $data = N_kesepahaman::where('id', $id)->firstOrFail();
        File::delete('./uploads/' . $data->image);
        $data->delete();
        return redirect()->route('admin.nota_kesepahaman.index')
            ->with(['notif_status' => '1', 'notif' => 'Delete data succeed.']);
    }
    
    public function download($id)
    {
        $data = N_kesepahaman::findOrFail($id);
        $template = new TemplateProcessor('uploads/template/word/template-n-kesepahaman.docx');

        $template->setValue('N_NAMA_INSTANSI', $data->name_instansi);
        $template->setValue('N_NO_INSTANSI', $data->no_instansi);
        $template->setValue('N_NO_POLTEKES', $data->no_poltekes);
        $template->setValue('N_START', $data->start);
        $template->setValue('N_END', $data->end);
        $template->setValue('N_NAME', $data->name);
        $template->setValue('N_JABATAN', $data->position);
        $template->setValue('N_ALAMAT', $data->address);
        $template->setValue('N_NIP', $data->nip);

        $fileName = $data->no_instansi.'-N_Kesepahaman';
        $template->saveAs($fileName.'.docx');
        return response()->download($fileName.'.docx')->deleteFileAfterSend(true);
    }
}
