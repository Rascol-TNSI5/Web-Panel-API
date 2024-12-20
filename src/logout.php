<?php
setcookie('user_session', '', time() - 3600, '/'); // Supprime le cookie
header('Location: index.html'); // Redirige vers index.html
exit();
?>