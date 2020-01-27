<?php

defined("ENTER_POINT") OR exit("No direct access allowed here ! Get out !");

// Check the needed variables
if( !(
        isset($title) AND
        isset($message) AND
        isset($file) AND
        isset($line) AND
        isset($trace) AND
        isset($mortal)
    )
)
{
    exit("Error : Please follow the error reporting documentation !");
}

?>

<div style="background-color: red; color: white; padding: 10px 10px 10px 10px; box-shadow: grey 0 5px 10px">
    <h1 style="font-size: 1.5em; margin: 0; padding: 0"><?php if($mortal) echo "Mortal "; ?>Error : <?php echo $title; ?></h1>

    <div style="margin: 0; padding: 0;">
        <?php
        if(ENV === 0) {
            $res = "<p>Error message : $message</p>";
            $res .= "<p>In $file -- line $line</p>";
            $res .= "<div>";
            $res .= "<p style='cursor: pointer; text-decoration: underline; margin: 0' onclick=\"let elem=this.parentElement.getElementsByTagName('div')[0]; elem.style.display=elem.style.display==='none'?'block':'none'\">Execution trace</p>";
            $res .= "<div id='trace' style='display: none; padding: 10px 10px 10px 20px; margin-top: 10px; background-color: #080808'>";
            foreach ($trace as $step) {
                $res .= "<p style='color: orange; margin: 0; padding: 0'>- In " . $step['file'] . " -- line " . $step['line'] . " -- function " . $step['function'] . "()</p>";
            }
            $res .= "</div>";
            $res .= "</div>";

            echo $res;
        }
        ?>
    </div>
</div>