<?php

namespace App\Http\Controllers;

use App\Enums\OrderStatus;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdvisorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $users = User::with('advisor:id,name', 'lastOrder:id,created_at')
            ->select("id", "name", "advisor_id", "last_order_id")
            ->orderBy('name')
            ->paginate();

        return view('advisors.index', ['users' => $users]);
    }

    public function dashboard(): View
    {

        $orderStatus = OrderStatus::class;

        $statusCount = Order::toBase()
            ->selectRaw("count(case when status = {$orderStatus::CREATED->value} then 1 end) as '{$orderStatus::CREATED->getName()}'")
            ->selectRaw("count(case when status = {$orderStatus::PENDING->value} then 1 end) as '{$orderStatus::PENDING->getName()}'")
            ->selectRaw("count(case when status = {$orderStatus::PAID->value} then 1 end) as '{$orderStatus::PAID->getName()}'")
            ->selectRaw("count(case when status = {$orderStatus::CANCELED->value} then 1 end) as '{$orderStatus::CANCELED->getName()}'")
            ->first();


        $orders = Order::with('user')
            ->paginate();

        return view('dashboard.index', [
            'orders' => $orders,
            'statusCount' => $statusCount
        ]);
    }
}
