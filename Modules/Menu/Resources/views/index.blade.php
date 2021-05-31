@extends('dashboard::layouts.master')

@section('content')
    <!-- Basic Tables start -->
    <div class="row" id="basic-table">
        <div class="col-12">
            <div class="card">
                <div class="card-header">

                </div>
                <div class="card-body">
                    <p class="card-text"></p>
                </div>
                <div>
                    <table class="table" id="brandTable">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Child count</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($menus as $menu)
                            <tr>
                                <td>{{ $menu->name }}</td>
                                <td>{{ $menu->description }}</td>
                                <td>{{ $menu->menu_items_count }}</td>
                                <td>
                                    <a href="{{ route('menu.show', $menu->id) }}" class="btn btn-success">Manage</a>
                                    <a href="{{ route('menu.edit', $menu->id) }}" class="btn btn-outline-secondary">Edit</a>
                                    <a href="" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('header')

@endsection
