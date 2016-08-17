<?php

use Controllers\PageController;

/* Frontend routers */
$config = Flight::getConfig();

App\Routes\RouteGenerator::registerRouters();

Flight::map('notFound', function(){
    // Display custom 404 page
	$controller = new PageController();
	$controller->notFound();
});

Flight::route('/phpinfo', array("Controllers\PageController", 'phpinfoAction'));

Flight::route('/install-example/', function(){
	$connection = Flight::db();
	try {
		$connection->connection();
		$connection->schema()->dropIfExists('pages');
		$connection->schema()->create('pages', function ($table) {
		    $table->increments('id');
		    $table->string("name");
		    $table->string("code")->unique();
		    $table->boolean("active")->default(true);
		    $table->integer("sort")->default(100);
		    $table->text("preview_text")->nullable();
		    $table->text("detail_text")->nullable();
		    $table->string("preview_image")->nullable();
		    $table->string("detail_image")->nullable();
		    $table->string("seo_title")->nullable();
		    $table->string("seo_description")->nullable();
		    $table->string("seo_keywords")->nullable();
		    $table->string("tags")->nullable();
		    $table->integer("show_counter")->default(0);
		    $table->boolean("is_home")->default(false);
		});
		$connection->table('pages')->insert(array(
            'name' => "Home page",
            "code" => "home", 
            "preview_text" => "Preview text for home page.", 
            "detail_text" => "<p>Show all pages: <a href=\"/pages/\">link</a></p>", 
            "is_home" => true
        ));
        $connection->table('pages')->insert(array(
            'name' => "Page one",
            "code" => "page-one", 
            "preview_text" => "Preview text for Page one.", 
            "detail_text" => "<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris a lectus pellentesque, ultrices velit vel, semper massa. In id dui turpis. Aliquam vestibulum justo eget varius lacinia. Donec facilisis, nisl convallis ornare feugiat, mi diam pulvinar sapien, vel sollicitudin ante nibh at felis. Duis at finibus nibh, et viverra felis. Suspendisse mollis odio et augue luctus molestie. Maecenas nec facilisis urna, eu fringilla justo. Etiam pretium lorem ac lacus aliquet, sed ornare dui suscipit. Ut aliquam, massa sollicitudin fermentum vehicula, enim turpis scelerisque velit, pretium aliquet tellus dui nec lorem.</p><p>Phasellus quis massa id est pellentesque gravida. Interdum et malesuada fames ac ante ipsum primis in faucibus. Pellentesque interdum velit non arcu maximus auctor. Duis sagittis odio nisi, et interdum arcu congue et. Phasellus elementum elit a nunc fringilla finibus. Suspendisse lobortis urna sem. Proin a condimentum orci, ac porttitor mauris. Sed commodo, nunc et vehicula fringilla, velit erat fermentum quam, posuere mollis arcu lectus ac nulla. Vestibulum ut eros id tellus consectetur egestas. Nulla a rutrum tortor, non ultrices sapien. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec sit amet mi in erat aliquam varius. Suspendisse suscipit nunc ac arcu elementum, vitae volutpat justo porta. Maecenas neque ante, pellentesque quis nisl ut, fermentum hendrerit dui. Vestibulum ac molestie odio. Etiam elementum dolor et urna ullamcorper sollicitudin.</p><p>Nunc efficitur luctus risus, accumsan convallis nibh euismod sed. Mauris dictum dapibus ante at convallis. Cras vel libero rhoncus, eleifend lorem vel, ullamcorper velit. Praesent vulputate leo quis volutpat viverra. Vivamus eu odio lectus. Etiam nulla magna, dignissim eu turpis in, mattis tincidunt erat. Curabitur non sem erat. Mauris eget consectetur elit. Nullam urna nibh, pulvinar quis eros vitae, commodo pretium felis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>"
        ));
        $connection->table('pages')->insert(array(
            'name' => "Page two",
            "code" => "page-two", 
            "preview_text" => "Preview text for Page two.", 
            "detail_text" => "<p>In ut efficitur nisi, at convallis nunc. Etiam ut eros fermentum nulla finibus posuere a sit amet tortor. Fusce a bibendum nulla. Nullam vel nisi ornare, tempor est et, congue dolor. Donec varius vehicula arcu, ac congue turpis congue facilisis. Aliquam purus justo, pulvinar eget arcu in, bibendum congue neque. Nunc eu porta neque, eu finibus tellus. Suspendisse ac eros commodo, pellentesque magna vitae, suscipit ligula. Nam eu ipsum turpis. Nulla malesuada feugiat nulla a congue. Donec ut efficitur dui. Praesent accumsan aliquet nisi vel mattis. Nulla ac magna tristique, hendrerit dui in, maximus augue. Sed maximus gravida tortor, ut porta dolor sodales sed. Donec ut congue velit, ut rhoncus arcu.</p><p>In tincidunt purus non augue tristique faucibus vel a tortor. Morbi ornare tortor magna, nec scelerisque felis finibus eget. Donec dui ante, tincidunt nec eros ac, tincidunt luctus felis. Sed ultricies scelerisque imperdiet. Cras nec dolor facilisis, sollicitudin sapien quis, faucibus elit. Vivamus purus nisi, tincidunt tincidunt egestas at, tempus eget enim. Pellentesque orci dolor, venenatis non diam non, vehicula interdum tortor. Nulla a elementum velit. Maecenas consequat lacinia ex, at malesuada diam lacinia sit amet.</p><p>Aenean auctor vulputate neque at interdum. Nullam eu metus lectus. Vestibulum blandit felis eget sem molestie, at egestas urna venenatis. Aenean accumsan metus ligula, vel tristique augue pretium id. Integer malesuada augue ut nunc vehicula sagittis. Donec volutpat volutpat felis sit amet auctor. In gravida neque imperdiet, eleifend risus a, facilisis quam. Cras ultricies risus consectetur mattis tristique. Donec elementum mattis est blandit tristique. Sed in suscipit arcu. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam condimentum metus sed sem auctor, vitae egestas lectus elementum. Sed suscipit risus et tortor tincidunt efficitur eu a magna. Praesent vitae feugiat nulla, ut dignissim libero. Ut lacus dolor, fringilla vel hendrerit vitae, laoreet ultricies arcu. Phasellus vitae imperdiet diam.</p>"
        ));
		Flight::redirect('/');
	} catch (Exception $e){
		echo "<p style='color:red'>Please set the correct database connection!</p>";
		echo "<p>Edit 'db' array in config file: /src/bootstrap/config.php</p>";
		echo "<a href=\"/install-example/\">Check again!</a>";
	};
});