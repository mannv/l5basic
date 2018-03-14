<?php

namespace App\Criteria;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class FirstRowIsCrawlerCriteria.
 *
 * @package namespace App\Criteria;
 */
class FirstRowCrawlerAudioCriteria implements CriteriaInterface
{
    /**
     * Apply criteria in query repository
     *
     * @param string              $model
     * @param RepositoryInterface $repository
     *
     * @return mixed
     */
    public function apply($model, RepositoryInterface $repository)
    {
        $model = $model->where(['is_crawler_audio' => false])->limit(1);
        return $model;
    }
}
