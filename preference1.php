<?php
// Check if selectedValue is set in the POST data
if (isset($_POST['selectedValue'])) {
    $selectedValue = $_POST['selectedValue'];
    // Define options based on selectedValue
    $options = array();
    if ($selectedValue == 'MBA') {
        $options = array(
            'Commerce SF',
            'Commerce CA A',
            'Commerce CA B'
        );
    } elseif ($selectedValue == 'IT') {
        $options = array(
            'Option 1 for Information Technology',
            'Option 2 for Information Technology',
            'Option 3 for Information Technology'
        );
    } elseif ($selectedValue == 'ITB') {
        $options = array(
            'Option 1 for BCA B',
            'Option 2 for BCA B',
            'Option 3 for BCA B'
        );
    }
    // Add more conditions for other values as needed

    // Output options
    $output = '<option value="">Select Option</option>';
    foreach ($options as $option) {
        $output .= '<option value="' . $option . '">' . $option . '</option>';
    }
    echo $output;
} else {
    // Handle case where selectedValue is not set
    echo "Error: selectedValue is not set";
}
?>
