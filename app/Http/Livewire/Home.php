<?php
  
namespace App\Http\Livewire;
  
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
    public $sortField;
    protected $updatesQueryString = ['search'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // public function mount(Url $link)
    // {
    //     $link->increment('visits');
    //     return redirect($link->original_url);
    // }

    // public function linkTo(Url $link )
    // {
    //     $link->increment('visits');
    //     return redirect($link->original_url);
    // }

    // public function __construct()
    // {
    //     $this->middleware('auth');  
    // }

    public $search;

    // protected $updatesQueryString = ['search'];

    // public function updatingSearch(){
    //     $this->resetPage();
    // }

    // public function mount()
    // {
    //     $this->search = request()->query('search', $this->search);
    // }
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

     public function render()
    {
        $viewer = Role::find(1);
        $viewer ->givePermissionTo('view link');
        
        $maker = Role::find(2);
        $maker ->givePermissionTo('make link', 'delete link');

        $this->links = Url::paginate(8);
        

        if($this->kitabisa == true){
            $links = $this->search === null ?
            Url::orderBy('title', $this->sortAsc ? 'asc' : 'desc')->where('platform_id', 1)->paginate(8) :
            Url::orderBy('title', $this->sortAsc ? 'asc' : 'desc')->where('platform_id', 1)->where('title', 'like', '%'.$this->search.'%')->paginate(8); 
        }elseif($this->donasiberkah == true){
            $links = $this->search === null ?
            Url::orderBy('title', $this->sortAsc ? 'asc' : 'desc')->where('platform_id', 3)->paginate(8) :
            Url::orderBy('title', $this->sortAsc ? 'asc' : 'desc')->where('platform_id', 3)->where('title', 'like', '%'.$this->search.'%')->paginate(8); 
        }elseif($this->amalsholeh == true){
            $links = $this->search === null ?
            Url::orderBy('title', $this->sortAsc ? 'asc' : 'desc')->where('platform_id', 2)->paginate(8) :
            Url::orderBy('title', $this->sortAsc ? 'asc' : 'desc')->where('platform_id', 2)->where('title', 'like', '%'.$this->search.'%')->paginate(8); 
        }else{
            $links = $this->search === null ?
            Url::orderBy('title', $this->sortAsc ? 'asc' : 'desc')->paginate(8) :
            Url::orderBy('title', $this->sortAsc ? 'asc' : 'desc')->where('title', 'like', '%'.$this->search.'%')->paginate(8);
        }


        //     $links = Url::where('title', 'like', '%'.$this->search.'%');

        // return view('livewire.home',[
        //     'links' => $links
        // ]);
        return view('livewire.home', [
                
            'links' => $links
        ]);
    }

    public function resetFilter()
    {
        $this->kitabisa = false;
        $this->donasiberkah = false;
        $this->amalsholeh = false;
    }
  
    public function filterKitabisa()
    {   $this->donasiberkah = false;
        $this->amalsholeh = false;
       return $this->kitabisa = true; 
    }
    public function filterDonasiberkah()
    {   $this->kitabisa = false;
        $this->amalsholeh = false;
       return $this->donasiberkah = true;   
    }
    public function filterAmalsholeh()
    {   $this->donasiberkah = false;
        $this->kitabisa = false;
       return $this->amalsholeh = true;   
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
            'original_url' => $this->original_url,
            'shorten_url' => $this->shorten_url,
            'platform_id' => $this->platform_id,
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