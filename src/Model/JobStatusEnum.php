<?php

namespace Taleez\Model;

use CommerceGuys\Enum\AbstractEnum;

class JobStatusEnum extends AbstractEnum
{
    const DRAFT = 'DRAFT';
    const PUBLISHED = 'PUBLISHED';
    const DONE = 'DONE';
    const SUSPENDED = 'SUSPENDED';
}
