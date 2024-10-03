# XML - Extensible Markup Language

### Prolog

The prolog is the first line of an XML document. It is not required, but if it is present, it must be the first line of the document. The prolog is used to specify the version of XML being used and the character encoding of the document.

```xml
<?xml version="1.0" encoding="UTF-8" standalone="yes"?>
```

- `version` - The version of XML being used. The most common version is 1.0.
- `encoding` - The character encoding of the document. The most common encoding is UTF-8.
- `standalone` - Specifies whether the document references an external entity. The value can be `yes` or `no`.

### Body

The body of an XML document contains the data that is being described. The body is enclosed in a pair of tags, known as the root element. The root element is the top-level element in an XML document.

```xml
<contact>
    <name>
        <first>John</first>
        <last>Doe</last>
    </name>
    <email>
        john@doe.com
    </email>
</contact>
```