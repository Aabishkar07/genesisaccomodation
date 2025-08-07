<div
                            class="bg-white rounded-xl shadow-lg hover:shadow-2xl transition duration-300 p-6 border border-gray-100">
                            <img src="{{ asset('uploads/' . $service->image) }}" alt="Room Service"
                                class="w-full h-48 object-cover rounded-lg mb-6">

                            <!-- Icon -->
                            <div class="w-14 h-14 bg-blue-100 rounded-full flex items-center justify-center mb-4 mx-auto">
                                {!! $service->icon !!}

                            </div>

                            <h3 class="text-2xl font-bold text-center text-gray-800 mb-2">{{ $service->title }}</h3>
                            <p class="text-gray-600 text-center mb-4 leading-relaxed">
                                {{ \Illuminate\Support\Str::limit($service->description, 120, '...') }}
                            </p>


                        </div>
