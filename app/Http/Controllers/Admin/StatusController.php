<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Status\StoreStatusRequest;
use App\Http\Requests\Status\UpdateStatusRequest;
use App\Models\Status;
use Illuminate\Contracts\View\View;

class StatusController extends Controller
{
    public function index(): View
    {
        $statusesTrashed = Status::onlyTrashed()->count();
        $statuses = Status::latest()->filter(request(['search']))->paginate(10);

        return view('admin.statuses.index', compact('statusesTrashed', 'statuses'));
    }

    public function create()
    {
        //
    }

    public function store(StoreStatusRequest $request)
    {
        //
    }

    public function show(Status $status)
    {
        //
    }

    public function edit(Status $status)
    {
        //
    }

    public function update(UpdateStatusRequest $request, Status $status)
    {
        //
    }

    public function destroy(Status $status)
    {
        //
    }
}
