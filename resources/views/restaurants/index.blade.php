@extends('layouts.app')

@php
    use Carbon\Carbon;
@endphp

@section('content')
    <div class="page-body">
        <div class="container-xl">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <div class="">
                    <h2 class="page-subtitle">Dashboard</h2>
                    <h2 class="page-title">Restaurant List</h2>
                </div>
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
                                            <span class="badge bg-green-lt">
                                                {{ $hour->day }}
                                            </span>
                                        @endforeach
                                    </td>
                                    <td class="text-end">
                                        <a href="{{ route('restaurants.show', $restaurant->id) }}"
                                            class="btn btn-md btn-primary">
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

                {{-- Pagination --}}
                <div class="card-footer d-flex justify-content-end">
                    {{ $restaurants->links('pagination::bootstrap-5') }}
                </div>
            </div>

        </div>
    </div>
@endsection
