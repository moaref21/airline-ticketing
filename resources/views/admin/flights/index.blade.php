@extends('layouts.app')

@section('title', 'الرحلات')

@section('content')
<div class="container">
    <h1>إدارة الرحلات</h1>
    <a href="{{ route('admin.flights.create') }}" class="btn btn-primary mb-3">إضافة رحلة جديدة</a>
    
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>رقم الرحلة</th>
                <th>المصدر</th>
                <th>الوجهة</th>
                <th>وقت المغادرة</th>
                <th>السعر</th>
            </tr>
        </thead>
        <tbody>
            @foreach($flights as $index => $flight)
            <tr>
                <td>{{ $flights->firstItem() + $index }}</td>
                <td>{{ $flight->flight_number }}</td>
                <td>{{ $flight->origin }}</td>
                <td>{{ $flight->destination }}</td>
                <td>{{ \Carbon\Carbon::parse($flight->departure)->format('Y-m-d H:i') }}</td>
                <td>{{ $flight->price }}$</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-center mt-4">
        {{ $flights->links() }}
    </div>
</div>
@endsection
