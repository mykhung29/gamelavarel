<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    //

    public function showOrders()
    {
        $all_orders = DB::table('order_details')
            ->select('id_order', 'user_id', 'place_id', DB::raw('GROUP_CONCAT(product_id) as product_ids'))
            ->groupBy('id_order', 'user_id', 'place_id')
            ->get();

        return view('admin.show_orders', ['all_orders' => $all_orders]);
    }

    public function showOrderDetail($id_order, $id_user, $place_id)
    {

        $info = DB::table('orders')
            ->where('id_user', $id_user)
            ->where('id', $place_id)
            ->get();

        $order_details = DB::table('order_details')
            ->where('id_order', $id_order)
            ->where('user_id', $id_user)
            ->get();

        return view('admin.details_order', ['order_detail' => $order_details, 'info' => $info]);
    }

}
