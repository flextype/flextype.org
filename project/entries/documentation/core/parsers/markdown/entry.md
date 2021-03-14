---
title: MARKDOWN
description: Markdown is a lightweight markup language that you can use to add formatting elements to plaintext text documents. Created by John Gruber in 2004, Markdown is now one of the world’s most popular markup languages.
template: docs
breadcrumbs:
  -
    title: "Core Concepts"
    link: "[url]/documentation/core/"
  -
    title: "Parsers"
    link: "[url]/documentation/core/parsers/"
---

Markdown is a lightweight markup language that you can use to add formatting elements to plaintext text documents. Created by John Gruber in 2004, Markdown is now one of the world’s most popular markup languages.

Using Markdown is different than using a WYSIWYG editor. In an application like Microsoft Word, you click buttons to format words and phrases, and the changes are visible immediately. Markdown isn’t like that. When you create a Markdown-formatted file, you add Markdown syntax to the text to indicate which words and phrases should look different.

For instance, to denote a heading, you add a number sign before it (e.g., # Heading One). Or to make a phrase bold, you add two asterisks before and after it (e.g., **this text is bold**). It may take a while to get used to seeing Markdown syntax in your text, especially if you’re accustomed to WYSIWYG applications.

You can add Markdown formatting elements to a plaintext file using a text editor application. Or you can use one of the many Markdown applications for macOS, Windows, Linux, iOS, and Android operating systems. There are also several web-based applications specifically designed for writing in Markdown.

Depending on the application you use, you may not be able to preview the formatted document in real time. But that’s okay. According to Gruber, Markdown syntax is designed to be readable and unobtrusive, so the text in Markdown files can be read even if it isn’t rendered.

The overriding design goal for Markdown’s formatting syntax is to make it as readable as possible. The idea is that a Markdown-formatted document should be publishable as-is, as plain text, without looking like it’s been marked up with tags or formatting instructions.

For more details about MARKDOWN syntax <a href="https://www.markdownguide.org/basic-syntax">read the guide for the MARKDOWN</a>.

### <a name="basic-syntax"></a> Basic Syntax

#### Headings

To create a heading, add number signs (`#`) in front of a word or phrase. The number of number signs you use should correspond to the heading level. For example, to create a heading level three (`<h3>`), use three number signs (e.g., `### My Header`).

<table>
  <thead>
    <tr>
      <th>Markdown</th>
      <th>HTML</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td># Heading level 1</td>
      <td>&lt;h1&gt;Heading level 1&lt;/h1&gt;</td>
    </tr>
    <tr>
      <td>## Heading level 2</td>
      <td>&lt;h2&gt;Heading level 2&lt;/h2&gt;</td>
    </tr>
    <tr>
      <td>### Heading level 3</td>
      <td>&lt;h3&gt;Heading level 3&lt;/h3&gt;</td>
    </tr>
    <tr>
      <td>#### Heading level 4</td>
      <td>&lt;h4&gt;Heading level  4&lt;/h4&gt;</td>
    </tr>
    <tr>
      <td>##### Heading level 5</td>
      <td>&lt;h5&gt;Heading level 5&lt;/h5&gt;</td>
    </tr>
    <tr>
      <td>###### Heading level 6</td>
      <td>&lt;h6&gt;Heading level 6&lt;/h6&gt;</td>
    </tr>
  </tbody>
</table>

##### Alternate Syntax

Alternatively, on the line below the text, add any number of `==` characters for heading level 1 or `--` characters for heading level 2.


<table>
  <thead>
    <tr>
      <th>Markdown</th>
      <th>HTML</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Heading level 1<br/>===============</td>
      <td>&lt;h1&gt;Heading level 1&lt;/h1&gt;</td>
    </tr>
    <tr>
      <td>Heading level 2<br/>---------------</td>
      <td>&lt;h2&gt;Heading level 2&lt;/h2&gt;</td>
    </tr>
  </tbody>
</table>

##### Heading Best Practices

Markdown applications don't agree on how to handle a missing space between the number signs (`#`) and the heading name. For compatibility, always put a space between the number signs and the heading name.

<table>
  <thead>
    <tr>
      <th><i class="fas fa-check"></i> Do this</th>
      <th><i class="fas fa-times"></i> Don't do this</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>
          # Here's a Heading
      </td>
      <td>
          #Here's a Heading
      </td>
    </tr>
  </tbody>
</table>

#### Paragraphs

To create paragraphs, use a blank line to separate one or more lines of text.

<table>
  <thead>
    <tr>
      <th>Markdown</th>
      <th>HTML</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>
          I really like using Markdown.<br /><br />
          I think I'll use it to format all of my documents from now on.
      </td>
      <td>
        &lt;p&gt;I really like using Markdown.&lt;/p&gt;<br /><br />
        &lt;p&gt;I think I'll use it to format all of my documents from now on.&lt;/p&gt;
      </td>
    </tr>
  </tbody>
</table>

##### Paragraph Best Practices

Unless the [paragraph is in a list](/basic-syntax/#paragraphs), don't indent paragraphs with spaces or tabs.

<table>
<thead>
<tr>
<th><i class="fas fa-check"></i> Do this</th>
<th><i class="fas fa-times"></i> Don't do this</th>
</tr>
</thead>
<tbody>
<tr>
<td>
Don't put tabs or spaces in front of your paragraphs.<br><br>
Keep lines left-aligned like this.<br><br>
</td>
<td>
&nbsp;&nbsp;&nbsp;&nbsp;This can result in unexpected
formatting problems.<br><br>
&nbsp;&nbsp;Don't add tabs or spaces in front of paragraphs.
</td>
</tr>
</tbody>
</table>

#### Line Breaks

To create a line break (`<br>`), end a line with two or more spaces, and then type return.

<table>
  <thead>
    <tr>
      <th>Markdown</th>
      <th>HTML</th>
      <th>Rendered Output</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>
          This is the first line. &nbsp;<br />
          And this is the second line.
      </td>
      <td>
        &lt;p&gt;This is the first line.&lt;br&gt;<br />
        And this is the second line.&lt;/p&gt;
      </td>
      <td>
        <p>This is the first line.<br />   
        And this is the second line.</p>
      </td>
    </tr>
  </tbody>
</table>

##### Line Break Best Practices

You can use two or more spaces (commonly referred to as "trailing whitespace") for line breaks in nearly every Markdown application, but it's controversial. It's hard to see trailing whitespace in an editor, and many people accidentally or intentionally put two spaces after every sentence. For this reason, you may want to use something other than trailing whitespace for line breaks. Fortunately, there is another option supported by nearly every Markdown application: the `<br>` HTML tag.

For compatibility, use trailing white space or the `<br>` HTML tag at the end of the line.

There are two other options I don't recommend using. CommonMark and a few other lightweight markup languages let you type a backslash (`\`) at the end of the line, but not all Markdown applications support this, so it isn't a great option from a compatibility perspective. And at least a couple lightweight markup languages don't require anything at the end of the line — just type return and they'll create a line break.

<table>
  <thead>
    <tr>
      <th><i class="fas fa-check"></i> Do this</th>
      <th><i class="fas fa-times"></i> Don't do this</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>
          First line with two spaces after. &nbsp;<br>
          And the next line.<br><br>
          First line with the HTML tag after.&lt;br&gt;<br>
          And the next line.<br><br>
      </td>
      <td>
        First line with a backslash after.\<br>
        And the next line.<br><br>
        First line with nothing after.<br>
        And the next line.<br><br>
      </td>
    </tr>
  </tbody>
</table>

### Emphasis

#### Bold

To bold text, add two asterisks or underscores before and after a word or phrase. To bold the middle of a word for emphasis, add two asterisks without spaces around the letters.

<table>
  <thead>
    <tr>
      <th>Markdown</th>
      <th>HTML</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>I just love **bold text**.</td>
      <td>I just love &lt;strong&gt;bold text&lt;/strong&gt;.</td>
    </tr>
    <tr>
      <td>I just love __bold text__.</td>
      <td>I just love &lt;strong&gt;bold text&lt;/strong&gt;.</td>
    </tr>
    <tr>
      <td>Love**is**bold</td> <td>Love&lt;strong&gt;is&lt;/strong&gt;bold</td>
    </tr>
  </tbody>
</table>

##### Bold Best Practices

Markdown applications don't agree on how to handle underscores in the middle of a word. For compatibility, use asterisks to bold the middle of a word for emphasis.

<table>
  <thead>
    <tr>
      <th><i class="fas fa-check"></i> Do this</th>
      <th><i class="fas fa-times"></i> Don't do this</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>
          Love**is**bold
      </td>
      <td>
          Love__is__bold
      </td>
    </tr>
  </tbody>
</table>

#### Italic

To italicize text, add one asterisk or underscore before and after a word or phrase. To italicize the middle of a word for emphasis, add one asterisk without spaces around the letters.

<table>
  <thead>
    <tr>
      <th>Markdown</th>
      <th>HTML</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Italicized text is the *cat's meow*.</td>
      <td>Italicized text is the &lt;em&gt;cat's meow&lt;/em&gt;.</td>
    </tr>
    <tr>
      <td>Italicized text is the _cat's meow_.</td>
      <td>Italicized text is the &lt;em&gt;cat's meow&lt;/em&gt;.</td>
    </tr>
    <tr>
      <td>A*cat*meow</td>
      <td>A&lt;em&gt;cat&lt;/em&gt;meow</td>
    </tr>
  </tbody>
</table>

##### Italic Best Practices

Markdown applications don't agree on how to handle underscores in the middle of a word. For compatibility, use asterisks to italicize the middle of a word for emphasis.

<table>
  <thead>
    <tr>
      <th><i class="fas fa-check"></i> Do this</th>
      <th><i class="fas fa-times"></i> Don't do this</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>
          A*cat*meow
      </td>
      <td>
          A_cat_meow
      </td>
    </tr>
  </tbody>
</table>

#### Bold and Italic

To emphasize text with bold and italics at the same time, add three asterisks or underscores before and after a word or phrase. To bold and italicize the middle of a word for emphasis, add three asterisks without spaces around the letters.

<table>
  <thead>
    <tr>
      <th>Markdown</th>
      <th>HTML</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>This text is ***really important***.</td>
      <td>This text is &lt;strong&gt;&lt;em&gt;really important&lt;/em&gt;&lt;/strong&gt;.</td>
    </tr>
    <tr>
      <td>This text is ___really important___.</td>
      <td>This text is &lt;strong&gt;&lt;em&gt;really important&lt;/em&gt;&lt;/strong&gt;.</td>
    </tr>
    <tr>
      <td>This text is __*really important*__.</td>
      <td>This text is &lt;strong&gt;&lt;em&gt;really important&lt;/em&gt;&lt;/strong&gt;.</td>
    </tr>
    <tr>
      <td>This text is **_really important_**.</td>
      <td>This text is &lt;strong&gt;&lt;em&gt;really important&lt;/em&gt;&lt;/strong&gt;.</td>
    </tr>
    <tr>
      <td>This is really***very***important text.</td>
      <td>This is really&lt;strong&gt;&lt;em&gt;very&lt;/em&gt;&lt;/strong&gt;important text.</td>
    </tr>
  </tbody>
</table>

##### Bold and Italic Best Practices

Markdown applications don't agree on how to handle underscores in the middle of a word. For compatibility, use asterisks to bold and italicize the middle of a word for emphasis.

<table>
  <thead>
    <tr>
      <th><i class="fas fa-check"></i> Do this</th>
      <th><i class="fas fa-times"></i> Don't do this</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>
          This is really***very***important text.
      </td>
      <td>
          This is really___very___important text.
      </td>
    </tr>
  </tbody>
</table>

#### Blockquotes

To create a blockquote, add a `>` in front of a paragraph.

```
> Dorothy followed her through many of the beautiful rooms in her castle.
```

The rendered output looks like this:

> Dorothy followed her through many of the beautiful rooms in her castle.

##### Blockquotes with Multiple Paragraphs

Blockquotes can contain multiple paragraphs. Add a `>` on the blank lines between the paragraphs.

```
> Dorothy followed her through many of the beautiful rooms in her castle.
>
> The Witch bade her clean the pots and kettles and sweep the floor and keep the fire fed with wood.
```

The rendered output looks like this:

> Dorothy followed her through many of the beautiful rooms in her castle.
>
> The Witch bade her clean the pots and kettles and sweep the floor and keep the fire fed with wood.

##### Nested Blockquotes

Blockquotes can be nested. Add a `>>` in front of the paragraph you want to nest.

```
> Dorothy followed her through many of the beautiful rooms in her castle.
>
>> The Witch bade her clean the pots and kettles and sweep the floor and keep the fire fed with wood.
```

The rendered output looks like this:

> Dorothy followed her through many of the beautiful rooms in her castle.
>
>> The Witch bade her clean the pots and kettles and sweep the floor and keep the fire fed with wood.

##### Blockquotes with Other Elements

Blockquotes can contain other Markdown formatted elements. Not all elements can be used — you'll need to experiment to see which ones work.

```
> #### The quarterly results look great!
>
> - Revenue was off the chart.
> - Profits were higher than ever.
>
>  *Everything* is going according to **plan**.
```

The rendered output looks like this:

> <h4 class="no-anchor">The quarterly results look great!</h4>
>
> - Revenue was off the chart.
> - Profits were higher than ever.
>
> *Everything* is going according to **plan**.


#### Lists

You can organize items into ordered and unordered lists.

##### Ordered Lists

To create an ordered list, add line items with numbers followed by periods. The numbers don't have to be in numerical order, but the list should start with the number one.

<table>
  <thead">
    <tr>
      <th>Markdown</th>
      <th>HTML</th>
    </tr>
  </thead>
  <tbody>
  <tr>
    <td>
        1. First item<br/>
        2. Second item<br/>
        3. Third item<br/>
        4. Fourth item
    </td>
    <td>
        &lt;ol&gt;<br>
        &nbsp;&nbsp;&lt;li&gt;First item&lt;/li&gt;<br/>
        &nbsp;&nbsp;&nbsp;&nbsp;&lt;li&gt;Second item&lt;/li&gt;<br/>
        &nbsp;&nbsp;&nbsp;&nbsp;&lt;li&gt;Third item&lt;/li&gt;<br/>
        &nbsp;&nbsp;&lt;li&gt;Fourth item&lt;/li&gt;<br/>
        &lt;/ol&gt;
    </td>
    </tr>
    <tr>
      <td>
          1. First item<br/>
          1. Second item<br/>
          1. Third item<br/>
          1. Fourth item
      </td>
      <td>
          &lt;ol&gt;<br>
          &nbsp;&nbsp;&lt;li&gt;First item&lt;/li&gt;<br/>
          &nbsp;&nbsp;&nbsp;&nbsp;&lt;li&gt;Second item&lt;/li&gt;<br/>
          &nbsp;&nbsp;&nbsp;&nbsp;&lt;li&gt;Third item&lt;/li&gt;<br/>
          &nbsp;&nbsp;&lt;li&gt;Fourth item&lt;/li&gt;<br/>
          &lt;/ol&gt;
      </td>
    </tr>
    <tr>
      <td>
          1. First item<br/>
          8. Second item<br/>
          3. Third item<br/>
          5. Fourth item
      </td>
      <td>
          &lt;ol&gt;<br>
          &nbsp;&nbsp;&lt;li&gt;First item&lt;/li&gt;<br/>
          &nbsp;&nbsp;&nbsp;&nbsp;&lt;li&gt;Second item&lt;/li&gt;<br/>
          &nbsp;&nbsp;&nbsp;&nbsp;&lt;li&gt;Third item&lt;/li&gt;<br/>
          &nbsp;&nbsp;&lt;li&gt;Fourth item&lt;/li&gt;<br/>
          &lt;/ol&gt;
      </td>
    </tr>
    <tr>
      <td>
          1. First item<br/>
          2. Second item<br/>
          3. Third item<br/>
          &nbsp;&nbsp;&nbsp;&nbsp;1. Indented item<br/>
          &nbsp;&nbsp;&nbsp;&nbsp;2. Indented item<br/>
          4. Fourth item
      </td>
      <td>
          &lt;ol&gt;<br>
          &nbsp;&nbsp;&lt;li&gt;First item&lt;/li&gt;<br/>
          &nbsp;&nbsp;&nbsp;&lt;li&gt;Second item&lt;/li&gt;<br/>
          &nbsp;&nbsp;&nbsp;&lt;li&gt;Third item<br/>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;ol&gt;<br>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;li&gt;Indented item&lt;/li&gt;<br/>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;li&gt;Indented item&lt;/li&gt;<br/>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;/ol&gt;<br/>
          &nbsp;&nbsp;&lt;/li&gt;<br/>
          &nbsp;&nbsp;&lt;li&gt;Fourth item&lt;/li&gt;<br/>
          &lt;/ol&gt;
      </td>
    </tr>
  </tbody>
</table>

#### Ordered List Best Practices

CommonMark and a few other lightweight markup languages let you use a parenthesis (`)`) as a delimiter (e.g., `1) First item`), but not all Markdown applications support this, so it isn’t a great option from a compatibility perspective. For compatibility, use periods only.

<table>
  <thead">
    <tr>
      <th><i class="fas fa-check"></i> Do this</th>
      <th><i class="fas fa-times"></i> Don't do this</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>
          1. First item<br>
          2. Second item
      </td>
      <td>
          1) First item<br>
          2) Second item
      </td>
    </tr>
  </tbody>
