<?php

namespace App\Http\Livewire;

use App\Platform;
use App\Url;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $countPlatform = Platform::count('id');
        $countUrl = Url::count('id');
        $sumVisit = Url::sum('visits');

        return view('livewire.index', [
          'countPlatform' => $countPlatform,
          'countUrl' => $countUrl,
          'sumVisit' => $sumVisit
        ]);
    }
}
