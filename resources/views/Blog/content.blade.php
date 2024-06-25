@php
use \App\Modules\Content\Services\ContentService;
@endphp

@if(!empty($contents))
    @foreach($contents as $content)
        @php
            $content = ContentService::modifyForView($content);
        @endphp
        <div class="bg-white shadow-xl px-5 pt-5 mb-8 grid pb-4 sm:pt-5 lg:mx-0 lg:max-w-none rounded-md">
            <article class="flex flex-col items-start justify-between">
                <div class="flex items-center gap-x-4 text-xs">
                    <time datetime="2020-03-16" class="text-gray-500">{{ $content->created_at_for_view }}</time>
                    @foreach($content->categories  as $category)
                        <a href="/category/{{ @strtolower($category) }}" target="_blank" class="relative z-10 rounded-full bg-gray-50 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-100">{{ @ucfirst($category) }}</a>
                    @endforeach

                </div>
                <div class="group relative">
                    <h3 class="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
                        <a href="/content-details/{{ $content->headline_url }}" target="_blank">
                            <span class="absolute inset-0"></span>
                            {{ $content->headline }}
                        </a>
                    </h3>
                    <p class="mt-3 line-clamp-2 text-sm leading-6 text-gray-500">{{ @strip_tags($content->content) }}</p>
                </div>
                <div class="relative mt-2 flex items-center gap-x-4">
                    <div class="text-sm leading-6">
                        <p class="font-semibold text-gray-900">
                            <span class="text-gray-400 font-weight-light"> - </span>
                            <a href="/blog/{{ $content->author_name_url }}" target="_blank">
                                <span class="absolute inset-0"></span>
                                {{ $content->author_name }}
                            </a>
                        </p>

                    </div>
                </div>
            </article>
        </div>
    @endforeach
    {{ $contents->links() }}
@endif

