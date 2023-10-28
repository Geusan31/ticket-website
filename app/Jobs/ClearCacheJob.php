<?php

namespace App\Jobs;

use Illuminate\Support\Facades\Artisan;

class ClearCacheJob
{
  public function handle()
  {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
  }
}
