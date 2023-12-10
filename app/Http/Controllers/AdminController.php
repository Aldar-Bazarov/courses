<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Language;
use App\Models\CourseEnrollment;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function index()
    {
        $languages = Language::all();
        $user = Auth::user();
        $isAdmin = false;
        if ($user) {
            $isAdmin = $user->role == 'admin';
        }
        $courses = Course::all();
        return view("admin", compact("languages", "isAdmin", "courses"));
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
        return view("admin", compact("languages", "isAdmin", "courses", "languageName"));
    }

    function showCreateCourseForm()
    {
        $languages = Language::all();
        return view("create-course", compact("languages"));
    }


    function createCourse(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'start_date' => 'required|date',
            'people_count' => 'required|integer',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif',
            'language_id' => 'required|exists:languages,id',
        ]);

        $photoPath = $request->file('photo')->store('images', 'public');

        Course::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'start_date' => $request->input('start_date'),
            'people_count' => $request->input('people_count'),
            'photo' => basename($photoPath),
            'language_id' => $request->input('language_id'),
        ]);

        return redirect()->route('admin')->with('success', 'Курс успешно добавлен.');
    }


    public function deleteCourse($id)
    {
        $course = Course::findOrFail($id);
        $enrollmentsCount = CourseEnrollment::where('course_id', $id)->count();
        if ($enrollmentsCount > 0) {
            return redirect()->back()->with('error', 'Нельзя удалить курс, на который есть записи.');
        }
        $course->delete();

        return redirect()->route('admin')->with('success', 'Курс успешно удален.');
    }

    function showEnrollments($id)
    {
        $languages = Language::all();
        $course = Course::findOrFail($id);
        $user = Auth::user();
        $isAdmin = false;
        if ($user) {
            $isAdmin = $user->role == 'admin';
        }
        $enrollments = $course->enrollments()->with('user')->get();

        return view('enrollments', compact('isAdmin', 'languages', 'course', 'enrollments'));
    }

    public function deleteEnrollment($id)
    {
        $enrollment = CourseEnrollment::findOrFail($id);
        $course = Course::findOrFail($enrollment->course_id);
        $course->increment('people_count');
        $enrollment->delete();

        return redirect()->back()->with('success', 'Запись удалена успешно.');
    }
}
