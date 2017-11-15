<?php

namespace App\Http\Controllers;

use App\HeaderKeywords;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Request as ajaxCall;

class HeaderKeywordsController extends Controller
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
        if (ajaxCall::ajax()) {return json_encode(HeaderKeywords::all());}
        else {return redirect('admin#HeaderKeywords');}
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
            'name' => 'required|min:3|max:35|unique:header_keywords',
            'is_active' => 'required|boolean',
            'pages' => 'required|in:front,back,all,hybrid'
        ]);

        if ($validator->fails()) {
            return json_encode([
                'name' => 'Header Keywords',
                'status' => 'failed',
                'text' => $validator->errors()
            ]);
        }else{
            $newHeaderKeywords = new HeaderKeywords();
            $newHeaderKeywords -> name = $request -> name;
            $newHeaderKeywords -> is_active = $request -> is_active;
            $newHeaderKeywords -> pages = $request -> pages;
            $newHeaderKeywords -> save();
            return json_encode([
                'name' => 'Header Keywords',
                'status' => 'success',
                'text' => 'successfully created and stored new Header Keyword.'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\HeaderKeywords  $headerKeywords
     * @return \Illuminate\Http\Response
     */
    public function show(HeaderKeywords $headerKeywords)
    {
        return json_encode($headerKeywords);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HeaderKeywords  $headerKeywords
     * @return \Illuminate\Http\Response
     */
    public function edit(HeaderKeywords $headerKeywords)
    {
        return json_encode($headerKeywords);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HeaderKeywords  $headerKeywords
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HeaderKeywords $headerKeywords)
    {
        $rulesName = ['name' => 'sometimes|required|min:3|max:35|unique:header_keywords'];
        $rulesIsActive = ['is_active' => 'sometimes|required|boolean'];
        $rulesPages = ['pages' => 'sometimes|required|in:front,back,all,hybrid'];

        $errors = [];
        $successes = [];
        $data = $request -> all();

        //Handle Name Information
        if (isset($data['HeaderKeywordName'])){
            if ($data['HeaderKeywordName'] != $headerKeywords->name){
                $validation = Validator::make(['name' => $data['HeaderKeywordName']], $rulesName);
                if($validation->fails()){
                    array_push($errors, [
                        'name' => 'Name',
                        'status' => 'failed',
                        'text' => $validation->errors()
                    ]);
                }else{
                    $oldHeaderKeywordName = $headerKeywords->name;

                    if(isset($data['image']) || isset($data['submit'])){
                        $headerKeywords->name = $data['HeaderKeywordName'];
                        $headerKeywords->save();
                    }

                    array_push($successes, [
                        'name' => 'Name',
                        'status' => 'success',
                        'text' => 'Changes accepted: '.$oldHeaderKeywordName.' to '.$data['HeaderKeywordName'].'.'
                    ]);
                }
            }
        }

        //Handle Is Active Information
        if (isset($data['HeaderKeywordIsActive'])){
            if ($data['HeaderKeywordIsActive'] != $headerKeywords->is_active){
                $validation = Validator::make(['is_active' => $data['HeaderKeywordIsActive']], $rulesIsActive);
                if($validation->fails()){
                    array_push($errors, [
                        'name' => 'Is Active',
                        'status' => 'failed',
                        'text' => $validation->errors()
                    ]);
                }else{
                    $oldHeaderInformationIsActive = $headerKeywords->is_active;

                    if(isset($data['image']) || isset($data['submit'])){
                        $headerKeywords->is_active = $data['HeaderKeywordIsActive'];
                        $headerKeywords->save();
                    }

                    array_push($successes, [
                        'name' => 'Is Active',
                        'status' => 'success',
                        'text' => 'Changes accepted: '.$oldHeaderInformationIsActive.' to '.$data['HeaderKeywordIsActive'].'.'
                    ]);
                }
            }
        }

        //Handle Pages Information
        if (isset($data['HeaderKeywordPages'])){
            if ($data['HeaderKeywordPages'] != $headerKeywords->pages){
                $validation = Validator::make(['pages' => $data['HeaderKeywordPages']], $rulesPages);
                if($validation->fails()){
                    array_push($errors, [
                        'name' => 'Pages',
                        'status' => 'failed',
                        'text' => $validation->errors()
                    ]);
                }else{
                    $oldHeaderInformationPages = $headerKeywords->pages;

                    if(isset($data['image']) || isset($data['submit'])){
                        $headerKeywords->pages = $data['HeaderKeywordPages'];
                        $headerKeywords->save();
                    }

                    array_push($successes, [
                        'name' => 'Pages',
                        'status' => 'success',
                        'text' => 'Changes accepted: '.$oldHeaderInformationPages.' to '.$data['HeaderKeywordPages'].'.'
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
     * @param  \App\HeaderKeywords  $headerKeywords
     * @return \Illuminate\Http\Response
     */
    public function destroy(HeaderKeywords $headerKeywords)
    {
        //
    }
}
