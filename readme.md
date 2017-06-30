# Web Scraping Demo: How to Pull Data Off Of Other Websites #

Here is a one-page demo of turning a static HTML document into a JSON object to use as you like.

## Getting Started ##

You will need PHP and a webserver to run it. Otherwise all the files you need are in this repo. Start a new PHP file in your favorite text/code editor, and [follow along with this video &amp; slides](https://she-builds-websites.com/presentations/single/how-to-pull-things-off-static-webpages). 

We're using Simple HTML Dom which is an old library but very easy to use, is just one file, and has adequate documentation. [Simple HTML Dom docs are here](http://simplehtmldom.sourceforge.net/).

## Deployment / Viewing The Demo ##

You'll end up with something that looks like completed.php, which you can run in your browser from Localhost.

**You will not be able to run this from the file protocol**. So these paths will not work:
````
c:/documents/completed.php
/home/user/completed.php
````

**Run it successfully** from a server with PHP:
````
http://localhost/completed.php 
http://your-website-name.com/completed.php
````
