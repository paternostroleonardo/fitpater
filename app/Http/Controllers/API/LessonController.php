<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\ApiResponser;
use Illuminate\Http\JsonResponse;
use App\Models\Calendar;
use App\Models\Lesson;
use Carbon\Carbon;

class LessonController extends Controller
{
    use ApiResponser;

    /**
     * Display a listing of the resource.
     *
    */
    public function index()
    {
       $lesson = Lesson::with('calendars')->get();
       $dateMax = $lesson->calendars->start_date;
       /* Lesson::all('created_at')->max('created_at')->toArray(); */
        return $lesson;
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     */
    public function show($lesson)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Request $request, $lesson)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(Lesson $lesson)
    {
        $lesson->delete();

        return $lesson;
    }

}
