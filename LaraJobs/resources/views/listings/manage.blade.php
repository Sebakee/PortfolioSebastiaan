<x-layout>
  <div class="bg-gray-50 border border-gray-200 p-10 rounded">
                    <header>
                        <h1
                            class="text-3xl text-center font-bold my-6 uppercase"
                        >
                            Manage Gigs
                        </h1>
                    </header>

                    <table class="w-full table-auto rounded-sm">
                        <tbody>
                            @unless(count($listings) == 0)
                            @foreach($listings as $listing)
                            @if ($listing->user_id == auth()->user()->id)
                            
                                
                            
                            <tr class="border-gray-300">
                                <td
                                    class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                                >
                                    <a href="show.html">
                                        {{$listing->title}}
                                    </a>
                                </td>
                                <td
                                    class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                                >
                                    <a
                                        href="/listings/{{$listing->id}}/edit"
                                        class="text-blue-400 px-6 py-2 rounded-xl"
                                        ><i
                                            class="fa-solid fa-pen-to-square"
                                        ></i>
                                        Edit</a
                                    >
                                </td>
                                <td
                                    class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                                >
                                    <form method="POST" action="/listings/{{$listing->id}}">
                                        @csrf
                                        @method('DELETE')

                                        <button class="text-red-500"><i class="fa-solid fa-trash">Delete</i>   </button>
                                    </form>
                                </td>
                            </tr>
                            @endif
                            @endforeach
                            @else 
                            <tr class="border-gray-300">
                                <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                    <p class="text-center">No listings found</p>
                                </td>
                            </tr>
                            @endunless 
                           
                        </tbody>
                    </table>
                </div>
</x-layout>