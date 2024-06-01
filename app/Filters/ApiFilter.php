<?php
namespace App\Filters;
use Illuminate\Http\Request;
class ApiFilter{

    protected $safeParams = [];
    protected $columnMap = [];
    protected $operatorMap = [];

    public function transform(Request $request){
        $eloQuery = [];
        foreach($this->safeParams as $parm => $operators){
            $query = $request->query($parm);

            if(!isset($query)){
                continue;
            }

            $column = $this->columnMap[$parm] ?? $parm;
            foreach($operators as $operator){
                if(isset($query[$operator])){
                    //Capturamos el valor a evaluar
                    $value = $query[$operator];
                    // Si el operador es 'LIKE', añadir los comodines '%' al valor
                    if ($operator === 'lk') {
                        $value = "%{$value}%";  
                    }
                    $eloQuery[] = [$column, $this->operatorMap[$operator],$value];
                }
            }
        }
        return $eloQuery;
    }
}