</table>

##### Unordered Lists

To create an unordered list, add dashes (`-`), asterisks (`*`), or plus signs (`+`) in front of line items. Indent one or more items to create a nested list.

<table>
  <thead>
    <tr>
      <th>Markdown</th>
      <th>HTML</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>
          - First item<br/>
          - Second item<br/>
          - Third item<br/>
          - Fourth item
      </td>
      <td>
          &lt;ul&gt;<br>
          &nbsp;&nbsp;&lt;li&gt;First item&lt;/li&gt;<br/>
          &nbsp;&nbsp;&lt;li&gt;Second item&lt;/li&gt;<br/>
          &nbsp;&nbsp;&lt;li&gt;Third item&lt;/li&gt;<br/>
          &nbsp;&nbsp;&lt;li&gt;Fourth item&lt;/li&gt;<br/>
          &lt;/ul&gt;
      </td>
    </tr>
    <tr>
      <td>
          * First item<br/>
          * Second item<br>
          * Third item<br/>
          * Fourth item
      </td>
      <td>
          &lt;ul&gt;<br>
          &nbsp;&nbsp;&lt;li&gt;First item&lt;/li&gt;<br/>
          &nbsp;&nbsp;&lt;li&gt;Second item&lt;/li&gt;<br/>
          &nbsp;&nbsp;&lt;li&gt;Third item&lt;/li&gt;<br/>
          &nbsp;&nbsp;&lt;li&gt;Fourth item&lt;/li&gt;<br/>
          &lt;/ul&gt;
      </td>
    </tr>
    <tr>
      <td>
          + First item<br/>
          + Second item<br/>
          + Third item<br/>
          + Fourth item
      </td>
      <td>
          &lt;ul&gt;<br>
          &nbsp;&nbsp;&lt;li&gt;First item&lt;/li&gt;<br/>
          &nbsp;&nbsp;&lt;li&gt;Second item&lt;/li&gt;<br/>
          &nbsp;&nbsp;&lt;li&gt;Third item&lt;/li&gt;<br/>
          &nbsp;&nbsp;&lt;li&gt;Fourth item&lt;/li&gt;<br/>
          &lt;/ul&gt;
      </td>
    </tr>
    <tr>
      <td>
          - First item<br/>
          - Second item<br/>
          - Third item<br/>
          &nbsp;&nbsp;&nbsp;&nbsp;- Indented item<br/>
          &nbsp;&nbsp;&nbsp;&nbsp;- Indented item<br/>
          - Fourth item
      </td>
      <td>
          &lt;ol&gt;<br>
          &nbsp;&nbsp;&lt;li&gt;First item&lt;/li&gt;<br/>
          &nbsp;&nbsp;&nbsp;&lt;li&gt;Second item&lt;/li&gt;<br/>
          &nbsp;&nbsp;&nbsp;&lt;li&gt;Third item<br/>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;ol&gt;<br>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;li&gt;Indented item&lt;/li&gt;<br/>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;li&gt;Indented item&lt;/li&gt;<br/>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;/ol&gt;<br/>
          &nbsp;&nbsp;&lt;/li&gt;<br/>
          &nbsp;&nbsp;&lt;li&gt;Fourth item&lt;/li&gt;<br/>
          &lt;/ol&gt;
      </td>
    </tr>
  </tbody>
