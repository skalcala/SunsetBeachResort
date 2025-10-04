<?php
// Payment configuration. Fill these with sandbox keys when ready.
return [
    'paymongo' => [
        'public_key' => '', // e.g., "pk_test_..."
        'secret_key' => '', // e.g., "sk_test_..."
        'webhook_secret' => '',
        'sandbox' => true,
    ],
    'gcash' => [
        'client_id' => '',
        'client_secret' => '',
        'sandbox' => true,
    ],
    // When keys are empty, endpoints fall back to provider_mock popups.
];
