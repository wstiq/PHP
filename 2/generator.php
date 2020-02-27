<?php

class generatorClass
{
    public $input = null;
    public $result = null;
    public $count = 0;

    public function __construct($input = null)
    {
        $this->input = $input;
    }

    public function run()
    {
        foreach ($this->getRefactoredString($this->input) as $res) {
            $this->result.= $res;
        }
        echo $this->result;
        echo "<br/>";
        echo $this->count." count of changed letters";
    }

    function getRefactoredString($data)
    {
        try {
            for ($i = 0; $i < strlen($data); $i++) {
                if ($data[$i] == "H" or $data[$i] == "h" or $data[$i] == "O" or $data[$i] == "o" or  $data[$i] == "L" or $data[$i] == "l" or $data[$i] == "E" or $data[$i] == "e"){
                    $this->count++;
                }
                switch ($data[$i]) {
                    case "H" :
                    case "h" :
                        yield "4";
                        break;
                    case"l" :
                    case"L" :
                        yield "1";
                        break;
                    case"o" :
                    case"O" :
                        yield "0";
                        break;
                    case "e" :
                    case "E" :
                        yield "3";
                        break;
                    default:
                        yield $data[$i];
                        break;
                }
            }
        } finally {
            return; //try only block doesnt work
        }
    }
}