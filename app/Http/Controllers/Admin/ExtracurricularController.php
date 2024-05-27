<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\RoutingHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Extracurricular\StoreExtracurricularRequest;
use App\Http\Requests\Extracurricular\UpdateExtracurricularRequest;
use App\Models\Extracurricular;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class ExtracurricularController extends Controller
{
    public function index(): View
    {
        $extracurricularsTrashed = Extracurricular::onlyTrashed()->count();
        $extracurriculars = Extracurricular::latest()->filter(request(['search']))->paginate(10);

        return view('admin.extracurriculars.index', compact('extracurricularsTrashed', 'extracurriculars'));
    }

    public function create(): View
    {
        return view('admin.extracurriculars.create');
    }

    public function store(StoreExtracurricularRequest $request): RedirectResponse
    {
        $data = $request->validated();

        try {
            DB::beginTransaction();

            Extracurricular::create($data);

            DB::commit();
            return redirect(RoutingHelper::storeToIndexRoute())->with([
                'message' => 'Ekstrakurikuler berhasil ditambahkan',
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

    public function edit(Extracurricular $extracurricular): View
    {
        return view('admin.extracurriculars.edit', compact('extracurricular'));
    }

    public function update(UpdateExtracurricularRequest $request, Extracurricular $extracurricular): RedirectResponse
    {
        $data = $request->validated();

        try {
            DB::beginTransaction();

            $extracurricular->update($data);

            DB::commit();
            return redirect(RoutingHelper::updateToIndexRoute())->with([
                'message' => 'Ekstrakurikuler berhasil diubah',
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

    public function destroy(Extracurricular $extracurricular): RedirectResponse
    {
        $extracurricular->delete();

        return back()->with([
            'message' => 'Ekstrakurikuler berhasil dihapus',
            'status' => 'success',
        ]);
    }
}
