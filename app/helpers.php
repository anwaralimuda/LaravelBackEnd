<?php

use Illuminate\Support\Facades\Validator;

function basicValidation($request, $rules)
{
    $validator = Validator::make(request()->all(), $rules);

    if ($validator->fails()) {
        return $validator->messages();
    }

    return null;
}


function responseFormatter($code, $status, $message, $response)
{
    $returnData = [
        'meta' => [
            'code' => $code,
            'status' => $status,
            'messgage' => $message,
        ],
        'data' => $response,
    ];
    return $returnData;
}
