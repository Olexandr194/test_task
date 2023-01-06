<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Test task</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="row mt-5">
        <div class="col-md-1"></div>
        <div class="col-md-4">
            <div id="warning" class="alert alert-danger" role="alert" style="height: 150px" hidden>
                <h4 class="alert-heading">Користувача з таким e-mail уже зареєстровано!</h4>
            </div>

            <h4> Форма реєстрації </h4> <hr>

            <div id="success-register" class="alert alert-success" role="alert" style="height: 150px" hidden>
                <h4 class="alert-heading">Реєстрація пройшла успішно!</h4>
            </div>

            <form id="form" action="{{ route('check') }}" method="POST">
            @csrf
                <div id="err"></div>

                <div class="form-group mb-3">
                    <label class="control-label"> Ім'я</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                    <span class="text-danger error-text name_error"></span>
                </div>
                <div class="form-group mb-3">
                    <label class="control-label"> Прізвище</label>
                    <input type="text" class="form-control" id="surname" name="surname" value="{{ old('surname') }}">
                    <span class="text-danger error-text surname_error"></span>
                </div>
                <div class="form-group mb-3">
                    <label class="control-label"> Електронна адреса</label>
                    <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}">
                    <span class="text-danger error-text email_error"></span>
                </div>
                <div class="form-group mb-3">
                    <label class="control-label"> Пароль</label>
                    <input type="password" class="form-control" id="password" name="password" value="{{ old('password') }}">
                    <span class="text-danger error-text password_error"></span>
                </div>
                <div class="form-group mb-3">
                    <label class="control-label"> Повторіть пароль</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" value="{{ old('password_confirmation') }}">
                    <span class="text-danger error-text password_confirmation_error"></span>
                </div>

                <button type="submit" class="btn btn-primary mt-3 w-100">Надіслати</button>
            </form>

        </div>
    </div>
</div>
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>

</body>
</html>


