<x-app-layout>

    <x-slot name="header">

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>

    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 bg-white border-b border-gray-200">
                    
                    <div class="flex">
                        
                        <input id="long_url" type="text" placeholder="Pega la URL aquí" class="w-full px-4 py-3 rounded">

                        <button class="ml-4 w-auto px-6 py-3 font-semibold bg-gray-900 text-white rounded" onclick="shorter.short_url()">
                            
                            <span>Acortar</span>

                        </button>

                    </div>

                    <div id="short_url_container" class="flex py-5" style="display: none;">
                        
                        <input id="short_url" type="text" placeholder="" class="w-full px-4 py-3 rounded" onclick="shorter.copy_url()">

                    </div>

                </div>
            </div>
        </div>

    </div>

    {{-- INFINITY SCROLL --}}
    <div>
        
        <div id="scroll-container"></div>

    </div>
    {{-- INFINITY SCROLL --}}

    <script>

        window.onload = (e) => {

            paginator.load_items('/url/index');

        }

        window.addEventListener('scroll', function (e){

            if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {

                    paginator.load_items(paginator.next_page_url);

            }

        });
        


    </script>

</x-app-layout>