</table>

##### Unordered List Best Practices

Markdown applications don’t agree on how to handle different delimiters in the same list. For compatibility, don't mix and match delimiters in the same list — pick one and stick with it.

<table>
  <thead>
    <tr>
      <th><i class="fas fa-check"></i> Do this</th>
      <th><i class="fas fa-times"></i> Don't do this</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>
          - First item<br>
          - Second item<br>
          - Third item<br>
          - Fourth item
      </td>
      <td>
          + First item<br>
          * Second item<br>
          - Third item<br>
          + Fourth item
      </td>
    </tr>
  </tbody>
</table>

##### Adding Elements in Lists

To add another element in a list while preserving the continuity of the list, indent the element four spaces or one tab, as shown in the following examples.

##### Paragraphs

```
*   This is the first list item.
*   Here's the second list item.

    I need to add another paragraph below the second list item.

*   And here's the third list item.
```

The rendered output looks like this:

*   This is the first list item.
*   Here's the second list item.

    I need to add another paragraph below the second list item.

*   And here's the third list item.

##### Blockquotes

```
*   This is the first list item.
*   Here's the second list item.

    > A blockquote would look great below the second list item.

*   And here's the third list item.
```

The rendered output looks like this:

*   This is the first list item.
*   Here's the second list item.

    > A blockquote would look great below the second list item.

