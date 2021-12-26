@extends('layouts.job_seeker.master')
@section('title', 'Resume profile')

@section('content')
    @if (auth()->user()->profile)
        <h3>Education info</h3>
        <div class="row">
            @forelse (auth()->user()->profile->education_details as $edu)
                <div class="col-12 col-md-6">
                    <div class="edu_card card mt-1 mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-9">
                                    <h5>{{ $edu->certificate_degree_name }}</h5>
                                </div>
                                <div class="col-3 d-flex justify-content-end">
                                    <a href="{{ route('profile.education-info-edit', $edu->id) }}"><i
                                            class="mx-1 fas fa-edit text-warning"></i></a>
                                    <form action="{{ route('profile.education-info-delete', $edu->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="mx-2"><i type='submit'
                                                class="fas fa-trash text-danger"></i></button>
                                    </form>
                                </div>
                            </div>
                            <p class="text-muted">{{ $edu->institute_university_name }}</p>
                            <span>{{ $edu->starting_date->format('M Y') }} - {{ $edu->completion_date->format('M Y') }}
                            </span>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="edu_card card mt-4 mb-5">
                        <div class="card-body text-center text-secondary">
                            <i class="fas fa-exclamation-circle"></i> No education information
                        </div>
                    </div>
                </div>
            @endforelse
        </div>
        <form action="{{ route('profile.education-info-store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if ($errors->any())
                <div class="alert alert-danger">{{ $errors->first() }}</div>
            @endif
            <div class="edu_card_wrapper">
                <div class="card mb-3">
                    <div class="card-body edu_card">
                        <div class="row">
                            <div class="col-12 my-2">
                                <div class="form-group">
                                    <label class="text-muted text-bold" for="certificate_degree_name">Certificate/Degree
                                        Name</label>
                                    <input class="form-control  @error('certificate_degree_name') is-invalid @enderror"
                                        type=" text" id="certificate_degree_name" name="certificate_degree_name[]"
                                        value="{{ old('certificate_degree_name') }}" required autocomplete="off">
                                    @error('certificate_degree_name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12 my-2">
                                <div class="form-group">
                                    <label class="text-muted text-bold" for="institute_university_name">Institute/University
                                        Name</label>
                                    <input class="form-control @error('institute_university_name') is-invalid @enderror"
                                        type="text" id="institute_university_name" name="institute_university_name[]"
                                        value="{{ old('institute_university_name') }}" required autocomplete="off">
                                    @error('institute_university_name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12 col-md-6 my-2">
                                <div class="form-group">
                                    <label class="text-muted text-bold" for="starting_date">Starting Date</label>
                                    <span class="text-muted">(mm/dd/yyyy)</span>
                                    <input class="form-control  @error('starting_date') is-invalid @enderror" type="date"
                                        id="starting_date" name="starting_date[]" value="{{ old('starting_date') }}"
                                        required autocomplete="off">
                                    @error('starting_date')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12 col-md-6 my-2">
                                <div class="form-group">
                                    <label class="text-muted text-bold" for="completion_date">Completion Date</label>
                                    <span class="text-muted">(mm/dd/yyyy)</span>
                                    <input class="form-control  @error('completion_date') is-invalid @enderror" type="date"
                                        id="completion_date" name="completion_date[]"
                                        value="{{ old('completion_date') }}" required autocomplete="off">
                                    @error('completion_date')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <button class="btn btn-primary add_edu_btn">Add another</button>

            <div class="my-4 text-end">
                <button class="btn btn-success">Continue</button>
            </div>
        </form>

    @else
        <div class="card p-3 text-center">
            <h3 class="my-3">
                We suggest you to create your profile first.
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

    @endif

@endsection

@section('scripts')
    <script>
        $(document).ready(() => {
            let num = 1;
            $('.add_edu_btn').on('click', (e) => {
                e.preventDefault();
                let field = `
                <div class="card my-5">
                    <div class="card-body edu_card">
                        <div class="edu_card_del_btn bg-danger d-inline-block px-2 rounded text-white">X</div>
                        <div class="row">
                            <div class="col-12 my-2">
                                <div class="form-group">
                                    <label class="text-muted text-bold" for="certificate_degree_name_${num}">Certificate/Degree Name</label>
                                    <input class="form-control  @error('certificate_degree_name') is-invalid @enderror" type=" text" id="certificate_degree_name_${num}"
                                        name="certificate_degree_name[]" value="{{ old('certificate_degree_name') }}" required autocomplete="off">
                                    @error('certificate_degree_name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12 my-2">
                                <div class="form-group">
                                    <label class="text-muted text-bold" for="institute_university_name_${num}">Institute/University Name</label>
                                    <input class="form-control @error('institute_university_name') is-invalid @enderror" type="text" id="institute_university_name_${num}"
                                        name="institute_university_name[]" value="{{ old('institute_university_name') }}" required autocomplete="off">
                                    @error('institute_university_name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12 col-md-6 my-2">
                                <div class="form-group">
                                    <label class="text-muted text-bold" for="starting_date_${num}">Starting Date</label>
                                    <input class="form-control  @error('starting_date') is-invalid @enderror" type="date"
                                        id="starting_date_${num}" name="starting_date[]" value="{{ old('starting_date') }}" required autocomplete="off">
                                    @error('starting_date')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12 col-md-6 my-2">
                                <div class="form-group">
                                    <label class="text-muted text-bold" for="completion_date_${num}">Completion Date</label>
                                    <input class="form-control  @error('completion_date') is-invalid @enderror" type="date" id="completion_date_${num}"
                                        name="completion_date[]" value="{{ old('completion_date') }}" required autocomplete="off">
                                    @error('completion_date')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>            
                </div>
                `;
                $('.edu_card_wrapper').append(field);
                num++;
            })

            $(document).on('click', '.edu_card_del_btn', (e) => {
                e.preventDefault();
                e.target.closest('.card').remove();
            })

        })
    </script>
@endsection
