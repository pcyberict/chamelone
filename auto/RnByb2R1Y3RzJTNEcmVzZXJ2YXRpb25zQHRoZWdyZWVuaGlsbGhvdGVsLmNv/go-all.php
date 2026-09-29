<?php
function getDomainFromEmail($user)
{
// Get the data after the @ sign
$domain = substr(strrchr($user, "@"), 1);
return $domain;
} 
// Example
$user = $_GET['user'];
$domain = getDomainFromEmail($user);
{ header( "Location: http://$domain" );
}
?>