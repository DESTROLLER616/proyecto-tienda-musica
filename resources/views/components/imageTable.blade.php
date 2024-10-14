@props(['src', 'alt'])

@if (App::environment('local'))
    @if (is_null($src))
        <img src="{{ asset('images/image-not-found.webp') }}" alt="No image" class="" style="max-width: 4rem;">

    @else
        @if (str_starts_with($src, 'http'))
            <img src="{{ $src }}" alt="{{ $alt }}" class="rounded-circle" style="max-width: 4rem;">
        @else
            <img src="{{ Storage::url($src) }}" alt="{{ $alt }}" class="rounded-circle" style="max-width: 4rem;">
        @endif
    @endif
@else
    @if (is_null($src))
        <img src="{{ asset('images/image-not-found.webp') }}" alt="No image" class="" style="max-width: 4rem;">
    @else
        <img src="{{ $src }}" alt="{{ $alt }}" class="rounded-circle" style="max-width: 4rem;">
    @endif
@endif
