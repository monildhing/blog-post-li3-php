<?php
/**
 * li₃: the most RAD framework for PHP (http://li3.me)
 *
 * Copyright 2009, Union of RAD. All rights reserved. This source
 * code is distributed under the terms of the BSD 3-Clause License.
 * The full license text can be found in the LICENSE.txt file.
 */

namespace app\config;

/**
 * The routes file is where you define your URL structure, which is an important part of the
 * [information architecture](http://en.wikipedia.org/wiki/Information_architecture) of your
 * application. Here, you can use _routes_ to match up URL pattern strings to a set of parameters,
 * usually including a controller and action to dispatch matching requests to. For more information,
 * see the `Router` and `Route` classes.
 *
 * @see lithium\net\http\Router
 * @see lithium\net\http\Route
 */
use lithium\net\http\Router;
use lithium\core\Environment;
use lithium\security\Auth;

/**
 * ### Continuation routes
 *
 * With globalization enabled a localized route can be configured by connecting a
 * continuation route. Once the route has been connected, all the other
 * application routes become localized and may now carry a locale.
 *
 * Requests to routes like `/en/posts/edit/1138` or `/fr/posts/edit/1138` will
 * carry a locale, while `/posts/edit/1138` keeps on working as it did before.
 */
// Router::connect(
// 	'/{:locale:' . join('|', array_keys(Environment::get('locales'))) . '}/{:args}',
// 	[],
// 	['continue' => true]
// );

/**
 * ### Basic page routes
 *
 * Here, we are connecting `'/'` (the base path) to controller called `'Pages'`,
 * its action called `view()`, and we pass a param to select the view file
 * to use (in this case, `/views/pages/home.html.php`; see `app\controllers\PagesController`
 * for details).
 *
 * @see app\controllers\PagesController
 */

Router::connect('/', 'Sessions::add');
Router::connect('/posts', 'Posts::view');
Router::connect('/posts/add', 'Posts::add');
Router::connect('/posts/index', 'Posts::index');
Router::connect('/posts/delete', 'Posts::delete');
Router::connect('/users/mail', 'Users::mail');
Router::connect('/posts/update/{:args}', 'Posts::update');
Router::connect('/posts/setid/{:args}', 'Posts::setid');
Router::connect('/users/add', 'Users::add');
Router::connect('/users/index', 'Users::index');
Router::connect('/users/delete', 'Users::delete');
Router::connect('/users/update', 'Users::update');
Router::connect('/users/updateuser', 'Users::updateuser');
Router::connect('/users/upload', 'Users::upload');
Router::connect('/people/index', 'Users::index');
Router::connect('/people/add', 'Users::add');
/**
 * Connect the rest of `PagesController`'s URLs. This will route URLs like `/pages/about` to
 * `PagesController`, rendering `/views/pages/about.html.php` as a static page.
 */
Router::connect('/login', 'Sessions::add');
Router::connect('/logout', 'Sessions::delete');
/**
 * ### Testing routes
 *
 * Add the testing routes. These routes are only connected in non-production environments, and allow
 * browser-based access to the test suite for running unit and integration tests for the Lithium
 * core, as well as your own application and any other loaded plugins or frameworks. Browse to
 * [http://path/to/app/test](/test) to run tests.
 */
if (!Environment::is('production')) {
	Router::connect('/test/{:args}', ['controller' => 'lithium\test\Controller']);
	Router::connect('/test', ['controller' => 'lithium\test\Controller']);
}

/**
 * ### Database object routes
 *
 * The routes below are used primarily for accessing database objects, where `{:id}` corresponds to
 * the primary key of the database object, and can be accessed in the controller as
 * `$this->request->id`.
 *
 * If you're using a relational database, such as MySQL, SQLite or Postgres, where the primary key
 * is an integer, uncomment the routes below to enable URLs like `/posts/edit/1138`,
 * `/posts/view/1138.json`, etc.
 */
// Router::connect('/{:controller}/{:action}/{:id:\d+}.{:type}', ['id' => null]);
// Router::connect('/{:controller}/{:action}/{:id:\d+}');

/**
 * If you're using a document-oriented database, such as CouchDB or MongoDB, or another type of
 * database which uses 24-character hexidecimal values as primary keys, uncomment the routes below.
 */
// Router::connect('/{:controller}/{:action}/{:id:[0-9a-f]{24}}.{:type}', ['id' => null]);
// Router::connect('/{:controller}/{:action}/{:id:[0-9a-f]{24}}');

/**
 * ### Default controller/action routes
 *
 * Finally, connect the default route. This route acts as a catch-all, intercepting requests in the
 * following forms:
 *
 * - `/foo/bar`: Routes to `FooController::bar()` with no parameters passed.
 * - `/foo/bar/param1/param2`: Routes to `FooController::bar('param1, 'param2')`.
 * - `/foo`: Routes to `FooController::index()`, since `'index'` is assumed to be the action if none
 *   is otherwise specified.
 *
 * In almost all cases, custom routes should be added above this one, since route-matching works in
 * a top-down fashion.
 */
Router::connect('/{:controller}/{:action}/{:args}');
Router::connect('/posts/index');
?>