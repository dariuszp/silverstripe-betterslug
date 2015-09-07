# silverstripe-betterslug

Slug generator with accent folding for Silverstripe CMS

This module will provide better text to slug translation for silverstripe by replacing very basic transliterator with cocur/slugify module:


When you create page with title like this:
````
Τάρτες ατομικές με γέμιση πορτοκαλένιας κρέμας και γλυκό πορτοκάλι
````

It will be translated to:
````
tartes-atomikes-me-gemisi-portokalenias-kremas-kai-gliko-portokali
````

Istead of **page-41** like before.

In case some characters are not handled, you can further configure module by add your own translation rules. For example:

````
BetterSlug:
    symbols:
        active: true
        map:
            ☂: ubrella
            ☁: cloud
````

