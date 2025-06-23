@props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'text-base text-red-700 bg-red-50 border border-red-300 rounded-lg p-3 space-y-1 flex flex-col shadow-sm']) }}>
        @foreach ((array) $messages as $message)
            <li class="flex items-center gap-2"><svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01M21 12c0 4.97-4.03 9-9 9s-9-4.03-9-9 4.03-9 9-9 9 4.03 9 9z"/></svg>{{ $message }}</li>
        @endforeach
    </ul>
@endif
