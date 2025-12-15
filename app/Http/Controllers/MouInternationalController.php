<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mou_international;
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

class MouInternationalController extends Controller
{
    public function index()
    {
        //
        $data['drafts'] = Mou_international::latest()->get();
        return view('pages.mou.index', $data);
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
            'name_1' => 'required',
            'position_1' => 'required',
            'name_2' => 'required',
            'position_2' => 'required',
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
            'name_1' => $request->name_1,
            'position_1' => $request->position_1,
            'name_2' => $request->name_2,
            'position_2' => $request->position_2,
            'address' => $request->address,
        );
        if ($request->has('image')) {
            $image = Storage::disk('uploads')->put('mou-international', $request->image);
            $object['image'] = $image;
        }
        Mou_international::create($object);
        return redirect()->route('admin.mou.index')
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
        $detail = Mou_international::findorfail($id);
        // dd($article->toArray());
        $data['page_title'] = 'Update Category';
        $data['edit_mode'] = true;
        $data['edit_password'] = false;
        $data['detail'] = $detail;
        $data['drafts'] = Mou_international::latest()->get();
        return view('pages.mou.index', $data);
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
            'name_1' => 'required',
            'position_1' => 'required',
            'name_2' => 'required',
            'position_2' => 'required',
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
            'name_1' => $request->name_1,
            'position_1' => $request->position_1,
            'name_2' => $request->name_2,
            'position_2' => $request->position_2,
            'address' => $request->address,
        );

        $current = Mou_international::findOrFail($id);

        if ($request->has('image')) {
            $image = Storage::disk('uploads')->put('mou-international', $request->image);
            $object['image'] = $image;
            // dd($object['avatar']);
            if ($current->image) {
                File::delete('./uploads/' . $current->image);
            }
        }

        $lastpost = $current->update($object);
        return redirect()->route('admin.mou.index')
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
        $data = Mou_international::where('id', $id)->firstOrFail();
        File::delete('./uploads/' . $data->image);
        $data->delete();
        return redirect()->route('admin.mou.index')
            ->with(['notif_status' => '1', 'notif' => 'Delete data succeed.']);
    }

    public function download($id)
    {
        $data = Mou_international::findOrFail($id);
        $template = new TemplateProcessor('uploads\template\word\no instansi instansi mou-mou-international.docx');

        $template->setValue('MOU_INSTANSI', $data->name_instansi);
        $template->setValue('MOU_NO_INSTANSI', $data->no_instansi);
        $template->setValue('MOU_NO_POLTEKES', $data->no_poltekes);

        $start = Carbon::parse($data->start);
        $template->setValue('START_m', $start->format('F Y'));
        $template->setValue('START_d', $start->format('d'));
        $template->setValue('START_ST', $start->format('S'));

        $end = Carbon::parse($data->end);
        $template->setValue('END_m', $end->format('F Y'));
        $template->setValue('END_d', $end->format('d'));
        $template->setValue('END_ST', $end->format('S'));

        $template->setValue('MOU_ADDRESS', $data->address);
        $template->setValue('MOU_PIHAK_1', $data->name_1);
        $template->setValue('MOU_PIHAK_2', $data->name_2);
        $template->setValue('MOU_JABATAN_1', $data->position_1);
        $template->setValue('MOU_JABATAN_2', $data->position_2);

        $fileName = $data->no_instansi.'-mou-international';
        $template->saveAs($fileName.'.docx');
        return response()->download($fileName.'.docx')->deleteFileAfterSend(true);
    }
}
