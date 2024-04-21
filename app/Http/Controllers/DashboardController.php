<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\User;
use App\Models\Product;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $orders = Order::all();

        $users = User::all();

        $products = Product::all();

        $activities = Activity::all()->whereNotIn('log_name', ['new'])->sortByDesc('created_at');

        $newOrders = Activity::where('log_name', ['new'])->get()->sortByDesc('created_at');;

        $dashboardData = [
            "orderNo" => $orders->count(),
            "deliveredNo" => $orders->where("status", "delivered")->count(),
            "userNo" => $users->count(),
            "productsNo" => Product::sum('quantity'),
        ];

        return view("/admin/dashboard", compact("dashboardData", "activities", "newOrders"));
    }
}
