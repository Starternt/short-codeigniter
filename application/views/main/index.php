<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Shorten url">
    <!--    <meta name="author" content="">-->
    <!--    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">-->

    <title>Redirect me</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="<?php echo base_url() . '/assets/css/main.css' ?>" rel="stylesheet">

</head>

<body>

<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">

            <a class="navbar-brand" href="">Shorten URL</a>
        </div>

    </div>
</div>

<div class="jumbotron">
    <div class="container">
        <h1>Shorten URL</h1>
        <?php echo form_open(''); ?>
        <?php if (isset($valid_error)): ?>
            <div class="alert alert-danger error"><strong>Введён недействительный адрес! </strong></div>
        <?php endif ?>

        <?php echo form_input('original_url', '', array('placeholder' => 'Paste a link to shorten it')); ?>
        <?php echo form_submit('submit', 'Shorten', array('id' => 'submit')); ?>

        <label>Or you can type desired URL</label>

        <?php if (isset($short_url)): ?>
            <?php if (!$short_url): ?>
                <div class="alert alert-danger error"><strong>Введённый URL уже занят! </strong></div>
            <?php endif ?>
        <?php endif ?>

        <?php echo form_input('desired_url', '', array('placeholder' => 'Desired URL')); ?>

        <div class="imitate"></div>
        <?php if (isset($short_url)): ?>
            <?php if ($short_url): ?>
                <div class="alert alert-success error">Успешно! Для вас сгенерирован следующий адрес:
                    <strong><?php echo base_url(); ?><?php if (isset($short_url)) {
                            echo $short_url;;
                        } ?></strong>
                </div>
            <?php endif ?>
        <?php endif ?>

        <!--        -->
        <!--        {% if valid_error_origin is defined %}-->
        <!--        <div class="alert alert-danger error"><strong>Введён недействительный адрес! </strong></div>-->
        <!--        {% endif %}-->


        <!--        {% if valid_error_desired is defined %}-->
        <!--        <div class="alert alert-danger error"><strong>Введённый URL уже занят! </strong></div>-->
        <!--        {% endif %}-->

        <!--        {% if url == true %}-->
        <!--        <div class="alert alert-success error">Успешно! Для вас сгенерирован следующий адрес:-->
        <!--            <strong>{{ server  }}/{{ url }}</strong>-->
        <!--        </div>-->
        <!--        {% endif %}-->
    </div>
</div>

<div class="container">

    <hr>

    <footer>
        <p>&copy; FOOTER NOT READY YET</p>
    </footer>
</div> <!-- /container -->


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>
</body>
</html>