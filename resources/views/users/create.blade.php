@extends('layouts.master')

@section('title', 'کاربر جدید')

@section('content')

    <div class="container">

        <form action="{{ route('users.store') }}" method="post">
            @csrf
            <h2>ثبت کاربر جدید</h2>
            <div class="mb-3 mt-3">
                <label class="form-label">نام و نام خانوادگی:</label>
                <input type="text" class="form-control" placeholder="نام و نام خانوادگی را وارد نمایید"
                    name="name" value="{{ old('name') }}" />
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3 mt-3">
                <label class="form-label">کد ملی</label>
                <input type="text" class="form-control" placeholder="کد ملی را وارد نمایید" name="codeMelli" value="{{ old('codeMelli') }}" />
                @error('codeMelli')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3 mt-3">
                <label class="form-label">شماره همراه:</label>
                <input type="text" class="form-control" placeholder="شماره همراه را وارد نمایید" name="phoneNumber" value="{{ old('phoneNumber') }}" />
                @error('phoneNumber')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">تاریخ تولد:</label>
                <input type="date" class="form-control" placeholder="تاریخ تولد را وارد نمایید" name="birthDate" value="{{ old('birthDate') }}" />
            </div>

            <div class="mb-3">
                <label class="form-label">جنسیت:</label>
                <select class="form-control" name="gender">
                    <option value="مرد">مرد</option>
                    <option value="زن">زن</option>
                </select>
            </div>

            <div class="mb-3 mt-3">
                <label class="form-label">ایمیل:</label>
                <input type="text" class="form-control" placeholder="ایمیل را وارد نمایید" name="email"
                    value="{{ old('email') }}" />
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">رمز عبور:</label>
                <input type="password" class="form-control" placeholder="رمز عبور را وارد نمایید" name="password" />
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-light">ثبت</button>
        </form>
    </div>
    @endsection

