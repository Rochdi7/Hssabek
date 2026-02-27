<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Http\Requests\Account\UpdateAccountRequest;
use App\Http\Requests\Account\UpdateAvatarRequest;
use App\Http\Requests\Account\UpdatePasswordRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
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

        // Update profile fields (excludes avatar keys thanks to $request->safe()->except())
        $user->update($request->safe()->except(['cropped_avatar', 'cropped_avatar_deleted']));

        // Handle avatar: delete requested?
        if ($request->input('cropped_avatar_deleted') === '1' && !$request->filled('cropped_avatar')) {
            $user->clearMediaCollection('avatar');
        }

        // Handle avatar: new cropped image?
        if ($request->filled('cropped_avatar')) {
            $base64 = $request->input('cropped_avatar');
            $data = substr($base64, strpos($base64, ',') + 1);
            $decoded = base64_decode($data);

            preg_match('/^data:image\/(\w+);/', $base64, $matches);
            $ext = $matches[1] ?? 'png';
            if ($ext === 'jpeg') $ext = 'jpg';

            $fileName = 'avatar-' . Str::random(8) . '.' . $ext;
            $tmpPath = sys_get_temp_dir() . '/' . $fileName;
            file_put_contents($tmpPath, $decoded);

            $user->clearMediaCollection('avatar');
            $user->addMedia($tmpPath)
                ->usingFileName($fileName)
                ->toMediaCollection('avatar');
        }

        return redirect()
            ->route('bo.account.settings.edit')
            ->with('success', 'Paramètres du compte mis à jour avec succès.');
    }

    /**
     * Update the user's password.
     */
    public function updatePassword(UpdatePasswordRequest $request): RedirectResponse
    {
        $user = Auth::user();

        $user->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect()
            ->route('bo.account.settings.edit')
            ->with('success', 'Mot de passe mis à jour avec succès.');
    }

    /**
     * Update the user's avatar using Spatie Media Library.
     * Accepts either a cropped base64 image or a regular file upload.
     */
    public function updateAvatar(UpdateAvatarRequest $request): RedirectResponse
    {
        $user = Auth::user();
        $user->clearMediaCollection('avatar');

        if ($request->filled('cropped_image')) {
            // Handle base64 cropped image from Cropper.js
            $base64 = $request->input('cropped_image');
            $data = substr($base64, strpos($base64, ',') + 1);
            $decoded = base64_decode($data);

            // Detect extension from mime
            preg_match('/^data:image\/(\w+);/', $base64, $matches);
            $ext = $matches[1] ?? 'png';
            if ($ext === 'jpeg') $ext = 'jpg';

            $fileName = 'avatar-' . Str::random(8) . '.' . $ext;
            $tmpPath = sys_get_temp_dir() . '/' . $fileName;
            file_put_contents($tmpPath, $decoded);

            $user->addMedia($tmpPath)
                ->usingFileName($fileName)
                ->toMediaCollection('avatar');
        } elseif ($request->hasFile('avatar')) {
            $user->addMediaFromRequest('avatar')
                ->toMediaCollection('avatar');
        }

        return redirect()
            ->route('bo.account.settings.edit')
            ->with('success', 'Photo de profil mise à jour avec succès.');
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
            ->with('success', 'Photo de profil supprimée.');
    }
}
