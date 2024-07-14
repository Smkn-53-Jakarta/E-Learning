<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\FileHelper;
use App\Helpers\RoutingHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Coach\StoreCoachController;
use App\Http\Requests\Coach\UpdateCoachController;
use App\Models\Coach;
use App\Models\Status;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class CoachController extends Controller
{
    public function index(): View
    {
        $coachsTrashed = User::role('coach')->onlyTrashed()->count();
        $coachs = User::with('status')->latest()->role('coach')->filter(request(['search']))->paginate(10);

        return view('admin.coachs.index', compact('coachsTrashed', 'coachs'));
    }

    public function create(): View
    {
        $statuses = Status::latest()->get();

        return view('admin.coachs.create', compact('statuses'));
    }

    public function store(StoreCoachController $request): RedirectResponse
    {
        $data = Arr::except($request->validated(), ['profile_picture']);
        $data['password'] = bcrypt($data['name']);

        if ($request->hasFile('profile_picture')) {
            $data['profile_picture'] = FileHelper::optimizeAndUploadPicture($request->file('profile_picture'), 'users/images');
        }

        try {
            DB::beginTransaction();

            $user = User::create($data);

            $user->assignRole('Coach');

            DB::commit();
            return redirect(RoutingHelper::storeToIndexRoute())->with([
                'message' => 'Pelatih berhasil ditambahkan',
                'status' => 'success',
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();

            if (isset($data['profile_picture'])) {
                FileHelper::deleteImage('users/images', $data['profile_picture']);
            }

            return redirect()->back()->withInput()->with([
                'message' => trans('message.error'),
                'status' => 'danger',
            ]);
        }
    }

    public function edit(User $coach): View
    {
        $statuses = Status::latest()->get();

        return view('admin.coachs.edit', compact('statuses', 'coach'));
    }

    public function update(UpdateCoachController $request, User $coach)
    {
        $data = Arr::except($request->validated(), ['profile_picture']);

        if ($request->hasFile('profile_picture')) {
            $data['profile_picture'] = FileHelper::optimizeAndUploadPicture($request->file('profile_picture'), 'users/images');
            $oldImage = $coach->profile_picture;
        }

        try {
            DB::beginTransaction();

            $coach->update($data);

            DB::commit();

            if (isset($oldImage)) {
                FileHelper::deleteImage('users/images', $oldImage);
            }

            return redirect(RoutingHelper::updateToIndexRoute())->with([
                'message' => 'Pelatih berhasil diubah',
                'status' => 'success',
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();

            if (isset($data['profile_picture'])) {
                FileHelper::deleteImage('users/images', $data['profile_picture']);
            }

            return redirect()->back()->withInput()->with([
                'message' => trans('message.error'),
                'status' => 'danger',
            ]);
        }
    }

    public function destroy(User $coach)
    {
        //
    }

    public function trashed(): View
    {
        return view('admin.coachs.trashed', compact('coachs'));
    }
}
