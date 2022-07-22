<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponser;
use App\Models\Calendar;
use App\Models\Lesson;
use App\Http\Requests\LessonStoreRequest;
use App\Http\Requests\LessonUpdateRequest;
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
        $calendar = Calendar::with('lesson')
            ->whereBetween('start_date', [Carbon::now(), Carbon::now()->addDays(8)])
            ->get();

        return $this->successResponse($calendar);
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(LessonStoreRequest $request)
    {
        $validatedData = $request->validated();
        $calendar = Calendar::create($validatedData);

        return  $this->successResponse($calendar);
    }

    /**
     * Display the specified resource.
     *
     */
    public function show(Calendar $lesson)
    {
        $lesson = Lesson::with('calendars')
            ->whereId($lesson->id)->first();

        return $this->successResponse($lesson);
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(LessonUpdateRequest $request, $lesson)
    {
        $lesson = Calendar::where('lesson_id', $lesson->id)->first();
        $validatedData = $request->validated();

        if ($lesson) {
            $lesson->update($validatedData);
            return new $lesson;
        } else {
            return $this->showNone();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(Calendar $lesson)
    {
        $lesson = Calendar::where('lesson_id', $lesson->id)->first();
        $lesson->delete();

        return $this->showMessage(__("Deleted the lesson with success"));
    }
}
