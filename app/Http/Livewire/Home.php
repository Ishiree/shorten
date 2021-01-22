<?php
  
namespace App\Http\Livewire;

use App\Platform;
use Livewire\Component;
use App\Url;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Livewire\WithPagination;

class Home extends Component
{
    use WithPagination;
    
    public    $title, $original_url, $link_id, $platform_id, $user_id, $shorten_url;
    public $updateMode = false;
    protected $links;
    public $kitabisa = false;
    public $donasiberkah = false;
    public $amalsholeh = false;
    public $sortAsc = true;
    public $sortField, $jenis;
    protected $updatesQueryString = ['search'];
    public $filtering;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    public $search;
    public $allPlatform;
    
    public function updatingSearch(){
        $this->resetPage();
    }
    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortAsc = ! $this->sortAsc;
        } else {
            $this->sortAsc = true;
        }

        $this->sortField = $field;
    }
    public function resetFilter()
    {
        $links = $this->search === null ?
            Url::orderBy('title', $this->sortAsc ? 'asc' : 'desc')->paginate(8) :
            Url::orderBy('title', $this->sortAsc ? 'asc' : 'desc')->where('title', 'like', '%'.$this->search.'%')->paginate(8);
        $this->resetPage();
            return $links;
    }   
    public function filterPlatform()
    {
        if($this->filtering){
            $links = $this->search === null ?
            Url::orderBy('title', $this->sortAsc ? 'asc' : 'desc')->where('platform_id', $this->filtering)->paginate(8) :
            Url::orderBy('title', $this->sortAsc ? 'asc' : 'desc')->where('platform_id', $this->filtering)->where('title', 'like', '%'.$this->search.'%')->paginate(8);
        }elseif($this->allPlatform){    
            $links = $this->resetFilter();    
        }else{
            $links = $this->search === null ?
            Url::orderBy('title', $this->sortAsc ? 'asc' : 'desc')->paginate(8) :
            Url::orderBy('title', $this->sortAsc ? 'asc' : 'desc')->where('title', 'like', '%'.$this->search.'%')->paginate(8);
        }
        return $links;
    }
     public function render()
    {
        $viewer = Role::find(1);
        $viewer ->givePermissionTo('view link');
        
        $maker = Role::find(2);
        $maker ->givePermissionTo('make link', 'delete link');

        $admin = Role::find(3);
        $admin ->givePermissionTo('administrator');

        $platforms = Platform::all();

        
        $this->links = Url::paginate(8);
        $this->links = $this->filterPlatform(); 
        
        return view('livewire.home', [
            
            'links' => $this->links,
            'platforms' => $platforms
        ]);
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
        $this->platform_id= $link->platform_id;
        
        // $this->updateMode = true;
    }
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function cancel()
    {
        // $this->updateMode = false;
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
            'platform_id' => 'required',
            'shorten_url' => 'unique:urls,shorten_url'
        ]);
  
        $link = Url::find($this->link_id);
        $link->update($validatedDate);
  
        // $this->updateMode = false;
  
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