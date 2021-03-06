<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Organization;
use Auth;

class OrganizationsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
 
    public function org_index()
    {
        $user_id = Auth::guard('web')->user()->id;
        $org_list = User::find($user_id)->organization()->get();
        $all_org_list = Organization::all();

        return view('organizations.org-index', compact('org_list', 'all_org_list'));
    }

    public function showInputForm()
    {
        return view('organizations.org-input-form');
    }

    public function saveOrganization()
    {
        $user_id = Auth::guard('web')->user()->id;

        if (request('aanmaken') == "aanmaken") 
        {
            $org = new Organization;            
            $org->name = request('name');

            $this->validate(request(),[
                'name' => 'required'            
            ]);

            $org->email = request('email');
            $org->streetname_number = request('streetname_number');
            $org->postal_code = request('postal_code');
            $org->city = request('city');
            $org->phonenumber = request('phonenumber');

            $org->save();
            $org->user()->attach($user_id);
            $org->user()->organization_id = $org->id;
        }

        $org_list = User::find($user_id)->organization()->get();
        $all_org_list = Organization::all();

        return view('organizations.org-index', compact('org_list', 'all_org_list'));
    }
}
