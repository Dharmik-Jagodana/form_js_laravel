<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Http\Request;
use App\Models\AdminSetting;
use App\Models\ImageUpload;
use Illuminate\Support\Str;

class AdminSettingController extends AdminController
{
    /**
     * write code for.
     *
     * @param  \Illuminate\Http\Request  
     * @return \Illuminate\Http\Response
     * @author <>
     */
    public function index()
    {
        $data = AdminSetting::get()->toArray();
        $adminSetting = [];

        foreach ($data as $key => $value) {
            $adminSetting[$value['slug']] = $value;
        }

        return view('admin.adminSetting.index',compact('adminSetting','value'));
    }

    /**
     * write code for.
     *
     * @param  \Illuminate\Http\Request  
     * @return \Illuminate\Http\Response
     * @author <>
     */
    public function update(Request $request)
    {
        $input = $request->all();
        unset($input['_token'],$input['_method']);

        $request->validate([
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'favicon_icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        if ($request->file('logo')) {
            $input['logo'] = ImageUpload::upload('uploads/logo/', $input['logo']);
        }

        if ($request->file('favicon_icon')) {
            $input['favicon_icon'] = ImageUpload::upload('uploads/favicon_icon/', $input['favicon_icon']);
        }

        foreach ($input as $key => $value) {
            if ($value !== null) {
                $adminSetting = AdminSetting::where('slug',$key)->first();
                $adminSetting->update(['value' => $value]);
            }else{
                $adminSetting = AdminSetting::where('slug',$key)->first();
                $adminSetting->update(['value' => '']);
            }
        }

        notificationMsg('success',$this->crudMessage('update','Admin Setting'));

        return redirect()->route('admin.setting');
    }
}
