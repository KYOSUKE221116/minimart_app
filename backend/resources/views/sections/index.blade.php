@extends('layouts.app')

@section('title', 'Section')
    
@section('content')
    <h1 class="h3">Sections</h1>

    <form action="{{ route('section.store') }}" method="post">
        @csrf
        <div class="row gx-2 mb-3">
            <div class="col-10">
                <input type="text" name="name" class="form-control" placefolder="Create new section" autofocus>
            </div>
            <div class="col-2">
                <button type="submit" class="btn btn-info w-100">
                    <i class="fa-solid fa-plus"></i> Add
                </button>
            </div>
        </div>
    </form>
    <table class="table table-hover align-middle mt-5">
        <thead class="bg-info text-center">
            <tr>
                <th>ID</th>
                <th>NAME</th>
                <th></th>
            </tr>
        </thead>
        <tbody class="text-center">
            @if($all_sections->isNotEmpty())
                @foreach ($all_sections as $section)
                    <tr>
                        <td>{{ $section->id }}</td>
                        <td>{{ $section->name }}</td>
                        <td>
                            <form action="{{ route('section.destroy', $section->id) }}" method="post" class="ms-1 col">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" title="Delete">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                            </form>
                        </td>
                    </tr>  
                @endforeach
            @endif
        </tbody>
    </table>
@endsection