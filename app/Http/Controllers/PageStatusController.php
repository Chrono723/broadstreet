<?php

namespace App\Http\Controllers;

use App\PageStatus;
use Illuminate\Http\Request;
use Request as ajaxCall;
use Illuminate\Support\Facades\Validator;

class PageStatusController extends Controller
{

    public function __construct()
    {
        $this -> middleware('auth');
        $this -> middleware('access');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (ajaxCall::ajax()){
            $PageStatuses = PageStatus::all();

            return json_encode([
                'pages' => $PageStatuses,


            ]);
        }else{
            return redirect('admin#PageStatus');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
            'uri' => 'required|min:3|unique:page_statuses',
            'description' => 'min:3|max:255',
            'name' => 'required|min:3|unique:page_statuses',
            'status' => 'required|in:up,down,soon,admin',
            'request_method' => 'required|in:all,GET,PUT,POST,DELETE'
        ]);

        if ($validator->fails()) {
            return json_encode([
                'name' => 'Page Status',
                'status' => 'failed',
                'text' => $validator->errors()
            ]);
        }else{
            $PageStatus = new PageStatus();
            $PageStatus -> uri = $request -> uri;
            $PageStatus -> description = $request -> description;
            $PageStatus -> name = $request -> name;
            $PageStatus -> status = $request -> status;
            $PageStatus -> method = $request -> request_method;
            $PageStatus -> save();
            return json_encode([
                'name' => 'Page Status',
                'status' => 'success',
                'text' => 'successfully created and stored a new Page Status.'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PageStatus  $pageStatus
     * @return \Illuminate\Http\Response
     */
    public function show(PageStatus $pageStatus)
    {
        return json_encode($pageStatus);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PageStatus  $pageStatus
     * @return \Illuminate\Http\Response
     */
    public function edit(PageStatus $pageStatus)
    {
        return json_encode($pageStatus);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PageStatus  $pageStatus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PageStatus $pageStatus)
    {
        $rulesUri = ['uri' => 'sometimes|required|min:3|unique:page_statuses'];
        $rulesDescription = ['description' => 'min:3|max:255'];
        $rulesName = ['name' => 'sometimes|required|min:3|unique:page_statuses'];
        $rulesStatus = ['status' => 'sometimes|required|in:up,down,soon,admin'];
        $rulesMethod = ['request_method' => 'sometimes|required|in:all,GET,PUT,POST,DELETE'];

        $errors = [];
        $successes = [];
        $data = $request -> all();

        //Handle Uri Information
        if (isset($data['PageStatusUri'])){
            if ($data['PageStatusUri'] != $pageStatus->uri){
                $validation = Validator::make(['uri' => $data['PageStatusUri']], $rulesUri);
                if($validation->fails()){
                    array_push($errors, [
                        'name' => 'Uri',
                        'status' => 'failed',
                        'text' => $validation->errors()
                    ]);
                }else{
                    $oldPageStatusUri = $pageStatus->uri;
                    if(isset($data['image']) || isset($data['submit'])){
                        $pageStatus->uri = $data['PageStatusUri'];
                        $pageStatus->save();
                    }

                    array_push($successes, [
                        'name' => 'Uri',
                        'status' => 'success',
                        'text' => 'Changes accepted: '.$oldPageStatusUri.' to '.$data['PageStatusUri'].'.'
                    ]);
                }
            }
        }

        //Handle Description Information
        if (isset($data['PageStatusDescription'])){
            if ($data['PageStatusDescription'] != $pageStatus->description){
                $validation = Validator::make(['description' => $data['PageStatusDescription']], $rulesDescription);
                if($validation->fails()){
                    array_push($errors, [
                        'name' => 'Description',
                        'status' => 'failed',
                        'text' => $validation->errors()
                    ]);
                }else{
                    $oldPageStatusDescription = $pageStatus->description;
                    if(isset($data['image']) || isset($data['submit'])){
                        $pageStatus->description = $data['PageStatusDescription'];
                        $pageStatus->save();
                    }

                    array_push($successes, [
                        'name' => 'Description',
                        'status' => 'success',
                        'text' => 'Changes accepted: '.$oldPageStatusDescription.' to '.$data['PageStatusDescription'].'.'
                    ]);
                }
            }
        }

        //Handle  Name Information
        if (isset($data['PageStatusName'])){
            if ($data['PageStatusName'] != $pageStatus->name){
                $validation = Validator::make(['name' => $data['PageStatusName']], $rulesName);
                if($validation->fails()){
                    array_push($errors, [
                        'name' => 'Name',
                        'status' => 'failed',
                        'text' => $validation->errors()
                    ]);
                }else{
                    $oldName = $pageStatus->name;
                    if(isset($data['image']) || isset($data['submit'])){
                        $pageStatus->name = $data['PageStatusName'];
                        $pageStatus->save();
                    }

                    array_push($successes, [
                        'name' => 'Name',
                        'status' => 'success',
                        'text' => 'Changes accepted: '.$oldName.' to '.$data['PageStatusName'].'.'
                    ]);
                }
            }
        }

        //Handle  Status Information
        if (isset($data['PageStatusStatus'])){
            if ($data['PageStatusStatus'] != $pageStatus->status){
                $validation = Validator::make(['status' => $data['PageStatusStatus']], $rulesStatus);
                if($validation->fails()){
                    array_push($errors, [
                        'name' => 'Status',
                        'status' => 'failed',
                        'text' => $validation->errors()
                    ]);
                }else{
                    $oldStatus = $pageStatus->status;
                    if(isset($data['image']) || isset($data['submit'])){
                        $pageStatus->status = $data['PageStatusStatus'];
                        $pageStatus->save();
                    }

                    array_push($successes, [
                        'name' => 'Status',
                        'status' => 'success',
                        'text' => 'Changes accepted: '.$oldStatus.' to '.$data['PageStatusStatus'].'.'
                    ]);
                }
            }
        }

        //Handle  Method Information
        if (isset($data['PageStatusMethod'])){
            if ($data['PageStatusMethod'] != $pageStatus->request_method){
                $validation = Validator::make(['request_method' => $data['PageStatusMethod']], $rulesMethod);
                if($validation->fails()){
                    array_push($errors, [
                        'name' => 'Method',
                        'status' => 'failed',
                        'text' => $validation->errors()
                    ]);
                }else{
                    $oldMethod = $pageStatus->request_method;
                    if(isset($data['image']) || isset($data['submit'])){
                        $pageStatus->request_method = $data['PageStatusMethod'];
                        $pageStatus->save();
                    }

                    array_push($successes, [
                        'name' => 'Method',
                        'status' => 'success',
                        'text' => 'Changes accepted: '.$oldMethod.' to '.$data['PageStatusMethod'].'.'
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
     * @param  \App\PageStatus  $pageStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy(PageStatus $pageStatus)
    {
        //
    }
}
