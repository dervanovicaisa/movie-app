<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Track Movie App</title>
    <style>
        @font-face {
            font-family: decade;
            src: url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/142996/decade.ttf");
        }

        *,
        *:before,
        *:after {
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            -webkit-transition: 0.3s;
            -moz-transition: 0.3s;
            -ms-transition: 0.3s;
            -o-transition: 0.3s;
            transition: 0.3s;
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        html,
        body {
            width: 100%;
            height: 100%;
            overflow: hidden;
        }

        body {
            font-family: decade;
        }

        .half {
            position: absolute;
            overflow: hidden;
            z-index: 50;
            left: 0;
            width: 100%;
            height: 50%;
            -webkit-transition: 3s;
            -moz-transition: 3s;
            -ms-transition: 3s;
            -o-transition: 3s;
            transition: 3s;
            will-change: transform;
        }

        .half img {
            position: absolute;
            top: -10%;
            left: 0;
            width: 100%;
        }

        .half.top {
            top: 0;
        }

        .half.bottom {
            top: 50%;
        }

        .half.bottom img {
            top: -110%;
        }

        .half.active.top {
            -webkit-transform: translateX(0) translateY(-100%);
            -moz-transform: translateX(0) translateY(-100%);
            -ms-transform: translateX(0) translateY(-100%);
            -o-transform: translateX(0) translateY(-100%);
            transform: translateX(0) translateY(-100%);
        }

        .half.active.bottom {
            -webkit-transform: translateX(0) translateY(100%);
            -moz-transform: translateX(0) translateY(100%);
            -ms-transform: translateX(0) translateY(100%);
            -o-transform: translateX(0) translateY(100%);
            transform: translateX(0) translateY(100%);
        }

        .super-button {
            position: absolute;
            left: 50%;
            top: 50%;
            z-index: 200;
            width: 200px;
            height: 80px;
            opacity: 0.8;
            -webkit-transform: translateX(-50%) translateY(-50%);
            -moz-transform: translateX(-50%) translateY(-50%);
            -ms-transform: translateX(-50%) translateY(-50%);
            -o-transform: translateX(-50%) translateY(-50%);
            transform: translateX(-50%) translateY(-50%);
            text-transform: uppercase;
            font-size: 40px;
            font-weight: bold;
            color: #8f8f8f;
            background-color: transparent;
            border: 4px solid rgba(143, 143, 143, 0.5);
            -webkit-transition: 1.5s;
            -moz-transition: 1.5s;
            -ms-transition: 1.5s;
            -o-transition: 1.5s;
            transition: 1.5s;
            will-change: color, opacity, border-color;
        }

        .super-button:hover {
            color: #fff;
            opacity: 1;
            border-color: #fff;
        }

        .super-button:hover~.overlay {
            background-color: rgba(0, 155, 90, 0.5);
        }

        .super-button:hover~.overlay.active {
            background-color: transparent;
        }

        .super-button:hover~.button-line .inner {
            max-width: 100%;
        }

        .super-button.active {
            -webkit-transition: 4.5s;
            -moz-transition: 4.5s;
            -ms-transition: 4.5s;
            -o-transition: 4.5s;
            transition: 4.5s;
            -webkit-transform: translateX(-50%) translateY(-1000px);
            -moz-transform: translateX(-50%) translateY(-1000px);
            -ms-transform: translateX(-50%) translateY(-1000px);
            -o-transform: translateX(-50%) translateY(-1000px);
            transform: translateX(-50%) translateY(-1000px);
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 100;
            background-color: rgba(155, 0, 0, 0);
            -webkit-transition: 1.5s;
            -moz-transition: 1.5s;
            -ms-transition: 1.5s;
            -o-transition: 1.5s;
            transition: 1.5s;
            will-change: background-color;
        }

        .overlay.active {
            background-color: transparent;
        }

        .button-line {
            position: absolute;
            top: -webkit-calc(50% - 2px);
            top: -moz-calc(50% - 2px);
            top: calc(50% - 2px);
            left: 0;
            z-index: 200;
            width: -webkit-calc(50% - 100px);
            width: -moz-calc(50% - 100px);
            width: calc(50% - 100px);
            height: 4px;
            background-color: rgba(143, 143, 143, 0.5);
            -webkit-transition: 0.5s;
            -moz-transition: 0.5s;
            -ms-transition: 0.5s;
            -o-transition: 0.5s;
            transition: 0.5s;
            will-change: width, max-width;
        }

        .button-line.left {
            -webkit-transform: rotate(180deg);
            -moz-transform: rotate(180deg);
            -ms-transform: rotate(180deg);
            -o-transform: rotate(180deg);
            transform: rotate(180deg);
        }

        .button-line.right {
            left: -webkit-calc(50% + 100px);
            left: -moz-calc(50% + 100px);
            left: calc(50% + 100px);
        }

        .button-line .inner {
            width: 100%;
            height: 100%;
            background-color: #fff;
            max-width: 0;
            -webkit-transition: 1.5s;
            -moz-transition: 1.5s;
            -ms-transition: 1.5s;
            -o-transition: 1.5s;
            transition: 1.5s;
        }

        .button-line.active {
            opacity: 0;
        }

        .content {
            position: absolute;
            padding: 50px;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 40;
            background-color: #1d1f20;
        }

        .content .hello {
            font-size: 50px;
            font-weight: bold;
            color: rgba(0, 155, 90, 0.5);
            text-transform: uppercase;
            position: absolute;
            top: 50%;
            left: 50%;
            opacity: 0;
            -webkit-transform: translateX(-50%) translateY(-50%) scale(0.5);
            -moz-transform: translateX(-50%) translateY(-50%) scale(0.5);
            -ms-transform: translateX(-50%) translateY(-50%) scale(0.5);
            -o-transform: translateX(-50%) translateY(-50%) scale(0.5);
            transform: translateX(-50%) translateY(-50%) scale(0.5);
            -webkit-transition: 1s;
            -moz-transition: 1s;
            -ms-transition: 1s;
            -o-transition: 1s;
            transition: 1s;
        }

        .content nav {
            margin: 0 auto;
            border: 2px solid #fff;
            opacity: 0;
            -webkit-transform: scale(0.5);
            -moz-transform: scale(0.5);
            -ms-transform: scale(0.5);
            -o-transform: scale(0.5);
            transform: scale(0.5);
            -webkit-transition: 1s;
            -moz-transition: 1s;
            -ms-transition: 1s;
            -o-transition: 1s;
            transition: 1s;
            max-width: 900px;
        }

        .content nav ul {
            font-size: 0;
        }

        .content nav ul li {
            display: inline-block;
            font-size: 25px;
            text-transform: uppercase;
            color: #fff;
            padding: 5px 10px;
            border-right: 2px solid #fff;
        }

        .content nav ul li:last-child {
            border-right: none;
        }

        .content nav ul li.active {
            color: rgba(0, 155, 90, 0.5);
        }

        .content nav ul li:hover {
            color: rgba(0, 155, 90, 0.5);
        }

        .content.active .hello {
            opacity: 1;
            -webkit-transition-delay: 1.5s;
            -moz-transition-delay: 1.5s;
            -ms-transition-delay: 1.5s;
            -o-transition-delay: 1.5s;
            transition-delay: 1.5s;
            -webkit-transform: translateX(-50%) translateY(-50%) scale(1);
            -moz-transform: translateX(-50%) translateY(-50%) scale(1);
            -ms-transform: translateX(-50%) translateY(-50%) scale(1);
            -o-transform: translateX(-50%) translateY(-50%) scale(1);
            transform: translateX(-50%) translateY(-50%) scale(1);
        }

        .content.active nav {
            -webkit-transition-delay: 1.5s;
            -moz-transition-delay: 1.5s;
            -ms-transition-delay: 1.5s;
            -o-transition-delay: 1.5s;
            transition-delay: 1.5s;
            -webkit-transform: scale(1);
            -moz-transform: scale(1);
            -ms-transform: scale(1);
            -o-transform: scale(1);
            transform: scale(1);
            opacity: 1;
        }

    </style>
</head>

<body>

    <div class="main">
        <div class="top half">
            <img src="https://wallpapercave.com/wp/wp7301170.jpg" />
        </div>
        <div class="bottom half">
            <img src="https://wallpapercave.com/wp/wp7301170.jpg" />
        </div>
        <button class="super-button">MOVIES</button>
        <div class="overlay"></div>
        <div class="button-line left">
            <div class="inner"></div>
        </div>
        <div class="button-line right">
            <div class="inner"></div>
        </div>
    </div>
    <div class="content">
        <div class="hello" style="width: 30%;">
            <ul style="display: flex;justify-content: space-around; width: 100%; ">
                <li class="active"><a href="{{route('login')}}">Login</a></li>
                <li><a href="{{route('register')}}">Sign up</a></li>
            </ul>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $(document).on("click", ".super-button", function() {
                $(".main, .half, .overlay, .button-line, .super-button, .content").addClass("active");
                setTimeout(function() {
                    $(".main *").css("z-index", "1");
                }, 3000);
            });
        });
    </script>
</body>

</html>
