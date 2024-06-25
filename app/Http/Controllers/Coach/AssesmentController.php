<?php

namespace App\Http\Controllers\Coach;

use App\Http\Controllers\Controller;
use App\Http\Requests\Assesment\StoreExtracurricularAssesmentRequest;
use App\Models\Extracurricular;
use App\Models\ExtracurricularSchedule;
use App\Models\ExtracurricularValue;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AssesmentController extends Controller
{
    public function index(): View
    {
        $extracurriculars = Extracurricular::latest()->whereHas('extracurricularShcedules', function ($query) {
            $query->where('user_id', auth()->user()->id);
        })->filter(request(['search']))->paginate(10);

        return view('coach.assesments.index', compact('extracurriculars'));
    }

    public function show(Extracurricular $extracurricular): View
    {
        $extracurricularSchedules = ExtracurricularSchedule::where('extracurricular_id', $extracurricular->id)->get();

        $members = $extracurricularSchedules->flatMap(function ($schedule) {
            return $schedule->members;
        })->unique('id');

        $members->transform(function ($member) use ($extracurricular) {
            $member->extracurricularValue = $member->extracurricularValues->where('extracurricular_id', $extracurricular->id)->first();
            return $member;
        });

        return view('coach.assesments.show', compact('members', 'extracurricular'));
    }

    public function store(StoreExtracurricularAssesmentRequest $request, Extracurricular $extracurricular)
    {
        $assesments = array_filter($request->validated()['assesments'], function ($assesment) {
            return !is_null($assesment['value']);
        });

        try {
            DB::beginTransaction();

            foreach ($assesments as $assesment) {
                ExtracurricularValue::updateOrCreate(
                    ['extracurricular_id' => $extracurricular->id, 'student_id' => $assesment['student_id']],
                    ['value' => $assesment['value']]
                );
            }

            DB::commit();

            return redirect()->back()->with([
                'message' => 'Nilai ekstrakurikuler berhasil diubah',
                'status' => 'success',
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th->getMessage());
            return redirect()->back()->withInput()->with([
                'message' => trans('message.error'),
                'status' => 'danger',
            ]);
        }
    }
}
