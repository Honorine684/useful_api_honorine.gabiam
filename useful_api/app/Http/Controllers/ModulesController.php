<?php

namespace App\Http\Controllers;

use App\Models\user_modules;
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
        $isActive = DB::table('user_modules')->where('id', $id)->pluck('active');
        $moduleExistant = DB::table('user_modules')->where('id',$id)->first();
        if(!$moduleExistant){
            return response()->json([],404);
        }
        if (!$isActive) {
            DB::table('user_modules')->update(['active' => true]);
        }
        return response()->json([
                "message" => "Module activated"
            ], 200);
    }

        public function moduleDeactivate($id)
    {
        $moduleExistant = DB::table('user_modules')->where('id',$id)->first();
        $isActive = DB::table('user_modules')->where('id', $id)->pluck('active');

        if(!$moduleExistant){
            return response()->json([],404);
        }$moduleExistant = DB::table('user_modules')->where('id',$id)->get();
        if ($isActive) {
            DB::table('user_modules')->update(['active' => false]);
        }
        return response()->json([
                "message" => "Module deactivated"
            ], 200);
    }


}
