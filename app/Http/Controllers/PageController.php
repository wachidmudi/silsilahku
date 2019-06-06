<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Show the application landing page.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        // Search user by keyword.
        $q     = $request->get('q');
        $users = [];

        if ($q) {
            $users = User::with('father', 'mother')->where(function ($query) use ($q) {
                $query->where('name', 'like', '%' . $q . '%');
                $query->orWhere('nickname', 'like', '%' . $q . '%');
            })
                ->orderBy('name', 'asc')
                ->paginate(24);
        }

        // Get random users limit by 6
        $randomUsers = User::select('id', 'name', 'gender_id', 'photo_path')
            ->inRandomOrder()
            ->limit(6)
            ->get();

        return view('landing-page.home', compact('users', 'randomUsers'));
    }
}
