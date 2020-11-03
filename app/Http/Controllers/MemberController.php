<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index(){

        $members = Member::orderBy('id','desc')->get();
        return view('welcome',compact('members'));
    }

    public function store(){

        $this->validateData();
        Member::create($this->validateData());
        return redirect()->back();

    }

    public function destroy(Member $member){
        $member->delete();
        return redirect()->back();
    }

    public function edit(Member $member){
        return view('edit',compact('member'));
    }

    public function update(Member $member){
        $this->validateData();
        $member->update($this->validateData());
        return redirect()->route('members.index');
    }

    public function validateData(){
        return \request()->validate(array(
            "name"=>"required"
        ),array(
            "name.required"=>"Üye İsmi Alanı Boş Bırakılamaz"
        ));
    }
}
