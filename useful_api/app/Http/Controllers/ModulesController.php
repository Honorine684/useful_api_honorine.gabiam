<?php

namespace App\Http\Controllers;

use App\Models\user_modules;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\modules;
class ModulesController extends Controller
{
    public function getModules()
    {
        $modules = modules::select('id','name','description')->get();
        return response()->json([
            'modules' => $modules
        ]);
    }

    public function moduleActivate($id)
    {
        $userId = Auth::id();
        $isActive = DB::table('user_modules')->where('module_id', $id)->pluck('active');
        $moduleExistant = DB::table('modules')->where('id',$id)->first();
        if(!$moduleExistant){
            return response()->json([],404);
        }
        /*if($isActive){
            DB::table('modules')->update(['active' => true]);
        }*/
        DB::table('user_modules')->insert([
            'user_id'=>$userId,
            'module_id'=>$id,
            'active'=>true,
            'created_at'=>now()
        ]);
        return response()->json([
                "message" => "Module activated"
            ], 200);
    }

        public function moduleDeactivate($id)
    {
        $moduleExistant = DB::table('modules')->where('id',$id)->first();
        $isActive = DB::table('user_modules')->where('module_id', $id)->pluck('active');

        if(!$moduleExistant){
            return response()->json([],404);
        }
        if ($isActive) {
            DB::table('user_modules')->update(['active' => false,'updated_at'=>now()]);
        }
        return response()->json([
                "message" => "Module deactivated"
            ], 200);
    }


}
