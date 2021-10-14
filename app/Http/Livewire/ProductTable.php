<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Product;
//use Livewire\WithPagination;

class ProductTable extends DataTableComponent
{
    public $name, $desc, $product_id;
    public $updateMode = false;

    protected $listeners = ['productStore' => '$refresh'];

    public array $perPageAccepted = [5, 10, 25, 50];

//    public bool $showPagination = false;

    public $paginationTheme = 'bootstrap';

    public function columns(): array
    {
        return [
            Column::blank(),
            Column::make('Product Name','name')
                ->searchable()
                ->sortable(),
            Column::make('Description', 'desc')
                ->searchable()
                ->sortable(),
            Column::make('Action'),
            Column::blank(),
        ];
    }

    public function query(): Builder
    {
        return Product::query();
//            ->when($this->getFilter('search'), fn ($query, $search) => $query->search($search));
    }

    public function rowView(): string
    {
        return 'products.row_table';
    }

    public function modalsView(): string
    {
        return 'products.update';
    }

    private function resetInputFields(){
        $this->name = '';
        $this->desc = '';
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
//            session()->flash('message', 'Products Updated Successfully.');
            $this->resetInputFields();

        }
    }

    public function delete($id)
    {
        if($id){
            Product::where('id',$id)->delete();
            session()->flash('message', 'Products Deleted Successfully.');
        }
    }
}
