<?php
namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    use \Illuminate\Foundation\Auth\AuthenticatesUsers;

    // Override authenticated method to redirect based on role
    protected function authenticated(Request $request, $user)
    {
        if ($user->role_as === 'admin') {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('user.dashboard');
        }
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }
        
        $user = auth()->user();
        
    }
    
    
  
}
