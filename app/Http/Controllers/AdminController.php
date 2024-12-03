<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AdminController extends Controller
{
    public function index()
    {
        if (Gate::denies('view-all-profiles')) {
            abort(403, 'Nu aveți acces la această pagină.');
        }

        $profiles = Profile::all(); 
        return view('tasks.admin.index', compact('profiles'));  
    }
}

