@extends('layouts.job_seeker.master')
@section('title', 'Resume profile')

@section('content')
    <h3>Education info</h3>
    <form action="{{ route('profile.education-info-store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="edu_card_wrapper">
            <div class="card mb-3">
                <div class="card-body edu_card">
                    <div class="row">
                        <div class="col-12 my-2">
                            <div class="form-group">
                                <label class="text-muted text-bold" for="certificate_degree_name">Certificate/Degree Name</label>
                                <input class="form-control  @error('certificate_degree_name') is-invalid @enderror" type=" text" id="certificate_degree_name"
                                    name="certificate_degree_name[]" value="{{ old('certificate_degree_name') }}" required autocomplete="off">
                                @error('certificate_degree_name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12 my-2">
                            <div class="form-group">
                                <label class="text-muted text-bold" for="institute_university_name">Institute/University Name</label>
                                <input class="form-control @error('institute_university_name') is-invalid @enderror" type="text" id="institute_university_name"
                                    name="institute_university_name[]" value="{{ old('institute_university_name') }}" required autocomplete="off">
                                @error('institute_university_name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12 col-md-6 my-2">
                            <div class="form-group">
                                <label class="text-muted text-bold" for="starting_date">Starting Date</label>
                                <input class="form-control  @error('starting_date') is-invalid @enderror" type="date"
                                    id="starting_date" name="starting_date[]" value="{{ old('starting_date') }}" required
                                    autocomplete="off">
                                @error('starting_date')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12 col-md-6 my-2">
                            <div class="form-group">
                                <label class="text-muted text-bold" for="completion_date">Completion Date</label>
                                <input class="form-control  @error('completion_date') is-invalid @enderror" type="date" id="completion_date"
                                    name="completion_date[]" value="{{ old('completion_date') }}" required autocomplete="off">
                                @error('completion_date')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- <div class="card mb-5">
            <div class="card-body edu_card">
                <div class="edu_card_del_btn bg-danger d-inline-block px-2 rounded text-white">X</div>
                <div class="row">
                    <div class="col-12 my-2">
                        <div class="form-group">
                            <label class="text-muted text-bold" for="certificate_degree_name">Certificate/Degree Name</label>
                            <input class="form-control  @error('certificate_degree_name') is-invalid @enderror"" type=" text" id="certificate_degree_name"
                                name="certificate_degree_name" value="{{ old('certificate_degree_name') }}" required autocomplete="off">
                            @error('certificate_degree_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-12 my-2">
                        <div class="form-group">
                            <label class="text-muted text-bold" for="institute_university_name">Institute/University Name</label>
                            <input class="form-control @error('institute_university_name') is-invalid @enderror" type="text" id="institute_university_name"
                                name="institute_university_name" value="{{ old('institute_university_name') }}" required autocomplete="off">
                            @error('institute_university_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-12 col-md-6 my-2">
                        <div class="form-group">
                            <label class="text-muted text-bold" for="starting_date">Starting Date</label>
                            <input class="form-control  @error('starting_date') is-invalid @enderror"" type=" text"
                                id="starting_date" name="starting_date" value="{{ old('starting_date') }}" required autocomplete="off">
                            @error('starting_date')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-12 col-md-6 my-2">
                        <div class="form-group">
                            <label class="text-muted text-bold" for="completion_date">Completion Date</label>
                            <input class="form-control  @error('completion_date') is-invalid @enderror"" type=" completion_date" id="completion_date"
                                name="completion_date" value="{{ old('completion_date') }}" required autocomplete="off">
                            @error('completion_date')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>            
        </div> --}}
        <button class="btn btn-primary add_edu_btn">Add more</button>

        <div class="my-4 text-end">
            <button class="btn btn-success">Continue</button>
        </div>
    </form>

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
