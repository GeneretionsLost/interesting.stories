<?php

namespace App\Http\Controllers;

use App\Models\Story;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function admin()
    {
        $stories = Story::where('is_moderated', false)
            ->orderBy('created_at', 'asc')
            ->paginate(10);;

        return view('admin', compact('stories'));
    }
}
