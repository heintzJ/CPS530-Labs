<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ASP</title>
    <style>
        body {
            display: block;
            align-items: center;
            justify-content: center;
            background-color: <%=Request.QueryString("color") %>;
            height: 100vh;
        }

        div {
            margin: 0 auto;
            text-align: center;
            font-size: 24px;
        }
        
        p {
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div>
        <%
        Dim lastVisit
        If Request.Cookies("lastVisit") <> "" Then
            lastVisit = Request.Cookies("lastVisit")
            Response.Write("Last visit: " &lastVisit)
        Else
            Response.Write("This is your first time visiting this page")
        End If
        Response.Cookies("lastVisit") = Now()
        Response.Cookies("lastVisit").Expires = Date() + 10
        %>
    </div>
    <br>
    <div>
        <h2>Change the background colour: </h2>
        <a href="http://cps530-lab10a.somee.com/?color=red">Red</a>
        <a href="http://cps530-lab10a.somee.com/?color=grey">Grey</a>
        <p>Query String must be the name of a colour, not the hex code</p>
        <p>Just write <strong>/?color=colourname</strong> at the end of the URL</p>
    </div>
</body>
</html>
