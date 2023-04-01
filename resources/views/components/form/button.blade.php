
@props(['title', 'type', 'id', 'name']);
<button type="{{ $type ?? 'submit' }}" name="{{ $name ?? '' }}" id="{{ $id ?? '' }}" class="btn btn-primary">{{ $title ?? 'Submit' }}</button>
