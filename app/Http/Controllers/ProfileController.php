<?php

namespace App\Http\Controllers;

use App\Helpers\RoutingHelper;
use App\Http\Requests\Profile\UpdateProfileRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function index(): View
    {
        $user = User::with('roles')->findOrFail(auth()->user()->id);

        return view('profile.index', compact('user'));
    }

    public function edit(): View
    {
        $user = User::findOrFail(auth()->user()->id);

        return view('profile.edit', compact('user'));
    }

    public function update(UpdateProfileRequest $request, User $user): RedirectResponse
    {
        $data = $request->validated();

        if (isset($data['email']) && $data['email'] !== $user->email) {
            $data['email_verified_at'] = null;
        }

        try {
            DB::beginTransaction();

            $user->update($data);

            DB::commit();

            return redirect()->route(RoutingHelper::updateToIndexRoute())->with([
                'message' => 'Profile berhasil diubah',
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

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
