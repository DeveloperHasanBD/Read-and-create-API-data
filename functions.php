<?php 

// Read API data  

$response = wp_remote_get('https://www.postman.com/collections/08a45215d1c761b035c5');

if (is_wp_error($response)) {
    // Error handling
    $error_message = $response->get_error_message();
    echo "Error: $error_message";
} else {
    $response_code = wp_remote_retrieve_response_code($response);
    $response_body = wp_remote_retrieve_body($response);

    if ($response_code === 200) {
        // Successful request
        echo "Response: $response_body";
        echo '<pre>';
        print_r(json_decode($response_body));
        echo '</pre>';
    } else {
        // Handle other response codes
        echo "Unexpected response code: $response_code";
    }
}


// Create API data  

$crm_api_url = 'https://crm.example.com/api/create_lead';
// Sample form data
$form_data = array(
    'name'    => 'John Doe',
    'email'   => 'johndoe@example.com',
    'phone'   => '123456789',
    'address' => '123 Main St, City',
    'consent' => 'Yes',
);

$args = array(
    'body' => $form_data,
);

$response = wp_remote_post($crm_api_url, $args);

if (is_wp_error($response)) {
    // Error handling
    $error_message = $response->get_error_message();
    echo "Error: $error_message";
} else {
    $response_code = wp_remote_retrieve_response_code($response);
    $response_body = wp_remote_retrieve_body($response);

    if ($response_code === 200) {
        // Successful request
        echo "Form data sent successfully to CRM.";
    } else {
        // Handle other response codes
        echo "Unexpected response code: $response_code";
    }
}


// end API 

?>
