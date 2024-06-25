<x-app-layout>
    <x-head.tinymce-config/>
    @if($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <x-head.select2/>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 my-6">
        <div class="card">
            <div class="card-header border-t-2 border-sky-400">
                <h5 class="float-left"> Contents</h5>
                <div class="float-right">
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('content.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="headline" class="form-label">Headline</label>
                        <input type="text" class="form-control" id="headline" name="headline" placeholder="Headline">
                    </div>
                    <div class="mb-3">
                        <label for="blogContent" class="form-label">Content</label>
                        <textarea class="form-control" id="blogContent" name="content" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="headline" class="form-label">Category
                            <span data-bs-toggle="tooltip" data-bs-placement="top" title="Can select multiple">
                                <i class="fa-solid fa-circle-question"></i>
                            </span>
                        </label>
                        <select class="form-control tags" name="categories[]" id="categories" multiple="multiple">
                            @foreach($categories as $category)
                                <option value="{{ @strtolower($category->name) }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="float-right">
                        <button type="submit" class="btn btn-outline-success">
                            <i class="fa-solid fa-plus"></i> Create
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>


</x-app-layout>


