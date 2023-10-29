<!DOCTYPE html>
<html>

<head>
    <title><?= $title ?></title>
</head>

<body>

    <style>
        .floating-timer {
            position: fixed;
            top: 10px;
            right: 10px;
            background-color: #f8f8f8;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
            z-index: 1000;
        }
    </style>

    <div class="container-fluid">
        <form action="<?= base_url('Testing/submit') ?>" method="post" id="test-form">
            <?php $questionNumber = 1; ?>
            <?php foreach ($questions as $question) : ?>
                <p><?= $questionNumber ?>. <?= $question->question_text ?></p>
                <input type="radio" name="<?= $question->id ?>" value="A"> <?= $question->option_a ?><br>
                <input type="radio" name="<?= $question->id ?>" value="B"> <?= $question->option_b ?><br>
                <input type="radio" name="<?= $question->id ?>" value="C"> <?= $question->option_c ?><br>
                <input type="radio" name="<?= $question->id ?>" value="D"> <?= $question->option_d ?><br>
                <?php $questionNumber++; ?><br>
            <?php endforeach; ?>
            <hr>
            <center>
                <input class="btn btn-primary" type="submit" name="submit" value="Selesaikan Ujian" id="submit-button">
            </center>
        </form>
    </div>
    <div id="timer" class="floating-timer">1:00:00</div>

    <script>
        var timer = 7200;

        function updateTimer() {
            var hours = Math.floor(timer / 3600);
            var minutes = Math.floor((timer % 3600) / 60);
            var seconds = timer % 60;

            var formattedTime = hours + ':' + (minutes < 10 ? '0' : '') + minutes + ':' + (seconds < 10 ? '0' : '') + seconds;

            document.getElementById('timer').innerHTML = formattedTime;

            if (timer <= 0) {
                document.forms[0].submit();
            } else {
                timer--;
                setTimeout(updateTimer, 1000);
            }
        }

        window.onload = function() {
            updateTimer();
        };

        window.onscroll = function() {
            var timerElement = document.getElementById('timer');
            var floatingTimerElement = document.querySelector('.floating-timer');

            if (window.pageYOffset > 100) {
                floatingTimerElement.style.top = '10px';
            } else {
                floatingTimerElement.style.top = '10px';
            }
        };


        history.pushState(null, null, location.href);
        window.onpopstate = function() {
            history.pushState(null, null, location.href);
        }
    </script>

</body>

</html>