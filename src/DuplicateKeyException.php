<?php

declare(strict_types=1);

namespace Galaxon\Collections;

use RuntimeException;

/**
 * Exception thrown when a Dictionary operation produces duplicate keys.
 *
 * Used by operations like flip() and map() where duplicate keys indicate a data integrity issue that should be
 * caught rather than silently overwritten.
 */
class DuplicateKeyException extends RuntimeException
{
}
