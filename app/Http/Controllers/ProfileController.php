<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use App\Repositories\UserRepository;
use App\User;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{

    public function __construct(UserRepository $user)
    {
        $this->middleware('verified');
        $this->middleware('isaccept');
        //$this->middleware('companyActive');
        $this->middleware('details')->except(['edit', 'update']);
        $this->userRepo = $user;
    }

    public function index()
    {
        return redirect(route('profile.show', auth()->user()->id));
    }

    /**
     * Show the form for editing the profile.
     *
     * @param $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        //dd($this->userRepo->get($id));
        if ((int)$id === auth()->id() or auth()->user()->hasRole('super admin')) {
            return view('profile.show')->withUser($this->userRepo->get($id));
        } else {
            return back()->withStatus(__("You can only view your own profile"));
        }
    }

    /*
     * Display the edit profile form
     */
    public function edit($id)
    {
        if ((int)$id === auth()->id() or auth()->user()->hasRole('super admin')) {
            return view('profile.edit')->withUser($this->userRepo->get($id));
        } else {
            return back()->withStatus(__("You can only edit your own profile"));
        }
    }

    /**
     * Update the profile
     *
     * @param ProfileRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProfileRequest $request)
    {
        $user = $this->userRepo->get((int) $request->route()->profile);

        $this->userRepo->update($user, $request->all());

        return back()->withStatus(__('Profile successfully updated.'));
    }

    /**
     * Change the password
     *
     * @param PasswordRequest $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function password(PasswordRequest $request, User $user)
    {
        //TODO moet via een repo gaan gebeuren, en moet nog nagedacht worden over hoe hij gewijzigd wordt, mail of uitloggen
        $user->update(['password' => Hash::make($request->get('password'))]);
        return back()->withStatusPassword(__('Password successfully updated.'));
    }
	
	 public function clear(PasswordRequest $request, User $user)
    {
        //TODO moet via een repo gaan gebeuren, en moet nog nagedacht worden over hoe hij gewijzigd wordt, mail of uitloggen
        $user->update(['password' => Hash::make($request->get('password'))]);
        return back()->withStatusPassword(__('Password successfully updated.'));
    }
}
