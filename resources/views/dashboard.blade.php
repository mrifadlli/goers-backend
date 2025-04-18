@extends('layouts.app')

@php
    use Carbon\Carbon;
@endphp

@section('content')
    <div class="page-body">
        <div class="container-xl">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="page-subtitle">Dashboard</h2>
                <h2 class="page-title">Restaurant List</h2>
                <a href="{{ route('restaurants.create') }}" class="btn btn-primary">
                    + Add Restaurant
                </a>
            </div>

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Restaurants</h3>
                </div>
                <div class="table-responsive">
                    <table class="table card-table table-vcenter table-striped text-nowrap">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Opening Hours</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($restaurants as $restaurant)
                                <tr>
                                    <td>{{ $restaurant->name }}</td>
                                    <td>
                                        @foreach ($restaurant->openingHours as $hour)
                                            <div>{{ $hour->day }}: {{ Carbon::parse($hour->open_time)->format('H:i') }} -
                                                {{ Carbon::parse($hour->close_time)->format('H:i') }}</div>
                                        @endforeach
                                    </td>
                                    <td class="text-end">
                                        <a href="{{ route('restaurants.show', $restaurant->id) }}"
                                            class="btn btn-sm btn-info">
                                            <i class="ti ti-eye"></i> View
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center text-muted">No restaurants found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
@endsection
