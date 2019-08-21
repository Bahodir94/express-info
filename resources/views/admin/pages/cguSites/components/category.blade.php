<option @if(isset($site)) @if($category_list->id == $site->category_id) selected @endif @endif value="{{ $category_list->id }}">{{ $delimiter }} {{ $category_list->ru_title }}</option>
@if($category_list->hasChildren())
    @foreach($category_list->children as $category_list)
        @include('admin.pages.cguCategories.components.category', ['delimiter' => $delimiter . '-'])
    @endforeach
@endif