<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IMS - Intro</title>


    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css" integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid mt-5 mb-5 w-25">

        <img src="./assets/logo_large.png" class="img-thumbnail" alt="Responsive image">
        <h6 class="mt-3 ml-3">Herzlich Willkomen bei der IMS!</h6>
        <p class="mt-3 ml-3">(Immobilie-Management-System)</p>
        <button id="start_the_jurney" type="button" class="mt-2 btn btn-link">Hier gehts zur App!</button>

        <script type="text/javascript">
            document.getElementById("start_the_jurney").onclick = function() {
                app()
            };

            function app() {
                let params = `scrollbars=no,resizable=no,status=no,location=no,toolbar=no,menubar=no,
            width = 0, height = 0, left = -1000, top = -1000 `;

                open('/immobilien-management-system/sites/login.sites.php', 'test', params);
            }
        </script>
    </div>
</body>

</html>