# isitsnowinginmilwaukee.com
![Uptime 100.00%](https://img.shields.io/endpoint?url=https%3A%2F%2Fraw.githubusercontent.com%2Fbradp%2Fuptime%2Fmaster%2Fapi%2Fis-it-snowing-in-milwaukee-com%2Fuptime.json) ![Uptime 100.00%](https://img.shields.io/endpoint?url=https%3A%2F%2Fraw.githubusercontent.com%2Fbradp%2Fuptime%2Fmaster%2Fapi%2Fis-it-snowing-in-milwaukee-com%2Fresponse-time.json)

:snowflake: Source for https://isitsnowinginmilwaukee.com

Easily see if it is snowing in Milwaukee or not!

If you want to use for your own project, grab an API key from https://openweathermap.org/api and export it as `OPENWEATHER_API_KEY`


dockertime:

`docker run --name snowing -p 3506:80 --env OPENWEATHER_API_KEY=xxx -v "$PWD":/var/www/html/ php:7.4-apache`
