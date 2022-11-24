<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\StoreInquiryRequest;
use App\Models\Client;
use App\Models\Inquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InquiryController extends Controller
{
    public function  store(StoreInquiryRequest $request)
    {

        DB::beginTransaction();
        try {
            $client = Client::where('email', $request->safe()->email)->orWhere('phone' , $request->safe()->phone)->first();
            if (is_null($client)) {
                $client  = Client::create($request->except(['_token', 'product_id', 'inquiry']));
            }
            $inquiryData = $request->except(['_token', 'name', 'phone', 'email']);
            $inquiryData['client_id'] = $client->id;
            Inquiry::create($inquiryData);
            DB::commit();
            return redirect()->back()->with('success' , 'تمت العمليه بنجاح');
        } catch (\Exception $e) {
            dd($e->getMessage());
            DB::rollBack();
            return redirect()->back()->with('error' , 'فشلت العمليه');

        }
    }

  
}
