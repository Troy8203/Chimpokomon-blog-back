<?php
namespace App\Filters;
use App\Filters\ApiFilter;
class TagFilter extends ApiFilter{
/**eq = igual a, lt= menor que, gt = mayor que */
    protected $safeParams = [
        'name' => ['eq','lk'],
        'status' => ['eq']
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