<?php

namespace App\Http\Livewire\Admin\Logs;

use App\Models\Admin\Log;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Index extends Component
{
    use WithFileUploads;
    use WithPagination;



    public $readyToLoad = false;

    public $search;
    protected $queryString = ['search'];

    protected $paginationTheme = 'bootstrap';


    public function loadLogo()
    {
        $this->readyToLoad = true;

    }

    public function render()
    {
        $logs = $this->readyToLoad ? Log::where('actionType','LIKE','%'.$this->search.'%')->latest()->paginate(15):[];

        return view('livewire.admin.logs.index',compact('logs'));
    }
}
