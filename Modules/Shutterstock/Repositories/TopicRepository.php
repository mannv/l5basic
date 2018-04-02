<?php

namespace Modules\Shutterstock\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface TopicRepository.
 *
 * @package namespace Modules\Shutterstock\Repositories;
 */
interface TopicRepository extends RepositoryInterface
{
    public function getTopicWithCards($topicId);
    public function getAllWithCards();
    public function getTopic($id);
}
