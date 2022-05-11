<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\FeedbackNew;
use Illuminate\Http\Request;
use Validator;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return FeedbackNew::all();
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
        $validator = Validator::make(
            $request->all(),
            [
                'countryId' =>  ['required'],
                'username' => ['required', 'between:3,40'],
                'phone' => ['required', 'digits:10'],
                'message' => ['required','between:3,5000']
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'error' => $validator->errors()
            ])->setStatusCode(404);
        }

        $feedback = FeedbackNew::create([
            "countryId" =>  $request->countryId,
            "username" => $request->username,
            "phone" => $request->phone,
            "message" => $request->message
        ]);

        return [
            'status' => true,
            'feedback' => $feedback
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $feedback = FeedbackNew::find($id);

        if (!$feedback) {
            return response()->json([
                "status" => false,
                "message" => "Feedback not found"
            ])->setStatusCode(404);
        }

        return $feedback;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
