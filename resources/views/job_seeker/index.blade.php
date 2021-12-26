@extends('layouts.job_seeker.master')
@section('title', 'Profile')

@section('content')
    @if (!auth()->user()->profile)
        <div class="card p-3 text-center">
            <h3 class="my-3">
                Create your profile, Express your skill
            </h3>
            <div class="card-img">
                <img src="{{ asset('custom/images/profile.png') }}" alt="" width="400" class="img-fluid">
            </div>
            <div class="card-body">
                <a href="/profile/create/personal-info" class="btn btn-primary">
                    Create profile
                </a>
            </div>
        </div>
    @else
        <div class="row">
            <div class="mt-3 col-12 col-md-5 text-center">
                <img src="{{asset('images/profile/'.auth()->user()->profile->photo)}}"
                    alt="" width="200" class="profile_image rounded img-fluid">
                <h5 class="mt-4">
                    {{ auth()->user()->profile->fname }}
                    {{ auth()->user()->profile->lname }}
                </h5>
                <h6 class="text-muted my-1">{{ auth()->user()->profile->email }}</h6>
                <h6 class="text-muted">{{ auth()->user()->profile->phone }}</h6>

                <a class="mt-md-5 btn btn-info" href="{{ route('profile.personal-info-edit', auth()->user()->profile->id) }}">
                    <i class="fas fa-user-edit"></i>
                    Edit profile
                </a>
            </div>
            <div class="my-3 col-12 col-md-7">
                <table class="profile_detail_table table table-striped">
                    <tr>
                        <th>First Name</th>
                        <td>{{ auth()->user()->profile->fname }}</td>
                    </tr>

                    <tr>
                        <th>Last Name</th>
                        <td>{{ auth()->user()->profile->lname }}</td>
                    </tr>

                    <tr>
                        <th>Email</th>
                        <td>{{ auth()->user()->profile->email }}</td>
                    </tr>
                    <tr>
                        <th>Phone</th>
                        <td>{{ auth()->user()->profile->phone }}</td>
                    </tr>
                    <tr>
                        <th>Gender</th>
                        <td>{{ auth()->user()->profile->gender }}</td>
                    </tr>
                    <tr>
                        <th>Date of birth</th>
                        <td>{{ auth()->user()->profile->date_of_birth }}</td>
                    </tr>
                    <tr>
                        <th>Current Postion</th>
                        <td>{{ auth()->user()->profile->current_position }}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>{{ auth()->user()->is_active === 'y' ? 'Active' : 'Inactive' }}</td>
                    </tr>
                </table>
            </div>
        </div>
    @endif




@endsection
