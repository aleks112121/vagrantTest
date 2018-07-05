<?php

$host  = "0.0.0.0";
$port = 9999;
set_time_limit(0);

echo "\nCreating Socket...";
$socket = socket_create(AF_INET, SOCK_STREAM, 0) or die("Could not create socket\n");

echo "\nBinding Socket...";
$result = socket_bind($socket, $host, $port) or die("Could not bind to socket\n");

//read and initialize number server will return
$number = file_get_contents("database");

echo "\nListening Socket...";

while(true)
{
        $result = socket_listen($socket, 3) or die("Could not set up socket listener\n");

        $spawn = socket_accept($socket) or die("Could not accept incoming connection\n");

        $input = socket_read($spawn, 1024) or die("Could not read input\n");
        
        $input = str_replace("\n", "", $input);
        
        //if input data valid reurn id for client
        if($input == "nextid")
        {
                $output = "yourid: " . $number . "\n";
                $number += 1;

                $result = FALSE;
                
                //if file is blocked, try to write untill success
                while($result == FALSE)
                {
                        $result = file_put_contents("database", $number);
                }
        }
	else
	{       
                //if input data wrong inform client
                $output = "Unknown command\n";
        }

	socket_write($spawn, $output, strlen ($output)) or die("Could not write output\n");

}
socket_close($spawn);
socket_close($socket);
?>
