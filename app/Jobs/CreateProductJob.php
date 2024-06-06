<?php

namespace App\Jobs;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Province;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CreateProductJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $brand_id = null;

    /**
     * Create a new job instance.
     */
    public function __construct($brand_id)
    {
        $this->brand_id = $brand_id;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Product::create([
            'product_name' => 'test',
            'brand_id' => $this->brand_id,
            'category_id' => '1',
            'price' => '500'
        ]);
    }
}
