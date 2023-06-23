<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class CourseController extends Controller
{

    public function showCoursesPage()
    {

        return Inertia::render('CoursesPage', [
            'courses' => Course::all(),
            'canLogin' => \Route::has('login'),
            'canRegister' => \Route::has('register'),
        ]);
    }

    public function getCourses(Request $request): \Illuminate\Http\JsonResponse
    {
        $courses = Course::all();
        return response()->json(compact('courses'));
    }


    /**
     * Store a newly created course in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'date' => 'required|date',
            'description' => 'required',
            'image' => 'file|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $course = new Course();
        $course->title = $request->input('title');
        $course->author = $request->input('author');
        $course->date = $request->input('date');
        $course->description = $request->input('description');

        // Handle course image upload
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $filePath = $request->file('image')->store('uploads/courses', 'public');
            $course->image = '/storage/' . $filePath;
        }

        $course->save();

        return Redirect::back()->with([
            'data' => 'Course uploaded.',
        ]);
    }

    public function viewCourse(int $id): \Inertia\Response
    {
        $course = Course::whereId($id)->with('videos')->first();
        // check if auth and if yes return favourite courses
        $favouriteCourses = auth()->user() ? auth()->user()->favouriteCourses()->get() : [];
        return Inertia::render('PlaylistPage', compact('course', 'favouriteCourses'));
    }

    public function addCourseToFavourite(Request $request): \Illuminate\Http\JsonResponse
    {
        $course = Course::whereId($request->input('course_id'))->first();
        $user = auth()->user();

        // Check if course is already added to favourites and remove it if it is
        if ($user->favouriteCourses()->where('course_id', $course->id)->exists()) {
            $user->favouriteCourses()->detach($course);
            return response()->json(['message' => 'Course removed from favourites.', 'favourite' => false]);
        }

        $user->favouriteCourses()->attach($course);

        return response()->json(['message' => 'Course added to favourites.', 'favourite' => true]);
    }

    public function showFavouriteCourses(): \Inertia\Response
    {
        $courses = auth()->user()->favouriteCourses()->get();
        return Inertia::render('FavouriteCoursesPage', compact('courses'));
    }

    public function searchCourses(Request $request): \Inertia\Response
{
    $searchTerm = $request->input('search_box');
    $courses = Course::where('title', 'LIKE', "%{$searchTerm}%")->get();
    return Inertia::render('SearchPage', compact('courses'));
}
}
