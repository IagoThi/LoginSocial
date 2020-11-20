</!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>Login Social</title>
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <meta name="google-signin-client_id"content="42287170514-r54a45bi5l71vqi3o2d21oddej5d7v9m.apps.googleusercontent.com">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>
<body>

<div class="g-signin2" data-onsuccess="onSignIn"></div>



<p id="msg"></p>
<script type="text/javascript">

    function onSignIn(googleUser) {
        var profile = googleUser.getBasicProfile();
        var userID = profile.getId(); // Do not send to your backend! Use an ID token instead.
        var userName = profile.getName();
        var userImg = profile.getImageUrl();
        var userEmail = profile.getEmail(); // This is null if the 'email' scope is not present.
        var userToken = googleUser.getAuthResponse().id_token;

        if (userName !== ''){
            var dados= {
                userID:userID,
                userName:userName,
                userEmail:userEmail,
                userImg:userImg
            };

            $.post('cadastra.php',dados, function(retorna){
            	document.getElementById('msg').innerHTML = retorna;
            });
        }else{
        	document.getElementById('msg').innerHTML=msg;
        }

    }

</script>

    <a href="index.php" onclick="signOut();">Sign out</a>
    <script>
        function signOut() {
        var auth2 = gapi.auth2.getAuthInstance();
        auth2.signOut().then(function () {
            console.log('User signed out.');
        });
    }
</script>
</body>
</html>
