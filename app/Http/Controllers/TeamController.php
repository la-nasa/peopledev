<?php

namespace App\Http\Controllers;

use App\Models\TeamMember;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {
        $members = TeamMember::where('is_active', true)->orderBy('order', 'asc')->get();
        return view('team.index', compact('members'));
    }
}