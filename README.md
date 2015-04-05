htmldiff is a PHP library that displays the difference between two HTML snippets. It is taken from the [MediaWiki Visual Diff module](http://www.mediawiki.org/wiki/Visual_Diff) and has been modified to be usable outside of MediaWiki.

Usage
=====

```php
require("htmldiff/html_diff.php");

$html1 = "<p>This is an example text with a <strong>bold part</strong>.</p>";
$html2 = "<p>This is a changed example text without a bold part.</p>";

echo html_diff($html1, $html2);
```

Output:

```html
<p>This is <span class="diff-html-removed" id="removed-htmldiff-0">an </span><span class="diff-html-added" id="added-htmldiff-0">a changed </span>example text <span class="diff-html-removed" id="removed-htmldiff-1">with </span><span class="diff-html-added" id="added-htmldiff-1">without </span>a bold part.</p>
```

License
=======

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA 02111-1307, USA.
or see http://www.gnu.org/

Sources
=======

These are the original MediaWiki source files that this library is based on: [HTMLDiff.php](http://svn.wikimedia.org/viewvc/mediawiki/trunk/phase3/includes/diff/HTMLDiff.php?view=markup&pathrev=58266), [Diff.php](http://svn.wikimedia.org/viewvc/mediawiki/trunk/phase3/includes/diff/Diff.php?view=markup&pathrev=58266), [Nodes.php](http://svn.wikimedia.org/viewvc/mediawiki/trunk/phase3/includes/diff/Nodes.php?view=markup&pathrev=58266), 
[Sanitizer.php](http://svn.wikimedia.org/viewvc/mediawiki/trunk/phase3/includes/Sanitizer.php?view=markup&pathrev=58267), [Xml.php](http://svn.wikimedia.org/viewvc/mediawiki/trunk/phase3/includes/Xml.php?view=markup&pathrev=58267)