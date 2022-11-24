<?php

namespace App\Http\Controllers\Admin;

use App\Models\Help;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class helpController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.help.index', ['helps' => Help::all()]);
    }
    public function destory(Help $help)
    {

        DB::beginTransaction();
        try {
            $help->delete();
            DB::commit();
            return redirect()->back()->with(['success' => 'تمت العمليه بنجاح']);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with(['error' => 'فشلت العمليه']);
        }
    }
}
