<?php
  
namespace App\Http\Livewire;
  
use Livewire\Component;
use App\Url;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class Home extends Component
{
    public $links, $title, $original_url, $link_id, $platform_id, $user_id, $shorten_url;
    public $updateMode = false;
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function render()
    {
        $viewer = Role::find(1);
        $viewer ->givePermissionTo('view link');
        
        $maker = Role::find(2);
        $maker ->givePermissionTo('make link', 'delete link');


        $this->links = Url::all();
        return view('livewire.home');
    }
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    private function resetInputFields(){
        $this->title = '';
        $this->original_url = '';
        $this->platform_id = '';
    }
   
    public function show(Url $link)
    {
        $link->increment('visits');
        return redirect($link->original_url);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function store()
    {
        $this->user_id = Auth::user()->id;

        $validatedDate = $this->validate([
            'title' => 'required',
            'original_url' => 'required',
            'platform_id' => 'required',
            'user_id' => 'required'
        ]);
  
        Url::create($validatedDate);
  
        session()->flash('message', 'Shorten URL Created Successfully.');
  
        $this->resetInputFields();
    }
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function edit($id)
    {
        $link = Url::findOrFail($id);
        $this->link_id = $id;
        $this->title = $link->title;
        $this->original_url = $link->original_url;
        $this->shorten_url = $link->shorten_url;
  
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
            'title' => 'required',
            'original_url' => 'required',
            'platform_id' => 'required'
        ]);
  
        $link = Url::find($this->link_id);
        $link->update([
            'title' => $this->title,
            'shorten_url' => $this->shorten_url,
        ]);
  
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
        Url::find($id)->delete();
        session()->flash('message', 'Shorten URL Deleted Successfully.');
    }
}