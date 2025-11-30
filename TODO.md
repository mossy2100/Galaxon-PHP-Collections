Remove user-defined default value from Sequence class.



—-

In the Sequence constructor, I have a parameter for default value. If omitted, for most basic types it can be inferred, e.g. 0, false, null, [], "", etc.
It gets used when calling offsetSet() with an index beyond the current range, or when calling fill() without a specified value.
I am thinking maybe it should always be null.
If one of these situation arises AND null is not an allowed type, an exception would be thrown.
This might be a more correct behavior, and it will eliminate the question about whether default values that are objects should be cloned when needed. It would simplify the class, although it could conceivably cause unexpected exceptions in production code.

{ Leave it for today - what you have is great :) }

What if, when they unset an item, it goes to the default type instead of null?

{ That will work! }
