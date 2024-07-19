<div class="flex flex-col gap-4 items-center justify-center max-w-screen">
    <a href="#" class="bg-white border-2 border-b-4 border-gray-200 rounded-xl hover:bg-gray-50">
    
      <div class="grid grid-cols-6 p-5 gap-y-2">
  
        <div class="col-span-2">
          <img src="{{ $image }}" class="rounded-md"/>
        </div>
  
        <div class="col-span-4 md:col-span-4 ml-4">
  
          <p class="text-sky-500 font-bold text-base"> {{ $type }} </p>
  
          <p class="text-gray-600 font-bold">{{ $name }}</p>
  
          <p class="text-gray-400"> {{ $date }} </p>
  
{{--           <p class="text-gray-400">  </p> --}}
        </div>  
      </div>
  
    </a>
  
  </div>