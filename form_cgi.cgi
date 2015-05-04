#!/usr/bin/perl

print "Content-type:text/html\r\n\r\n";
print '<html>';
print '<head>';
print '<title>Hello Word - First CGI Program</title>';
print '</head>';
print '<body>';
print'<FORM action="/cgi-bin/hello_post.cgi" method="POST">
First Name: <input type="text" name="first_name">  <br>

Last Name: <input type="text" name="last_name">

<input type="submit" value="Submit">
</FORM>';
print '</body>';
print '</html>';

1;