*   And here's the third list item.

##### Images

```
1.  Open the file containing the Linux mascot.
2.  Marvel at its beauty.

    ![Flextype](https://camo.githubusercontent.com/a0e5b6039aa6d34aaa5550bf375a9dce9314db6f/68747470733a2f2f696d61676573322e696d67626f782e636f6d2f34392f38642f346970487155636a5f6f2e6a7067)

3.  Close the file.
```

The rendered output looks like this:

1.  Open the file containing the Linux mascot.
2.  Marvel at its beauty.

    ![Flextype](https://camo.githubusercontent.com/a0e5b6039aa6d34aaa5550bf375a9dce9314db6f/68747470733a2f2f696d61676573322e696d67626f782e636f6d2f34392f38642f346970487155636a5f6f2e6a7067)

3.  Close the file.

##### Lists

You can nest an unordered list in an ordered list, or vice versa.

```
1. First item
2. Second item
3. Third item
    - Indented item
    - Indented item
4. Fourth item
```

1. First item
2. Second item
3. Third item
    - Indented item
    - Indented item
4. Fourth item


#### Code

To denote a word or phrase as code, enclose it in backticks (&#96;).

<table>
  <thead>
    <tr>
      <th>Markdown</th>
      <th>HTML</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>At the command prompt, type `nano`.</td>
      <td>At the command prompt, type &lt;code&gt;nano&lt;/code&gt;. </td>
    </tr>
  </tbody>
</table>

#### Horizontal Rules

If the word or phrase you want to denote as code includes one or more backticks, you can escape it by enclosing the word or phrase in double backticks (&#96;).

<table>
  <thead>
    <tr>
      <th>Markdown</th>
      <th>HTML</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>&#96;&#96;Use &#96;code&#96; in your Markdown file.&#96;&#96;</td>
      <td>&lt;code&gt;Use `code` in your Markdown file.&lt;/code&gt;</td>
    </tr>
  </tbody>
</table>

<i class="fas fa-info-circle"></i> <strong>Note:</strong> To create code blocks without indenting lines, use <a href="/extended-syntax/#fenced-code-blocks">fenced code blocks</a>.

#### Horizontal Rules

To create a horizontal rule, use three or more asterisks (`***`), dashes (`---`), or underscores (`___`) on a line by themselves.

```html
***

---

_________________
```


#### Horizontal Rule Best Practices

For compatibility, put blank lines before and after horizontal rules.

<table>
  <thead>
    <tr>
        <th><i class="fas fa-check"></i> Do this</th>
        <th><i class="fas fa-times"></i> Don't do this</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>
        Try to put a blank line before...<br><br>
        ---<br><br>
        ...and after a horizontal rule.
      </td>
      <td>
        Without blank lines, this would be a heading.<br>
        ---<br>
        Don't do this!
      </td>
    </tr>
  </tbody>
</table>

#### Links

To create a link, enclose the link text in brackets (e.g., `[Duck Duck Go]`) and then follow it immediately with the URL in parentheses (e.g., `(https://duckduckgo.com)`).

```
My favorite search engine is [Duck Duck Go](https://duckduckgo.com).
```

The rendered output looks like this:

My favorite search engine is [Duck Duck Go](https://duckduckgo.com).

##### Adding Titles

You can optionally add a title for a link. This will appear as a tooltip when the user hovers over the link. To add a title, enclose it in parentheses after the URL.

```
My favorite search engine is [Duck Duck Go](https://duckduckgo.com "The best search engine for privacy").
```

The rendered output looks like this:

My favorite search engine is [Duck Duck Go](https://duckduckgo.com "The best search engine for privacy").

##### URLs and Email Addresses

To quickly turn a URL or email address into a link, enclose it in angle brackets.

```
<https://www.markdownguide.org>
<fake@example.com>
```

The rendered output looks like this:

<https://www.markdownguide.org><br/>
<fake@example.com>

##### Formatting Links

To [emphasize](#emphasis) links, add asterisks before and after the brackets and parentheses. To denote links as [code](#code), add backticks in the brackets.

```
I love supporting the **[EFF](https://eff.org)**.
This is the *[Markdown Guide](https://www.markdownguide.org)*.
See the section on [`code`](#code).
```

The rendered output looks like this:

I love supporting the **[EFF](https://eff.org)**.<br/>
This is the *[Markdown Guide](https://www.markdownguide.org)*.<br/>
See the section on [`code`](#code).

##### Reference-style Links

Reference-style links are a special kind of link that make URLs easier to display and read in Markdown. Reference-style links are constructed in two parts: the part you keep inline with your text and the part you store somewhere else in the file to keep the text easy to read.

###### Formatting the First Part of the Link

The first part of a reference-style link is formatted with two sets of brackets. The first set of brackets surrounds the text that should appear linked. The second set of brackets displays a label used to point to the link you're storing elsewhere in your document.

Although not required, you can include a space between the first and second set of brackets. The label in the second set of brackets is not case sensitive and can include letters, numbers, spaces, or punctuation.

This means the following example formats are roughly equivalent for the first part of the link:

- `[hobbit-hole][1]`
- `[hobbit-hole] [1]`

###### Formatting the Second Part of the Link

The second part of a reference-style link is formatted with the following attributes:

1. The label, in brackets, followed immediately by a colon and at least one space (e.g., `[label]: `).
2. The URL for the link, which you can optionally enclose in angle brackets.
3. The optional title for the link, which you can enclose in double quotes, single quotes, or parentheses.

This means the following example formats are all roughly equivalent for the second part of the link:

- `[1]: https://en.wikipedia.org/wiki/Hobbit#Lifestyle`
- `[1]: https://en.wikipedia.org/wiki/Hobbit#Lifestyle "Hobbit lifestyles"`
- `[1]: https://en.wikipedia.org/wiki/Hobbit#Lifestyle 'Hobbit lifestyles'`
- `[1]: https://en.wikipedia.org/wiki/Hobbit#Lifestyle (Hobbit lifestyles)`
- `[1]: <https://en.wikipedia.org/wiki/Hobbit#Lifestyle> "Hobbit lifestyles"`
- `[1]: <https://en.wikipedia.org/wiki/Hobbit#Lifestyle> 'Hobbit lifestyles'`
- `[1]: <https://en.wikipedia.org/wiki/Hobbit#Lifestyle> (Hobbit lifestyles)`

You can place this second part of the link anywhere in your Markdown document. Some people place them immediately after the paragraph in which they appear while other people place them at the end of the document (like endnotes or footnotes).

###### An Example Putting the Parts Together

Say you add a URL as a [standard URL link](#links) to a paragraph and it looks like this in Markdown:

```
In a hole in the ground there lived a hobbit. Not a nasty, dirty, wet hole, filled with the ends
of worms and an oozy smell, nor yet a dry, bare, sandy hole with nothing in it to sit down on or to
eat: it was a [hobbit-hole](https://en.wikipedia.org/wiki/Hobbit#Lifestyle "Hobbit lifestyles"), and that means comfort.
```

Though it may point to interesting additional information, the URL as displayed really doesn't add much to the existing raw text other than making it harder to read. To fix that, you could format the URL like this instead:

```
In a hole in the ground there lived a hobbit. Not a nasty, dirty, wet hole, filled with the ends
of worms and an oozy smell, nor yet a dry, bare, sandy hole with nothing in it to sit down on or to
eat: it was a [hobbit-hole][1], and that means comfort.

[1]: <https://en.wikipedia.org/wiki/Hobbit#Lifestyle> "Hobbit lifestyles"
```

In both instances above, the rendered output would be identical:

> In a hole in the ground there lived a hobbit. Not a nasty, dirty, wet hole, filled with the ends of worms and an oozy smell, nor yet a dry, bare, sandy hole with nothing in it to sit down on or to  eat: it was a <a href="https://en.wikipedia.org/wiki/Hobbit#Lifestyle" title="Hobbit lifestyles">hobbit-hole</a>, and that means comfort.

and the HTML for the link would be:

```
<a href="https://en.wikipedia.org/wiki/Hobbit#Lifestyle" title="Hobbit lifestyles">hobbit-hole</a>
```

##### Link Best Practices

Markdown applications don't agree on how to handle spaces in the middle of a URL. For compatibility, try to URL encode any spaces with `%20`.

<table>
  <thead>
    <tr>
        <th><i class="fas fa-check"></i> Do this</th>
        <th><i class="fas fa-times"></i> Don't do this</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>
        [link](https://www.example.com/my%20great%20page)
      </td>
      <td>
        [link](https://www.example.com/my great page)
      </td>
    </tr>
  </tbody>
</table>

#### Images

To add an image, add an exclamation mark (`!`), followed by alt text in brackets, and the path or URL to the image asset in parentheses. You can optionally add a title after the URL in the parentheses.

```
![Flextype is an open-source Hybrid Content Management System!](https://camo.githubusercontent.com/a0e5b6039aa6d34aaa5550bf375a9dce9314db6f/68747470733a2f2f696d61676573322e696d67626f782e636f6d2f34392f38642f346970487155636a5f6f2e6a7067 "Flextype")
```

The rendered output looks like this:

<img src="https://camo.githubusercontent.com/a0e5b6039aa6d34aaa5550bf375a9dce9314db6f/68747470733a2f2f696d61676573322e696d67626f782e636f6d2f34392f38642f346970487155636a5f6f2e6a7067" alt="Flextype" title="Flextype is an open-source Hybrid Content Management System" />

##### Linking Images

To add a link to an image, enclose the Markdown for the image in brackets, and then add the link in parentheses.

```
[![Flextype](https://camo.githubusercontent.com/a0e5b6039aa6d34aaa5550bf375a9dce9314db6f/68747470733a2f2f696d61676573322e696d67626f782e636f6d2f34392f38642f346970487155636a5f6f2e6a7067 "Flextype is an open-source Hybrid Content Management System")](https://flextype.org)
```

The rendered output looks like this:

<p><a href="https://flextype.org"><img src="https://camo.githubusercontent.com/a0e5b6039aa6d34aaa5550bf375a9dce9314db6f/68747470733a2f2f696d61676573322e696d67626f782e636f6d2f34392f38642f346970487155636a5f6f2e6a7067" alt="Flextype" title="
Flextype is an open-source Hybrid Content Management System" /></a></p>


#### Escaping Characters

To display a literal character that would otherwise be used to format text in a Markdown document, add a backslash (`\`) in front of the character.

```
\* Without the backslash, this would be a bullet in an unordered list.
```

The rendered output looks like this:

\* Without the backslash, this would be a bullet in an unordered list.

##### Characters You Can Escape

You can use a backslash to escape the following characters.

<table>
  <thead>
    <tr>
      <th>Character</th>
      <th>Name</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>\</td>
      <td>backslash</td>
    </tr>
    <tr>
      <td>&#96;</td>
      <td>backtick (see also <a href="#escaping-backticks">escaping backticks in code</a>)</td>
    </tr>
    <tr>
      <td>&#42;</td>
      <td>asterisk</td>
    </tr>
    <tr>
      <td>&#95;</td>
      <td>underscore</td>
    </tr>
    <tr>
      <td>{ }</td>
      <td>curly braces</td>
    </tr>
    <tr>
      <td>[ ]</td>
      <td>brackets</td>
    </tr>
    <tr>
      <td>( )</td>
      <td>parentheses</td>
    </tr>
    <tr>
      <td>#</td>
      <td>pound sign</td>
    </tr>
    <tr>
      <td>+</td>
      <td>plus sign</td>
    </tr>
    <tr>
      <td>-</td>
      <td>minus sign (hyphen)</td>
    </tr>
    <tr>
      <td>.</td>
      <td>dot</td>
    </tr>
    <tr>
      <td>!</td>
      <td>exclamation mark</td>
    </tr>
    <tr>
      <td>|</td>
      <td>pipe (see also <a href="/extended-syntax/#escaping-pipe-characters-in-tables">escaping pipe in tables</a>)</td>
    </tr>
  </tbody>
</table>

#### HTML

Many Markdown applications allow you to use HTML tags in Markdown-formatted text. This is helpful if you prefer certain HTML tags to Markdown syntax. For example, some people find it easier to use HTML tags for images. Using HTML is also helpful when you need to change the attributes of an element, like specifying the color of text or changing the width of an image.

To use HTML, place the tags in the text of your Markdown-formatted file.

```
This **word** is bold. This <em>word</em> is italic.
```

The rendered output looks like this:

This **word** is bold. This <em>word</em> is italic.

##### HTML Best Practices

For security reasons, not all Markdown applications support HTML in Markdown documents. When in doubt, check your Markdown application's documentation. Some applications support only a subset of HTML tags.

Use blank lines to separate block-level HTML elements like `<div>`, `<table>`, `<pre>`, and `<p>` from the surrounding content. Try not to indent the tags with tabs or spaces — that can interfere with the formatting.

You can't use Markdown syntax inside block-level HTML tags.

For example, `<p>italic and **bold**</p>` won't work.

### <a name="methods"></a> Methods

<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Description</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><a href="#methods-parse">parse()</a></td>
            <td>Takes a MARKDOWN encoded string and converts it into a HTML.</td>
        </tr>
        <tr>
            <td><a href="#methods-getCacheID">getCacheID()</a></td>
            <td>Get Cache ID for MARKDOWN.</td>
        </tr>
    </tbody>
</table>

### Methods Details

##### <a name="methods-parse"></a> `parse()`

Takes a MARKDOWN encoded string and converts it into a HTML.

```php
/**
 * Takes a MARKDOWN encoded string and converts it into a PHP variable.
 *
 * @param string $input A string containing MARKDOWN
 * @param bool   $cache Cache result data or no. Default is true
 *
 * @return mixed The MARKDOWN converted to a PHP value
 */
public function parse(string $input, bool $cache = true): string
```

**Examples**

```php
$markdown = '**this text is bold**';

$html = flextype('parsers')->markdown()->parse($markdown);
```

##### <a name="methods-getCacheID"></a> `getCacheID()`

Get Cache ID for markdown.

```php
/**
 * Get Cache ID for markdown.
 *
 * @param  string $input Input
 *
 * @return string Cache ID
 *
 * @access public
 */
public function getCacheID(string $input): string
```

**Examples**

```php
$markdown = 'text with [message]';

$cache_id = flextype('parsers')->markdown()->getCacheID($markdown);
```
