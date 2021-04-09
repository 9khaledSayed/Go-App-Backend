<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */

    public function index(Request $request)
    {

        if ($request->ajax())
        {

            $users = User::all();
            return response()->json(["data" => $users]);

        }

        return view('dashboard.users.index');
    }



    public function show(User $user)
    {
        return view('dashboard.users.show',compact('user'));
    }



    public function destroy(Request $request, $id)
    {

        if($request->ajax())
        {

            return response()->json([
                    'message' => 'لا يمكن حذف هذا المشرف'
            ],422);

        }
    }
}
