<?php

namespace App\Http\Controllers;

use App\HeaderViewport;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Request as ajaxCall;

class HeaderViewportController extends Controller
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
        if (ajaxCall::ajax()) {return json_encode(HeaderViewport::all());}
        else {return redirect('admin#HeaderViewport');}
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
        $validator = Validator::make($request->all(), [
            'property' => 'required|min:3|max:35|unique:header_viewports',
            'is_active' => 'required|boolean',
            'pages' => 'required|in:front,back,all,hybrid'
        ]);

        if ($validator->fails()) {
            return json_encode([
                'name' => 'Header Viewport',
                'status' => 'failed',
                'text' => $validator->errors()
            ]);
        }else{
            $newHeaderViewport = new HeaderViewport();
            $newHeaderViewport -> property = $request -> property;
            $newHeaderViewport -> is_active = $request -> is_active;
            $newHeaderViewport -> pages = $request -> pages;
            $newHeaderViewport -> save();
            return json_encode([
                'name' => 'Header Viewport',
                'status' => 'success',
                'text' => 'successfully created and stored new Header Viewport.'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\HeaderViewport  $headerViewport
     * @return \Illuminate\Http\Response
     */
    public function show(HeaderViewport $headerViewport)
    {
        return json_encode($headerViewport);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HeaderViewport  $headerViewport
     * @return \Illuminate\Http\Response
     */
    public function edit(HeaderViewport $headerViewport)
    {
        return json_encode($headerViewport);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HeaderViewport  $headerViewport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HeaderViewport $headerViewport)
    {
        $rulesProperty = ['property' => 'sometimes|required|min:3|max:35|unique:header_viewports'];
        $rulesIsActive = ['is_active' => 'sometimes|required|boolean'];
        $rulesPages = ['pages' => 'sometimes|required|in:front,back,all,hybrid'];

        $errors = [];
        $successes = [];
        $data = $request -> all();

        //Handle Property Information
        if (isset($data['HeaderViewportProperty'])){
            if ($data['HeaderViewportProperty'] != $headerViewport->property){
                $validation = Validator::make(['property' => $data['HeaderViewportProperty']], $rulesProperty);
                if($validation->fails()){
                    array_push($errors, [
                        'name' => 'Property',
                        'status' => 'failed',
                        'text' => $validation->errors()
                    ]);
                }else{
                    $oldHeaderViewportProperty = $headerViewport->property;

                    if(isset($data['image']) || isset($data['submit'])){
                        $headerViewport->property = $data['HeaderViewportProperty'];
                        $headerViewport->save();
                    }

                    array_push($successes, [
                        'name' => 'Property',
                        'status' => 'success',
                        'text' => 'Changes accepted: '.$oldHeaderViewportProperty.' to '.$data['HeaderViewportProperty'].'.'
                    ]);
                }
            }
        }

        //Handle Is Active Information
        if (isset($data['HeaderViewportIsActive'])){
            if ($data['HeaderViewportIsActive'] != $headerViewport->is_active){
                $validation = Validator::make(['is_active' => $data['HeaderViewportIsActive']], $rulesIsActive);
                if($validation->fails()){
                    array_push($errors, [
                        'name' => 'Is Active',
                        'status' => 'failed',
                        'text' => $validation->errors()
                    ]);
                }else{
                    $oldHeaderViewportIsActive = $headerViewport->is_active;

                    if(isset($data['image']) || isset($data['submit'])){
                        $headerViewport->is_active = $data['HeaderViewportIsActive'];
                        $headerViewport->save();
                    }

                    array_push($successes, [
                        'name' => 'Is Active',
                        'status' => 'success',
                        'text' => 'Changes accepted: '.$oldHeaderViewportIsActive.' to '.$data['HeaderViewportIsActive'].'.'
                    ]);
                }
            }
        }

        //Handle Pages Information
        if (isset($data['HeaderViewportPages'])){
            if ($data['HeaderViewportPages'] != $headerViewport->pages){
                $validation = Validator::make(['pages' => $data['HeaderViewportPages']], $rulesPages);
                if($validation->fails()){
                    array_push($errors, [
                        'name' => 'Pages',
                        'status' => 'failed',
                        'text' => $validation->errors()
                    ]);
                }else{
                    $oldHeaderViewportPages = $headerViewport->pages;

                    if(isset($data['image']) || isset($data['submit'])){
                        $headerViewport->pages = $data['HeaderViewportPages'];
                        $headerViewport->save();
                    }

                    array_push($successes, [
                        'name' => 'Pages',
                        'status' => 'success',
                        'text' => 'Changes accepted: '.$oldHeaderViewportPages.' to '.$data['HeaderViewportPages'].'.'
                    ]);
                }
            }
        }

        return [
            'status' => (empty($errors))? 'success': 'failed',
            'errors' => $errors,
            'successes' => $successes,
        ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HeaderViewport  $headerViewport
     * @return \Illuminate\Http\Response
     */
    public function destroy(HeaderViewport $headerViewport)
    {
        //
    }
}
