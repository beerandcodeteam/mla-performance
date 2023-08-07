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
        $advisors = User::with('advisor')
            ->orderBy('name')
            ->paginate();


        return view('advisors.index', ['advisors' => $advisors]);
    }
}
