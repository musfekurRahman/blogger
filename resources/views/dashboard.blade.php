
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                <div class="row">
                    <div class="col-xl-4 col-sm-6 col-12">
                        <div class="card border-white shadow-md rounded-md">
                            <div class="card-content py-3 px-2">
                                <div class="card-body">
                                        <div class="align-self-center float-left">
                                            <i class="fa-solid fa-user fa-3x text-sky-500"></i>
                                        </div>
                                        <div class="media-body text-right float-right">
                                            <h5>{{ @strtoupper($user->type) }}</h5>
                                            <span>{{ @strtoupper($user->name) }}</span>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-sm-6 col-12">
                        <div class="card border-white shadow-md rounded-md">
                            <div class="card-content py-3 px-2">
                                <div class="card-body">
                                    <div class="align-self-center float-left">
                                        <i class="fa-solid fa-envelope fa-3x text-orange-500"></i>
                                    </div>
                                    <div class="media-body text-right float-right">
                                        <h5>EMAIL</h5>
                                        <span>{{ @strtolower($user->email) }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-sm-6 col-12">
                        <div class="card border-white shadow-md rounded-md">
                            <div class="card-content py-3 px-2">
                                <div class="card-body">
                                    <div class="align-self-center float-left">
                                        <i class="fa-solid fa-blog fa-3x text-green-500"></i>
                                    </div>
                                    <div class="media-body text-right float-right">
                                        <h5>BLOG</h5>
                                        <span><a href="/blog/{{ $blogger->slug }}" target="_blank">{{ ucwords($blogger->title) }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

        </div>
    </div>
</x-app-layout>
