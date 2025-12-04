# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [0.2.0] - 2025-01-15

### Added
- **Dictionary::map()** - Transform key-value pairs using a callback function
  - Maps each Pair to a new Pair, allowing transformation of both keys and values
  - Automatically infers types from callback results
  - Throws `DuplicateKeyException` if callback produces duplicate keys
  - Returns new Dictionary without modifying original
- **DuplicateKeyException** - New exception class for duplicate key scenarios
  - Extends `RuntimeException` for better error semantics
  - Thrown by `Dictionary::flip()` when values are not unique
  - Thrown by `Dictionary::map()` when callback produces duplicate keys
  - Prevents unintended data loss in transformation operations

### Changed
- **Dictionary::flip()** - Now throws `DuplicateKeyException` instead of `ValueError` for duplicate values
- **Dictionary::map()** - Now throws `DuplicateKeyException` instead of `ValueError` for duplicate keys

### Documentation
- Added comprehensive documentation for `Dictionary::map()` method in Dictionary.md
- Added DuplicateKeyException.md documentation file
- Updated README with DuplicateKeyException in Supporting Classes section
- Added test coverage for all new functionality

## [0.1.0] - 2025-01-14

### Added
- First version of Galaxon Collections library
- **Collection** - Abstract base class for all collection types
  - Implements Countable, IteratorAggregate, Stringable
  - Common methods: `count()`, `empty()`, `clear()`, `all()`, `any()`
  - Type safety through TypeSet integration
- **Sequence** - Type-safe ordered list with zero-based integer indexing
  - Sequential integer indexes (0, 1, 2, ...)
  - Array-like access with `[]`
  - Transformation methods: `map()`, `filter()`, `sort()`, `reverse()`, `unique()`, etc.
  - Aggregation methods: `sum()`, `product()`, `average()`, `min()`, `max()`
  - Range generation with `Sequence::range()`
  - Gap-filling with default values
- **Dictionary** - Type-safe key-value collection with unrestricted key types
  - Support for any PHP type as keys (objects, arrays, resources, scalars, null)
  - Array-like access with `[]`
  - No key coercion (preserves exact types)
  - Methods: `flip()`, `merge()`, `sortByKey()`, `sortByValue()`
  - Factory method `Dictionary::combine()` for creating from separate key/value iterables
- **Set** - Type-safe collection of unique values
  - Automatic duplicate removal
  - Set operations: `union()`, `intersect()`, `diff()`
  - Subset/superset testing: `isSubsetOf()`, `isProperSubsetOf()`, `isSupersetOf()`, `isProperSupersetOf()`
  - Disjoint checking: `isDisjointFrom()`
- **TypeSet** - Runtime type validation and management
  - Flexible type specification (strings, union types, nullable)
  - Type inference from values
  - Default value inference
  - Support for pseudotypes (scalar, number, uint, mixed, etc.)
  - Class/interface/trait matching with inheritance support
- **Pair** - Immutable container for key-value pairs
  - Readonly/immutable
  - Support for any type as key and value
- Runtime type validation with detailed error messages
- Type inference from source data
- Fluent interfaces and method chaining
- Immutable operations (transformations return new collections)
- Comprehensive test suite with 500+ tests and 100% code coverage
- Full PHPDoc documentation
- PSR-12 coding standards compliance
- PHPStan level 9 static analysis compliance

### Requirements
- PHP 8.4 or higher
- galaxon/core package
