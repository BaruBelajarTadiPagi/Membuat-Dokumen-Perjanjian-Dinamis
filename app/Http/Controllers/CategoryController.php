<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Storage;
use Validator;
use File;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['categories'] = Category::latest()->get();
        return view('pages.category.index', $data);
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
            'name' => 'required',
            'image' => 'required|file|mimes:jpg,png|max:10240',
            'logo' => 'required|file|mimes:jpg,png|max:10240',
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
            'name' => $request->name,
            // 'slug' => $request->name,
        );
        if ($request->has('image')) {
            $image = Storage::disk('uploads')->put('image-category', $request->image);
            $object['image'] = $image;
        }
        if ($request->has('logo')) {
            $logo = Storage::disk('uploads')->put('logo-category', $request->logo);
            $object['logo'] = $logo;
        }
        Category::create($object);
        return redirect()->route('admin.category.index')
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
        $detail = Category::find($id);
        // dd($article->toArray());
        $data['page_title'] = 'Update Category';
        $data['edit_mode'] = true;
        $data['edit_password'] = false;
        $data['detail'] = $detail;
        $data['categories'] = Category::latest()->get();
        return view('pages.category.index', $data);
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
            'name' => 'required',
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
            'name' => $request->name,
        );
        
        $current = Category::findOrFail($id);
        $current->slug = null;
        
        if ($request->has('image')) {
            $image = Storage::disk('uploads')->put('image-category', $request->image);
            $object['image'] = $image;
            // dd($object['avatar']);
            if ($current->image) {
                File::delete('./uploads/' . $current->image);
            }
        }
        if ($request->has('logo')) {
            $logo = Storage::disk('uploads')->put('logo-category', $request->logo);
            $object['logo'] = $logo;
            // dd($object['avatar']);
            if ($current->logo) {
                File::delete('./uploads/' . $current->logo);
            }
        }
        
        $lastpost = $current->update($object);
        return redirect()->route('admin.category.index')
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
        $category = Category::where('id', $id)->firstOrFail();
        File::delete('./uploads/' . $category->image);
        File::delete('./uploads/' . $category->logo);
        $category->delete();
        return redirect()->route('admin.category.index')
            ->with(['notif_status' => '1', 'notif' => 'Delete data succeed.']);
    }
}
