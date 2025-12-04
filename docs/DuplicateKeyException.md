# DuplicateKeyException

Exception thrown when a Dictionary operation produces duplicate keys.

## Overview

`DuplicateKeyException` extends `RuntimeException` and is used to signal that a Dictionary operation has encountered duplicate keys in a context where keys must be unique.

Unlike `merge()` and `offsetSet()` which silently overwrite duplicate keys, certain Dictionary transformation methods throw this exception to prevent unintended data loss.

## Methods That Throw This Exception

### Dictionary::flip()

Throws when trying to flip a Dictionary whose values are not unique:

```php
$dict = new Dictionary('string', 'int');
$dict->add('first', 1);
$dict->add('second', 2);
$dict->add('third', 1);  // Duplicate value

try {
    $flipped = $dict->flip();
} catch (DuplicateKeyException $e) {
    echo $e->getMessage();
    // "Cannot flip Dictionary: values are not unique."
}
```

### Dictionary::map()

Throws when the mapping callback produces duplicate keys:

```php
$dict = new Dictionary('string', 'int');
$dict->add('a', 1);
$dict->add('b', 2);
$dict->add('c', 3);

try {
    $mapped = $dict->map(fn($pair) => new Pair('same', $pair->value));
} catch (DuplicateKeyException $e) {
    echo $e->getMessage();
    // "Map callback produced a duplicate key: 'same'."
}
```

## Design Rationale

Dictionary has different behaviors for duplicate keys depending on context:

- **Explicit assignment** (`offsetSet()`, `merge()`) - silently overwrites (consistent with PHP array behavior)
- **Transformations** (`flip()`, `map()`) - throws exception (prevents unintended data loss from transformation logic)

This design allows normal key-value updates to work intuitively while catching potential bugs in transformation operations where duplicate keys usually indicate an error in the transformation logic.

## See Also

- [Dictionary](Dictionary.md) - The main Dictionary class
- [Pair](Pair.md) - Key-value pair used in map operations
