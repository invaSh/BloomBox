<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\User;
use App\Models\Product;
use Spatie\Activitylog\Models\Activity;
use \Carbon\Carbon;
use DB;
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

        $top5products = $this->topSoldProductsLast24Hours();

        return view("/admin/dashboard", compact("dashboardData", "activities", "newOrders", "top5products"));
    }

    public function topSoldProductsLast24Hours()
    {
        $startDateTime = Carbon::now()->subHours(24);
        $endDateTime = Carbon::now();

        $topSoldProducts = DB::table('order__products')
            ->select('product_id', DB::raw('SUM(quantity) as total_quantity'))
            ->whereBetween('created_at', [$startDateTime, $endDateTime])
            ->groupBy('product_id')
            ->orderByDesc('total_quantity')
            ->limit(5)
            ->get();

        $productDetails = [];
        foreach ($topSoldProducts as $product) {
            $productDetails[] = Product::find($product->product_id);
        }

        return $productDetails;
    }
}
