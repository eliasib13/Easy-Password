<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Semantic UI -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/1.11.8/semantic.min.css"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/1.11.8/semantic.min.js"></script>

        <!-- Custom CSS -->
        <link rel="stylesheet" href="css/app.css" />
    </head>
    <body>
        &nbsp;
        <div class="main-content">
            <h1>Easy Password</h1>
            <div class="ui segment">
                <form method="post" class="ui form" action="{{ url('/doLogin') }}">
                    {{ csrf_field() }}
                    <div class="field">
                        <label>Email</label>
                        <input type="email" name="email" placeholder="example@email.com" value="{{ $email }}"/>
                    </div>
                    <div class="field">
                        <label>Master password</label>
                        <input type="password" name="password" placeholder="········" />
                    </div>
                    <button class="ui button" type="submit">Log in</button>
                </form>
                @if($errorLogin)
                    <div class="ui error message">
                        <div class="header">
                            Login error
                        </div>
                        <p>
                            Check your credentials and try again.
                        </p>
                    </div>
                @endif
            </div>
        </div>

        <!-- Custom JS -->
        <script src="js/app.js"></script>
    </body>
</html>
