<?php

/*
 * This file is part of the Predis package.
 *
 * (c) 2009-2020 Daniele Alessandri
 * (c) 2021-2025 Till Krüss
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Predis\Command\Container;

use Predis\Response\Status;

/**
 * @method array  cat(string $category = null)
 * @method Status dryRun(string $username, string $command, ...$arguments)
 * @method array  getUser(string $username)
 * @method Status setUser(string $username, string ...$rules)
 */
class ACL extends AbstractContainer
{
    public function getContainerCommandId(): string
    {
        return 'acl';
    }
}
