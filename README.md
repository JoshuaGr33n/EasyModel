# EASYModel

EASYModel is a Laravel library for easy Model entity generation.

## Installation

>First clone this repository using the following command:
```bash
$ git clone https://github.com/JoshuaGr33n/EasyModel.git
```
>to your local server/container.

>Next move to the directory using this command:
```bash 
$ cd UMS
```
>if you working with a container e.g docker run

```bash
docker run
```
> to install the dependencies, including Laravel/sail. Skip this step if running on a local server instead

>If running on a local server run
 ```bash
 $ composer install
```
>to install the necessary dependencies

>Then copy the .env.example file to .env run the following command:
```bash 
$ cp .env.example .env
```
>copy in the .env file if required

>To run the program run
```bash
$ ./vendor/bin/sail up
```
>If running on docker with laravel/sail

>If running on local server run
```bash
$ php artisan serve
```
>parse the resulting URL on your browser

```bash
pip install foobar
```

## Usage

> Open the array in json format in public/array.json
```json
{
    "scope": ["indirect-emissions-owned", 
              "electricity"],
    "name": "meeting-rooms"
}

```
> and key in the params

## Tests
> Run tests using the below command:
```bash
    php artisan test --filter EasyModelTest

```
> Run tests using the below command for docker laravel/sail:
```bash
    $ ./vendor/bin/sail test --filter EasyModelTest

```

Please make sure to update tests as appropriate.

## License

[MIT](https://choosealicense.com/licenses/mit/)
