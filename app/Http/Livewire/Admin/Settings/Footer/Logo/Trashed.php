<?php

namespace App\Http\Livewire\Admin\Settings\Footer\Logo;

use App\Models\Admin\Log;
use App\Models\Admin\Settings\FooterLogo;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Trashed extends Component
{
    use WithFileUploads;
    use WithPagination;
    use AuthorizesRequests;

    public $title;
    public $image;
    public $type;
    public $status;

    public $readyToLoad = false;

    public $search;
    protected $queryString = ['search'];

    protected $paginationTheme = 'bootstrap';




    public function deleteId($id)
    {
        $this->deleteId = $id;

    }

    public function delete()
    {
        $logo = FooterLogo::onlyTrashed()->first();
        if ($logo->image)
        {
            unlink($logo->image);
            $logo->forceDelete();
        }
        $logo->forceDelete();
        Log::createLog(auth()->user()->id,'delete','لگو '.$logo->title.' حذف شد');
        $this->emit('toast','success','ایتم مورد نظر به حذف شد');

    }
    public function restore($id)
    {
        $logo = FooterLogo::withTrashed()->findOrFail($id);
        $logo->restore();
        Log::createLog(auth()->user()->id,'restore','لگو '.$logo->title.' بازیابی شد');
        $this->emit('toast','success','ایتم مورد نظر بازیابی شد');

    }


    public function loadLogo()
    {
        $this->readyToLoad = true;

    }

    public function render()
    {
        $this->authorize('setting-footer-logo',FooterLogo::class);
        $logos = $this->readyToLoad ? FooterLogo::where('title','LIKE','%'.$this->search.'%')->orderBy('id','desc')
            ->onlyTrashed()->paginate(10):[];
        return view('livewire.admin.settings.footer.logo.trashed',compact('logos'));
    }
}
