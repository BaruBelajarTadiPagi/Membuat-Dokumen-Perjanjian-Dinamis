<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nk_instansi;
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

class NkInstansiController extends Controller
{
    public function index()
    {
        //
        $data['drafts'] = Nk_instansi::latest()->get();
        return view('pages.nk_instansi.index', $data);
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
            'phone' => 'required',
            'email' => 'required',
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
            'image' => $request->image,
            'phone' => $request->phone,
            'email' => $request->email,
            'nip' => $request->nip,
        );
        if ($request->has('image')) {
            $image = Storage::disk('uploads')->put('nk_instansi', $request->image);
            $object['image'] = $image;
        }
        Nk_instansi::create($object);
        return redirect()->route('admin.nk_instansi.index')
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
        $detail = Nk_instansi::findorfail($id);
        // dd($article->toArray());
        $data['page_title'] = 'Update Category';
        $data['edit_mode'] = true;
        $data['edit_password'] = false;
        $data['detail'] = $detail;
        $data['drafts'] = Nk_instansi::latest()->get();
        return view('pages.nk_instansi.index', $data);
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
            'phone' => 'required',
            'email' => 'required',
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
            'image' => $request->image,
            'phone' => $request->phone,
            'email' => $request->email,
            'nip' => $request->nip,
        );

        $current = Nk_instansi::findOrFail($id);

        if ($request->has('image')) {
            $image = Storage::disk('uploads')->put('nk_instansi', $request->image);
            $object['image'] = $image;
            // dd($object['avatar']);
            if ($current->image) {
                File::delete('./uploads/' . $current->image);
            }
        }

        $lastpost = $current->update($object);
        return redirect()->route('admin.nk_instansi.index')
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
        $data = Nk_instansi::where('id', $id)->firstOrFail();
        File::delete('./uploads/' . $data->image);
        $data->delete();
        return redirect()->route('admin.nk_instansi.index')
            ->with(['notif_status' => '1', 'notif' => 'Delete data succeed.']);
    }


    public function download($id)
    {
        $data = Nk_instansi::findOrFail($id);

        $template = new TemplateProcessor('uploads\template\word\NK_INSTANSI.docx');

        $template->setValue('NK_NAME_INSTANSI', $data->name_instansi);
        $template->setValue('NK_NO_INSTANSI', $data->no_instansi);
        $template->setValue('NK_NO_POLTEKES', $data->no_poltekes);
        $template->setValue('NK_MULAI', $data->start);
        $template->setValue('NK_SELESAI', $data->end);
        $template->setValue('NK_ADDRESS', $data->address);
        $template->setValue('NK_NAME', $data->name);
        $template->setValue('NK_PHONE', $data->phone);
        $template->setValue('NK_JABATAN', $data->position);
        $template->setValue('NK_EMAIL', $data->email);
        $template->setValue('NK_NIP', $data->nip);

        $fileName = $data->no_instansi.'-NK_INSTANSI';
        $template->saveAs($fileName.'.docx');
        return response()->download($fileName.'.docx')->deleteFileAfterSend(true);
    }
}
