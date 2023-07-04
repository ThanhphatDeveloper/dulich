<?php

namespace App\Http\Controllers;

use App\Models\DonHang;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class StatisticController extends Controller
{
    public function index()
    {
        $now = Carbon::now();
        $time = Carbon::now()->subDays(30);

        //dd($now.'    '.$time);

        $lst = DB::table('don_hangs')
            ->where('trangthai', 1)->where('thoigiankhoihanh', '<', Carbon::now()->format('Y-m-d h:m:s'))
            ->whereBetween('thoigiankhoihanh', [$time, $now])
            ->select(DB::raw('SUM(tongtien) as thanhtien'),'thoigiankhoihanh as thoigiankhoihanh')
            ->groupBy('thoigiankhoihanh')->orderBy('thoigiankhoihanh','ASC')
            ->get();

        $lst_don = DB::table('don_hangs')
            ->where('ngaydat', '<', Carbon::now()->format('Y-m-d h:m:s'))
            ->whereBetween('ngaydat', [$time, $now])
            ->select(DB::raw('count(id) as tongdon'),'ngaydat as ngaydat')
            ->groupBy('ngaydat')->orderBy('ngaydat','ASC')
            ->get();

        $lst_customer = DB::table('don_hangs')
            ->where('trangthai', 1)->where('thoigiankhoihanh', '<', Carbon::now()->format('Y-m-d h:m:s'))
            ->whereBetween('thoigiankhoihanh', [$time, $now])
            ->select(DB::raw('SUM(sokhach) as sokhach'),'thoigiankhoihanh as thoigiankhoihanh')
            ->groupBy('thoigiankhoihanh')->orderBy('thoigiankhoihanh','ASC')
            ->get();
        
        //dd($lst_customer);
        return view('admin.thongke.thongke', ['lst' => $lst, 'lst_don' => $lst_don, 'lst_customer' => $lst_customer]);
        // return view('admin.thongke.thongke', compact('lst'), ['diadiem'=>$lst_diadiem]);
    }

    public function index_date(Request $request)
    {
        //dd($request);
        $now = $request->end;
        $time = $request->start;

        //dd($now.'    '.$time);

        $lst = DB::table('don_hangs')
            ->where('trangthai', 1)->where('thoigiankhoihanh', '<', Carbon::now()->format('Y-m-d'))
            ->whereBetween('thoigiankhoihanh', [$time, $now])
            ->select(DB::raw('SUM(tongtien) as thanhtien'),'thoigiankhoihanh as thoigiankhoihanh')
            ->groupBy('thoigiankhoihanh')->orderBy('thoigiankhoihanh','ASC')
            ->get();

        $lst_don = DB::table('don_hangs')
            ->where('ngaydat', '<', Carbon::now()->format('Y-m-d h:m:s'))
            ->whereBetween('ngaydat', [$time, $now])
            ->select(DB::raw('count(id) as tongdon'),'ngaydat as ngaydat')
            ->groupBy('ngaydat')->orderBy('ngaydat','ASC')
            ->get();

        $lst_customer = DB::table('don_hangs')
            ->where('trangthai', 1)->where('thoigiankhoihanh', '<', Carbon::now()->format('Y-m-d h:m:s'))
            ->whereBetween('thoigiankhoihanh', [$time, $now])
            ->select(DB::raw('SUM(sokhach) as sokhach'),'thoigiankhoihanh as thoigiankhoihanh')
            ->groupBy('thoigiankhoihanh')->orderBy('thoigiankhoihanh','ASC')
            ->get();
        
        //dd($test);
        return view('admin.thongke.thongke', ['lst' => $lst, 'lst_don' => $lst_don, 'lst_customer' => $lst_customer]);
        // return view('admin.thongke.thongke', compact('lst'), ['diadiem'=>$lst_diadiem]);
    }
}
