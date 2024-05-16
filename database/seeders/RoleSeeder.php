<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Create admin role and assign permissions to this
        $admin = Role::create(['name' => 'admin']);
        $admin->givePermissionTo([
            'province.store', 'province.update', 'province.delete', 'province.read',
            'category.store', 'category.update', 'category.delete', 'category.read',
            'warranty.store', 'warranty.update', 'warranty.delete', 'warranty.read',
            'product.store', 'product.update', 'product.delete', 'product.read',
            'profile.store', 'profile.update', 'profile.delete', 'profile.read',
            'ticket.store', 'ticket.update', 'ticket.delete', 'ticket.read',
            'factor.store', 'factor.update', 'factor.delete', 'factor.read',
            'order.store', 'order.update', 'order.delete', 'order.read',
            'brand.store', 'brand.update', 'brand.delete', 'brand.read',
            'label.store', 'label.update', 'label.delete', 'label.read',
            'team.store', 'team.update', 'team.delete', 'team.read',
            'note.store', 'note.update', 'note.delete', 'note.read',
            'city.store', 'city.update', 'city.delete', 'city.read',
            'task.store', 'task.update', 'task.delete', 'task.read',
            'user.store', 'user.update', 'user.delete', 'user.read',
        ]);

        // Create super_admin role and assign permissions to this
        $super_admin = Role::create(['name' => 'super_admin']);
        $super_admin->givePermissionTo([
            'team.store', 'team.update', 'team.delete', 'team.read',
            'user.store', 'user.update', 'user.delete', 'user.read',
            'task.store', 'task.update', 'task.delete', 'task.read',
            'city.store', 'city.update', 'city.delete', 'city.read',
            'note.store', 'note.update', 'note.delete', 'note.read',
            'order.store', 'order.update', 'order.delete', 'order.read',
            'brand.store', 'brand.update', 'brand.delete', 'brand.read',
            'label.store', 'label.update', 'label.delete', 'label.read',
            'factor.store', 'factor.update', 'factor.delete', 'factor.read',
            'ticket.store', 'ticket.update', 'ticket.delete', 'ticket.read',
            'profile.store', 'profile.update', 'profile.delete', 'profile.read',
            'product.store', 'product.update', 'product.delete', 'product.read',
            'category.store', 'category.update', 'category.delete', 'category.read',
            'province.store', 'province.update', 'province.delete', 'province.read',
            'warranty.store', 'warranty.update', 'warranty.delete', 'warranty.read',
        ]);

        // Create user role and assign permissions to this
        $user = Role::create(['name' => 'user']);
        $user->givePermissionTo([
            'brand.read', 'category.read', 'product.read',
            'ticket.store', 'ticket.update',
        ]);

        // Create reseller role and assign permissions to this
        $reseller = Role::create(['name' => 'reseller']);


        // Create a super_admin user
        $super_admin = User::create([
            'first_name' => 'محمد',
            'last_name' => 'مختاری',
            'phone_number' => '09121111111',
            'email' => 'test@gmail.com',
            'password' => '11AAaa@@'
        ]);

        // Assign super_admin role to the new user
        $super_admin->assignRole('super_admin');
    }
}
