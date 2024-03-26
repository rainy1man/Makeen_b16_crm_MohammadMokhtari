@extends('layouts.master')

@section('title', 'ویرایش کاربر')

@section('content')

    <div class="container">
        <form action="{{ route('users.update', ['user' => $user->id]) }}" method="post">
            @csrf
            @method("put")
            <h2>ویرایش کاربر</h2>

            <div class="mb-3 mt-3">
                <label class="form-label">نام و نام خانوادگی:</label>
                <input type="text" class="form-control" placeholder="نام و نام خانوادگی را وارد نمایید"
                    name="name" value="{{ $user->name}}" />
                    @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3 mt-3">
                <label class="form-label">کد ملی</label>
                <input type="text" class="form-control" placeholder="کد ملی را وارد نمایید" name="codeMelli"
                    value="{{ $user->codeMelli}}" />
                    @error('codeMelli')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3 mt-3">
                <label class="form-label">شماره همراه:</label>
                <input type="text" class="form-control" placeholder="شماره همراه را وارد نمایید" name="phoneNumber"
                    value="{{ $user->phoneNumber}}" />
                    @error('phoneNumber')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">تاریخ تولد:</label>
                <input type="text" class="form-control" placeholder="تاریخ تولد را وارد نمایید" name="birthDate"
                    value="{{ $user->birthDate}}" />
                    @error('birthDate')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">جنسیت:</label>
                <select class="form-control" name="gender">
                    <option value="مرد" {{ $user->gender == "مرد" ? "selected" : ""}}>مرد</option>
                    <option value="زن" {{ $user->gender == "زن" ? "selected" : ""}}>زن</option>
                </select>
            </div>

            <div class="mb-3 mt-3">
                <label class="form-label">ایمیل:</label>
                <input type="text" class="form-control" placeholder="ایمیل را وارد نمایید" name="email"
                    value="{{ $user->email}}" />
                    @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">رمز عبور:</label>
                <input type="password" class="form-control" placeholder="رمز عبور را وارد نمایید" name="password"
                    value="{{ $user->password}}" />
                    @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-light">ثبت</button>
        </form>
    </div>
    @endsection

