@php
    use \App\Modules\Content\Services\ContentService;
    use \App\Modules\User\Services\UserService;
    use \App\Services\UtilsService;

       $tableHeadCssClass="px-4 py-2 border-b-2 border-gray-200 text-left text-sm font-semibold text-gray-600 uppercase tracking-wider";
       $tableBodyCssClass="px-4 py-2 border-b border-gray-200";

       $firstItem = $contents->firstItem();
       $statusColor = ['DRAFT' => 'bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 text-sm rounded', 'PUBLISH' => 'bg-green-500 hover:bg-green-700 text-white py-1 px-2 text-sm rounded', 'PENDING'=>'bg-gray-500 hover:bg-gray-700 text-white py-1 px-2 text-sm rounded'];
@endphp
<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 my-6">
        <div class="card">
            <div class="card-header">
                <h5 class="float-left"> Contents</h5>
                <div class="float-right">
                    @if(!UserService::isAdmin())
                        <a href="contents/create">
                            <button class="btn btn-sm btn-outline-success"><i class="fa-solid fa-plus"></i> CREATE
                            </button>
                        </a>
                    @endif
                </div>

            </div>
            <div class="card-body">
                <div class="container mx-auto">
                    <div class="overflow-x-auto">
                        <table class="w-full bg-white border border-gray-200 rounded-lg shadow-md">
                            <thead>
                            <tr class="bg-gray-50">
                                <th class="{{ $tableHeadCssClass }}">
                                    #
                                </th>
                                <th class="{{ $tableHeadCssClass }}">
                                    headline
                                </th>
                                <th class="{{ $tableHeadCssClass }}">
                                    Pinned
                                </th>
                                <th class="{{ $tableHeadCssClass }}">
                                    Created At
                                </th>
                                <th class="{{ $tableHeadCssClass }}">
                                    Updated At
                                </th>
                                <th class="{{ $tableHeadCssClass }}">
                                    status
                                </th>
                                <th class="{{ $tableHeadCssClass }}">
                                    ACTION
                                </th>
                            </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                            @foreach ($contents as $index => $content)
                                <tr>
                                    <td class="{{ $tableBodyCssClass }}">{{  $firstItem + $index }}</td>
                                    <td class="{{ $tableBodyCssClass }}">{{ UtilsService::showLimitedCharacter($content->headline,35) }}</td>
                                    <td class="{{ $tableBodyCssClass }}">{{ ContentService::IS_PINNED[$content->is_pinned] }}</td>
                                    <td class="{{ $tableBodyCssClass }}">{{ UtilsService::getFormatedDate($content->created_at) }}</td>
                                    <td class="{{ $tableBodyCssClass }}">{{ UtilsService::getFormatedDate($content->updated_at) }}</td>
                                    <td class="{{ $tableBodyCssClass }}">
                                        <button class="{{ $statusColor[$content->status] }}">
                                            {{ ucfirst(strtolower($content->status)) }}
                                        </button>
                                    </td>
                                    <td class="{{ $tableBodyCssClass }}">
                                        @if(!UserService::isAdmin())
                                            <a href="contents/edit/{{ UtilsService::encrypt($content->id) }}"
                                               target="_blank">
                                                <button class="bg-gray-100 hover:bg-gray-200 py-1 px-2 text-sm rounded">
                                                    <i class="fa-regular fa-pen-to-square"></i>
                                                </button>
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-6 mb-4 ms-3 me-3">
                        {{ $contents->links() }}
                    </div>
                </div>
            </div>

        </div>
    </div>

</x-app-layout>
