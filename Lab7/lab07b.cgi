#!/usr/bin/perl -wT
use strict;
use CGI ':standard';
use CGI::Carp qw(warningsToBrowser fatalsToBrowser);
use File::Basename;

my $name = param("name");
my $street = param("street");
my $city = param("city");
my $postalCode = param("postalCode");
my $province = param("province");
my $phoneNumber = param("phoneNumber");
my $email = param("email");

my $safe_filename_characters = "a-zA-Z0-9_.-";
my $upload_dir = "../upload";
my $query = new CGI;
my $filename = $query->param("picture");

if ($filename =~ /^([$safe_filename_characters]+)$/) { 
    $filename = $1; 
} 
else { 
    die "Filename contains invalid characters"; 
}

my $upload_filehandle = $query->upload("picture");

open (UPLOADFILE, ">$upload_dir/$filename") or die "$!"; binmode UPLOADFILE;
while ( <$upload_filehandle> ) {
    print UPLOADFILE;
}
close UPLOADFILE;

my $validName = $name =~ /[A-Za-z\s]+$/; # letters and spaces
my $validStreet = $street =~ /[A-Za-z\s\d]+$/; # letters, spaces, and numbers
my $validCity = $city =~ /[A-Za-z\s]+$/; # letters and spaces
my $validPostalCode = $postalCode =~ /^[A-Z]\d[A-Z] \d[A-Z]\d$/; # follows L0L 0L0
my $validPhoneNumber = $phoneNumber =~ /^\d{10}$/; #10 digits
my $validEmail = $email =~ /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/; # username@domainname.extension

print $query->header ();

print start_html(
    -title => "Form Submission",
    -style => { 
        -code => "
            \@import url('https://fonts.googleapis.com/css?family=Lato');
            body {
                background-color: #5CDB95;
                text-align: center;
            }
            p {
                font-family: 'Lato';
                font-size: 14px;
                padding-left: 5px;
                color: #EDF5E1;
            }
            .invalidSubmission {
                font-size: 14px;
                color: red;
            }
            div {
                text-align: left;
                width: 30%;
                margin: 0 auto;
                border-radius: 5px;
                background-color: #05386B;
                box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.5);
                padding: 0 0 5px 5px;
            }
            div img {
                max-width: 90%;
                height: auto;
                margin: 0 auto;
            }
            h1 {
                font-family: 'Lato';
                text-align: center;
                color: #EDF5E1;
            }
            a {
                color: #8EE4AF;
            }
        "
    },
);

print "<div>";
print "<h1>Form Submission Results</h1>";
print "<p><u>Name</u>: ";
print $validName? $name : "<span class='invalidSubmission'><strong>$name</strong> invalid. Correct: John Doe</span><p>";

print "<p><u>Street</u>: ";
print $validStreet? $street : "<span class='invalidSubmission'><strong>$street</strong> invalid. Correct: 123 street rd</span><p>";

print "<p><u>City</u>: ";
print $validCity? $city : "<span class='invalidSubmission'><strong>$city</strong> invalid. Correct: Toronto</span><p>";

print "<p><u>Postal Code</u>: ";
print $validPostalCode? $postalCode : "<span class='invalidSubmission'><strong>$postalCode</strong> invalid. Correct: L5L 5L5</span><p>";

print "<p><u>Phone Number</u>: ";
print $validPhoneNumber? $phoneNumber : "<span class='invalidSubmission'><strong>$phoneNumber</strong> invalid. Correct: 1112223333</span><p>";

print "<p><u>Email</u>: ";
print $validEmail? $email : "<span class='invalidSubmission'><strong>$email</strong> invalid. Correct: example\@gmail.com</span><p>";

print "<p>Uploaded Picture:<p>";
print "<p><img src='../upload/$filename' alt='Uploaded picture' /></p>";
print "<p><a href='../Lab7/lab07b.html'>Go back</a>";
print "</div>";

print end_html();