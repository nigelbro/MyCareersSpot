#!/usr/bin/perl

use Dancer;
set port  => 80;


get '/' =>sub{

return 'Hello World';

};
dance;
