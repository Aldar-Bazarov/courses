<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Language;
use App\Models\CourseEnrollment;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    function index(Request $request)
    {
        $languages = Language::all();
        $user = Auth::user();
        $isAdmin = false;
        if ($user) {
            $isAdmin = $user->role == 'admin';
        }

        $filter = $request->input('filter');

        $courses = $this->filterCourses($filter);

        return view("courses", compact("languages", "isAdmin", "courses"));
    }

    private function filterCourses($filter)
    {
        switch ($filter) {
            case 'active':
                return Course::where('start_date', '>', now())->where('people_count', '>', 0)->get();
            case 'past':
                return Course::where('start_date', '<=', now())->get();
            case 'no-spots':
                return Course::where('people_count', '=', 0)->get();
            default:
                return Course::all();
        }
    }

    function getCoursesByLanguage($id)
    {
        $language = Language::findOrFail($id);
        $languages = Language::all();
        $user = Auth::user();
        $isAdmin = false;
        if ($user) {
            $isAdmin = $user->role == 'admin';
        }
        $courses = Course::where('language_id', $language->id)->get();
        $languageName = $language->name;
        return view("courses", compact("languages", "isAdmin", "courses", "languageName"));
    }

    function getOneCourse($id)
    {
        $languages = Language::all();
        $user = Auth::user();
        $isAdmin = false;
        $isEnrolled = false;

        if ($user) {
            $isAdmin = $user->role == 'admin';

            // Проверяем, записан ли пользователь на данный курс
            $isEnrolled = CourseEnrollment::where('user_id', $user->id)
                ->where('course_id', $id)
                ->exists();
        }

        $course = Course::findOrFail($id);

        return view("course", compact("languages", "isAdmin", "course", "isEnrolled"));
    }

    public function enroll(Course $course)
    {
        $user = auth()->user();

        if ($user && !$user->isAdmin) {
            $enrollment = CourseEnrollment::where('user_id', $user->id)
                ->where('course_id', $course->id)
                ->first();

            if ($enrollment) {
                $enrollment->delete();
                $course->increment('people_count');
            } else {
                if ($course->people_count > 0 && $course->start_date > now()) {
                    CourseEnrollment::create([
                        'user_id' => $user->id,
                        'course_id' => $course->id,
                    ]);
                    $course->decrement('people_count');
                }
            }
        }

        return redirect()->back();
    }

    public function myCourses()
    {
        $languages = Language::all();
        $user = Auth::user();
        $isAdmin = false;

        if ($user) {
            $isAdmin = $user->role == 'admin';
            $courses = $user->courses()->get();

            return view('mycourses', compact('languages', 'isAdmin', 'courses'));
        }
    }
}
