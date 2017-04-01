<?php
// Get password passed in from command line
$input = $argv[1];
// The real password and its hash
$password = 'Geneva2017';
$hash = password_hash($password, PASSWORD_DEFAULT);
echo 'Password: ' . $password . "\n\n";
echo 'Hash: ' . $hash . "\n\n";
echo "++++ Checking your password ++++\n\n";
echo 'You entered: ' . $input . "\n";
echo 'The hash is: ' . password_hash($input, PASSWORD_DEFAULT) . "\n";
// Compare your input to the hased password
if (password_verify($input, $hash)){
    echo "Password matches.  Welcome!\n\n";
} else {
    echo "Password does not match.  Go AWAY!\n\n";
}