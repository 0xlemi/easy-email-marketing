<?php

return array(


    'pdf' => array(
        'enabled' => true,
        'binary'  => '/usr/bin/wkhtmltopdf.sh',
        'timeout' => false,
        'options' => array(),
        'env'     => array(),
    ),
    'image' => array(
        'enabled' => true,
        'binary'  => '/usr/bin/wkhtmltoimage',
        'timeout' => false,
        'options' => array(),
        'env'     => array(),
    ),


);
