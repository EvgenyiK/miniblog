<?php 

class Helper{
    
   public function passwordsMatch($pw1,$pw2) :bool{
        if ($pw1 == $pw2){
            return true;
        }else{
            return false;
        }
   }

    public function isValidLength($str,$min = 8,$max = 20):bool{
        if (strlen($str)<$min || strlen($str) > $max){
            return false;
        }else {
            return true;
        }
    }

    public function isEmpty($postValues = []){
        foreach ($postValues as $val){
            if ($val == ''){
                return true;
            }
        }
        return false;
    }

    public function isSecure($pw){
        if (preg_match("~[a-z]+~", $pw) && preg_match("~[a-z]+~", $pw) && preg_match("~[a-z]+~", $pw)){
            return true;
        }else{
            return false;
        }
    }

    public function keepValues($val,$type,$attr){
        switch ($type){
            case 'textbox':
                echo "value = '$val'";
                break;
            case 'textarea':
                echo $val;
                break;
            case 'select':
                if ($val == $attr){
                    echo 'selected';
                }
            default:
                echo '';
        }
    }


}