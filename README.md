# Flight Skeleton
Simple Flight Framework skeleton application with Twig &amp; Monolog &amp; Eloquent ORM. This package is suitable for any web hosting with **php** version higher **5.3**. Use this skeleton application to quickly setup and start working on a new application. This application does not use latest version libraries: Monolog, Eloquent ORM - since the more recent versions use a higher php version.

# Menu
 - Installation
    - [Use composer](https://github.com/andrey900/Flight-Skeleton#installation-use-composer)
    - [Use git](https://github.com/andrey900/Flight-Skeleton#installation-use-git)
    - [Use unix console](https://github.com/andrey900/Flight-Skeleton#installation-of-the-unix-console)
    - [Use browser](https://github.com/andrey900/Flight-Skeleton#installation-use-browser)
 - Start
    - [First start](https://github.com/andrey900/Flight-Skeleton#first-start)
 - Structure
    - [Folder structure](https://github.com/andrey900/Flight-Skeleton#folder-structure)
    - [Files structure](https://github.com/andrey900/Flight-Skeleton#files-structure)
 - Examples
    - [Config example](https://github.com/andrey900/Flight-Skeleton#config-example)
    - [Install example site](https://github.com/andrey900/Flight-Skeleton#install-example-site-and-db-structure)
 - [More links and docs](https://github.com/andrey900/Flight-Skeleton#more-links-and-docs)

### Installation use composer

```console
    $ composer create-project andrey900/Flight-Skeleton path/to/install
```

Composer will create a new Flight Skeleton project under the `path/to/install` directory.

### Installation use git

```console
    $ git clone andrey900/Flight-Skeleton path/to/install
```

Git will create a new Flight Skeleton project under the `path/to/install` directory.

### Installation of the unix console

```console
    $ mkdir path/to/install && cd path/to/install
    $ wget -c https://github.com/andrey900/Flight-Skeleton/archive/master.zip -O FlightSkeleton.zip
    $ unzip FlightSkeleton.zip && rm FlightSkeleton.zip
```

### Installation use browser

Download the zip archive [use link](https://github.com/andrey900/Flight-Skeleton/archive/master.zip), or use button "Clone or download -> Download zip". Uncompressed archive in you hosting or local directory.

> Remember: The string **"path/to/install"** should be replaced by your folder path.

### First start

Open file src/bootstrap/config.php for edit, and edit db section for correct connection db. More info for config file [link](https://github.com/andrey900/Flight-Skeleton#config-example)

Copy files to you root webserver folder. Open browser input you host.
Local start use php in unix:
    
```console
    $ cd path/to/install
    $ php -S 127.0.0.1:8080
```

After open browser use link: [http://localhost:8080](http://localhost:8080)

### Folder structure

    .
    ├── .git                # git repository folder
    ├── cache               # Cache folder
    │   └── ...             # Cache type, etc
    ├── log                 # Logs files
    ├── src                 # Folder for you application source code
    │   ├── App             # You namespace for library and classes
    │   │   └── ...         # Make you structure, etc
    │   ├── bootstrap       # Files using for starting application
    │   ├── Controllers     # Controllers for you application
    │   └── Models          # Model for you application
    ├── templates           # Templates use in you application
    │   ├── main            # Holds name for template, use for many templates and easy substitution
    │   └── ...             # Make you template, etc
    ├── uploads             # Static files
    ├── ...                 # Make you folder, etc

### Files structure 
    
    .
    ├── src
    │   ├── App
    │   │   ├── Routes                  # Example: Routes namespace
    │   │   │   └── RouteGenerator.php  # Example: Make array for config, and init this routers
    │   │   └── Utils.php               # Example: Class for utilities
    │   ├── bootstrap
    │   │   ├── config.php              # Config array for you application: @return array
    │   │   ├── dependencies.php        # Init dependencies and class in Flight
    │   │   ├── routes.php              # Init routes in Flight
    │   │   └── start.php               # Boot file for you application
    │   ├── Controllers
    │   │   ├── FrontController.php     # Example: Base controller and logic for front-end
    │   │   └── PageController.php      # Example: Specific controller for type page
    │   └── Models
    │       └── Pages.php               # Example: Page model for sql table "page"
    └── templates
        └── main                        # Example: template
             ├── base.twig              # Base template layout
             ├── home.twig              # Home template
             ├── pageLists.twig         # List pages template
             ├── pageDetail.twig        # Detail page template
             └── 404.twig               # 404 error - page not found template

### Config example

Structure file config - multidimensional array. This file must return always array for correctly functioning your application!

First level - key for config library
Second level - array - with a convenient structure for use, most often used key-value

Example:

```php
    return array(
        ...
        "you_key" => array(
            "you_first_key"  => "value1",
            "you_second_key" => "value2",
        ),
    );
```

### Install example site and db structure

Follow for link: */install-example/* and click button *install*.

> Remember: You must first start and correctly configure a database connection.

### More links and docs

More information can be found in the documentation of individual system modules:
  - [Flight](http://flightphp.com/learn/)
  - [Twig](http://twig.sensiolabs.org/documentation)
  - [Illuminate ORM](https://laravel.com/docs/4.2/queries)
  - [Monolog](https://github.com/Seldaek/monolog/blob/master/doc/01-usage.md)