<?php

namespace App\Http\Controllers;

use App\Helpers\GlobalHelper;
use App\Helpers\RoutingHelper;
use App\Http\Requests\Role\StoreRoleRequest;
use App\Http\Requests\Role\UpdateRoleRequest;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    public function index(): View
    {
        $roles = Role::latest()->paginate(10);

        return view('roles.index', compact('roles'));
    }

    public function create(): View
    {
        $permissions = Permission::all();
        $features = GlobalHelper::getFeatures($permissions);

        return view('roles.create', compact('permissions', 'features'));
    }

    public function store(StoreRoleRequest $request): RedirectResponse
    {
        $data = $request->validated();

        try {
            DB::beginTransaction();

            $accesses = $request->accesses;
            $permissions = [];

            if ($accesses) {
                $listFeature = array_keys($accesses);
                foreach ($listFeature as $feature) {
                    foreach ($accesses[$feature] as $rf) {
                        $permissions[] = $feature . ".$rf";
                    }
                }
            }

            $role = Role::create([
                'name' => $data['name']
            ]);

            $role->syncPermissions($permissions);

            DB::commit();
            return redirect(RoutingHelper::storeToIndexRoute())->with([
                'message' => 'Role berhasil ditambahkan',
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

    public function edit(Role $role): View
    {
        $features = GlobalHelper::getFeatures(Permission::all());

        return view('roles.edit', compact('role', 'features'));
    }

    public function update(UpdateRoleRequest $request, Role $role)
    {
        $data = $request->validated();

        try {
            $accesses = $request->accesses;
            $permissions = [];

            if ($accesses) {
                $listFeature = array_keys($accesses);
                foreach ($listFeature as $feature) {
                    foreach ($accesses[$feature] as $rf) {
                        $permissions[] = $feature . ".$rf";
                    }
                }
            }

            $role->update([
                'name' => $data['name']
            ]);

            $role->syncPermissions($permissions);

            DB::commit();
            return redirect(RoutingHelper::updateToIndexRoute())->with([
                'message' => 'Role berhasil diubah',
                'status' => 'success',
            ]);
        } catch (\Throwable $th) {
            DB::rollback();
            dd($th->getMessage());
            return redirect()->back()->withInput()->with([
                'message' => trans('message.error'),
                'status' => 'danger',
            ]);
        }
    }

    public function destroy(Role $role)
    {
        $role->delete();

        return back()->with([
            'message' => 'Role berhasil dihapus',
            'status' => 'success',
        ]);
    }
}
