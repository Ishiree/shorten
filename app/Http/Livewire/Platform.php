<?php

namespace App\Http\Livewire;

use App\Platform as AppPlatform;
use App\Url;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Platform extends Component
{
    use WithPagination;

    public $nama, $url_platform, $platform_id;
    public $updateMode = false;

    public function render()
    {  
        $platforms=AppPlatform::paginate(8);
        
        
        return view('livewire.platform',[
            'platforms' => $platforms,
            // 'countUrl'  => $countUrl
        ]);
    }

    private function resetInputFields(){
        $this->nama = '';
        $this->url_platform = '';
    }

    public function store()
    {
    $this->user_id = Auth::user()->id;

        $validatedDate = $this->validate([
            'nama' => 'required',
            'url_platform' => 'required',
        ]);
  
        AppPlatform::create($validatedDate);
  
        session()->flash('message', 'Platform Added Successfully.');
  
        $this->resetInputFields();
    }
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function edit($id)
    {
        $platform = AppPlatform::findOrFail($id);
        $this->platform_id = $id;
        $this->nama = $platform->nama;
        $this->url_platform = $platform->url_platform;
        
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
            'nama' => 'required',
            'url_platform' => 'required',
        ]);
  
        $platform = AppPlatform::find($this->platform_id);
        $platform->update([
            'nama' => $this->nama,
            'url_platform' => $this->url_platform,
        ]);
  
        $this->updateMode = false;
  
        session()->flash('message', 'Platform Updated Successfully.');
        $this->resetInputFields();
    }
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function delete($id)
    {
        AppPlatform::find($id)->delete();
        session()->flash('message', 'Platform Deleted Successfully.');
    }
}
