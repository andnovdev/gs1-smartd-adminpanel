<?php

use Illuminate\Database\Seeder;

class AdminTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // base tables
        Encore\Admin\Auth\Database\Menu::truncate();
        Encore\Admin\Auth\Database\Menu::insert(
            [
                [
                    "id" => 1,
                    "parent_id" => 0,
                    "order" => 1,
                    "title" => "Dashboard",
                    "icon" => "fa-bar-chart",
                    "uri" => "/",
                    "permission" => NULL,
                    "created_at" => NULL,
                    "updated_at" => NULL
                ],
                [
                    "id" => 6,
                    "parent_id" => 0,
                    "order" => 2,
                    "title" => "Menu",
                    "icon" => "fa-bars",
                    "uri" => "auth/menu",
                    "permission" => NULL,
                    "created_at" => NULL,
                    "updated_at" => "2019-08-12 02:49:04"
                ],
                [
                    "id" => 34,
                    "parent_id" => 0,
                    "order" => 3,
                    "title" => "Manajemen Pengguna",
                    "icon" => "fa-users",
                    "uri" => "users",
                    "permission" => NULL,
                    "created_at" => "2019-08-12 02:53:25",
                    "updated_at" => "2019-08-12 02:54:01"
                ],
                [
                    "id" => 35,
                    "parent_id" => 34,
                    "order" => 4,
                    "title" => "Pengguna",
                    "icon" => "fa-user",
                    "uri" => "users",
                    "permission" => NULL,
                    "created_at" => "2019-08-12 02:54:40",
                    "updated_at" => "2019-08-12 02:54:51"
                ],
                [
                    "id" => 2,
                    "parent_id" => 0,
                    "order" => 5,
                    "title" => "Admin",
                    "icon" => "fa-tasks",
                    "uri" => "",
                    "permission" => NULL,
                    "created_at" => NULL,
                    "updated_at" => "2019-08-12 02:54:51"
                ],
                [
                    "id" => 3,
                    "parent_id" => 2,
                    "order" => 6,
                    "title" => "Pengguna Admin",
                    "icon" => "fa-users",
                    "uri" => "auth/users",
                    "permission" => NULL,
                    "created_at" => NULL,
                    "updated_at" => "2019-08-12 02:54:51"
                ],
                [
                    "id" => 4,
                    "parent_id" => 2,
                    "order" => 7,
                    "title" => "Peran Admin",
                    "icon" => "fa-user",
                    "uri" => "auth/roles",
                    "permission" => NULL,
                    "created_at" => NULL,
                    "updated_at" => "2019-08-12 02:54:51"
                ],
                [
                    "id" => 5,
                    "parent_id" => 2,
                    "order" => 8,
                    "title" => "Hak Akses Admin",
                    "icon" => "fa-ban",
                    "uri" => "auth/permissions",
                    "permission" => NULL,
                    "created_at" => NULL,
                    "updated_at" => "2019-08-12 02:54:51"
                ],
                [
                    "id" => 7,
                    "parent_id" => 2,
                    "order" => 9,
                    "title" => "Log Operasi",
                    "icon" => "fa-history",
                    "uri" => "auth/logs",
                    "permission" => NULL,
                    "created_at" => NULL,
                    "updated_at" => "2019-08-12 02:54:51"
                ]
            ]
        );

        Encore\Admin\Auth\Database\Permission::truncate();
        Encore\Admin\Auth\Database\Permission::insert(
            [
                [
                    "id" => 1,
                    "name" => "All permission",
                    "slug" => "*",
                    "http_method" => "",
                    "http_path" => "*",
                    "created_at" => NULL,
                    "updated_at" => NULL
                ],
                [
                    "id" => 2,
                    "name" => "Dashboard",
                    "slug" => "dashboard",
                    "http_method" => "GET",
                    "http_path" => "/",
                    "created_at" => NULL,
                    "updated_at" => NULL
                ],
                [
                    "id" => 3,
                    "name" => "Login",
                    "slug" => "auth.login",
                    "http_method" => "",
                    "http_path" => "/auth/login\r\n/auth/logout",
                    "created_at" => NULL,
                    "updated_at" => NULL
                ],
                [
                    "id" => 4,
                    "name" => "User setting",
                    "slug" => "auth.setting",
                    "http_method" => "GET,PUT",
                    "http_path" => "/auth/setting",
                    "created_at" => NULL,
                    "updated_at" => NULL
                ],
                [
                    "id" => 5,
                    "name" => "Auth management",
                    "slug" => "auth.management",
                    "http_method" => "",
                    "http_path" => "/auth/roles\r\n/auth/permissions\r\n/auth/menu\r\n/auth/logs",
                    "created_at" => NULL,
                    "updated_at" => NULL
                ]
            ]
        );

        Encore\Admin\Auth\Database\Role::truncate();
        Encore\Admin\Auth\Database\Role::insert(
            [
                [
                    "id" => 1,
                    "name" => "Administrator",
                    "slug" => "administrator",
                    "created_at" => "2019-08-09 08:07:43",
                    "updated_at" => "2019-08-09 08:07:43"
                ]
            ]
        );

        // pivot tables
        DB::table('admin_role_menu')->truncate();
        DB::table('admin_role_menu')->insert(
            [
                [
                    "role_id" => 1,
                    "menu_id" => 2,
                    "created_at" => NULL,
                    "updated_at" => NULL
                ],
                [
                    "role_id" => 1,
                    "menu_id" => 34,
                    "created_at" => NULL,
                    "updated_at" => NULL
                ],
                [
                    "role_id" => 1,
                    "menu_id" => 35,
                    "created_at" => NULL,
                    "updated_at" => NULL
                ]
            ]
        );

        DB::table('admin_role_permissions')->truncate();
        DB::table('admin_role_permissions')->insert(
            [
                [
                    "role_id" => 1,
                    "permission_id" => 1,
                    "created_at" => NULL,
                    "updated_at" => NULL
                ]
            ]
        );

        // finish
    }
}
