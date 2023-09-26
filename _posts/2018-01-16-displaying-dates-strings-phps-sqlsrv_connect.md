---
layout: post
title: "Displaying Dates as Strings with PHP's sqlsrv_connect()"
date: 2018-01-16
image: "/assets/images/banners/sqlservconnect.jpg"
author: dauble
categories: [sql server, php]
tags: [php]
---
Over the last few weeks I've been working on a web application that allows me to track how website leads are performing at work. In building this app, I'm interacting with MySQL and SQL Server databases together and using PHP as my language of choice.

I've recently run into a problem with DateTime fields and how MySQL and SQL Server handle them differently. MySQL uses Epoch time, whereas SQL Server uses a more readable format, such as 1900-01-01 00:00:00\. The problem I was running into was display a result set, saving it into an array and printing the array's contents into a CSV file. I kept running into an error:

<pre>Fatal error: Cannot use object of type DateTime as array</pre>

When I printed out the array's contents, I kept discovering my array looked like this:

<pre>[0] => Value
                [1] => Value2
                [2] => Value3
                DateTime Object
                (
                    [date] => 2017-12-29 11:54:00.000000
                    [timezone_type] => 3
                    [timezone] => UTC
                )</pre>

Puzzled, I was turning to Google, thinking I'd have to check each index of the array to determine if it's a string or object. Neither was working.

I started looking at my SQL Server connection string and double checked the documentation for the sqlsrv_connect() method I am using, wondering if there were extra parameters I could use. Through who knows how many searches I finally landed on a [Microsoft page which outlined the SQLSRV driver](https://docs.microsoft.com/en-us/sql/connect/php/how-to-retrieve-date-and-time-type-as-strings-using-the-sqlsrv-driver){:target="_blank"}. In the first example, I learned there IS an extra param I can use that will output all DateTime objects as strings!

To do so, simply add the following to your sqlsrv_connect() database parameters and SQL Server will start returning all DateTime fields as strings.

<pre>'ReturnDatesAsStrings'=>true</pre>

Finally, here's my new connection string:

<pre>$this->conn = sqlsrv_connect($this->sql_server, array( "Database" => $this->sql_name, 'ReturnDatesAsStrings' => true));</pre>

Good luck!