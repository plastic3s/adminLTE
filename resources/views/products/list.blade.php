<div>
    <div class="mt-4">
        @include('products.create')
        @include('products.update')
        @include('products.delete')
    </div>
    <div class="d-md-flex justify-content-between mb-3 mt-2">
        <div class="d-md-flex">
            <div class="input-group mb-3 mb-md-0">
                <input type="text" class="form-control" placeholder="Search" wire:model="searchTerm" >
                <div class="input-group-append">
                    <button class="btn btn-secondary" type="button">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="d-md-flex">
            <div></div>
            <div>
                <label for="perPage">Per Page: </label>
            </div>
            <div>
                <div class="ml-0 ml-md-2">
                    <select wire:model="perPage" id="perPage" class="form-control">
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    @if (session()->has('message'))
        <div class="alert alert-success" style="margin-top:30px;">x
            {{ session('message') }}
        </div>
    @endif
    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th></th>
            <th class="sorting">
                <a wire:click.prevent="sortBy('id')" role="button" href="#">No
                    @include('products.sort-icon', ['field'=>'id'])
                </a>
            </th>
            <th><a wire:click.prevent="sortBy('name')" role="button" href="#">Product Name
                    @include('products.sort-icon', ['field'=>'name'])
                </a></th>
            <th><a wire:click.prevent="sortBy('desc')" role="button" href="#">Desc
                    @include('products.sort-icon', ['field'=>'desc'])
                </a></th>
            <th><a href="#">Action</a></th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $value)
            <tr>
                <td></td>
                <td>{{ $value->id }}</td>
                <td>{{ $value->name }}</td>
                <td>{{ $value->desc }}</td>
                <td>
                    <button data-toggle="modal" data-target="#updateModal" wire:click="edit({{ $value->id }})" class="btn btn-primary btn-sm">Edit</button>
                    <button type="button" wire:click="deleteId({{ $value->id }})" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal">Delete</button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="row">
        <div class="col-12 col-md-6">
            {{ $products->links() }}
        </div>

        <div class="col-12 col-md-6 text-center text-md-right text-muted">
            <span>Showing</span>
            <strong>{{ $products->firstItem() }}</strong>
            <span>to</span>
            <strong>{{ $products->lastItem() }}</strong>
            <span>of</span>
            <strong>{{ $products->total() }}</strong>
            <span>results</span>
        </div>
    </d
</div>
