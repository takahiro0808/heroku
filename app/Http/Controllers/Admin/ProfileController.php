<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Profile;

class ProfileController extends Controller
{
    //
    public function add()
    {
        return view('admin.profile.create');
    }
    
    public function create(Request $request)
    {
      // 以下を追記
    // Varidationを行う
    
        $this->validate($request, Profile::$rules);
        //dd($request);
        $profile = new Profile;
        $form = $request->all();
        unset($form['_token']);
        $profile->fill($form);
        $profile->save();
        //dd($profile);
        return redirect('admin/profile/create');
    }
    
    public function edit()
    {  
        return view('admin/profile/edit');
    }
    
    public function update()
    {
        return redirect('admin/profile/edit');
    }
}