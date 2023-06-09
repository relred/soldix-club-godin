<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
      
      
        <x-bladewind::centered-content>

            <x-bladewind::button onclick="showModal('omg-modal')">
                Modal
            </x-bladewind::button>
            <button onclick="showModal('omg-modal')" class="mt-5 px-3 py-2 bg-orange-400 rounded-md text-white">Modal</button>

            <x-bladewind::card class="mb-6">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus, harum!
            </x-bladewind::card>
            <div class="grid w-full grid-cols-1 gap-6">
                <div class="relative mx-auto w-full">
                  <a href="#" class="relative inline-block w-full transform transition-transform duration-300 ease-in-out hover:-translate-y-2">
                    <div class="rounded-lg bg-white p-4 shadow">
                      <div class="relative flex h-52 justify-center overflow-hidden rounded-lg">
                        <div class="w-full transform transition-transform duration-500 ease-in-out hover:scale-110">
                          <img src="https://cmx.weightwatchers.com/assets-proxy/weight-watchers/image/upload/v1594406683/visitor-site/prod/ca/burgers_masthead_xtkxft" class="absolute inset-0 opacity-95" />
                        </div>
              
                        <div class="absolute bottom-3 left-8 bg-gradient-to-b from-gray-400 to-black text-2xl opacity-50">
                          <span class="opacity-0">De Lunes a Viernes</span>
                        </div>
                        <div class="absolute bottom-3 left-8 text-2xl text-white w-3/5">De lunes a Viernes</div>
              
                        <div class="absolute right-0 top-0 z-10 inline-flex select-none rounded-lg rounded-br-none rounded-tl-none bg-orange-500 px-3 py-2 text-sm font-medium text-white">
                          <p class="text-4xl">20</p>
                          <p>%</p>
                        </div>
                      </div>
                        

                    </div>
                  </a>
                </div>
            </div>

        </x-bladewind::centered-content>
    </div>

    <x-bladewind::modal
      size="xl"
      title="Full Width Modal"
      name="omg-modal">
      <x-bladewind::centered-content>
        <x-bladewind::list-view>
  
          <x-bladewind::list-item>
  
              <x-bladewind::avatar
                  size="small"
                  image="/path/to/the/image/file" />
              <div class="ml-3">
                  <div class="text-sm font-medium text-slate-900">
                      Michael K. Ocansey
                  </div>
                  <div class="text-sm text-slate-500 truncate">
                      kabutey@gmail.com
                  </div>
              </div>
  
          </x-bladewind::list-item>
  
          <x-bladewind::list-item>
              <x-bladewind::avatar
                  size="small"
                  image="/path/to/the/image/file" />
              <div class="ml-3">
                  <div class="text-sm font-medium text-slate-900">
                      Michael K. Ocansey
                  </div>
                  <div class="text-sm text-slate-500 truncate">
                      kabutey@gmail.com
                  </div>
              </div>
          </x-bladewind::list-item>
          
        </x-bladewind::list-view>
      </x-bladewind::centered-content>

      
    </x-bladewind::modal>
</x-app-layout>
