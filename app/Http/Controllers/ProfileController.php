<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Peran;
use App\Models\Anggota;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Profiler\Profile;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        $user = User::where('id', $request->user()->id)->first();

        return view('sistem_user.profile.index', compact('user'));
    }

}
