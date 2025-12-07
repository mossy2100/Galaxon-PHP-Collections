# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [0.3.0] - 2025-12-08

### Changed
- **BREAKING:** Renamed `equals()` method to `equal()` across all collection classes
  - Affects `Collection`, `Dictionary`, `Sequence`, and `Set`
  - Updated to use `Equatable` trait instead of implementing interface
- **BREAKING:** Renamed Set comparison methods (removed `is` prefix):
  - `isSubsetOf()` → `subset()`
  - `isProperSubsetOf()` → `properSubset()`
  - `isSupersetOf()` → `superset()`
  - `isProperSupersetOf()` → `properSuperset()`
  - `isDisjointFrom()` → `disjoint()`
- **BREAKING:** Refactored Sequence default value handling
  - Removed `$defaultValue` parameter from constructor
  - Changed from `tryInferDefaultValue()` to `getDefaultValue()` in TypeSet
  - Default values now automatically determined when filling gaps
  - Throws `RuntimeException` if default value cannot be inferred

### Removed
- **BREAKING:** Removed `uint` pseudotype support from TypeSet
  - Removed from all documentation and examples
  - Use `int` with validation instead
- Removed `DuplicateKeyException` class
  - `Dictionary::flip()` and `Dictionary::map()` now throw `RuntimeException` for duplicate key scenarios

### Documentation
- Updated all documentation to reflect method name changes
- Updated examples throughout to use new method names
- Removed `uint` references from TypeSet documentation


## [0.2.0] - 2025-01-15

### Added
- **Dictionary::map()** - Transform key-value pairs using a callback function
  - Maps each Pair to a new Pair, allowing transformation of both keys and values
  - Automatically infers types from callback results
  - Throws `RuntimeException` if callback produces duplicate keys
  - Returns new Dictionary without modifying original

### Changed
- **Dictionary::flip()** - Now throws `RuntimeException` instead of `ValueError` for duplicate values
- **Dictionary::map()** - Now throws `RuntimeException` instead of `ValueError` for duplicate keys

### Documentation
- Added comprehensive documentation for `Dictionary::map()` method in Dictionary.md
- Updated README with new Dictionary methods
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
  - Subset/superset testing: `subset()`, `properSubset()`, `superset()`, `properSuperset()`
  - Disjoint checking: `disjoint()`
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
