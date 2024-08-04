@if($rating)
    {{-- Text representation of rating --}}
    {{ number_format($rating, 1) }}
    |
    {{-- Star representation of rating --}}
    @for($i = 1; $i <= 5; $i++)
        {{ $i <= round($rating) ? '★' : '☆' }}
    @endfor
@else
    No rating yet
@endif
