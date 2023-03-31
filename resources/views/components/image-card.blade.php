<div {{$attributes->merge(['class' => 'justify-center'])}}>
    <div class="flex flex-col md:flex-row md:max-w-xl rounded-lg bg-white shadow-lg">
        <img class=" w-full h-96 md:h-auto object-cover md:w-48 rounded-t-lg md:rounded-none md:rounded-l-lg" src="{{$image}}" alt="{{$altText ?? ''}}" />
        <div class="p-6 flex flex-col justify-start">
            <h5 class="text-gray-900 text-xl font-medium mb-2">{{$title}}</h5>
            <p class="text-gray-700 text-base mb-4">
                {!! $slot !!}
            </p>
            @if(isset($subText))
                <p class="text-gray-600 text-xs">{{$subText}}</p>
            @endif
            <a href="{{$vehicle->serviceLink}}" class="text-blue-500 text-sm font-semibold mt-2" rel="noreferrer" target="_blank">
                View Vehicle
            </a>
        </div>
    </div>
</div>
