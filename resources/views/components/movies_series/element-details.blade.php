@props([ 'element' => [] ])@php
    use Carbon\Carbon;

    $formattedDate = NULL;
    $genres = Cache::get('genres');
    if (isset($element['release_date']) || isset($element['first_air_date']))
    {
        $date = $element['release_date'] ?? $element['first_air_date'];
        $formattedDate = Carbon::parse($date)->format('M d, Y');
    }

    $average = isset($element['vote_average']) ? round($element['vote_average']) * 10 . "%" : "N/A";

    $tags = '';
    if (isset($element['genre_ids']) && is_array($element['genre_ids']))
    {
        foreach($element['genre_ids'] as $genre_id)
        {
            if (isset($genres[$genre_id]))
            {
                $tags .= $genres[$genre_id] . ', ';
            }
        }
        $tags = rtrim($tags, ', ');
    } else
    {
        $tags = "No genres available";
    }
@endphp

<div class="flex items-center flex-wrap text-gray-400 gap-x-2 text-sm mt-0.5">
    <img class="w-4" src="{{ asset('images/half-star.png') }}" alt="Stars">
    <span >{{ $average }}</span >
    <span >|</span >
    <span >{{ $formattedDate ?? 'No date available' }}</span >
</div >
<div class="block text-gray-400 tracking-wider text-sm">
    <span >{{ $tags }}</span >
</div >
