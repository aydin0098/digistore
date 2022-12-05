<?php

namespace App\Http\Livewire\Admin\Settings\Footer\Logo;

use App\Models\Admin\Log;
use App\Models\Admin\Settings\Footer;
use App\Models\Admin\Settings\FooterLogo;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Index extends Component
{
    use WithFileUploads;
    use WithPagination;
    use AuthorizesRequests;

    public $title;
    public $image;
    public $type;
    public $status;
    public $url;

    public $readyToLoad = false;

    public $search;
    protected $queryString = ['search'];

    protected $paginationTheme = 'bootstrap';


    public FooterLogo $footerLogo;

    public function mount()
    {
        $this->footerLogo = new FooterLogo();

    }

    protected $rules = [
        'footerLogo.title' => 'nullable',
        'footerLogo.type' => 'required',
        'footerLogo.status' => 'nullable',
        'footerLogo.url' => 'nullable',
        'image'     => 'required',
    ];

    public function store()
    {
        $this->validate();
        $logo = $this->footerLogo->query()->create([
            'title'    => $this->footerLogo->title ? $this->footerLogo->title :'' ,
            'type'     => $this->footerLogo->type,
            'url'     => $this->footerLogo->url,
            'status' => 1,
        ]);
        if ($this->image) {
            $logo->update([
                'image' => uploadImage('footerLogo',$this->image)
            ]);
        }
        $this->resetForm();

        Log::createLog(auth()->user()->id,'insert','لگو '.$logo->title.' ایجاد شد');

        $this->emit('toast', 'success', 'رکورد با موفقیت ثبت شد');
    }

    public function resetForm()
    {
        $this->footerLogo->title = null;
        $this->footerLogo->type = null;
        $this->footerLogo->image = null;
        $this->footerLogo->url = null;
        $this->image = null;
    }

    public function deleteId($id)
    {
        $this->deleteId = $id;

    }

    public function delete()
    {
        $logo = FooterLogo::find($this->deleteId);
        $logo->delete();
        $this->emit('toast','success','ایتم مورد نظر به سطل زباله منتقل شد');

    }

    public function changeStatus($id)
    {
        $logo = FooterLogo::find($id);
        if ($logo->status==1)
        {
            $logo->update([
                'status' => 0
            ]);
            Log::createLog(auth()->user()->id,'update','وضعیت لگو '.$logo->title.'  تغییر یافت');
            $this->emit('toast','success','وضعیت به غیرفعال تغییر یافت');

        }else{
            $logo->update([
                'status' => 1
            ]);

            Log::createLog(auth()->user()->id,'update','وضعیت لگو '.$logo->title.'  تغییر یافت');

            $this->emit('toast','success','وضعیت به فعال شده تغییر یافت');
        }

    }


    public function loadLogo()
    {
        $this->readyToLoad = true;

    }

    public function render()
    {
        $this->authorize('setting-footer-logo',FooterLogo::class);
        $logos = $this->readyToLoad ? FooterLogo::where('title','LIKE','%'.$this->search.'%')->latest()->paginate(10):[];
        return view('livewire.admin.settings.footer.logo.index',compact('logos'));
    }
}
