<?php

namespace Spatie\Mailcoach\Http\App\Queries;

use Spatie\Mailcoach\Domain\Shared\Traits\UsesMailcoachModels;
use Spatie\Mailcoach\Http\App\Queries\Filters\FuzzyFilter;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class TemplatesQuery extends QueryBuilder
{
    use UsesMailcoachModels;

    public function __construct()
    {
        parent::__construct($this->getTemplateClass()::query());

        $this
            ->defaultSort('name')
            ->allowedSorts(
                'name',
                'updated_at'
            )
            ->allowedFilters(
                AllowedFilter::custom('search', new FuzzyFilter('name'))
            );
    }
}
