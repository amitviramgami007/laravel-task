<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="image_name">Image Name: <span class='text-danger'>*</span></label>
                            {!! Form::text('image_name', null, ['placeholder' => 'Enter Image Name', 'class' => 'form-control', 'id' => 'image_name']) !!}
                            @error('image_name')
                                <span class="invalid feedback text-danger" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="image">Image: <span class='text-danger'>*</span></label>
                            {!! Form::file('image', ['class' => 'form-control', 'id' => 'image', 'style' => 'padding:3px']) !!}
                            @error('image')
                                <span class="invalid feedback text-danger" role="alert">{{ $message }}</span>
                            @enderror
                            @if ($routeName == 'banners.edit')
                                <img src="{{ asset('/storage/banners/'.$banner->image) }}" alt="banner image" style="width:80px; height:80px;" class="mt-2">
                            @endif
                        </div>
                    </div>

                    {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
                </div>
            </div>
        </div>
    </div>
</div>
