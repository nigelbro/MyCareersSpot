#!/usr/bin/perl


use CGI;

$upload_dir = "/var/www/html/jobboard";

$filename =~ s/.*[\/\\](.*)/$1/;
$upload_filehandle = $query->upload("photo");

open UPLOADFILE, ">$upload_dir/$filename";
whikle (<$upload_filehandle>){


print UPLOADFILE;
}
close UPLOADFILE;
