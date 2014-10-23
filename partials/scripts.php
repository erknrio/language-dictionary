<script type="text/javascript" src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/idiomas/vendor/jquery.min.js"></script>
<script type="text/javascript">
    function appendJS(url) {
      var body = document.getElementsByTagName("body")[0];
      var script = document.createElement('script');
      script.type = 'text/javascript';
      script.src = 'http://' + location.hostname + '/idiomas/' + url;
      script.async = "async";
      document.body.appendChild(script);
    }
</script>