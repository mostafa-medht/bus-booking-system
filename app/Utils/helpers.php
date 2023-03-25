<?php

function returnCustomValidationError($message, $errors): \Illuminate\Http\JsonResponse
{
    $allErrors = [];

    foreach ($errors->toArray() as $key => $error){
           $allErrors[$key]['field'] = $key;
           $allErrors[$key]['message'] = $error[0];
    }

    return response()->json([
        'status' => false,
        'message' => $message,
        'errors' => array_values($allErrors),
    ],422);
}

function returnAuthenticationValidationError($message, $errors): \Illuminate\Http\JsonResponse
{
    $allErrors = [];

    foreach ($errors->toArray() as $key => $error){
        $allErrors[$key]['field'] = $key;
        $allErrors[$key]['message'] = $error[0];
    }

    return response()->json([
        'status' => false,
        'message' => $message,
        'errors' => array_values($allErrors),
    ],401);
}

