<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="product_name">Product Name: <span class='text-danger'>*</span></label>
                            {!! Form::text('product_name', null, ['placeholder' => 'Enter Product Name', 'class' => 'form-control', 'id' => 'product_name']) !!}
                            @error('product_name')
                                <span class="invalid feedback text-danger" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="price"> Price: <span class='text-danger'>*</span></label>
                            {!! Form::text('price', null, ['placeholder' => 'Enter Price', 'class' => 'form-control numbersOnly', 'maxlength' => '10', 'size' => '10', 'id' => 'price']) !!}
                            <span class="invalid errmsg text-danger"></span>
                            @error('price')
                                <span class="invalid feedback text-danger" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="image">Image: <span class='text-danger'>*</span></label>
                            {!! Form::file('image', ['class' => 'form-control', 'id' => 'image', 'style' => 'padding:3px']) !!}
                            @error('image')
                                <span class="invalid feedback text-danger" role="alert">{{ $message }}</span>
                            @enderror
                            @if ($routeName == 'products.edit')
                                <img src="{{ asset('uploads/'.$product->image) }}" alt="product image" style="width:80px; height:80px;" class="mt-2">
                            @endif
                        </div>
                    </div>
                    {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
                </div>
            </div>
        </div>
    </div>
</div>
