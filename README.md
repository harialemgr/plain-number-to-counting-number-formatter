# Plain Number to Counting Number Formatter

A simple php class that helps to format a number seperating by comma which make a counting easy.

<h6>Example</h6>
<br/>

<strong>Creating an object</strong>
<br/>
```php
$formatterObject = new PlainNumberToCountingNumberFomatter();
```
<br/><br/>
<strong>South Asian Number System</strong>
  <br/>
  <span style="text-align: justify;">If you want your number to be formatted as like south asian counting style then call <i>southAsianNumberSystemFormatter()</i> method</span>
<br/><br/>
  
```php
$result = $formatterObject->southAsianNumberSystemFormatter(123456789.34);
/**
* @return string $result = 1,2345,67,89.34
**/
```
  
<strong>International Number System</strong>
  <br/>
  <span style="text-align: justify;">If you want your number to be formatted as like south international counting style then call <i>internationalNumberSystemFormatter()</i> method</span>
<br/><br/>

```php
$result $formatterObject->internationalNumberSystemFormatter(123456789.34);

/**
* @return string $result = 123,456,789.34
**/
```
