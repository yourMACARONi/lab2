<?php

namespace App\Http\Controllers;
use Illuminate\Http\Response;
use Illuminate\Http\Request; 
use App\Models\User; 


class TeacherController extends Controller
{
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }
// VIEW ALL

    public function get()
    {
    
        $users = User::all();

        return response()->json($users, 200); // <-- before
        // return $this->successResponse($users);
    }

// SEARCH BY ID
public function showUserWithID($id)
{ 
   return User::where('teacherid', '=', $id)->get();
}


    

// INSERT
public function addUser(Request $request)
{
    
    $rules = [
        $this->validate($request, [
            'lastname' => 'required|alpha:max:50',
            'firstname' => 'required|alpha:max:50',
            'middlename' => 'required|alpha:max:50',
            'bday' => 'date',
            'age' => 'required|int:gt:18 years'
        ])  
    ];
    $this->validate($request, $rules);
    $user = User::create($request->all());
    
    return $this->successResponse($user, Response::HTTP_CREATED);
}

// UPDATE
public function updateUserInfo(Request $request, $id)
{
    $rules = [
        $this->validate($request, [
            'lastname' => 'required|alpha:max:50',
            'firstname' => 'required|alpha:max:50',
            'middlename' => 'required|alpha:max:50',
            'bday' => 'date',
            'age' => 'required|int:gt:18 years'
        ])  
    ];
    $this->validate($request, $rules);
    $user = User::findOrFail($id);
    $user->fill($request->all());

    $user->save();

    return $user;
}

// DELETE

public function deleteTeacher($id)
{
    $user = User::findOrFail($id);
    $user->delete();
}


}