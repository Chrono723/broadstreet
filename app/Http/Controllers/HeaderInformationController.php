<?php

namespace App\Http\Controllers;

use App\HeaderInformation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Request as ajaxCall;


class HeaderInformationController extends Controller
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
        if (ajaxCall::ajax()) {return json_encode(HeaderInformation::all());}
        else {return redirect('admin#HeaderInformation');}
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
            'author' => 'required|min:3|max:15|unique:header_informations',
            'description' => 'required|min:3|max:255',
            'is_active' => 'required|boolean',
            'pages' => 'required|in:front,back,all,hybrid'
        ]);

        if ($validator->fails()) {
            return json_encode([
                'name' => 'Header Information',
                'status' => 'failed',
                'text' => $validator->errors()
            ]);
        }else{
            $newHeaderInformation = new HeaderInformation();
            $newHeaderInformation -> author = $request -> author;
            $newHeaderInformation -> description = $request -> description;
            $newHeaderInformation -> is_active = $request -> is_active;
            $newHeaderInformation -> pages = $request -> pages;
            $newHeaderInformation -> save();
            return json_encode([
                'name' => 'Header Information',
                'status' => 'success',
                'text' => 'successfully created and stored new Header Information.'
            ]);
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\HeaderInformation  $headerInformation
     * @return \Illuminate\Http\Response
     */
    public function show(HeaderInformation $headerInformation)
    {
        return json_encode($headerInformation);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HeaderInformation  $headerInformation
     * @return \Illuminate\Http\Response
     */
    public function edit(HeaderInformation $headerInformation)
    {
        return json_encode($headerInformation);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HeaderInformation  $headerInformation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HeaderInformation $headerInformation)
    {
        $rulesAuthor = ['author' => 'sometimes|required|min:3|max:15|unique:header_informations'];
        $rulesDescription = ['description' => 'min:3|max:255'];
        $rulesIsActive = ['is_active' => 'sometimes|required|boolean'];
        $rulesPages = ['pages' => 'sometimes|required|in:front,back,all,hybrid'];

        $errors = [];
        $successes = [];
        $warnings = [];
        $data = $request -> all();

        //Handle Author Information
        if (isset($data['HeaderInformationAuthor'])){
            if ($data['HeaderInformationAuthor'] != $headerInformation->author){
                $validation = Validator::make(['author' => $data['HeaderInformationAuthor']], $rulesAuthor);
                if($validation->fails()){
                    array_push($errors, [
                        'name' => 'Author',
                        'status' => 'failed',
                        'text' => $validation->errors()
                    ]);
                }else{
                    $oldHeaderInformationAuthor = $headerInformation->author;

                    if(isset($data['image']) || isset($data['submit'])){
                        $headerInformation->author = $data['HeaderInformationAuthor'];
                        $headerInformation->save();
                    }

                    array_push($successes, [
                        'name' => 'Author',
                        'status' => 'success',
                        'text' => 'Changes accepted: '.$oldHeaderInformationAuthor.' to '.$data['HeaderInformationAuthor'].'.'
                    ]);
                }
            }
        }

        //Handle Description Information
        if (isset($data['HeaderInformationDescription'])){
            if ($data['HeaderInformationDescription'] != $headerInformation->description){
                $validation = Validator::make(['description' => $data['HeaderInformationDescription']], $rulesDescription);
                if($validation->fails()){
                    array_push($errors, [
                        'name' => 'Description',
                        'status' => 'failed',
                        'text' => $validation->errors()
                    ]);
                }else{
                    $oldHeaderInformationDescription = $headerInformation->description;

                    if(isset($data['image']) || isset($data['submit'])){
                        $headerInformation->description = $data['HeaderInformationDescription'];
                        $headerInformation->save();
                    }

                    array_push($successes, [
                        'name' => 'Description',
                        'status' => 'success',
                        'text' => 'Changes accepted: '.$oldHeaderInformationDescription.' to '.$data['HeaderInformationDescription'].'.'
                    ]);
                }
            }
        }

        //Handle Is Active Information
        if (isset($data['HeaderInformationIsActive'])){
            if ($data['HeaderInformationIsActive'] != $headerInformation->is_active){
                $validation = Validator::make(['is_active' => $data['HeaderInformationIsActive']], $rulesIsActive);
                if($validation->fails()){
                    array_push($errors, [
                        'name' => 'Is Active',
                        'status' => 'failed',
                        'text' => $validation->errors()
                    ]);
                }else{
                    $oldHeaderInformationIsActive = $headerInformation->is_active;

                    if(isset($data['image']) || isset($data['submit'])){
                        $headerInformation->is_active = $data['HeaderInformationIsActive'];
                        $headerInformation->save();
                    }

                    array_push($successes, [
                        'name' => 'Is Active',
                        'status' => 'success',
                        'text' => 'Changes accepted: '.$oldHeaderInformationIsActive.' to '.$data['HeaderInformationIsActive'].'.'
                    ]);
                }
            }
        }

        //Handle Pages Information
        if (isset($data['HeaderInformationPages'])){
            if ($data['HeaderInformationPages'] != $headerInformation->pages){
                $validation = Validator::make(['pages' => $data['HeaderInformationPages']], $rulesPages);
                if($validation->fails()){
                    array_push($errors, [
                        'name' => 'Pages',
                        'status' => 'failed',
                        'text' => $validation->errors()
                    ]);
                }else{
                    $oldHeaderInformationPages = $headerInformation->pages;

                    if(isset($data['image']) || isset($data['submit'])){
                        $headerInformation->pages = $data['HeaderInformationPages'];
                        $headerInformation->save();
                    }

                    array_push($successes, [
                        'name' => 'Pages',
                        'status' => 'success',
                        'text' => 'Changes accepted: '.$oldHeaderInformationPages.' to '.$data['HeaderInformationPages'].'.'
                    ]);
                }
            }
        }

        // Handle Website Icon
        if(isset($data['image'])){
            if($data['image'] == 'icon'){
                $photoName = 'logo_icon.'.Carbon::now() . $request->icon->getClientOriginalExtension();
                $request->icon->move(public_path('../resources/assets/img/icons/'), $photoName);

                $headerInformation->icon = $photoName;
                $headerInformation->save();

                array_push($successes, [
                    'name' => 'Icon',
                    'status' => 'success',
                    'text' =>'New Icon added.'
                ]);
            }
        }

        return [
            'status' => (empty($errors))? 'success': 'failed',
            'errors' => $errors,
            'successes' => $successes,
            'warnings' => $warnings
        ];

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HeaderInformation  $headerInformation
     * @return \Illuminate\Http\Response
     */
    public function destroy(HeaderInformation $headerInformation)
    {
        //
    }
}
