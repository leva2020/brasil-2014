<?php
return array(
'service_manager' => array(
        'invokables' => array(
            'Pauta' => 'Pauta\Listener\Pauta',
        ),
    ), 
'view_manager' => array(
        'template_map' => array(
			'pauta/view/helper/pauta' => __DIR__ . '/../view/pauta/helper/pauta.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
);