#!/usr/bin/perl -wT
use CGI ':standard';
use strict;
use CGI::Carp qw(warningsToBrowser fatalsToBrowser);

print header();

print start_html(
    -title => "Lab 7a",
    -style => [{"src" => "../Lab7/lab07a.css"},
                "\@import url('https://fonts.googleapis.com/css?family=Lato');"
    ],
);
print "<h1>This is my first Perl program</h1>";

print end_html();