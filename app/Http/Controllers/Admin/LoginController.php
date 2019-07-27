<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repository\UserRepositoryInterface;
use Illuminate\Contracts\Hashing\Hasher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Response;

class LoginController extends Controller
{
    /**
     * @var UserRepositoryInterface
     */
    private $userRepository;

    /**
     * @var Hasher
     */
    private $hasher;

    /**
     * LoginController constructor.
     * @param UserRepositoryInterface $userRepository
     * @param Hasher $hasher
     */
    public function __construct(UserRepositoryInterface $userRepository, Hasher $hasher)
    {
        $this->middleware('guest')->except('logout');

        $this->userRepository = $userRepository;
        $this->hasher = $hasher;
    }

    /**
     * @return View
     */
    public function loginForm(): View
    {
        return view('admin.login');
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function login(Request $request): Response
    {
        try {
            $this->validate($request, [
                'email' => 'required',
                'password' => 'required|min:8',
            ]);
        } catch (ValidationException $validationException) {
            return redirect()
                ->route('admin.login.form')
                ->withErrors($validationException->validator->errors()->getMessages(),'login')
                ->withInput()
            ;
        }

        $email = $request->request->get('email');

        $user = $this->userRepository->findByEmail($email);

        if ($user === null) {
            return redirect()
                ->route('admin.login.form')
                ->withErrors([
                    'email' => 'User is not found',
                ],'login')
                ->withInput()
            ;
        }

        $password = $request->request->get('password');

        if ($this->hasher->check($password, $user->varPassword) === false) {
            return redirect()
                ->route('admin.login.form')
                ->withErrors([
                    'password' => 'Wrong password',
                ],'login')
                ->withInput()
            ;
        }

        $isRemember = $request->request->getInt('remember') === 1;

        Auth::login($user, $isRemember);

        return redirect()->route('admin.dashboard');
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function logout(Request $request): Response
    {
        Auth::guard()->logout();

        $request->session()->invalidate();

        return redirect()->route('admin.login.form');
    }
}
