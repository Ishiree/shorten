<?php

namespace App\Http\Livewire;

use App\ModelHasRole;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class Administrator extends Component
{
    use WithPagination;

    public  $name, $updateMode = false,
            $email, $model_id,
            $roles, $status,
            $password, 
            $password_confirmation,
            $user_id,
            $role_id;

    public function render()
    {   
        $viewer = Role::find(1);
        $viewer ->givePermissionTo('view link');
        
        $maker = Role::find(2);
        $maker ->givePermissionTo('make link', 'delete link');

        $admin = Role::find(3);
        $admin ->givePermissionTo('administrator');

        $listRoles = Role::all();

        $akuns = DB::table('users')
        ->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
        ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
        ->select('users.*', 'roles.name as role_name')
        ->paginate(8);
        return view('livewire.administrator', [
            'akuns' => $akuns,
            'listroles' => $listRoles
            // dd($akuns)
        ]);
    }

    private function resetInputFields()
    {
        $this->name = '';
        $this->email = '';
        $this->roles = '';
        $this->password = '';
        $this->password_confirmation = '';
    }

    public function store(Request $request)
    {
        $this->user_id = Auth::user()->id;

        $validatedDate = $this->validate([
            'name' => 'required|max:15',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ]);
  
        $user = User::create($validatedDate);
        $user->assignRole($this->roles);
        
         

        session()->flash('message', 'Shorten URL Created Successfully.');
  
        $this->resetInputFields();
    }

    public function resetPassword($id)
    {   $defaultPassword = 'password';
        $user = User::findOrFail($id);
        $user->update([
            'password' => $defaultPassword
        ]);
        session()->flash('message', 'Password Has Reseted Successfully.');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $this->user_id = $id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->status = $user->status;
        // $user->syncRoles([$this->roles]);

        $this->updateMode = true;
    }
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function cancel()
    {
        $this->updateMode = false;
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
            'name' => 'required',
            'email' => 'required',
            'status' => 'required',
        ]);
  
        $user = User::find($this->user_id);
        $user->update([
            'name' => $this->name,
            'email' => $this->email,
            'status' => $this->status,
        ]);

        $user->syncRoles([$this->roles]);
  
        $this->updateMode = false;
  
        session()->flash('message', 'Shorten URL Updated Successfully.');
        $this->resetInputFields();
    }
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function delete($id)
    {
        User::find($id)->delete();
        session()->flash('message', 'Shorten URL Deleted Successfully.');
    }
}
