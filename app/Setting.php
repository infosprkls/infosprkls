<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    public function getAll($numPerPage){
        return Setting::orderBy('id', 'ASC')->paginate($numPerPage);

        
    }

    public function updateValue($setting_id,$setting_value){
        
        $setting_id=Setting::find($setting_id);
        $setting_id->setting_value = $setting_value;
        $setting_id->save();
    }

    public function getSettingBykey($key){
        return Setting::where('setting_key', '=', $key)->get();

    }
}
