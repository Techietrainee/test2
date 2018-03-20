<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="<?php echo "http://" . $_SERVER['SERVER_NAME']; ?>/quantum-sydney/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo "http://" . $_SERVER['SERVER_NAME']; ?>/quantum-sydney/css/style.css">
   
  <link href="<?php echo "http://" . $_SERVER['SERVER_NAME']; ?>/quantum-sydney/css/bootstrap/bootstrap.min.css" rel="stylesheet" media="screen">
  <link href="<?php echo "http://" . $_SERVER['SERVER_NAME']; ?>/quantum-sydney/css/bootstrap/bootstrap-theme.min.css" rel="stylesheet" media="screen">
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script type="text/javascript" src="js/parsley.min.js"></script>
  <script>
function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
</script>
<script type="text/javascript">
  $('#regform').parsley();
</script>
<script>
$(document).ready(function(){
 $('form').parsley();
});
</script>
</head>


<body>
