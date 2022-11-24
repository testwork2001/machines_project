<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Web\StoreHelpRequest;
use App\Models\Help;

class HelpController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(StoreHelpRequest $request)
    {
        DB::beginTransaction();
        try {
            Help::create($request->validated());
            DB::commit();
            return redirect()->back()->with(['success'=>'تم ارسال رسالتك سف يتم التوصل معك فى اقرب وقت']);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with(['error'=>'فشلت العمليه']);

        }
    }
}
