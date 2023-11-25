<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\View\View;
class PasswordResetLinkAllController extends Controller
{
    /**
     * Display the password reset link request view.
     */
    
     public function create(): View
    {
        return view('users');
    }
    
    
    /**
     * Handle an incoming password reset link request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */

    
    public function store_new(Request $request): RedirectResponse
    {
        //dd($request);
        
        $request->validate([
            'email' => ['required', 'email'],
        ]);
        $subscribers = User::select('email', 'email_verified_at')->get();
        //exit(var_dump($subscribers));
        foreach ($subscribers as $subscriber) {

            if ($subscriber->email_verified_at == null) {
 
                $data[] = array(
                    'email',$subscriber->email,
                    'email_verified_at', $subscriber->email_verified_at
                );
                
                $email['email'] = array($subscriber->email);
                $status = Password::sendResetLink($email);
                //exit (var_dump($status));
                $status == Password::RESET_LINK_SENT
                ? back()->with('status', __($status))
                : back()->withInput($subscriber->email)
                        ->withErrors(['email' => __($status)]);

                $email_status[] =array('status' => $status, 'email' => $subscriber->email);        

            }
        }
        //exit(var_dump($email_status));

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.

        return redirect()->route('users_sent_email');
        //return $email_status;
    }
    
}
