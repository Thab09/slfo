<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TeamAchievement;
use App\Models\PlayerAchievement;

class PlayerAchievementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $achievements = TeamAchievement::latest('created_at')->paginate(12);

        return view('teamachievement.index', compact('achievements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(PlayerAchievement $playerAchievement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PlayerAchievement $playerAchievement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PlayerAchievement $playerAchievement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PlayerAchievement $playerAchievement)
    {
        //
    }
}
