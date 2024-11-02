@props(['priority' => 'ridicata'])

<div @class([
    'text-green-500' => $priority === 'scazuta',
    'text-yellow-500' => $priority === 'medie',
    'text-red-500' => $priority === 'ridicata',
])>
    {{ $priority }}
</div>
