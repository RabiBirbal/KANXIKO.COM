<?php

namespace App\Http\Livewire;

use App\Models\AvailableProduct;
use App\Models\BuyerInfo;
use App\Models\Category;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class ProductViewComponent extends Component
{
    public $name;
    public $totslRecords;
    public $loadAmount=12;

    public function loadMore()
    {
        $this->loadAmount += 12;
    }

    public function mount($name)
    {
        $this->name = $name;
        $cat=Category::where('slug',$this->name)->first();
        $this->totalRecords = AvailableProduct::where('category',$cat->name)->count();
    
    }
    public function render()
    {
        if(Session::has('buyer')){
            $buyer=BuyerInfo::find(Session::get('buyer')['id']);
        }
        else{
            $buyer=null;
        }
        $cat=Category::where('slug',$this->name)->first();
        $product=AvailableProduct::where('category',$cat->name)->orderby('created_at','desc')->limit($this->loadAmount)->get();
        $name = $this->name;
        return view('livewire.product-view-component',compact("product","name","buyer"));
    }
}