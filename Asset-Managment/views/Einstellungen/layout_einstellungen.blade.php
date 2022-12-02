
<!doctype html>

<!--
 - SmartWorking.exe
-->

<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/styles/bootstrap.css">
    <link rel="stylesheet" href="/styles/custom.css">
    <link rel="icon" type="image/x-icon" href="/img/fh-aachen_university-of-applied-sciences_303_logo.png">
    <title>Benachrichtigungseinstellungen</title>
    <script src=
                    "https://code.jquery.com/jquery-1.12.4.min.js">
    </script>
    <style type="text/css">
        .selectt {

            display: none;

        }

        label {
            margin-right: 20px;
        }
    </style>
</head>
<body>
<div class="container">
    @yield('header')
    @yield('buttons')

</div>

<footer class="py-3 my-4">
    @yield('footer')
</footer>
@yield('jsextra')
<script type="text/javascript">
    $(document).ready(function () {
        $('input[type="radio"]').click(function () {
            var inputValue = $(this).attr("value");
            var targetBox = $("." + inputValue);
            $(".selectt").not(targetBox).hide();
            $(targetBox).show();
        });
    });
</script>
<script type="text/javascript" src="../js/bootstrap.bundle.min.js"></script>
</body>

@yield('modals')

</html>