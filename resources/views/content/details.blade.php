@php
    use \App\Modules\Content\Services\ContentService;
@endphp
<x-guest-layout>
<div class="grid grid-cols-4 gap-4">
    <div class="sm:col-span-3 col-span-4">
        @php
            $content = ContentService::modifyForView($content);
        @endphp
        <div class="bg-white shadow-xl p-5 mb-8 grid pb-8 sm:pt-8 lg:mx-0 lg:max-w-none rounded-md">
            <article class="flex flex-col items-start justify-between">
                <div class="flex items-center gap-x-4 text-xs">
                    <time datetime="2020-03-16" class="text-gray-500">{{ $content->created_at_for_view }}</time>
                    @foreach($content->categories  as $category)
                        <a href="/category/{{ @strtolower($category) }}" target="_blank" class="relative z-10 rounded-full bg-gray-50 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-100">{{ $category }}</a>
                    @endforeach

                </div>
                <div class="group relative">
                    <h3 class="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
                            <span class="absolute inset-0"></span>
                            {{ $content->headline }}
                        <hr/>
                    </h3>
                    <div class="pt-8 mt-3 text-sm leading-6 text-gray-700">@php echo $content->content @endphp  </div>
                </div>
                <div class="relative mt-6 flex items-center gap-x-4">
                    <div class="text-sm leading-6">
                        <p class="font-semibold text-gray-900">
                            <span class="text-gray-400 font-weight-light"> - </span>
                            <a href="/blog/{{ $content->author_name_url }}">
                                <span class="absolute inset-0"></span>
                                {{ $content->author_name }}
                            </a>
                        </p>

                    </div>
                </div>
            </article>
        </div>
    </div>
    <div class="sm:col-span-1 col-span-4">
        @include('Blog.category')
    </div>
</div>
</x-guest-layout>
