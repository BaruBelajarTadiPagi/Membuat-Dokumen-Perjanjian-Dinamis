<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Certificate;
use App\Models\Category;
use Validator;

class CertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['certificates'] = Certificate::latest()->get();
        return view('pages.certificate.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data["page_title"] = 'Tambah Certificate';
        $data['categories'] = Category::latest()->get();
        return view('pages.certificate.create', $data);
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
            // 'username' => 'required',
            'name' => 'required',
            'published_at' => 'required',
            'code' => 'required',
            'category_id' => 'required',
            // 'province' => 'required',
        );
        $validator = Validator::make($request->all(), $rules, $messages = [
            'required' => 'The :attribute field is required.',
        ]);

        // dd($request->all());
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->with(['notif_status' => '0', 'notif' => 'Insert data failed.'])
                ->withInput();
        }
        $object = array(
            // 'username' => $request->username,
            'name' => $request->name,
            'published_at' => $request->published_at,
            'code' => $request->code,
            'category_id' => $request->category_id,
            // 'province' => $request->province,
        );
        Certificate::create($object);
        return redirect()->route('admin.certificate.index')
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
        $detail = Certificate::find($id);
        // dd($article->toArray());
        $data['page_title'] = 'Update article';
        $data['edit_mode'] = true;
        $data['detail'] = $detail;
        $data['categories'] = Category::latest()->get();
        return view('pages.certificate.create', $data);
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
            // 'username' => 'required',
            'name' => 'required',
            'published_at' => 'required',
            'code' => 'required',
            'category_id' => 'required',
            // 'province' => 'required',
        );
        // dd($rules);
        $validator = Validator::make($request->all(), $rules, $messages = [
            'required' => 'The :attribute field is required.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->with(['notif_status' => '0', 'notif' => 'Insert data failed.'])
                ->withInput();
        }
        $object = array(
            // 'username' => $request->username,
            'name' => $request->name,
            'published_at' => $request->published_at,
            'code' => $request->code,
            'category_id' => $request->category_id,
            // 'province' => $request->province,
        );

        $current = Certificate::findOrFail($id);


        $current->update($object);
        return redirect()->route('admin.certificate.index')
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
        $certificate = certificate::where('id', $id)->firstOrFail();
        $certificate->delete();
        return redirect()->route('admin.certificate.index')
            ->with(['notif_status' => '1', 'notif' => 'Delete data succeed.']);
    }
}
