<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(10);
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this->validate($request,[
            'name' =>'required|min:3|max:100',
            'email' =>'required|email',
            'tipe' => 'required'

       ]);
       if ($request->input('password')) {
            $password = bcrypt($request->password);
        }else{
            $password = bcrypt('123456789');
        }   

        User::create([
            'name' =>$request->name,
            'email' =>$request->email,
            'tipe' =>$request->tipe,
            'password' =>$password
       ]);

       return redirect('/users')->with('success', 'Data User Berhasil di Simpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        User::find($user->id);
        return view('admin.users.edit', compact('user'));
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
        $this->validate($request,[
            'name' =>'required|min:3|max:100',
            'tipe' => 'required'

       ]);
    if ($request->input('password')) {
        $users_data =[
            'name' =>$request->name,
            'tipe' =>$request->tipe,
            'password' =>bcrypt($request->password)
        ];
    }else{
       $users_data =[
        'name' =>$request->name,
        'tipe' =>$request->tipe,
        ];
        }

        $users = User::find($id);
        $users->update($users_data);
        return redirect('/users')->with('success', 'Data User Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $users = User::find($id);
      $users->delete();
      return redirect('/users')->with('success', 'Data User Berhasil di Hapus');
          
    }
}
