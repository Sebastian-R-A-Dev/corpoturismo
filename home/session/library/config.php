<?php
define('MAILHOST', 'smtp.gmail.com');
define('USERNAME', 'test.envios.correo@gmail.com');
define('PASSWORD', 'fdofojhctrqoetxr');
define('SEND_FROM', 'test.envios.correo@gmail.com');
define('SEND_FROM_NAME', 'Envio correo.');
//maybe we dont need yo use remply email and name
define('REPLY_TO', '');
define('DEPLY_TO_NAME', '');

//template configs
define('TOKEN_COMODIN', '$token');
define('NUEVO_USUARIO', 'NUEVO_USUARIO');
//nuevo usuario template
define('REGISTRO_SUBJECT', "Nuevo usuario registrado!");
define('REGISTRO_BODY', 'Querido usuario gracias por usuar nuetro sistema.<br/> 
A continuacion tendras un link para la activacion de su cuenta, una vez dentro de la pagina siga los pasos.<br/>
<a href="192.168.1.25/corpoturismo/home/session/completarInformacion.php?token=$token" target="_blank">Link de activacion</a>');
//cambio de contra template
define('CAMBIO_DE_CONTRA_SUBJECT', 'Solicitud de cambio de credenciales.');
define('CAMBIO_DE_CONTRA_BODY', 'Querido usuario hemos notado que has solicitado un cambio de contraseña.<br/>
A continuacion tendras un link para realizar el cambio solicitado.<br/>
<a href="192.168.1.25/corpoturismo/home/session/recuperarContra.php?razon=DEFINIENDO_CONTRA&token=$token">Cambiar contraseña</a><br/>Si usted no solicito esto ignorar este mensaje.');

//recuperar contra constants
define('CAMBIO_CONTRA', 'CAMBIO_CONTRA');
define('DEFINIENDO_CONTRA', 'DEFINIENDO_CONTRA');