<?php

namespace App\Http\Livewire;

use App\Models\AvailableProduct;
use App\Models\Category;
use Livewire\Component;

class ProductViewComponent extends Component
{
    public $name;

    public function mount($name)
    {
        $this->name = $name;
    }
    public function render()
    {
        $cat=Category::where('slug',$this->name)->first();
        $product=AvailableProduct::where('category',$cat->name)->orderby('created_at','desc')->paginate(12);
        $name = $this->name;
        return view('livewire.product-view-component',compact("product","name"));
    }
}
