@extends('layouts.job_seeker.master')
@section('title', 'Resume profile')

@section('content')
    <h3>Personal info</h3>
    <form action="{{ route('profile.personal-info-store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-12 col-md-6 my-2">
                <div class="form-group">
                    <label class="text-muted text-bold" for="fname">First Name</label>
                    <input class="form-control  @error('fname') is-invalid @enderror"" type="text" id="fname" name="fname" value="{{old('fname')}}"
                    required autocomplete="off">
                    @error('fname')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-12 col-md-6 my-2">
                <div class="form-group">
                    <label class="text-muted text-bold" for="lname">Last Name</label>
                    <input class="form-control @error('lname') is-invalid @enderror" type="text" id="lname" name="lname" value="{{old('lname')}}"
                    required autocomplete="off">
                    @error('lname')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-12 col-md-6 my-2">
                <div class="form-group">
                    <label class="text-muted text-bold" for="cposition">Current Position</label>
                    <input class="form-control  @error('cposition') is-invalid @enderror"" type="text" id="cposition" name="cposition" value="{{old('cposition')}}"
                    required autocomplete="off">
                    @error('cposition')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-12 col-md-6 my-2">
                <div class="form-group">
                    <label class="text-muted text-bold" for="email">Contact Email</label>
                    <input class="form-control  @error('email') is-invalid @enderror"" type="email" id="email" name="email" value="{{old('email')}}"
                    required autocomplete="off">
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-12 col-md-6 my-2">
                <div class="form-group">
                    <label class="text-muted text-bold" for="phone">Phone Number</label>
                    <input class="form-control  @error('phone') is-invalid @enderror"" type="text" id="phone" name="phone" value="{{old('phone')}}"
                    required autocomplete="off">
                    @error('phone')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-12 col-md-6 my-2">
                <div class="form-group">
                    <label class="text-muted text-bold" for="photo">Photo</label>
                    <input class="form-control  @error('photo') is-invalid @enderror"" type="file" id="photo" name="photo" value="{{old('photo')}}"
                    autocomplete="off">
                    @error('photo')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="my-4">
                <button class="btn btn-success">Continue</button>
            </div>
        </div>
    </form>

@endsection
