# Flight Skeleton
Simple Flight Framework skeleton application with Twig &amp; Monolog &amp; Eloquent ORM. This package is suitable for any web hosting with **php** version higher **5.3**. Use this skeleton application to quickly setup and start working on a new application. This application does not use latest version libraries: Monolog, Eloquent ORM - since the more recent versions use a higher php version.

# Installation
 - Use git
 - Use composer
 - Use unix console
 - Use browser

### Installation use composer

 .. code-block:: console

    $ composer create-project andrey900/Flight-Skeleton path/to/install

Composer will create a new Flight Skeleton project under the `path/to/install` directory.

### Installation use git

.. code-block:: console

    $ git clone andrey900/Flight-Skeleton path/to/install

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

### Folder structure

    .
    ├── .git 		    # git repository folder
    ├── cache		    # Cache folder
    │	└── ...             # Cache type, etc
    ├── log		    # Logs files
    ├── src 		    # Folder for you application source code
    │   ├── App             # You namespace for library and classes
    │	│   └── ...         # Make you structure, etc
    │   ├── bootstrap       # Files using for starting application
    │   ├── Controllers     # Controllers for you application
    │   └── Models          # Model for you application
    ├── templates           # Templates use in you application
    │   ├── main            # Holds name for template, use for many templates and easy substitution
    │   └── ...             # Make you template, etc
    ├── uploads		    # Static files
    ├── ...		    # Make you folder, etc

### Files structure 
    
    .
    ├── src
    │   ├── App
    │	│   ├── Routes                 # Example: Routes namespace
    │	│   │   └── RouteGenerator.php # Example: Make array for config, and init this routers
    │   │   └── Utils.php              # Example: Class for utilities
    │   ├── bootstrap
    │   │   ├── config.php             # Config array for you application: @return array
    │   │   ├── dependencies.php       # Init dependencies and class in Flight
    │   │   ├── routes.php             # Init routes in Flight
    │	│   └── start.php              # Boot file for you application
    │   ├── Controllers
    │   │   ├── FrontController.php    # Example: Base controller and logic for front-end
    │   │   └── PageController.php     # Example: Specific controller for type page
    │   └── Models
    │       └── Pages.php              # Example: Page model for sql table "page"
    └── templates
        └── main                       # Example: template
     	    ├── base.twig              # Base template layout
     	    ├── home.twig              # Home template
     	    ├── pageLists.twig         # List pages template
     	    ├── pageDetail.twig        # Detail page template
     	    └── 404.twig               # 404 error - page not found template

