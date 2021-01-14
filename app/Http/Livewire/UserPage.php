<?php

namespace App\Http\Livewire;

use App\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserPage extends Component
{
    public  $name,
            $email,
            $password,
            $password_confirmation,
            $user_id;

    public function render()
    {
        $user = User::findOrFail(Auth::user()->id);
        $this->name = $user->name;
        $this->email = $user->email;
        return view('livewire.user-page',
    [
        'user' => $user
    ]);
    }

    private function resetInputFields(){
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->password_confirmation = '';
    }

    public function cancel()
    {
        $this->resetInputFields();
    }
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function update()
    {
        $validatedDate = $this->validate([
            'name' => 'required|min:4',
            'email' => 'required',
        ]);
  
        $user = User::findOrFail(Auth::user()->id);
        
        $user->update($validatedDate);
  
        // $this->updateMode = false;
  
        session()->flash('message', 'Profile Updated Successfully.');
        $this->resetInputFields();
    }
    public function updatePassword()
    {
        $validatedDate = $this->validate([
            'password' => 'required|confirmed'
        ]);
  
        $user = User::findOrFail(Auth::user()->id);
        
        $user->update($validatedDate);
  
        // $this->updateMode = false;
  
        session()->flash('message', 'Profile Updated Successfully.');
        $this->resetInputFields();
    }
}
