<?php

use Illuminate\Database\Seeder;
use App\PageStatus;

class PageStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $publicRoutes = [];
        $app = app();
        $routeCollection = $app->routes->getRoutes();
        foreach ($routeCollection as $value) {
            $PrefixArray = explode('/', $value->getPrefix());
            if (!in_array('admin', $PrefixArray)) {
                array_push($publicRoutes, [
                    'uri' => $value->uri(),
                    'name' => $value->getName(),
                    'prefix' => $value->getPrefix(),
                    'method action' => $value->getActionMethod(),
                    'method' => $value->methods[0]
                ]);

                $pageStatus = new PageStatus();
                $pageStatus->uri = $value->uri();
                $pageStatus->name = null;
                $pageStatus->status = 'up';
                $pageStatus->request_method = $value->methods[0];
                $pageStatus->description = null;
                $pageStatus->save();
            }

        }
    }
}
