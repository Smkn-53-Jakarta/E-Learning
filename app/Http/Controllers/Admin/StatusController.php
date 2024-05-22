<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\RoutingHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Status\StoreStatusRequest;
use App\Http\Requests\Status\UpdateStatusRequest;
use App\Models\Status;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class StatusController extends Controller
{
    public function index(): View
    {
        $statusesTrashed = Status::onlyTrashed()->count();
        $statuses = Status::latest()->filter(request(['search']))->paginate(10);

        return view('admin.statuses.index', compact('statusesTrashed', 'statuses'));
    }

    public function create(): View
    {
        return view('admin.statuses.create');
    }

    public function store(StoreStatusRequest $request): RedirectResponse
    {
        $data = $request->validated();

        try {
            DB::beginTransaction();

            Status::create($data);

            DB::commit();
            return redirect(RoutingHelper::storeToIndexRoute())->with([
                'message' => 'Status berhasil ditambahkan',
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

    public function edit(Status $status): View
    {
        return view('admin.statuses.edit', compact('status'));
    }

    public function update(UpdateStatusRequest $request, Status $status): RedirectResponse
    {
        $data = $request->validated();

        try {
            DB::beginTransaction();

            $status->update($data);

            DB::commit();
            return redirect(RoutingHelper::updateToIndexRoute())->with([
                'message' => 'Status berhasil diubah',
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

    public function destroy(Status $status): RedirectResponse
    {
        $status->delete();

        return back()->with([
            'message' => 'Status berhasil dihapus',
            'status' => 'success',
        ]);
    }

    public function trashed(): View
    {
        $statuses = Status::latest()->onlyTrashed()->filter(request(['search']))->paginate(10);

        return view('admin.statuses.trashed', compact('statuses'));
    }

    public function restore($id): RedirectResponse
    {
        Status::withTrashed()->findOrFail($id)->restore();

        return redirect(RoutingHelper::restoreToIndex())->with([
            'message' => 'Status berhasil dipulihkan',
            'status' => 'success',
        ]);
    }
}
