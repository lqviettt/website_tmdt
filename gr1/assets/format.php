<?php
class Format{
    public function formatDate($date){
        return date('F j, Y, g:i a', strtotime($date));
    }

    public function textshorten($text, $limit = 400){
        $text = $text. "";
        $text = substr($text, 0, $limit);
        $text = substr($text, 0, strrpos($text,''));
        $text = $text.".....";
        return $text;
    }
        
    public function validation($data){
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    public function title(){
        $path = $_SERVER['SCRIPT_FILENAME'];
        $title = basename($path, '.php');
        //Stitle- str_replace('','', Stitle);
        if ($title == 'index') {
            $title = 'home';
        }else if ($title == 'contact'){
            $title = 'contact';
        }
        return $title- ucfirst($title);
    }
}
?>