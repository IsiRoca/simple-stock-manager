<?php

use App\Models\Role;
use App\Models\Token;
use App\Models\User;
use Illuminate\Database\Seeder;

class UsersRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Roles
        Role::firstOrCreate(['name' => config('values.roles.role_guest_name'), 'description' => config('values.roles.role_guest_description')]);
        $role_superadmin = Role::firstOrCreate(['name' => config('values.roles.role_superadmin_name'), 'description' => config('values.roles.role_superadmin_description')]);
        $role_admin = Role::firstOrCreate(['name' => config('values.roles.role_admin_name'), 'description' => config('values.roles.role_admin_description')]);
        $role_manager = Role::firstOrCreate(['name' => config('values.roles.role_manager_name'), 'description' => config('values.roles.role_manager_description')]);
        $role_sales = Role::firstOrCreate(['name' => config('values.roles.role_sales_name'), 'description' => config('values.roles.role_manager_description')]);
        $role_accounting = Role::firstOrCreate(['name' => config('values.roles.role_accounting_name'), 'description' => config('values.roles.role_manager_description')]);
        $role_user = Role::firstOrCreate(['name' => config('values.roles.role_user_name'), 'description' => config('values.roles.role_user_description')]);
        $role_guest = Role::firstOrCreate(['name' => config('values.roles.role_guest_name'), 'description' => config('values.roles.role_guest_description')]);
        $role_demo = Role::firstOrCreate(['name' => config('values.roles.role_demo_name'), 'description' => config('values.roles.role_demo_description')]);
        $role_publisher = Role::firstOrCreate(['name' => config('values.roles.role_publisher_name'), 'description' => config('values.roles.role_publisher_description')]);
        $role_editor = Role::firstOrCreate(['name' => config('values.roles.role_editor_name'), 'description' => config('values.roles.role_editor_description')]);
        $role_teacher = Role::firstOrCreate(['name' => config('values.roles.role_teacher_name'), 'description' => config('values.roles.role_teacher_description')]);
        $role_student = Role::firstOrCreate(['name' => config('values.roles.role_student_name'), 'description' => config('values.roles.role_student_description')]);
        $role_operator = Role::firstOrCreate(['name' => config('values.roles.role_operator_name'), 'description' => config('values.roles.role_operator_description')]);
        $role_agent = Role::firstOrCreate(['name' => config('values.roles.role_agent_name'), 'description' => config('values.roles.role_agent_description')]);
        $role_engineer = Role::firstOrCreate(['name' => config('values.roles.role_engineer_name'), 'description' => config('values.roles.role_engineer_description')]);
        $role_director = Role::firstOrCreate(['name' => config('values.roles.role_director_name'), 'description' => config('values.roles.role_director_description')]);
        $role_research = Role::firstOrCreate(['name' => config('values.roles.role_research_name'), 'description' => config('values.roles.role_research_description')]);
        $role_manufacturing = Role::firstOrCreate(['name' => config('values.roles.role_manufacturing_name'), 'description' => config('values.roles.role_manufacturing_description')]);
        $role_quality_control = Role::firstOrCreate(['name' => config('values.roles.role_quality_control_name'), 'description' => config('values.roles.role_quality_control_description')]);
        $role_customer = Role::firstOrCreate(['name' => config('values.roles.role_customer_name'), 'description' => config('values.roles.role_customer_description')]);
        $role_support = Role::firstOrCreate(['name' => config('values.roles.role_support_name'), 'description' => config('values.roles.role_support_description')]);

        // Users
        if (! User::where('email', config('values.users.user_superadmin_email'))->exists()) {
            $user = User::create([
                'name' => config('values.users.user_superadmin_name'),
                'email' => config('values.users.user_superadmin_email'),
                'password' => Hash::make(config('values.app_config.app_default_password')),
                'firstname' => '',
                'lastname' => '',
                'address' => '',
                'housenumber' => NULL,
                'city' => '',
                'state' => '',
                'country' => '',
                'zipcode' => '',
                'phone' => NULL,
                'mobile' => NULL,
                'dateofbirth' => NULL,
                'gender' => NULL,
                'ip_address' => NULL,
                'active' => config('values.users.user_superadmin_status_active'),
                'blocked' => config('values.users.user_superadmin_status_blocked'),
                'referred_by' => '',
                'affiliate_id' => '',
                'email_verified_at' => now()
            ]);

            $user->roles()->attach($role_superadmin->id);
        }

        if (! User::where('email', config('values.users.user_admin_email'))->exists()) {
            $user = User::create([
                'name' => config('values.users.user_admin_name'),
                'email' => config('values.users.user_admin_email'),
                'password' => Hash::make(config('values.app_config.app_default_password')),
                'firstname' => '',
                'lastname' => '',
                'address' => '',
                'housenumber' => NULL,
                'city' => '',
                'state' => '',
                'country' => '',
                'zipcode' => '',
                'phone' => NULL,
                'mobile' => NULL,
                'dateofbirth' => NULL,
                'gender' => NULL,
                'ip_address' => NULL,
                'active' => config('values.users.user_admin_status_active'),
                'blocked' => config('values.users.user_admin_status_blocked'),
                'referred_by' => '',
                'affiliate_id' => '',
                'email_verified_at' => now()
            ]);

            $user->roles()->attach($role_admin->id);
        }

        if (! User::where('email', config('values.users.user_manager_email'))->exists()) {
            $user = User::create([
                'name' => config('values.users.user_manager_name'),
                'email' => config('values.users.user_manager_email'),
                'password' => Hash::make(config('values.app_config.app_default_password')),
                'firstname' => '',
                'lastname' => '',
                'address' => '',
                'housenumber' => NULL,
                'city' => '',
                'state' => '',
                'country' => '',
                'zipcode' => '',
                'phone' => NULL,
                'mobile' => NULL,
                'dateofbirth' => NULL,
                'gender' => NULL,
                'ip_address' => NULL,
                'active' => config('values.users.user_manager_status_active'),
                'blocked' => config('values.users.user_manager_status_blocked'),
                'referred_by' => '',
                'affiliate_id' => '',
                'email_verified_at' => now()
            ]);

            $user->roles()->attach($role_manager->id);
        }

        if (! User::where('email', config('values.users.user_sales_email'))->exists()) {
            $user = User::create([
                'name' => config('values.users.user_sales_name'),
                'email' => config('values.users.user_sales_email'),
                'password' => Hash::make(config('values.app_config.app_default_password')),
                'firstname' => '',
                'lastname' => '',
                'address' => '',
                'housenumber' => NULL,
                'city' => '',
                'state' => '',
                'country' => '',
                'zipcode' => '',
                'phone' => NULL,
                'mobile' => NULL,
                'dateofbirth' => NULL,
                'gender' => NULL,
                'ip_address' => NULL,
                'active' => config('values.users.user_sales_status_active'),
                'blocked' => config('values.users.user_sales_status_blocked'),
                'referred_by' => '',
                'affiliate_id' => '',
                'email_verified_at' => now()
            ]);

            $user->roles()->attach($role_sales->id);
        }

        if (! User::where('email', config('values.users.user_accounting_email'))->exists()) {
            $user = User::create([
                'name' => config('values.users.user_accounting_name'),
                'email' => config('values.users.user_accounting_email'),
                'password' => Hash::make(config('values.app_config.app_default_password')),
                'firstname' => '',
                'lastname' => '',
                'address' => '',
                'housenumber' => NULL,
                'city' => '',
                'state' => '',
                'country' => '',
                'zipcode' => '',
                'phone' => NULL,
                'mobile' => NULL,
                'dateofbirth' => NULL,
                'gender' => NULL,
                'ip_address' => NULL,
                'active' => config('values.users.user_accounting_status_active'),
                'blocked' => config('values.users.user_accounting_status_blocked'),
                'referred_by' => '',
                'affiliate_id' => '',
                'email_verified_at' => now()
            ]);

            $user->roles()->attach($role_accounting->id);
        }

        if (! User::where('email', config('values.users.user_user_email'))->exists()) {
            $user = User::create([
                'name' => config('values.users.user_user_name'),
                'email' => config('values.users.user_user_email'),
                'password' => Hash::make(config('values.app_config.app_default_password')),
                'firstname' => '',
                'lastname' => '',
                'address' => '',
                'housenumber' => NULL,
                'city' => '',
                'state' => '',
                'country' => '',
                'zipcode' => '',
                'phone' => NULL,
                'mobile' => NULL,
                'dateofbirth' => NULL,
                'gender' => NULL,
                'ip_address' => NULL,
                'active' => config('values.users.user_user_status_active'),
                'blocked' => config('values.users.user_user_status_blocked'),
                'referred_by' => '',
                'affiliate_id' => '',
                'email_verified_at' => now()
            ]);

            $user->roles()->attach($role_user->id);
        }

        if (! User::where('email', config('values.users.user_guest_email'))->exists()) {
            $user = User::create([
                'name' => config('values.users.user_guest_name'),
                'email' => config('values.users.user_guest_email'),
                'password' => Hash::make(config('values.app_config.app_default_password')),
                'firstname' => '',
                'lastname' => '',
                'address' => '',
                'housenumber' => NULL,
                'city' => '',
                'state' => '',
                'country' => '',
                'zipcode' => '',
                'phone' => NULL,
                'mobile' => NULL,
                'dateofbirth' => NULL,
                'gender' => NULL,
                'ip_address' => NULL,
                'active' => config('values.users.user_guest_status_active'),
                'blocked' => config('values.users.user_guest_status_blocked'),
                'referred_by' => '',
                'affiliate_id' => '',
                'email_verified_at' => now()
            ]);

            $user->roles()->attach($role_guest->id);
        }

        if (! User::where('email', config('values.users.user_demo_email'))->exists()) {
            $user = User::create([
                'name' => config('values.users.user_demo_name'),
                'email' => config('values.users.user_demo_email'),
                'password' => Hash::make(config('values.app_config.app_default_password')),
                'firstname' => '',
                'lastname' => '',
                'address' => '',
                'housenumber' => NULL,
                'city' => '',
                'state' => '',
                'country' => '',
                'zipcode' => '',
                'phone' => NULL,
                'mobile' => NULL,
                'dateofbirth' => NULL,
                'gender' => NULL,
                'ip_address' => NULL,
                'active' => config('values.users.user_demo_status_active'),
                'blocked' => config('values.users.user_demo_status_blocked'),
                'referred_by' => '',
                'affiliate_id' => '',
                'email_verified_at' => now()
            ]);

            $user->roles()->attach($role_demo->id);
        }

        if (! User::where('email', config('values.users.user_publisher_email'))->exists()) {
            $user = User::create([
                'name' => config('values.users.user_publisher_name'),
                'email' => config('values.users.user_publisher_email'),
                'password' => Hash::make(config('values.app_config.app_default_password')),
                'firstname' => '',
                'lastname' => '',
                'address' => '',
                'housenumber' => NULL,
                'city' => '',
                'state' => '',
                'country' => '',
                'zipcode' => '',
                'phone' => NULL,
                'mobile' => NULL,
                'dateofbirth' => NULL,
                'gender' => NULL,
                'ip_address' => NULL,
                'active' => config('values.users.user_publisher_status_active'),
                'blocked' => config('values.users.user_publisher_status_blocked'),
                'referred_by' => '',
                'affiliate_id' => '',
                'email_verified_at' => now()
            ]);

            $user->roles()->attach($role_publisher->id);
        }

        if (! User::where('email', config('values.users.user_editor_email'))->exists()) {
            $user = User::create([
                'name' => config('values.users.user_editor_name'),
                'email' => config('values.users.user_editor_email'),
                'password' => Hash::make(config('values.app_config.app_default_password')),
                'firstname' => '',
                'lastname' => '',
                'address' => '',
                'housenumber' => NULL,
                'city' => '',
                'state' => '',
                'country' => '',
                'zipcode' => '',
                'phone' => NULL,
                'mobile' => NULL,
                'dateofbirth' => NULL,
                'gender' => NULL,
                'ip_address' => NULL,
                'active' => config('values.users.user_editor_status_active'),
                'blocked' => config('values.users.user_editor_status_blocked'),
                'referred_by' => '',
                'affiliate_id' => '',
                'email_verified_at' => now()
            ]);

            $user->roles()->attach($role_editor->id);
        }

        if (! User::where('email', config('values.users.user_teacher_email'))->exists()) {
            $user = User::create([
                'name' => config('values.users.user_teacher_name'),
                'email' => config('values.users.user_teacher_email'),
                'password' => Hash::make(config('values.app_config.app_default_password')),
                'firstname' => '',
                'lastname' => '',
                'address' => '',
                'housenumber' => NULL,
                'city' => '',
                'state' => '',
                'country' => '',
                'zipcode' => '',
                'phone' => NULL,
                'mobile' => NULL,
                'dateofbirth' => NULL,
                'gender' => NULL,
                'ip_address' => NULL,
                'active' => config('values.users.user_teacher_status_active'),
                'blocked' => config('values.users.user_teacher_status_blocked'),
                'referred_by' => '',
                'affiliate_id' => '',
                'email_verified_at' => now()
            ]);

            $user->roles()->attach($role_teacher->id);
        }

        if (! User::where('email', config('values.users.user_student_email'))->exists()) {
            $user = User::create([
                'name' => config('values.users.user_student_name'),
                'email' => config('values.users.user_student_email'),
                'password' => Hash::make(config('values.app_config.app_default_password')),
                'firstname' => '',
                'lastname' => '',
                'address' => '',
                'housenumber' => NULL,
                'city' => '',
                'state' => '',
                'country' => '',
                'zipcode' => '',
                'phone' => NULL,
                'mobile' => NULL,
                'dateofbirth' => NULL,
                'gender' => NULL,
                'ip_address' => NULL,
                'active' => config('values.users.user_student_status_active'),
                'blocked' => config('values.users.user_student_status_blocked'),
                'referred_by' => '',
                'affiliate_id' => '',
                'email_verified_at' => now()
            ]);

            $user->roles()->attach($role_student->id);
        }

        if (! User::where('email', env('ROLE_TEST_OPERATOR_EMAIL', 'operator@email.com'))->exists()) {
            $user = User::create([
                'name' => env('ROLE_TEST_OPERATOR_NAME', 'Operator'),
                'email' => env('ROLE_TEST_OPERATOR_EMAIL', 'operator@email.com'),
                'password' => Hash::make(config('values.app_config.app_default_password')),
                'firstname' => '',
                'lastname' => '',
                'address' => '',
                'housenumber' => NULL,
                'city' => '',
                'state' => '',
                'country' => '',
                'zipcode' => '',
                'phone' => NULL,
                'mobile' => NULL,
                'dateofbirth' => NULL,
                'gender' => NULL,
                'ip_address' => NULL,
                'active' => config('values.users.user_operator_status_active'),
                'blocked' => config('values.users.user_operator_status_blocked'),
                'referred_by' => '',
                'affiliate_id' => '',
                'email_verified_at' => now()
            ]);

            $user->roles()->attach($role_operator->id);
        }

        if (! User::where('email', env('ROLE_TEST_AGENT_EMAIL', 'agent@email.com'))->exists()) {
            $user = User::create([
                'name' => env('ROLE_TEST_AGENT_NAME', 'Agent'),
                'email' => env('ROLE_TEST_AGENT_EMAIL', 'agent@email.com'),
                'password' => Hash::make(config('values.app_config.app_default_password')),
                'firstname' => '',
                'lastname' => '',
                'address' => '',
                'housenumber' => NULL,
                'city' => '',
                'state' => '',
                'country' => '',
                'zipcode' => '',
                'phone' => NULL,
                'mobile' => NULL,
                'dateofbirth' => NULL,
                'gender' => NULL,
                'ip_address' => NULL,
                'active' => config('values.users.user_agent_status_active'),
                'blocked' => config('values.users.user_agent_status_blocked'),
                'referred_by' => '',
                'affiliate_id' => '',
                'email_verified_at' => now()
            ]);

            $user->roles()->attach($role_agent->id);
        }

        if (! User::where('email', env('ROLE_TEST_ENGINEER_EMAIL', 'engineer@email.com'))->exists()) {
            $user = User::create([
                'name' => env('ROLE_TEST_ENGINEER_NAME', 'Engineer'),
                'email' => env('ROLE_TEST_ENGINEER_EMAIL', 'engineer@email.com'),
                'password' => Hash::make(config('values.app_config.app_default_password')),
                'firstname' => '',
                'lastname' => '',
                'address' => '',
                'housenumber' => NULL,
                'city' => '',
                'state' => '',
                'country' => '',
                'zipcode' => '',
                'phone' => NULL,
                'mobile' => NULL,
                'dateofbirth' => NULL,
                'gender' => NULL,
                'ip_address' => NULL,
                'active' => config('values.users.user_engineer_status_active'),
                'blocked' => config('values.users.user_engineer_status_blocked'),
                'referred_by' => '',
                'affiliate_id' => '',
                'email_verified_at' => now()
            ]);

            $user->roles()->attach($role_engineer->id);
        }

        if (! User::where('email', env('ROLE_TEST_DIRECTOR_EMAIL', 'director@email.com'))->exists()) {
            $user = User::create([
                'name' => env('ROLE_TEST_DIRECTOR_NAME', 'Director'),
                'email' => env('ROLE_TEST_DIRECTOR_EMAIL', 'director@email.com'),
                'password' => Hash::make(config('values.app_config.app_default_password')),
                'firstname' => '',
                'lastname' => '',
                'address' => '',
                'housenumber' => NULL,
                'city' => '',
                'state' => '',
                'country' => '',
                'zipcode' => '',
                'phone' => NULL,
                'mobile' => NULL,
                'dateofbirth' => NULL,
                'gender' => NULL,
                'ip_address' => NULL,
                'active' => config('values.users.user_director_status_active'),
                'blocked' => config('values.users.user_director_status_blocked'),
                'referred_by' => '',
                'affiliate_id' => '',
                'email_verified_at' => now()
            ]);

            $user->roles()->attach($role_director->id);
        }

        if (! User::where('email', env('ROLE_TEST_RESEARCH_EMAIL', 'research@email.com'))->exists()) {
            $user = User::create([
                'name' => env('ROLE_TEST_RESEARCH_NAME', 'Research'),
                'email' => env('ROLE_TEST_RESEARCH_EMAIL', 'research@email.com'),
                'password' => Hash::make(config('values.app_config.app_default_password')),
                'firstname' => '',
                'lastname' => '',
                'address' => '',
                'housenumber' => NULL,
                'city' => '',
                'state' => '',
                'country' => '',
                'zipcode' => '',
                'phone' => NULL,
                'mobile' => NULL,
                'dateofbirth' => NULL,
                'gender' => NULL,
                'ip_address' => NULL,
                'active' => config('values.users.user_research_status_active'),
                'blocked' => config('values.users.user_research_status_blocked'),
                'referred_by' => '',
                'affiliate_id' => '',
                'email_verified_at' => now()
            ]);

            $user->roles()->attach($role_research->id);
        }

        if (! User::where('email', env('ROLE_TEST_MANUFACTURING_EMAIL', 'manufacturing@email.com'))->exists()) {
            $user = User::create([
                'name' => env('ROLE_TEST_MANUFACTURING_NAME', 'Manufacturing'),
                'email' => env('ROLE_TEST_MANUFACTURING_EMAIL', 'manufacturing@email.com'),
                'password' => Hash::make(config('values.app_config.app_default_password')),
                'firstname' => '',
                'lastname' => '',
                'address' => '',
                'housenumber' => NULL,
                'city' => '',
                'state' => '',
                'country' => '',
                'zipcode' => '',
                'phone' => NULL,
                'mobile' => NULL,
                'dateofbirth' => NULL,
                'gender' => NULL,
                'ip_address' => NULL,
                'active' => config('values.users.user_manufacturing_status_active'),
                'blocked' => config('values.users.user_manufacturing_status_blocked'),
                'referred_by' => '',
                'affiliate_id' => '',
                'email_verified_at' => now()
            ]);

            $user->roles()->attach($role_manufacturing->id);
        }

        if (! User::where('email', env('ROLE_TEST_QUALITY_CONTROL_EMAIL', 'quality_control@email.com'))->exists()) {
            $user = User::create([
                'name' => env('ROLE_TEST_QUALITY_CONTROL_NAME', 'Quality Control'),
                'email' => env('ROLE_TEST_QUALITY_CONTROL_EMAIL', 'quality_control@email.com'),
                'password' => Hash::make(config('values.app_config.app_default_password')),
                'firstname' => '',
                'lastname' => '',
                'address' => '',
                'housenumber' => NULL,
                'city' => '',
                'state' => '',
                'country' => '',
                'zipcode' => '',
                'phone' => NULL,
                'mobile' => NULL,
                'dateofbirth' => NULL,
                'gender' => NULL,
                'ip_address' => NULL,
                'active' => config('values.users.user_quality_control_status_active'),
                'blocked' => config('values.users.user_quality_control_status_blocked'),
                'referred_by' => '',
                'affiliate_id' => '',
                'email_verified_at' => now()
            ]);

            $user->roles()->attach($role_quality_control->id);
        }

        if (! User::where('email', env('ROLE_TEST_CUSTOMER_EMAIL', 'customer@email.com'))->exists()) {
            $user = User::create([
                'name' => env('ROLE_TEST_CUSTOMER_NAME', 'Customer'),
                'email' => env('ROLE_TEST_CUSTOMER_EMAIL', 'customer@email.com'),
                'password' => Hash::make(config('values.app_config.app_default_password')),
                'firstname' => '',
                'lastname' => '',
                'address' => '',
                'housenumber' => NULL,
                'city' => '',
                'state' => '',
                'country' => '',
                'zipcode' => '',
                'phone' => NULL,
                'mobile' => NULL,
                'dateofbirth' => NULL,
                'gender' => NULL,
                'ip_address' => NULL,
                'active' => config('values.users.user_customer_status_active'),
                'blocked' => config('values.users.user_customer_status_blocked'),
                'referred_by' => '',
                'affiliate_id' => '',
                'email_verified_at' => now()
            ]);

            $user->roles()->attach($role_customer->id);
        }

        if (! User::where('email', env('ROLE_TEST_SUPPORT_EMAIL', 'support@email.com'))->exists()) {
            $user = User::create([
                'name' => env('ROLE_TEST_SUPPORT_NAME', 'Support'),
                'email' => env('ROLE_TEST_SUPPORT_EMAIL', 'support@email.com'),
                'password' => Hash::make(config('values.app_config.app_default_password')),
                'firstname' => '',
                'lastname' => '',
                'address' => '',
                'housenumber' => NULL,
                'city' => '',
                'state' => '',
                'country' => '',
                'zipcode' => '',
                'phone' => NULL,
                'mobile' => NULL,
                'dateofbirth' => NULL,
                'gender' => NULL,
                'ip_address' => NULL,
                'active' => config('values.users.user_support_status_active'),
                'blocked' => config('values.users.user_support_status_blocked'),
                'referred_by' => '',
                'affiliate_id' => '',
                'email_verified_at' => now()
            ]);

            $user->roles()->attach($role_support->id);
        }

        // API tokens
        User::where('api_token', null)->get()->each->update([
            'api_token' => Token::generate()
        ]);
    }
}
