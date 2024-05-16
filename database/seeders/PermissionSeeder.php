<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Team Permissions
        Permission::create(['name' => 'team.store']);
        Permission::create(['name' => 'team.update']);
        Permission::create(['name' => 'team.delete']);
        Permission::create(['name' => 'team.read']);

        // User Permissions
        Permission::create(['name' => 'user.store']);
        Permission::create(['name' => 'user.update']);
        Permission::create(['name' => 'user.delete']);
        Permission::create(['name' => 'user.read']);

        // Province Permissions
        Permission::create(['name' => 'province.store']);
        Permission::create(['name' => 'province.update']);
        Permission::create(['name' => 'province.delete']);
        Permission::create(['name' => 'province.read']);

        // City Permissions
        Permission::create(['name' => 'city.store']);
        Permission::create(['name' => 'city.update']);
        Permission::create(['name' => 'city.delete']);
        Permission::create(['name' => 'city.read']);

        // Profile Permissions
        Permission::create(['name' => 'profile.store']);
        Permission::create(['name' => 'profile.update']);
        Permission::create(['name' => 'profile.delete']);
        Permission::create(['name' => 'profile.read']);

        // Note Permissions
        Permission::create(['name' => 'note.store']);
        Permission::create(['name' => 'note.update']);
        Permission::create(['name' => 'note.delete']);
        Permission::create(['name' => 'note.read']);

        // Order Permissions
        Permission::create(['name' => 'order.store']);
        Permission::create(['name' => 'order.update']);
        Permission::create(['name' => 'order.delete']);
        Permission::create(['name' => 'order.read']);

        // Brand Permissions
        Permission::create(['name' => 'brand.store']);
        Permission::create(['name' => 'brand.update']);
        Permission::create(['name' => 'brand.delete']);
        Permission::create(['name' => 'brand.read']);

        // Category Permissions
        Permission::create(['name' => 'category.store']);
        Permission::create(['name' => 'category.update']);
        Permission::create(['name' => 'category.delete']);
        Permission::create(['name' => 'category.read']);

        // Product Permissions
        Permission::create(['name' => 'product.store']);
        Permission::create(['name' => 'product.update']);
        Permission::create(['name' => 'product.delete']);
        Permission::create(['name' => 'product.read']);

        // Warranty Permissions
        Permission::create(['name' => 'warranty.store']);
        Permission::create(['name' => 'warranty.update']);
        Permission::create(['name' => 'warranty.delete']);
        Permission::create(['name' => 'warranty.read']);

        // Factor Permissions
        Permission::create(['name' => 'factor.store']);
        Permission::create(['name' => 'factor.update']);
        Permission::create(['name' => 'factor.delete']);
        Permission::create(['name' => 'factor.read']);

        // Task Permissions
        Permission::create(['name' => 'task.store']);
        Permission::create(['name' => 'task.update']);
        Permission::create(['name' => 'task.delete']);
        Permission::create(['name' => 'task.read']);

        // Label Permissions
        Permission::create(['name' => 'label.store']);
        Permission::create(['name' => 'label.update']);
        Permission::create(['name' => 'label.delete']);
        Permission::create(['name' => 'label.read']);

        // Ticket Permissions
        Permission::create(['name' => 'ticket.store']);
        Permission::create(['name' => 'ticket.update']);
        Permission::create(['name' => 'ticket.delete']);
        Permission::create(['name' => 'ticket.read']);
    }

}
