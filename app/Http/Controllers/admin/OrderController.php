<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function index()
    {
        return view('admin.order.index')->with('orders', Order::latest()->get());
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect(route('order.index'))->with('success', "Successfully Deleted!");
    }
}