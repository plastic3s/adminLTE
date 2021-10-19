<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;


class Products extends Component
{
    use WithPagination;

    public $name, $desc, $product_id;
    public $updateMode = false;

    public $dtSortClass = 'sorting';
    public $searchTerm;
    public $perPage=10;
    public $sortField = false;
    public $sortAsc = true;
    public $deleteId = '';

    protected $paginationTheme = 'bootstrap';

    public function sortBy($field){

        if($this->sortField===$field){
            $this->sortAsc = !$this->sortAsc;
        }else {
            $this->sortAsc = true;
        }

        $this->sortField=$field;
    }

    public function sortIcon($field){
        if ($this->sortField !== $field) {
            $this->dtSortClass = 'sorting';
            }
        elseif($this->sortAsc) {
            $this->dtSortClass = 'sorting_asc';
            }
        else {
            $this->dtSortClass = 'sorting_desc';
        }
    }

    public function render()
    {
        return view('products.list',[
            'products' => Product::where(function($sub_query){
                $sub_query->where('name', 'like', '%'.$this->searchTerm.'%')
                          ->orWhere('desc', 'like', '%'.$this->searchTerm.'%');
                })
                ->orderBy($this->sortField ? $this->sortField : 'id' , $this->sortAsc ? 'asc' : 'desc')
                ->paginate($this->perPage)
        ]);
//        return <<<'blade'
//            <div>
//                @include('products.create')
//                @if (session()->has('message'))
//                    <div class="alert alert-success" style="margin-top:30px;">x
//                         {{ session('message') }}
//                    </div>
//                @endif
//                <livewire:product-table />
//            </div>
//        blade;
    }

//    public function setPage($url)
//    {
//        $this->currentPage = explode('page=', $url)[1];
//        Paginator::currentPageResolver(function(){
//            return $this->currentPage;
//        });
//    }



    private function resetInputFields(){
        $this->name = '';
        $this->desc = '';
    }

    public function store()
    {
        $validatedDate = $this->validate([
            'name' => 'required',
            'desc' => 'required',
        ]);

        Product::create($validatedDate);

        $this->resetInputFields();

        $this->emit('productStore'); // Close model to using to jquery

    }

    public function edit($id)
    {
        $this->updateMode = true;
        $product = Product::where('id',$id)->first();
        $this->product_id = $id;
        $this->name = $product->name;
        $this->desc = $product->desc;

    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }

    public function update()
    {
        $validatedDate = $this->validate([
            'name' => 'required',
            'desc' => 'required',
        ]);

        if ($this->product_id) {
            $product = Product::find($this->product_id);
            $product->update([
                'name' => $this->name,
                'desc' => $this->desc,
            ]);
            $this->updateMode = false;
            $this->emit('productUpdated'); // Close model to using to jquery
            $this->resetInputFields();
        }
    }

    public function deleteId($id)
    {
        $this->deleteId = $id;
    }

    public function delete()
    {
        if($this->deleteId){
            Product::find($this->deleteId)->delete();
            $this->emit('productDeleted'); // Close model to using to jquery
        }
    }
}
