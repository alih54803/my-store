<?php

namespace App\Http\Livewire\Frontend\Product;
use App\Models\Products;
use Livewire\Component;

class Index extends Component
{
   public $products, $category, $brandInputs=[], $priceInput;
   public $umer=false;
   protected $queryString=[
    'brandInputs',  'priceInput'];
    public function mount($category){
        $this->category=$category;
        // dd($category->id);
        // $this->products=$products;
    }
    public function sort(){
    //    dd('umer');
       $this->products=Products::where('category_id',$this->category->id)
       ->when(false, function($q){

        // dd($this->brandInputs);
        $q->whereIn('brand',$this->brandInputs);
    })
    // ->when($this->priceInput, function($q){
    //     $q->when($this->priceInput=='high-to-low', function($q2){
    //         $q2->orderBy('selling_price','desc');
    //     })
    //     ->when($this->priceInput=='low-to-high',function($q2){
    //         $q2->orderBy('selling_price','asc');
    //     });
    // })
       ->where('status','0')
        ->get();
        dd($this->brandInputs);
    }
    public function render()
    {

         $this->products=Products::where('category_id',$this->category->id)
        ->when($this->brandInputs, function($q){

            // dd($this->brandInputs);
            $q->whereIn('brand',$this->brandInputs);
        })
        ->when($this->priceInput, function($q){
            $q->when($this->priceInput=='high-to-low', function($q2){
                $q2->orderBy('selling_price','desc');
            })
            ->when($this->priceInput=='low-to-high',function($q2){
                $q2->orderBy('selling_price','asc');
            });
        })
        ->where('status','0')
        ->get();
        // dd($this->category->id);
        // dd($this->products);
        return view('livewire.frontend.product.index',[
            'category'=>$this->category,
            'products'=>$this->products
        ]);
    }

    public function priceInput(){
        echo 'umer';
    }
}
