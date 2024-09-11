<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\LoginAction;
use App\Models\User;

class LoginController extends Controller {

    public function __invoke(Request $request) {
        $input = $request->input();
        return match($input['action']) {
            LoginAction::Register->name => $this->register($input),
            LoginAction::Login->name => $this->login($input)
        };
    }

    private function register(array $input) {
        if ($this->userExists($input['email']))
            return back()->withErrors([
                'msg' => "The user '{$input['email']}' already exists",
                'color' => 'danger'
            ]);
        $user = new User([...$input, 'name' => $input['email']]);
        $saved = $user->save();
        return back()->withErrors([
            'msg' => $saved ? "The user '{$input['email']}' has been successfully created!" : "Couldn't create user '{$input->email}'",
            'color' => $saved ? 'success' : 'danger'
        ]);
    }

    private function login(array $input) {
        $credentials = $this->credentials($input);
        if (Auth::attempt($credentials)) {
            request()->session()->regenerate();
            return redirect()->intended('/tasks');
        }
        return back()->withErrors([
            'msg' => 'The supplied credentials are not valid. Try again',
            'color' => 'danger'
        ]);
    }

    private function userExists(string $email): bool {
        return User::where('email', $email)->first() !== null;
    }

    private function credentials(array $input): array {
        return [
            'email' => $input['email'],
            'password' => $input['password']
        ];
    }
}
