<?php

use BotMan\BotMan\Interfaces\UserInterface;

/**
 * Fungsi ini mengambil response dari database berdasarkan pesan dari pengguna
 */

function getattached(UserInterface $user, $messagesatu, $messagedua, $messagetiga)
{
    $msg3 = explode(",", $messagetiga);
    $sitename = "";
    for ($i = 0; $i <  count($msg3); $i++) {
        $sitename .= '"' . $msg3[$i] . '",';
        // $sitename .= "$msg3[$i],";
    }
    // $resulMessages = ['tth' => $messagesatu, 'jam' => $messagedua, 'sitetel' => $sitename];
    // return $resulMessages;

    $queryMessage = "SELECT * FROM get_attached WHERE
                            tth = '$messagesatu' AND
                            jam = '$messagedua'  AND 
                            sitetel IN ('$sitename')
                            -- sitetel IN ('bts1', 'bts2', 'bts3', 'bts4','bts5') 
                            ";
    global $mysqli;

    // $resultMessage = $mysqli->query($queryMessage)->fetch_row();
    $resultMessages = [];
    $result = mysqli_query($mysqli, $queryMessage);
    // while ($resultMessage = mysqli_fetch_row($result)) {
    while ($resultMessage = mysqli_fetch_assoc($result)) {
        $resultMessages[] = $resultMessage;
    }
    // if ($resultMessages == null) return "Maaf /say $resultMessages tidak dikenali";

    $resultMessageall = [$resultMessages => 'tth',  $resultMessages => 'jam',  $resultMessages => 'sitetel'];
    return $resultMessageall;
}
