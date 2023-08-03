<?php

namespace App\Http\Controllers;

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
        $users = User::with('advisor')
            ->orderBy('name')
            ->paginate();

        return view('advisors.index', ['users' => $users]);
    }
}
