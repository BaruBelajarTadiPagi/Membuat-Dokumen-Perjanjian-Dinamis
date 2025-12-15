<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Carbon\Carbon;
use PDF;
use SimpleSoftwareIO\QrCode\Generator;
use Illuminate\Routing\UrlGenerator;
use Illuminate\Support\Facades\Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\DB;
use App\Models\Mou_international;
use App\Models\Dk_instansi;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home.index');
    }
    public function notif()
    {
        // $data = Carbon::now();
        // dd($data);
        $period = Carbon::now()->subDays(120)->toDateString();
        $drafts = Dk_instansi::whereDate('end', '>=', $period)->get();
        $mou_internationals = Mou_international::whereDate('end', '>=', $period)->get();
        foreach ($drafts as $key => $value) {
            $data['berkas'][$key]['nama_instansi'] = $value->name_instansi;
            $data['berkas'][$key]['jenis_berkas'] = 'Draft Kesepahaman';
            $data['berkas'][$key]['start'] = $value->start;
            $data['berkas'][$key]['end'] = $value->end;
            $enddate = Carbon::parse($value->end);
            $current = Carbon::now();
            $data['berkas'][$key]['days'] = $current->diffInDays($enddate);
            $data['berkas'][$key]['link'] = route('admin.draft.download', ['id' => $value->id]);
        }
        foreach ($mou_internationals as $key1 => $value) {
            $data['berkas'][$key+$key1]['nama_instansi'] = $value->name_instansi;
            $data['berkas'][$key+$key1]['jenis_berkas'] = 'MOU International';
            $data['berkas'][$key+$key1]['start'] = $value->start;
            $data['berkas'][$key+$key1]['end'] = $value->end;
            $enddate = Carbon::parse($value->end);
            $current = Carbon::now();
            $data['berkas'][$key+$key1]['days'] = $current->diffInDays($enddate);
            $data['berkas'][$key+$key1]['link'] = route('admin.mou.download', ['id' => $value->id]);
        }
        $data['drafts'] = collect($data['berkas'])->sortBy('days')->toArray();
        // dd($data['drafts']);
        $data['i'] = 1;
        return view('pages.dasbor.index', $data);
    }
}
