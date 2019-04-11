<?php

// Error and success messages
$messages = [
    'error' => [],
    'success' => [],
];

// Form sent
if(!empty($_GET))
{
    // Get variables
    $account = trim($_GET['account']);

    // Handle errors
    if(empty($account))
    {
        $messages['error'][] = 'Missing account';
    }

    // Success
    if(empty($messages['error']))
    {
        $app = new App($account);
        $_GET['account'] = '';
    }
}

// Form not sent
else
{
    $_GET['account'] = '';
}