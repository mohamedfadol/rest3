<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Webpatser\Uuid\Uuid;
class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $permissions  = array(
          'View Customers',
          'Manage Customers',
          'View Customer Tags',
          'Manage Customer Tags',
          'View Inventory Items',
          'Manage Inventory Items',
          'View Inventory Items Tags',
          'Manage Inventory Items Tags',
          'View Suppliers',
          'Manage Suppliers',
          'View Warehouses',
          'Manage Warehouses',
          'View App User Roles',
          'Manage App User Roles',
          'Restore Company Data',
          'View Cost',
          'View Menu',
          'Manage Menu',
          'View Payment Method',
          'Manage Payment Method',
          'View Coupons',
          'Manage Coupons',
          'View Discounts',
          'Manage Discounts',
          'View Timed Events',
          'Manage Timed Events',
          'View Taxes',
          'Manage Taxes',
          'View Delivery Zones',
          'Manage Delivery Zones',
          'View Business Settings',
          'Manage Business Settings',
          'View Product Tags',
          'Manage Product Tags',
          'View Order Tags',
          'Manage Order Tags',
          'View Branch Tags',
          'Manage Branch Tags',
          'View App Users',
          'Manage App Users',
          'Manage Menu Display',
          'Manage Menu Activation',
          'Restore Business Data',
          'Authorities Manage Addons',
          'Authorities Manage Integrations',
          'View Floor and Tables',
          'Manage Floor and Tables',
          'View Devices',
          'Manage Devices',
          'View Branch Settings',
          'Manage Branch Settings',
          'View Orders',
          'Manage Orders',
          'View Purchase order',
          'Create Purchase Orders',
          'Approve Purchase Orders',
          'View Inventory Transactions',
          'View Purchase Transactions',
          'View Production Transactions',
          'View Stocktaking Transactions',
          'View Consumption Transactions',
          'View Transfer Transactions',
          'View Others (In) Transactions',
          'View Others (Out) Transactions',
          'View Return Transactions',
          'View Expiry Transactions',
          'View Damage Transactions',
          'View Waste Transactions',
          'Categories Sales',
          'Products Sales',
          'Product Sizes Sales',
          'Authorities Generate Combos Sales Report',
          'Product Sizes by Order Type Sales',
          'Modifiers Sales',
          'Product Modifiers Sales',
          'Products Timely Sales',
          'Branches Sales',
          'Branches Timely Sales',
          'Locations Sales',
          'Tables Sales',
          'Agent Income',
          'Cashiers Income',
          'Waiters Income',
          'Drivers Income',
          'Customers Sales',
          'Payment Methods',
          'Order Types Sales',
          'Payment Methods Timely Sales',
          'Items Cost',
          'Inventory Items Total Cost',
          'Items History',
          'Inventory Control',
          'Consumption',
          'Inventory Levels',
          'Expiration',
          'Total Transfers',
          'Total Purchases',
          'Pending Transfers',
          'Products Recipe',
          'Inventory Items Recipe',
          'Modifiers Recipe',
          'Semi Finished Items Levels',
          'Semi Finished Items Cost',
          'Authorities Generate Supplier Purchases Report',
          'Products Preparation Time',
          'Products Cost',
          'Products Returns',
          'Till Logs',
          'Till Operations',
          'Void Reasons',
          'Employees Shifts',
          'Taxes',
          'Orders Discounts',
          'Products Discounts',
          'Product Sizes Discounts',
          'Overview',
          'Sales Comparison',
          'Menu Engineering',
          'Customers Insight',
          'Products Delay',
          'Branches Delay',
          'Full Data Export',
          'Orders Export',
          'Coupons',
          'Customers Export',
          'Stocktaking Export',
          'Inventory Transactions Export',
          'Purchase Orders Export',
          'Snapshots',
          'View Snapshots',
          'View Summary Screen'
        );
        
        $key = array_keys($permissions);
        for ($i=0; $i < count($permissions); $i++) { 
        foreach ($permissions as $permission) {
              $perm = new Permission();
              $perm->id = Uuid::generate()->string;
              $perm->name = $permission[$i];
              $perm->guard_name = 'web';
              $perm->save();
                                     
          }
          }


    }



}
