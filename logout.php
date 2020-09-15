<?php
session_start();
session_destroy();
?>
<body href="login.html" onload="myFunction()">
<script>
function myFunction() {
   alert("successfully logged out");  
}
</script>
</body>
<?php header('refresh:0;url=index.html');
?>