@extends('layouts.app')

@section('title', 'إدارة الحجوزات')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">إدارة الحجوزات</h2>

    @if($bookings->isEmpty())
        <div class="alert alert-warning">لا توجد حجوزات حتى الآن.</div>
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>المستخدم</th>
                    <th>رقم الرحلة</th>
                    <th>شركة الطيران</th>
                    <th>المغادرة</th>
                    <th>الوصول</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bookings as $index => $booking)
                    <tr>
                        <td>{{ $bookings->firstItem() + $index }}</td>
                        <td>{{ $booking->user->name ?? 'غير معروف' }}</td>
                        <td>{{ $booking->flight->flight_number ?? 'N/A' }}</td>
                        <td>{{ $booking->flight->airline ?? 'N/A' }}</td>
                        <td>{{ \Carbon\Carbon::parse($booking->flight->departure)->format('Y-m-d H:i') }}</td>
                        <td>{{ \Carbon\Carbon::parse($booking->flight->arrival)->format('Y-m-d H:i') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- ✅ عرض أزرار التنقل بين الصفحات -->
        <div class="d-flex justify-content-center mt-4">
            {{ $bookings->links() }}
        </div>
    @endif
</div>
@endsection
