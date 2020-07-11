<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Config;
use Artisan;


class SetupController extends Controller
{
    //
    public function showInstaller()
    {
        # code...
        return view('installer');
    }
    public function install(Request $request)
    {
        # code...
        //Config::set('app.name', "ame nane");
         dd($request->all());
        try {

            $this->setEnvironmentValue(['APP_NAME'=> $request->app_name]);
            $this->setEnvironmentValue(['DB_DATABASE'=> $request->database_name]);
            $this->setEnvironmentValue(['DB_USERNAME'=> $request->database_username]);
            $this->setEnvironmentValue(['DB_PASSWORD'=> $request->database_password]);
    
        } catch (\Throwable $th) {
            return "در هنگام شخصی سازی مشکلی پیش آمده است.";
        }

        try {
            Artisan::call('migrate');
        } catch (\Throwable $th) {
            return "در هنگام ساخت دیتابیس مشکلی پیش آمده است.";
        }
       

        return redirect('/');
    }
    public function setEnvironmentValue(array $values)
    {
        $envFile = app()->environmentFilePath();
        $str = file_get_contents($envFile);

        if (count($values) > 0) {
            foreach ($values as $envKey => $envValue) {

                $str .= "\n"; // In case the searched variable is in the last line without \n
                $keyPosition = strpos($str, "{$envKey}=");
               
                $endOfLinePosition = strpos($str, "\n", $keyPosition);
                
                $oldLine = substr($str, $keyPosition, $endOfLinePosition - $keyPosition);
               
                // If key does not exist, add it
                if (!$keyPosition || !$endOfLinePosition || !$oldLine) {
                    $str .= "{$envKey}={$envValue}\n";
                    
                } else {
                    $str = str_replace($oldLine, "{$envKey}={$envValue}", $str);
                }

            }
    }

    $str = substr($str, 0, -1);
    if (!file_put_contents($envFile, $str)) return false;
    return true;

    }
}
