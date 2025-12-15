<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dk_instansi;
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

class DkInstansiController extends Controller
{
    public function index()
    {
        //
        $data['drafts'] = Dk_instansi::latest()->get();
        return view('pages.draft.index', $data);
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
        );
        if ($request->has('image')) {
            $image = Storage::disk('uploads')->put('draft-kesepahaman', $request->image);
            $object['image'] = $image;
        }
        Dk_instansi::create($object);
        return redirect()->route('admin.draft.index')
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
        $detail = Dk_instansi::findorfail($id);
        // dd($article->toArray());
        $data['page_title'] = 'Update Category';
        $data['edit_mode'] = true;
        $data['edit_password'] = false;
        $data['detail'] = $detail;
        $data['drafts'] = Dk_instansi::latest()->get();
        return view('pages.draft.index', $data);
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
        );

        $current = Dk_instansi::findOrFail($id);

        if ($request->has('image')) {
            $image = Storage::disk('uploads')->put('draft-kesepahaman', $request->image);
            $object['image'] = $image;
            // dd($object['avatar']);
            if ($current->image) {
                File::delete('./uploads/' . $current->image);
            }
        }

        $lastpost = $current->update($object);
        return redirect()->route('admin.draft.index')
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
        $data = Dk_instansi::where('id', $id)->firstOrFail();
        File::delete('./uploads/' . $data->image);
        $data->delete();
        return redirect()->route('admin.draft.index')
            ->with(['notif_status' => '1', 'notif' => 'Delete data succeed.']);
    }

    public function download($id)
    {
        $data =  Dk_instansi::findOrFail($id);
        $template = new TemplateProcessor('uploads\template\word\DK_INSTANSI.docx');

        $template->setValue('DK_PIHAK_1', $data->name);
        $template->setValue('DK_INSTANSI', $data->name_instansi);
        $template->setValue('DK_NO_INSTANSI', $data->no_instansi);
        $template->setValue('DK_NO_POLTEKES', $data->no_poltekes);
        $template->setValue('DK_MULAI', $data->start);
        $template->setValue('DK_SELESAI', $data->end);
        $template->setValue('DK_ADDRESS', $data->address);
        $template->setValue('JABATAN', $data->position);

        $fileName = $data->no_instansi.'-draft-DK_INSTANSI';
        $template->saveAs($fileName.'.docx');
        return response()->download($fileName.'.docx')->deleteFileAfterSend(true);
    }
}
