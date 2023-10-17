<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Token;

use Exception;

use Illuminate\Http\Request;

use function Laravel\Prompts\alert;

class authController extends Controller
{
    public function register(Request $request) {
        try {
            $user = new User();
            $user->name = $request->name;
            $user->pw = hash('md5' , $request->password);
            $user->save();
            $message = "<p style=\"font-family: Arial\">Succes!</p>";
        } catch(Exception) {
                $message = "<p style=\"font-family: Arial\">Error in account registration.</p>";
            }
        echo $message , "<a style=\"font-family: Arial\" href=\"/register\">Click here to go back</a>";
    }

    public function login(Request $request) {
            $user = User::where('name', '=', $request->name)->first();
            if($user) {
                if (hash('md5' , $request->password) === $user->pw) {
                    $message = "<p style=\"font-family: Arial\">Succesfully logged in as: " . $user->name . ".</p>";
                } else {
                    $message = "<p style=\"font-family: Arial\">Incorrect Password</p>";
                }
            } else {
                $message = "<p style=\"font-family: Arial\">unkown user</p>";
            }
            echo $message , "<a style=\"font-family: Arial\" href=\"/login\">Click here to go back</a>";
    }
}
