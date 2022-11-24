<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Admin\Profile\UpdateProfileRequest;

class ProfileController extends Controller
{
    public function profile()
    {
        $admin = Auth::user();
        return view('admin.profile.profile', compact('admin'));
    }


    public function update(UpdateProfileRequest $request, Admin $admin)
    {
        DB::beginTransaction();
        try {
            $data = [];
            $data['name'] = $request->safe()->name;
            if (!empty($request->safe()->password)) {
                $data['password'] = Hash::make($request->safe()->password);
            }
            $admin->update($data);
            if (isset($request->safe()->image)) {
                $media = $admin->getMedia('admins');
                if (!empty($media[0])) {
                    $media[0]->delete();
                }
                $admin->addMedia($request->safe()->image)->toMediaCollection('admins');
            }
            DB::commit();
            return  redirect()->route('profile')->with(['success' => 'تمت العمليه بنجاح']);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('profile')->with(['error' => 'فشلت العمليه ']);
        }
    }
}
