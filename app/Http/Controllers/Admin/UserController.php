<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Http\Request;
use App\Models\User;
use DataTables;
use App\Mail\DemoMail;
use App\Mail\OrderShipped;
use App\Mail\NewTestMail;
use App\Jobs\TestJob;
use Mail;
use Hash;

class UserController extends AdminController
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::select('*');

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                        $btn = '<a href="' . route('user.edit', $row->id) . '" class="edit btn btn-info btn-sm"><i class="fa fa-pen"></i> </a>';
                        $btn = $btn. '<form action="'. route('user.destroy', $row->id) .'" method="POST" class="d-inline">
                            '. method_field('DELETE') . csrf_field() .'
                            <button type="submit" class="btn btn-danger btn-sm delete_crud"><i class="fa fa-trash"></i></button>
                        </form>';

                        return $btn;
                })
                ->addColumn('created_at',function($row){
                    return dynamicDateFormat($row->created_at, 6);
                })
                ->rawColumns(['action','created_at'])
                ->make(true);
        }
        return view('admin.user.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users|email',
            'password' => 'required',
            'confirm_password' => 'required_with:password|same:password',
        ]);

        $input['password'] = bcrypt($input['password']);
        
        $user = User::create($input);

        $user->testingMail($user->email);

        notificationMsg('success',$this->crudMessage('add','User'));

        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.user.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $input = $request->all();

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'. $user->id,
            'confirm_password' => 'required_with:password|same:password',
        ]);

        if (!empty($request['password'])) {
            $input['password'] = bcrypt($request->input('password'));
        }
        else {
            $input['password'] = $user->password;
        }
        
        $user->update($input);

        notificationMsg('success',$this->crudMessage('update','User'));

        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        notificationMsg('success',$this->crudMessage('delete','User'));

        return redirect()->back();
    }

    /**
     * write code for.
     *
     * @param  \Illuminate\Http\Request  
     * @return \Illuminate\Http\Response
     * @author <>
     */
    public function profile()
    {
        $user = auth()->user();

        return view('admin.user.profile', compact('user'));
    }

    /**
     * write code for.
     *
     * @param  \Illuminate\Http\Request  
     * @return \Illuminate\Http\Response
     * @author <>
     */
    public function updateProfile(Request $request)
    {
        $input = $request->all();
        
        $user = auth()->user();

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'. $user->id,
            'confirm_password' => 'required_with:password|same:password',
        ]);

        if (!empty($input['password'])) {
            $user->password = Hash::make($input['password']);
        }

        if (!empty($input['email'])) {
            $user->email = $input['email'];
        }

        $user->name = $request->name;

        $user->save($input);

        notificationMsg('success',$this->crudMessage('update','Profile'));

        return redirect()->route('admin.profile');
    }
}