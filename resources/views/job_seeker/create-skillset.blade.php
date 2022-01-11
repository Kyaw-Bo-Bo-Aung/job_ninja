@extends('layouts.job_seeker.master')
@section('title', 'Resume profile')

@section('content')

    @if (auth()->user()->profile)
        <h3>Skill Set</h3>
        <div class="edu_card card mt-4 mb-5">
            <div class="card-body text-center text-secondary">
                <div class="row">
                    @forelse ($seeker_skill_sets as $ss)
                        <div class="col-auto">
                            <div class="badge bg-dark">{{ $ss->skill_sets->name }}</div>
                        </div>
                    @empty
                        <div class="col-12">
                            <i class="fas fa-exclamation-circle"></i> No skill set added
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
        <form action="{{ route('profile.skillset-info-store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if ($errors->any())
                <div class="alert alert-danger">{{ $errors->first() }}</div>
            @endif
            <div class="skillset_card_wrapper">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="col-12 my-2">
                                    <div class="form-group">
                                        <label class="text-muted text-bold">Field</label>
                                        <select class="form-control cats" name="skill_sets">
                                            <option value="">Choose field</option>
                                            @foreach ($cats as $cat)
                                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 my-2">
                                    <div class="form-group">
                                        <label class="text-muted text-bold">Skill</label>
                                        <div class="form-check form_check_skills">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h6>Added skills</h6>
                                        <div id="skill_div">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- <button class="btn btn-primary add_edu_btn">Add another</button> --}}

            <div class="my-4 text-end">
                <button class="btn btn-success">Review your resume</button>
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
            localStorage.clear();
            showData();
            let skill_sets = localStorage.getItem('skill_set');
            let skill_set_arr;

            if (!skill_sets) {
                skill_set_arr = []
            } else {
                skill_set_arr = JSON.parse(skill_sets)
            }

            function showData() {
                let data = JSON.parse(localStorage.getItem('skill_set'));
                let addedSkill = '';

                if (data) {
                    data.map((val) => {
                        addedSkill += `
                        <div class="badge bg-secondary">
                            ${val}
                        </div>
                        `;
                    });
                }

                $('#skill_div').html(addedSkill);
            }

            $('.cats').on('change', function() {
                let cat = $(this).val();
                let html = '';
                $.ajax({
                    url: '/profile/skillset-categories/get/skill-set',
                    type: 'GET',
                    data: {
                        id: cat
                    },
                    success: function(res) {
                        res.forEach(skill => {
                            if (skill_set_arr.includes(skill.name)) {
                                html += `<div>
                                        <input checked name="skill[]" type="checkbox" class="form-check-input check_value" value="${skill.id}" id="${skill.id}" data-name="${skill.name}">
                                        <label class="form-check-label" for="${skill.id}">${skill.name}</label>
                                    </div>`;
                            } else {
                                html += `<div>
                                        <input name="skill[]" type="checkbox" class="form-check-input check_value" value="${skill.id}" id="${skill.id}" data-name="${skill.name}">
                                        <label class="form-check-label" for="${skill.id}">${skill.name}</label>
                                    </div>`;
                            }
                        });
                        $('.form_check_skills').html(html);
                    }
                })
            })

            $(document).on('change', '.check_value', function(e) {
                let skill = $(this).data('name');
                let is_checked = e.target.checked;

                if (is_checked) {
                    if (!skill_set_arr.includes(skill)) skill_set_arr.push(skill);
                    localStorage.setItem('skill_set', JSON.stringify(skill_set_arr));
                } else {
                    skill_set_arr.splice(skill_set_arr.indexOf(skill), 1);
                    localStorage.setItem('skill_set', JSON.stringify(skill_set_arr));
                }

                showData();
            })
        })
    </script>
@endsection
