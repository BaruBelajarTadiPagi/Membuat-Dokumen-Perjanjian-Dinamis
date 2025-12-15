<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Np_kerjasama;
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

class NpKerjasamaController extends Controller
{
    public function index()
    {
        //
        $data['drafts'] = Np_kerjasama::latest()->get();
        return view('pages.pks.index', $data);
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
            $image = Storage::disk('uploads')->put('np_kerjasama', $request->image);
            $object['image'] = $image;
        }
        Np_kerjasama::create($object);
        return redirect()->route('admin.pks.index')
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
        $detail = Np_kerjasama::findorfail($id);
        // dd($article->toArray());
        $data['page_title'] = 'Update Category';
        $data['edit_mode'] = true;
        $data['edit_password'] = false;
        $data['detail'] = $detail;
        $data['drafts'] = Np_kerjasama::latest()->get();
        return view('pages.pks.index', $data);
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

        $current = Np_kerjasama::findOrFail($id);

        if ($request->has('image')) {
            $image = Storage::disk('uploads')->put('np_kerjasama', $request->image);
            $object['image'] = $image;
            // dd($object['avatar']);
            if ($current->image) {
                File::delete('./uploads/' . $current->image);
            }
        }

        $lastpost = $current->update($object);
        return redirect()->route('admin.pks.index')
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
        $data = Np_kerjasama::where('id', $id)->firstOrFail();
        File::delete('./uploads/' . $data->image);
        $data->delete();
        return redirect()->route('admin.pks.index')
            ->with(['notif_status' => '1', 'notif' => 'Delete data succeed.']);
    }

    public function download($id)
    {
        $data = Np_kerjasama::findOrFail($id);
        $template = new TemplateProcessor('uploads\template\word\NP_KERJASAMA.docx');

        $template->setValue('NP_NAMA_INSTANSI', $data->name_instansi);
        $template->setValue('NP_NO_INSTANSI', $data->no_instansi);
        $template->setValue('NP_NO_POLTEKES', $data->no_poltekes);

        $start = Carbon::parse($data->start);
        $template->setValue('NP_START_d', $start->format('d'));
        $template->setValue('NP_START_m', $start->format('F Y'));

        $end = Carbon::parse($data->end);
        $template->setValue('NP_END_d', $end->format('d'));
        $template->setValue('NP_END_m', $end->format('F Y'));

        $template->setValue('NP_SELESAI', $data->end);
        $template->setValue('NP_ALAMAT', $data->address);
        $template->setValue('NP_NAMA', $data->name);
        $template->setValue('NP_JABATAN', $data->position);
        $template->setValue('NP_NIP', $data->nip);

        $fileName = $data->no_instansi.'-NP_Kerjasama';
        $template->saveAs($fileName.'.docx');
        return response()->download($fileName.'.docx')->deleteFileAfterSend(true);
    }
}
