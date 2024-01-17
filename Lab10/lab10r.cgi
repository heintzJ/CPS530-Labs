#!/usr/bin/ruby -w

require "cgi"
cgi = CGI.new

cityName = cgi['cityName'].downcase.capitalize
if cgi['province'].length == 0
    province = ''
else
    province = cgi['province'].downcase.capitalize
end
country = cgi['country'].downcase.capitalize
imageURL = cgi['imageURL']

puts "Content-type: text/html\n\n"
puts "<html><body>"
if province.empty?
    puts "<h2 style='text-align: center; background-color: #ADD8E6; color: blue; padding: 20px; font-size: 24px;'>#{cityName}, #{country}</h2>"
else
    puts "<h2 style='text-align: center; background-color: #ADD8E6; color: blue; padding: 20px; font-size: 24px;'>#{cityName}, #{province}, #{country}</h2>"
end
puts "<img src='#{imageURL}' alt='Provided Image' style='width: 100%; height: auto;'>"
puts "</body></html>"