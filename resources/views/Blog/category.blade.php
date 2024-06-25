<div class="bg-white shadow-xl p-4 mb-8 grid pb-8 sm:pt-8 lg:mx-0 lg:max-w-none rounded-md">
    <h3 class="text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
        Category
    </h3>
    <ul class="ps-0 divide-y divide-gray-200 dark:divide-gray-700 pt-4">
        @if(!empty($categories))
            @foreach($categories as $category)
                <li class="pt-3">
                    <div class="flex items-center space-x-4 rtl:space-x-reverse">
                        <a href="/category/{{ @strtolower($category->name) }}" target="_blank">
                            <p class="text-sm font-medium text-gray-900 truncate dark:text-white hover:text-blue-800">
                                {{ $category->name }} ({{ $category->total }})
                            </p>
                        </a>
                    </div>
                </li>
            @endforeach
        @endif
    </ul>


</div>
