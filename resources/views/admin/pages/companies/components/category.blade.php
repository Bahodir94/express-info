<option @if(isset($company)) @if($category_list->id == $handbook->category_id) selected @endif @endif value="{{ $category_list->id }}">{{ $delimiter }} {{ $category_list->ru_title }}</option>
@if($category_list->hasChildren())
    @foreach($category_list->children as $category_list)
        @include('admin.pages.handbooks.components.category', ['delimiter' => $delimiter . '-'])
    @endforeach
@endif
