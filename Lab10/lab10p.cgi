#!/usr/bin/python
import cgi, cgitb
form = cgi.FieldStorage()
print ("{}".format(form))
cityName = form.getvalue("cityName").upper()
if len(form.getvalue("province")) == 0:
    province = ""
else:
    province = form.getvalue("province").upper()
country = form.getvalue("country").upper()
imageURL = form.getvalue("imageURL")

print("Content-type:text/html\n\n")
print("<html>")
print("<head>")
print("<title>Form Submission Result</title>")
print("</head>")
print("<body>")
print("<html><body>")
if len(province) == 0:
    print("<h2 style='text-align: center; background-color: #ADD8E6; color: blue; padding: 20px; font-size: 24px;'>{}, {}</h2>".format(cityName, country))
else:
    print("<h2 style='text-align: center; background-color: #ADD8E6; color: blue; padding: 20px; font-size: 24px;'>{}, {}, {}</h2>".format(cityName, province, country))
print("<img src='{}' alt='Provided Image' style='width: 80%; height: auto; border: 15px solid blue;'>".format(imageURL))
print("</body></html>")
print("</body>")
print("</html>")