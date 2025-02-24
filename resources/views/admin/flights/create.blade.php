@extends('layouts.app')

@section('title', 'إضافة رحلة جديدة')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">إضافة رحلة جديدة</h2>

    <!-- عرض الأخطاء إن وجدت -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- نموذج إنشاء رحلة -->
    <form action="{{ route('admin.flights.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="flight_number" class="form-label">رقم الرحلة</label>
            <input type="text" class="form-control @error('flight_number') is-invalid @enderror" 
                   id="flight_number" name="flight_number" value="{{ old('flight_number') }}" required>
            @error('flight_number')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="airline" class="form-label">شركة الطيران</label>
            <input type="text" class="form-control @error('airline') is-invalid @enderror" 
                   id="airline" name="airline" value="{{ old('airline') }}" required>
            @error('airline')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="origin" class="form-label">مكان الإقلاع</label>
            <input type="text" class="form-control @error('origin') is-invalid @enderror" 
                   id="origin" name="origin" value="{{ old('origin') }}" required>
            @error('origin')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="destination" class="form-label">الوجهة</label>
            <input type="text" class="form-control @error('destination') is-invalid @enderror" 
                   id="destination" name="destination" value="{{ old('destination') }}" required>
            @error('destination')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="departure" class="form-label">موعد الإقلاع</label>
            <input type="datetime-local" class="form-control @error('departure') is-invalid @enderror" 
                   id="departure" name="departure" value="{{ old('departure') }}" required>
            @error('departure')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="arrival" class="form-label">موعد الوصول</label>
            <input type="datetime-local" class="form-control @error('arrival') is-invalid @enderror" 
                   id="arrival" name="arrival" value="{{ old('arrival') }}" required>
            @error('arrival')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">السعر</label>
            <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" 
                   id="price" name="price" value="{{ old('price') }}" required>
            @error('price')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="seats" class="form-label">عدد المقاعد</label>
            <input type="number" class="form-control @error('seats') is-invalid @enderror" 
                   id="seats" name="seats" value="{{ old('seats') }}" required>
            @error('seats')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">إضافة الرحلة</button>
    </form>
</div>
@endsection
