@extends('backend.layouts.default')

@section('title')
    All categories
@stop()

@section('content')
    <div class="mdl-cell mdl-cell--12-col">
        <span class="mdl-layout__title">
            <h3>Categories:</h3>
        </span>

        <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp" id="post-list">
            <thead>
            <tr>
                <th class="mdl-data-table__cell--non-numeric">Name</th>
                <th class="mdl-data-table__cell--non-numeric action-col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <td class="resizable-col">{{ $category->name }}</td>
                    <td class="action-col">
                        <a class="action" href="{{ route('backend/category/edit', ['id' => $category->id]) }}">
                            <span class="icon icon-mode_edit icon-colored" title="Edit category"></span>
                        </a>
                        <a class="action" href="{{ route('category/show', ['id' => $category->id]) }}">
                            <span class="icon icon-pageview icon-colored" title="View category"></span>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $categories->links('backend.includes.pagination') }}
    </div>
@stop()