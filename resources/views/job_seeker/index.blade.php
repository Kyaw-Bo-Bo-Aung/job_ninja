@extends('layouts.job_seeker.master')
@section('title', 'Profile')

@section('content')
    <div class="row">
        <div class="col-12 col-md-5 text-center">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTz7uyDuhrkwf7koZIthJaFMCpZKBkjb0yCzdAiai3fZvgLsHe1OMBzme50Bgni4-hc2So&usqp=CAU"
                alt="" class="profile_image rounded-circle">
            <h5 class="mt-4">{{ auth()->user()->name }}</h5>
            <h6 class="text-muted my-1">{{ auth()->user()->email }}</h6>
            <h6 class="text-muted">{{ auth()->user()->phone }}</h6>
        </div>
        <div class="my-3 col-12 col-md-7">
            <table class="profile_detail_table table table-striped">
                <tr>
                    <th>Name</th>
                    <td>{{ auth()->user()->name }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ auth()->user()->email }}</td>
                </tr>
                <tr>
                    <th>Phone</th>
                    <td>{{ auth()->user()->phone }}</td>
                </tr>
                <tr>
                    <th>Gender</th>
                    <td>{{ auth()->user()->gender }}</td>
                </tr>
                <tr>
                    <th>Date of birth</th>
                    <td>{{ auth()->user()->date_of_birth }}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>{{ auth()->user()->is_active === 'y' ? 'Active' : 'Inactive' }}</td>
                </tr>
            </table>
        </div>
    </div>

@endsection
