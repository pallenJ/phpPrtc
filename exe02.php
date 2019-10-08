
<?php

interface Employeer{
    public function work();
}

class JoonMo implements Employeer{
    public $data1;

    public function work(){
        return "일함";
    }
}
$ever = new JoonMo;
echo "<h2>".$ever->work()."</h2>";

trait bizSpring{

    public function studying(){
        return "공부하는 중";
    }

    
}
class working{
    use bizSpring;
}
$ever = new working;
echo $ever->studying();