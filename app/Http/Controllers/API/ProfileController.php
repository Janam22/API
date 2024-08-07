<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

class ProfileController extends BaseController
{
    public function profileupdate(Request $request, $id): JsonResponse {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
        ]);
        
        if ($validator -> fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $user = User::find($id);
        if ($user){
            $user->update($validator->validated());
            $success['name'] = $user->name;
            return $this->sendResponse($success, 'Profile updated successfully.');
        } else {
            return $this->sendError('Profile Updation Error.', $validator->errors());
        }

    }
}
