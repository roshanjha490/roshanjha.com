@extends('layouts.layout2')

@section('title', 'Edit Login Key')

@section('content')
<div class="w-100 h-auto py-5 px-4">

    <h2 class="text-success w-100 h-auto pt-5 px-4">{{session()->get('success')}}</h2>

    <section class="w-100 h-auto">
        <div class="container rk_cont w-100 h-auto px-5">
            <div class="w-100 h-auto py-5 article_section d-flex justify-content-center align-items-center">

                <form action="{{ route('auth.edit') }}" method="POST" class="w-50">
                    @csrf
                    <div class="form-group">
                        <label for="Batch ID">Edit Login Key</label>

                        <div class="w-100 h-auto position-relative mb-10px mt-10px">
                            <input id="old_login_key" type="password" placeholder="Enter Old Login Key Here" name="old_login_key" class="form-control h-40px font-13 w-100" value="{{ session()->get('old_login_key_value') }}">
                            <i class="eye1 far fa-eye-slash position-absolute top-50 right-0 translate-center" style="cursor: pointer;"></i>
                            <i class="eye2 far fa-eye position-absolute top-50 right-0 translate-center d-none" style="cursor: pointer;"></i>
                        </div>
                        <span style="color: red;">{{session()->get('old_login_key')}}</span>

                        <div class="w-100 h-auto position-relative mb-10px mt-10px">
                            <input id="new_login_key" type="password" placeholder="Enter New Login Key Here" name="new_login_key" class="form-control h-40px font-13 w-100" value="{{ session()->get('new_login_key_value') }}">
                            <i class="eye3 far fa-eye-slash position-absolute top-50 right-0 translate-center" style="cursor: pointer;"></i>
                            <i class="eye4 far fa-eye position-absolute top-50 right-0 translate-center d-none" style="cursor: pointer;"></i>
                        </div>
                        <span style="color: red;">{{session()->get('new_login_key')}}</span>

                        <div class="w-100 h-auto position-relative mb-10px mt-10px">
                            <input id="cnf_login_key" type="password" placeholder="Enter Confirm Login Key Here" name="cnf_login_key" class="form-control h-40px font-13 w-100" value="{{ session()->get('cnf_login_key_value') }}">
                            <i class="eye5 far fa-eye-slash position-absolute top-50 right-0 translate-center" style="cursor: pointer;"></i>
                            <i class="eye6 far fa-eye position-absolute top-50 right-0 translate-center d-none" style="cursor: pointer;"></i>
                        </div>
                        <span style="color: red;">{{session()->get('cnf_login_key')}}</span>
                    </div>

                    <div class="form-group">
                        <button class="w-100" type="submit">Edit Login Key</button>
                    </div>
                </form>

            </div>
        </div>
    </section>

</div>
@endsection('content')