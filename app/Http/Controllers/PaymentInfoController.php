<?php

namespace App\Http\Controllers;

use App\PaymentInfo;
use Illuminate\Http\Request;
use Laracasts\Utilities\JavaScript\JavaScriptFacade as Javascript;
use Illuminate\Support\Facades\View;
use Request as ajaxCall;

class PaymentInfoController extends Controller
{
    public function __construct()
    {
        $this -> middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (ajaxCall::ajax()){
            return view::make('admin/pages/payment') -> with ('data',$data = [
                'SubPage' => 'Payment - Information',
            ]) -> render();
        }else{
            return redirect('admin#Payment');
        }
    }
    public function home(){
        return 'Public page!!';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PaymentInfo  $paymentInfo
     * @return \Illuminate\Http\Response
     */
    public function show(PaymentInfo $paymentInfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PaymentInfo  $paymentInfo
     * @return \Illuminate\Http\Response
     */
    public function edit(PaymentInfo $paymentInfo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PaymentInfo  $paymentInfo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PaymentInfo $paymentInfo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PaymentInfo  $paymentInfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaymentInfo $paymentInfo)
    {
        //
    }
}
