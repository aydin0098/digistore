<?php

namespace App\Http\Livewire\Admin\Settings\Footer\Menu;

use App\Models\Admin\Log;
use App\Models\Admin\Settings\FooterMenu;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Index extends Component
{
    use WithFileUploads;
    use WithPagination;
    use AuthorizesRequests;

    public $title;
    public $type;
    public $url;

    public $readyToLoad = false;

    public $search;
    protected $queryString = ['search'];

    protected $paginationTheme = 'bootstrap';


    public FooterMenu $footerMenu;

    public function mount()
    {
        $this->footerMenu = new FooterMenu();

    }

    protected $rules = [
        'footerMenu.title' => 'required',
        'footerMenu.type' => 'required',
        'footerMenu.url' => 'nullable',
    ];

    public function store()
    {
        $this->validate();
        $logo = $this->footerMenu->query()->create([
            'title'    => $this->footerMenu->title ,
            'type'     => $this->footerMenu->type,
            'url'     => $this->footerMenu->url ? $this->footerMenu->url : null ,
        ]);
        $this->resetForm();

        Log::createLog(auth()->user()->id,'insert','منو '.$logo->title.' ایجاد شد');
        $this->emit('toast', 'success', 'رکورد با موفقیت ثبت شد');
    }

    public function resetForm()
    {
        $this->footerMenu->title = null;
        $this->footerMenu->type = null;
        $this->footerMenu->url = null;

    }

    public function deleteId($id)
    {
        $this->deleteId = $id;

    }

    public function delete()
    {
        $logo = FooterMenu::find($this->deleteId);
        $logo->delete();
        Log::createLog(auth()->user()->id,'delete','منو '.$logo->title.' حذف شد');
        $this->emit('toast','success','ایتم مورد نظر به حذف شد');

    }



    public function loadLogo()
    {
        $this->readyToLoad = true;

    }

    public function render()
    {
        $this->authorize('setting-footer-menu',FooterMenu::class);
        $menus = $this->readyToLoad ? FooterMenu::where('title','LIKE','%'.$this->search.'%')->latest()->paginate(10):[];
        $footer = DB::connection('mysql_settings')->table('footers')->first();
        $headerMenu[] = $footer->widgetLabel1;
        $headerMenu[] = $footer->widgetLabel2;
        $headerMenu[] = $footer->widgetLabel3;
        $headerMenu[] = $footer->widgetLabel4;
//        $headerMenu[] = $footer->widgetLabel5;
//        $headerMenu[] = $footer->widgetLabel6;
        return view('livewire.admin.settings.footer.menu.index',compact('menus','headerMenu'));
    }
}
