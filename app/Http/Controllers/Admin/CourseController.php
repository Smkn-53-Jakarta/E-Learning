<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\RoutingHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Course\StoreCourseRequest;
use App\Http\Requests\Course\UpdateCourseRequest;
use App\Models\Course;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    public function index(): View
    {
        $coursesTrashed = Course::onlyTrashed()->count();
        $courses = Course::latest()->filter(request(['search']))->paginate(10);

        return view('admin.courses.index', compact('coursesTrashed', 'courses'));
    }

    public function create(): View
    {
        return view('admin.courses.create');
    }

    public function store(StoreCourseRequest $request): RedirectResponse
    {
        $data = $request->validated();

        try {
            DB::beginTransaction();

            Course::create($data);

            DB::commit();
            return redirect(RoutingHelper::storeToIndexRoute())->with([
                'message' => 'Mata pelajaran berhasil ditambahkan',
                'status' => 'success',
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back()->withInput()->with([
                'message' => trans('message.error'),
                'status' => 'danger',
            ]);
        }
    }

    public function edit(Course $course): View
    {
        return view('admin.courses.edit', compact('course'));
    }

    public function update(UpdateCourseRequest $request, Course $course): RedirectResponse
    {
        $data = $request->validated();

        try {
            DB::beginTransaction();

            $course->update($data);

            DB::commit();
            return redirect(RoutingHelper::updateToIndexRoute())->with([
                'message' => 'Mata pelajaran berhasil diubah',
                'status' => 'success',
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back()->withInput()->with([
                'message' => trans('message.error'),
                'status' => 'danger',
            ]);
        }
    }

    public function destroy(Course $course): RedirectResponse
    {
        $course->delete();

        return back()->with([
            'message' => 'Mata pelajaran berhasil dihapus',
            'status' => 'success',
        ]);
    }
}
