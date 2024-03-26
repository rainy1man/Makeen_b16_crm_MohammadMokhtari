@extends('layouts.master')

@section('title', 'کاربران')

@section('content')
    <div class="container mt-3">
        <h2>کاربران</h2>
        <button type="submit" class="btn btn-light">
            <a href="{{ route('users.create') }}">کاربر جدید</a>
        </button>
        <br />
        <br />

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>نام و نام خانوادگی</th>
                    <th>کد ملی</th>
                    <th>شماره همراه</th>
                    <th>تاریخ تولد</th>
                    <th>جنسیت</th>
                    <th>ایمیل</th>
                    <th>حذف/ویرایش</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->codeMelli }}</td>
                        <td>{{ $user->phoneNumber }}</td>
                        <td>{{ $user->birthDate }}</td>
                        <td>{{ $user->gender }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <a href="{{ route('users.edit', ['user' => $user->id]) }}">ویرایش</a> /
                            <form action="{{ route('users.destroy', ['user' => $user->id]) }}" method="post">
                                @csrf
                                @method('delete')
                                <input type="submit" value="delete">
                            </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
