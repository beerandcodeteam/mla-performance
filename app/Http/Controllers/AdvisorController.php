<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdvisorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $users = User::
        with('advisor')
            ->addSelect(['last_order_at' => Order::select('created_at')
                ->whereColumn('user_id', 'users.id')
                ->latest()
                ->take(1)
            ])
            ->withCasts(['last_order_at' => 'datetime'])
            ->orderBy('name')
            ->paginate();


        return view('advisors.index', ['users' => $users]);
    }
}
