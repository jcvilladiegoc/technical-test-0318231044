# technical-test-0318231044
Technical test to FullStack with PHP &amp; Vue

To create the docker image for the project's php environment, run the following command

docker build -t php7 .

For local code tests and see them running in real time the modifications, execute the following commands

docker run -d --name first-technical-test-front -p 80:80 -v C:\www\technical-test-0318231044\frontend:/var/www/html php7
docker run -d --name first-technical-test-back -p 3000:80 -v C:\www\technical-test-0318231044\api:/var/www/html php7

Note: Replace the project path C:\www\technical-test-0318231044 with the absolute path of your project team

