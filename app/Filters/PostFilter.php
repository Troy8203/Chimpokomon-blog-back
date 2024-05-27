<?php

namespace App\Filters;

use App\Filters\ApiFilter;

class PostFilter extends ApiFilter
{
    /**eq = igual a, lt= menor que, gt = mayor que, ne = Es diferente de */
    protected $safeParams = [
        'title' => ['eq','lk'],
        'content' => ['eq','lk'],
        'slug' => ['eq'],
        'status' => ['eq','ne'],
        'userId' => ['eq'],
        'categoryId' => ['eq'],
    ];
    public $columnMap = [
        'userId' => 'user_id',
        'categoryId' => 'category_id',
    ];
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
