<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title><?php echo $title; ?></title>
    <meta name="description" content="<?php echo $description; ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript">
        function appendCSS(url){
            var head = document.getElementsByTagName("head")[0];
            var link = document.createElement('link');
            link.rel = 'stylesheet';
            link.type = 'text/css';
            link.href = 'http://' + location.hostname + '/idiomas/' + url;
            head.appendChild(link);
        }
        appendCSS('vendor/bootstrap/css/bootstrap.min.css');
        appendCSS('css/styles.css');
    </script>
</head>