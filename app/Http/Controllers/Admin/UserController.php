<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserRequest;
use App\Http\Services\Image\ImageService;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        $users = User::query();
        
        if ($searchString = request('search'))
            $users->where('full_name', "LIKE", "%{$searchString}%");

        if (request('admin'))
            $users->where('is_admin', 1);


        $users = $users->whereNot('id', auth()->user()->id)->latest()->paginate(10);

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request , ImageService $imageService): RedirectResponse
    {
        DB::transaction(function () use ($request, $imageService) {
            $inputs = $request->all();

            // save profile photo
            if ($request->hasFile('profile_photo')) {
                $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . "user" . DIRECTORY_SEPARATOR . "avatars");
                $image = $imageService->save($request->profile_photo);
                $inputs['profile_photo'] = $image;
            }

            $inputs['password'] = Hash::make($inputs['password']);

            User::create($inputs);

        });

        return to_route('admin.users.index')->with('toast-success', 'کاربر جدید ایجاد شد.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user): View
    {
        return view('admin.users.edit' , compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user): RedirectResponse
    {
        DB::transaction(function () use ($request, $user) {
            $inputs = $request->all();
            if (is_null($inputs['password']))
                unset($inputs['password']);
            else
                $inputs['password'] = Hash::make($inputs['password']);

            $user->update($inputs);
        });

        return to_route('admin.users.index')->with('toast-success', 'تغییرات روی کاربر اعمال شد.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
