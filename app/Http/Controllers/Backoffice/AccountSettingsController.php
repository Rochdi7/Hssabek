<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Http\Requests\Account\UpdateAccountRequest;
use App\Http\Requests\Account\UpdateAvatarRequest;
use App\Http\Requests\Account\UpdatePasswordRequest;
use App\Support\Security\Base64Image;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AccountSettingsController extends Controller
{
    /**
     * Show the account settings form.
     */
    public function edit(): View
    {
        $user = Auth::user();

        $countries = [
            'US' => 'United States',
            'CA' => 'Canada',
            'GB' => 'United Kingdom',
            'DE' => 'Germany',
            'FR' => 'France',
            'MA' => 'Morocco',
            'ES' => 'Spain',
            'IT' => 'Italy',
            'NL' => 'Netherlands',
            'BE' => 'Belgium',
        ];

        return view('backoffice.account-settings', compact('user', 'countries'));
    }

    /**
     * Update the user's profile information (including avatar via cropper component).
     */
    public function update(UpdateAccountRequest $request): RedirectResponse
    {
        $user = Auth::user();

        $user->update($request->safe()->except(['cropped_avatar', 'cropped_avatar_deleted']));

        if ($request->input('cropped_avatar_deleted') === '1' && ! $request->filled('cropped_avatar')) {
            $user->clearMediaCollection('avatar');
        }

        if ($request->filled('cropped_avatar')) {
            Base64Image::attachToMediaCollection(
                $user,
                'avatar',
                $request->input('cropped_avatar'),
                prefix: 'avatar',
                maxKilobytes: 5120,
                clearExisting: true,
            );
        }

        return redirect()
            ->route('bo.account.settings.edit')
            ->with('success', __('Parametres du compte mis a jour avec succes.'));
    }

    /**
     * Update the user's password.
     */
    public function updatePassword(UpdatePasswordRequest $request): RedirectResponse
    {
        $user = Auth::user();

        $user->update([
            'password' => $request->password,
            'password_changed_at' => now(),
        ]);

        return redirect()
            ->route('bo.settings.security.index')
            ->with('success', __('Mot de passe mis a jour avec succes.'));
    }

    /**
     * Update the user's avatar using Spatie Media Library.
     * Accepts either a cropped base64 image or a regular file upload.
     */
    public function updateAvatar(UpdateAvatarRequest $request): RedirectResponse
    {
        $user = Auth::user();

        if ($request->filled('cropped_image')) {
            Base64Image::attachToMediaCollection(
                $user,
                'avatar',
                $request->input('cropped_image'),
                prefix: 'avatar',
                maxKilobytes: 5120,
                clearExisting: true,
            );
        } elseif ($request->hasFile('avatar')) {
            $user->clearMediaCollection('avatar');
            $user->addMediaFromRequest('avatar')->toMediaCollection('avatar');
        }

        return redirect()
            ->route('bo.account.settings.edit')
            ->with('success', __('Photo de profil mise a jour avec succes.'));
    }

    /**
     * Remove the user's avatar.
     */
    public function destroyAvatar(): RedirectResponse
    {
        $user = Auth::user();

        $user->clearMediaCollection('avatar');

        return redirect()
            ->route('bo.account.settings.edit')
            ->with('success', __('Photo de profil supprimee.'));
    }
}
