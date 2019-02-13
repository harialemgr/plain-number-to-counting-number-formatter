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
  <span style="text-align: justify;">If you want your number to be formatted as like south asian counting style ex. lakh, crore, etc. then call <i>southAsianNumberSystemFormatter()</i> method</span>
<br/><br/>
  
```php
$result = $formatterObject->southAsianNumberSystemFormatter(123456789.34);
/**
* @return string $result = 1,23,45,67,89.34
**/
```
  
<strong>International Number System</strong>
  <br/>
  <span style="text-align: justify;">If you want your number to be formatted as like international counting style ex. million, billon, etc. then call <i>internationalNumberSystemFormatter()</i> method</span>
<br/><br/>

```php
$result $formatterObject->internationalNumberSystemFormatter(123456789.34);

/**
* @return string $result = 123,456,789.34
**/
```
