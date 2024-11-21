<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithFileUploads;
use Str;

class ProfileForm extends Component
{
    use WithFileUploads;

    public $first_name;
    public $last_name;
    public $email;
    public $current_password;
    public $new_password;
    public $new_password_confirmation;
    public $profile_photo;
    public $success = NULL;

    protected function rules(): array
    {
        return [
            'first_name'       => 'nullable|string|max:100|min:3',
            'last_name'        => 'nullable|string|max:100|min:3',
            'email'            => 'nullable|email|max:100|unique:users,email,' . auth()->id(),
            'current_password' => 'nullable|string|max:100',
            'new_password'     => 'nullable|min:8|max:100|confirmed',
            'profile_photo'    => 'nullable|image|mimes:jpeg,png,jpg|max:4096|mimetypes:image/jpeg,image/png,image/jpg',
        ];
    }

    public function mount(): void
    {
        $this->email = old('email', auth()->user()->email);
        $this->first_name = old('first_name', auth()->user()->first_name);
        $this->last_name = old('last_name', auth()->user()->last_name);
    }

    public function render(): View
    {
        return view('livewire.profile-form');
    }

    public function updated($propertyName): void
    {
        $this->success = null;
        $this->validateOnly($propertyName);
    }

    public function submit(): void
    {
        $this->validate();
        $user = Auth::user();

        $this->update_profile($user);
        $this->update_password($user);

        $this->success = "Profile updated successfully";
        $user->save();

        $this->session_restart($user);
    }

    public function update_password($user): void
    {
        if(!isset($this->current_password) or $this->current_password === "")
            return;

        if(!Hash::check($this->current_password, $user->password))
        {
            $this->success = null;
            $this->addError('current_password', 'The current password is incorrect.');
            return;
        }
        $user->password = $this->new_password;
    }

    public function update_profile($user): void
    {
        if($this->first_name)
            $user->first_name = $this->first_name;
        if($this->last_name)
            $user->last_name = $this->last_name;
        if($this->email)
            $user->email = $this->email;

        if($this->profile_photo)
        {
            $randomName = Str::random(40) . '.' . $this->profile_photo->getClientOriginalExtension();
            $path = $this->profile_photo->store('profileImages', $randomName, 'public');
            $user->profile_photo_path = $path;
        }
    }

    public function session_restart($user): void
    {
        auth()->logout();
        auth()->login($user);
    }

}
