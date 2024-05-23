<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class VoucherController extends Controller
{
    public function showVoucher()
    {
        $all_voucher = DB::table('vouchers')->get();
        return view('admin.show_voucher')->with('all_voucher', $all_voucher);
    }
}
