<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Http\Services\Image\ImageService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', ['user' => $request->user(),]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request , imageService $imageService)
    {
        $user = auth()->user();

        $validated = $request->validate([
            'full_name' => 'required|string|min:3|max:255',
            'user_name' => 'required|string|min:3|max:255',
            'email' => 'required|string|min:3|max:255',
            'profile_photo' => 'nullable|image|max:2048|min:1',
        ]);

        DB::transaction(function () use($validated , $request , $imageService , $user){
            if ($request->hasFile('profile_photo')) {
                if (!empty($user->profile_photo))
                    $imageService->deleteImage($user->profile_photo);

                $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . "user" . DIRECTORY_SEPARATOR . "avatars");
                $image = $imageService->save($request->profile_photo);
                $validated['profile_photo'] = $image;
            }

            $user->update($validated);
        });

        return redirect()->back()->with('alert', 'تغیرات با موفقیت اعمال شد.');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request)
    {
            if (auth()->user()->is_admin == 0)
            {
                $user = $request->user();

                Auth::logout();

                $user->delete();

                $request->session()->invalidate();
                $request->session()->regenerateToken();

                return Redirect::to('/')->with('alert-toast' , 'حساب شما حذف شد!');
            }
        return redirect()->back()->with('alert-danger', 'مدیر سایت نمیتواند حساب خود را غیر فعال کند!');

    }
}
