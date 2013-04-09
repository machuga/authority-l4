<?php

return array(

    'initialize' => function($authority, $user) {
        $authority->addAlias('manage', array('create', 'read', 'update', 'delete'));
        $authority->addAlias('moderate', array('read', 'update', 'delete'));
    }

);
