@extends('layouts.app')

@section('content')
    <div class="page-body">
        <div class="container-xl">
            <h2 class="page-title mb-4">Add New Restaurant</h2>

            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('restaurants.store') }}">
                        @csrf

                        <div class="mb-3 col-md-4">
                            <label class="form-label">Restaurant Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="mb-3 col-md-8">
                            <label class="form-label">Opening Hours</label>

                            @php
                                $days = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'];
                            @endphp

                            @foreach ($days as $day)
                                <div class="card mb-2">
                                    <div class="card-body row align-items-center">
                                        <div class="col-md-2">
                                            <label class="form-check">
                                                <input type="hidden" name="opening_hours[{{ $day }}][open]"
                                                    value="0">
                                                <input type="checkbox" class="form-check-input"
                                                    name="opening_hours[{{ $day }}][open]" value="1">
                                                <span class="form-check-label">{{ $day }}</span>
                                            </label>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Open Time</label>
                                            {{-- <input type="time" name="opening_hours[{{ $day }}][start]"
                                                class="form-control" placeholder="Open time"> --}}
                                            <input type="time" name="opening_hours[{{ $day }}][start]"
                                                class="form-control" value="{{ old("opening_hours.$day.start") }}">
                                            @if ($errors->has("opening_hours.$day.start"))
                                                <div class="text-danger small">
                                                    {{ $errors->first("opening_hours.$day.start") }}</div>
                                            @endif

                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Close Time</label>
                                            {{-- <input type="time" name="opening_hours[{{ $day }}][end]"
                                                class="form-control" placeholder="Close time"> --}}
                                            <input type="time" name="opening_hours[{{ $day }}][end]"
                                                class="form-control" value="{{ old("opening_hours.$day.end") }}">
                                            @if ($errors->has("opening_hours.$day.end"))
                                                <div class="text-danger small">
                                                    {{ $errors->first("opening_hours.$day.end") }}</div>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <a href="{{ route('dashboard') }}" class="btn btn-secondary">Back</a>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
