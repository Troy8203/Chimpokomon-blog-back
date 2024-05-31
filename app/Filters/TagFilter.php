<?php
namespace App\Filters;
use App\Filters\ApiFilter;
class TagFilter extends ApiFilter{
/**eq = igual a, lt= menor que, gt = mayor que */
    protected $safeParams = [
        'id' => ['eq','ne'],
        'name' => ['eq','lk'],
        'status' => ['eq','ne']
    ];
    public $columnMap = [];
    protected $operatorMap = [
        'eq' => '=',
        'lt' => '<',
        'lte' => '<=',
        'gt' => '>',
        'gte' => '>=',
        'ne' => '!=',
        'lk' => 'LIKE'
    ];
}