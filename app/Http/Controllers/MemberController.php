<?php

namespace App\Http\Controllers;


use App\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function login(Request $request)
    {
        if($request->session()->has('authenticateUser')){
            return redirect()->route('index');
        }
        else return view('members.login');
    }

    public function index(Request $request)
    {
        //  $members = Member::all();
        //  return view('members.index', compact('members'));

        if($request->session()->has('authenticateUser')){
            $id = $request->session()->get('authenticateUser');
            $member = Member::where('id', $id)->get();
            return view('members.index')->with('member',$member);
            //return response()->json($member);
        }
        else{
            return redirect()->route('login');
        }
    }

    public function check(Request $request)
    {
        //echo md5($request->password);
        $member = Member::where('email',$request->email)
                        ->where('password', md5($request->password))
                        ->get();
        
        $row = $member->count();
        $id = 0;
        
        if($row){
            foreach ($member as $val) {
    			$id=$val->id;
            }
            $request->session()->put('authenticateUser', $id);
            //echo $request->session()->get('authenticateUser');
            return redirect()->route('index');
        }
        else{
            return redirect()->route('login')->with(['error'=>'Wrong Email Or Password']);
        }
    }
    
    public function registration()
    {
        return view('members.registration');
    }

    public function logout(Request $request)
    {
        $request->session()->forget('authenticateUser');
        return redirect()->route('login');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:members',
            'password' => 'required|min:6'
        ]);

        $member = new Member;
        $member->name = $request->name;
        $member->email = $request->email;
        $member->password = md5($request->password);
        $member->save();
        return redirect()->route('login')->with(['success'=>'Registration Successfully Completed']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        //
    }
}
