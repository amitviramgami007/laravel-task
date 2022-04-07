<a class="btn btn-xs btn-info" href="{{ route('banners.show', $id) }}">
    <i class="fa fa-eye"></i>
</a>

<a class="btn btn-xs btn-primary" href="{{ route('banners.edit', $id) }}">
    <i class="fa fa-edit"></i>
</a>

<a href="#" class="btn btn-xs btn-danger delete-action">
    <i class="fas fa-trash-alt"></i>
</a>
{{ Form::open(['url' => route('banners.destroy', $id), 'method' => 'delete']) }}
    @csrf
{{ Form::close() }}
