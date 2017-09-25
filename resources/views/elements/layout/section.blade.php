<div{!! $element->attributes() !!}>
    @foreach ($model->children as $child)
        {!! $child->render() !!}
    @endforeach
</div>