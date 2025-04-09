@extends('layouts.app')

@section('content')
    <div class="page-body">
        <div class="container-xl">
            <h2 class="page-subtitle">Restaurant Detail</h2>
            <h2 class="page-title mb-4">{{ $restaurant->name }}</h2>

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Opening Hours</h3>
                </div>
                <div class="table-responsive">
                    <table class="table card-table">
                        <thead>
                            <tr>
                                <th>Day</th>
                                <th>Opening Time</th>
                                <th>Closing Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $days = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'];
                                $hoursMap = $restaurant->openingHours->keyBy('day');
                            @endphp

                            @foreach ($days as $day)
                                @php
                                    $openHour = $hoursMap->get($day);
                                @endphp
                                <tr>
                                    <td>{{ $day }}</td>
                                    <td>
                                        @if ($openHour)
                                            <span
                                                class="badge bg-green-lt">{{ \Carbon\Carbon::createFromFormat('H:i:s', $openHour->open_time)->format('H:i') }}</span>
                                        @else
                                            <span class="badge bg-red-lt">Closed</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($openHour)
                                            <span class="badge bg-green-lt">
                                                {{ \Carbon\Carbon::createFromFormat('H:i:s', $openHour->close_time)->format('H:i') }}
                                            </span>
                                        @else
                                            <span class="badge bg-red-lt">Closed</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <a href="{{ route('dashboard') }}" class="btn btn-secondary mt-3">Back to List</a>
        </div>
    </div>
@endsection
