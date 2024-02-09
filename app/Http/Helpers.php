<?php

    function makeImageFromName($name){
        $userImage = "";
        $shortName = "";

        $splittedNames = explode(" ", $name);
        foreach($splittedNames as $sn){
            $shortName .= $sn[0];
        }

        $userImage = '<div class="name-image bg-primary ">'. 
                        $shortName
                    . '</div>'; //'' . $shortName;
        return $userImage;
    }

?>