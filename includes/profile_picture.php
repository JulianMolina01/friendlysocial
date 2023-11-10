<?php

$target = glob("data/images/profiles/" . $row['user_id'] . ".*");
if($target) {
    echo '<img style="border-radius: 50%;" src="' . $target[0] . '" width="' . $width . '" height="' . $height .'">'; 
} else {
    if($row['user_gender'] == 'M') {
        echo '<img style="border-radius: 50%;" src="data/images/profiles/M.jpg" width="' . $width . '" height="' . $height .'">';
    } else if ($row['user_gender'] == 'F') {
        echo '<img style="border-radius: 50%;" src="data/images/profiles/F.jpg" width="' . $width . '" height="' . $height .'">';
    }
}

?>