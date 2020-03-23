<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="fonts/google-fonts.css">
    <link rel="stylesheet" href="css/materialize.css">
    <title>Calculator</title>
</head>
<body>
<header>
</header>
<main>
    <div class="row"></div>
    <div class="container">
        <div class="row">
            <div class="col s10 push-s1 l4 push-l3">
                <div class="card">
                    <div class="card-content">
                        <div class="row">
                            <div class="">
                                <a class="col l2 push-l2 waves-effect waves-light btn" onclick="typeNumber(7)">7</a>
                            </div>
                            <div class="">
                                <a class="col l2 push-l3 waves-effect waves-light btn" onclick="typeNumber(8)">8</a>
                            </div>
                            <div class="">
                                <a class="col l2 push-l4 waves-effect waves-light btn" onclick="typeNumber(9)">9</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="">
                                <a class="col l2 push-l2 waves-effect waves-light btn" onclick="typeNumber(4)">4</a>
                            </div>
                            <div class="">
                                <a class="col l2 push-l3 waves-effect waves-light btn" onclick="typeNumber(5)">5</a>
                            </div>
                            <div class="">
                                <a class="col l2 push-l4 waves-effect waves-light btn" onclick="typeNumber(6)">6</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="">
                                <a class="col l2 push-l8 waves-effect waves-light btn" onclick="typeNumber(3)">3</a>
                            </div>
                            <div class="">
                                <a class="col l2 push-l3 waves-effect waves-light btn" onclick="typeNumber(2)">2</a>
                            </div>
                            <div class="">
                                <a class="col l2 pull-l2 waves-effect waves-light btn" onclick="typeNumber(1)">1</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="">
                                <a class="col l5 push-l2 waves-effect waves-light btn" onclick="typeNumber(0)">0</a>
                            </div>
                            <div class="center">
                                <a class="col l2 push-l3 waves-effect waves-light btn" onclick="clearBtn()">C</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="divider"></div>
                        </div>
                        <div class="row">
                            <div class="input-field col l12">
                                <a class="col l3 push-l10 z-depth-0 transparent btn">
                                    <i class="tiny material-icons" style="color:grey;">backspace</i>
                                </a>
                                <form action="#" onsubmit="resultBtn()">
                                    <input id="input" onsubmit="resultBtn()" type="text" value="" autocomplete="off">
                                    <label for="input"></label>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col l2 push-l3">
                <div class="card">
                    <div class="card-content">
                        <div class="row">
                            <div class="center">
                                <a class="col l5 waves-effect waves-light btn-small" onclick="typeOperator(' - ')">-</a>
                            </div>
                            <div class="center">
                                <a class="col l5 push-l2 waves-effect waves-light btn-small"
                                   onclick="typeOperator(' + ')">+</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="center">
                                <a class="col l5 waves-effect waves-light btn-small" onclick="typeOperator(' x ')">x</a>
                            </div>
                            <div class="center">
                                <a class="col l5 push-l2 waves-effect waves-light btn-small"
                                   onclick="typeOperator(' / ')">/</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="center">
                                <a class="col l12 waves-effect waves-light btn-small" onclick="resultBtn()">=</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<footer>

</footer>
<script src="js/materialize.js"></script>
<script>

    function typeNumber(number) {
        document.getElementById('input').value += number;
    }

    function typeOperator(operator) {
        document.getElementById('input').value += operator;
    }

    function clearBtn() {
        document.getElementById('input').value = '';
    }

    function resultBtn() {

        const data = new FormData();

        data.append('input', document.getElementById('input').value);

        const ajax = new XMLHttpRequest();

        ajax.open("POST", "back-end/api.php", true);

        ajax.send(data);

        ajax.onreadystatechange = function () {
            if (ajax.readyState == 4 && ajax.status == 200) {
                var response = ajax.responseText;
                document.getElementById('input').value = response;
            }
        }
    }


</script>
</body>
</html>