<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\ApiResponser;
use Illuminate\Http\JsonResponse;
use App\Models\Calendar;
use App\Models\Lesson;
use Carbon\Carbon;
use App\Http\Requests\LessonStoreRequest;
use App\Http\Requests\LessonUpdateRequest;

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
        $lesson = Calendar::with('lesson')
        ->where('lesson_id', $lesson)->first();

        return $this->successResponse($lesson);
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(LessonUpdateRequest $request, $lesson)
    {
        $lesson = Calendar::where('lesson_id', $lesson)->first();
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
        $lesson = Calendar::where('lesson_id', $lesson)->first();
        $lesson->delete();

        return $this->showMessage(__("Deleted the lesson with success"));
    }

}
