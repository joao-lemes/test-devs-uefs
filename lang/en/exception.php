<?php

declare(strict_types=1);

return [
    'unauthorized' => 'Unauthorized',
    'not_found' => [
        'default' => 'Item not found',
        'reset_password_token' => 'Token to reset password not found',
        'user' => 'User not found',
        'tag' => 'Tag not found',
        'post' => 'Post not found',
    ],
    'bad_request' => [
        'default' => 'Bad request',
        'invalid_id' => 'Invalid id',
        'incorrect_password' => 'Incorrect current password',
    ],
    'internal_server_error' => 'Internal server error',

    'queue' => [
        'email_sending' => 'Email sending queue error',
    ],

    'external_request' => [
        'external_request_error' => 'External request with error',
        'invalid_uri' => 'Invalid uri',
        'invalid_method' => 'Invalid method',
    ],

    'existing_email_for_this_institution' => 'Existing email for this institution',

    'and_more_error' => '(and :amount more error)',
    'and_more_errors' => '(and :amount more errors)',

];
