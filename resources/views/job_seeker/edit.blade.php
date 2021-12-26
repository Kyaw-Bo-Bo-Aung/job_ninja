@extends('layouts.job_seeker.master')
@section('title', 'Resume profile')

@section('content')
    <h3 class="my-3"> <i class="fas fa-user-edit"></i> Edit Personal info  </h3>
    <form action="{{ route('profile.personal-info-update', $profile->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-12 col-md-6 my-2">
                <div class="form-group">
                    <label class="text-muted text-bold" for="fname">First Name</label>
                    <input class="form-control  @error('fname') is-invalid @enderror"" type="text" id="fname" name="fname" value="{{$profile->fname}}"
                    required autocomplete="off">
                    @error('fname')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-12 col-md-6 my-2">
                <div class="form-group">
                    <label class="text-muted text-bold" for="lname">Last Name</label>
                    <input class="form-control @error('lname') is-invalid @enderror" type="text" id="lname" name="lname" value="{{$profile->lname}}"
                    required autocomplete="off">
                    @error('lname')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-12 col-md-6 my-2">
                <div class="form-group">
                    <label class="text-muted text-bold" for="cposition">Current Position</label>
                    <input class="form-control  @error('cposition') is-invalid @enderror" type="text" id="cposition" name="cposition" value="{{$profile->current_position}}"
                    required autocomplete="off">
                    @error('cposition')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-12 col-md-6 my-2">
                <div class="form-group">
                    <label class="text-muted text-bold" for="email">Contact Email</label>
                    <input class="form-control  @error('email') is-invalid @enderror"" type="email" id="email" name="email" value="{{$profile->email}}"
                    required autocomplete="off">
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-12 col-md-6 my-2">
                <div class="form-group">
                    <label class="text-muted text-bold" for="phone">Phone Number</label>
                    <input class="form-control  @error('phone') is-invalid @enderror"" type="text" id="phone" name="phone" value="{{$profile->phone}}"
                    required autocomplete="off">
                    @error('phone')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-12 col-md-6 my-2">
                <div class="form-group">
                    <label class="text-muted text-bold" for="date_of_birth">Date of birth</label>
                    <input class="form-control  @error('date_of_birth') is-invalid @enderror" type="date" id="date_of_birth" name="date_of_birth" value="{{$profile->date_of_birth}}"
                    required autocomplete="off">
                    @error('date_of_birth')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-12 col-md-6 my-2">
                <div class="form-group">
                    <label class="text-muted text-bold">Gender</label>
                    <div class="flex justify-around items-center space-x-3">
                        <label for="male">
                            <input 
                            @if ($profile->gender === 'male')
                            checked
                            @endif 
                            type="radio" name="gender" value="male" id="male" class="mr-2" required>
                            <span>Male</span>
                        </label>
                        <label for="female">
                            <input 
                            @if ($profile->gender === 'female')
                            checked
                            @endif
                            type="radio" name="gender" value="female" id="female" class="mr-2" required>
                            <span>Female</span>
                        </label>
                        <label for="other">
                            <input 
                            @if ($profile->gender === 'other')
                            checked
                            @endif
                            type="radio" name="gender" value="other" id="other" class="mr-2" required>
                            <span>Other</span>
                        </label>
                    </div>
                    @error('gender')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-12 col-md-6 my-2">
                <input type="hidden" value="{{$profile->photo}}" name="old_photo">
                <div class="form-group">
                    <label class="text-muted text-bold" for="photo">Photo</label>
                    <input class="form-control  @error('photo') is-invalid @enderror" type="file" id="photo" name="new_photo"
                    autocomplete="off">
                    @error('old_photo')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="my-4">
                <button class="btn btn-success">Update</button>
            </div>
        </div>
    </form>

@endsection
