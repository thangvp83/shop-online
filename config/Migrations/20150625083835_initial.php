<?php
use Phinx\Migration\AbstractMigration;
use Cake\ORM\TableRegistry;

class Initial extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     */
    public function change()
    {
        $users = $this->table('users');
        $users->addColumn('email', 'string')
            ->addColumn('password', 'string')
            ->addColumn('facebook_id', 'string', ['null' => true, 'default' => null])
            ->addColumn('first_name', 'string', ['null' => true, 'default' => null])
            ->addColumn('last_name', 'string', ['null' => true, 'default' => null])
            ->addColumn('avatar', 'string', ['null' => true, 'default' => null])
            ->addColumn('smart_admin_themes', 'string', ['null' => true, 'default' => 'smart-style-0'])
            ->addColumn('auth_token', 'string', ['null' => true, 'default' => null])
            ->addColumn('extra_token', 'string', ['null' => true, 'default' => null])
            ->addColumn('group', 'integer', ['limit' => 1,'default' => 1])
            ->addColumn('status', 'integer', ['limit' => 1,'default' => 1])
            ->addColumn('created', 'datetime')
            ->addColumn('modified', 'datetime', ['null' => true, 'default' => null])
            ->save();
        
        /* ---------- Insert default admin data  { ---------- */
        $tblUser = TableRegistry::get('Users');
        $user = $tblUser->newEntity();
        $user->email = 'admin@hiworld.com.vn';
        $user->password = '12345678';
        $user->first_name = 'Hiworld';
        $user->last_name = 'Admin';
        $tblUser->save($user);
        /* ---------- Insert default admin data  } ---------- */
        
        $user_auths = $this->table('user_auths');
        $user_auths->addColumn('group', 'integer', ['limit' => 1,'default' => 1])            
            ->addColumn('plugin', 'string', ['null' => true, 'default' => null])
            ->addColumn('controller', 'string')
            ->addColumn('action', 'string')
            ->save();
        
        $email_stacks = $this->table('email_stacks');
        $email_stacks->addColumn('email', 'string')
            ->addColumn('subject', 'string')
            ->addColumn('content', 'text')
            ->addColumn('sent', 'boolean', ['default' => 0])
            ->addColumn('created', 'datetime')
            ->save();

        $email_templates = $this->table('email_templates');
        $email_templates->addColumn('subject', 'string')
            ->addColumn('content', 'text')
            ->save();

        $menus = $this->table('menus');
        $menus->addColumn('parent_id', 'integer', ['default' => null])
            ->addColumn('name', 'string', ['null' => true,'default' => null])
            ->addColumn('icon', 'string')
            ->addColumn('group', 'integer', ['limit' => 1,'default' => 1])
            ->addColumn('plugin', 'string', ['null' => true, 'default' => null])
            ->addColumn('controller', 'string')
            ->addColumn('action', 'string')
            ->addColumn('param', 'string')
            ->addColumn('display', 'boolean', ['default' => 1])
            ->addColumn('display_order', 'integer')
            ->save();
        
        $pages = $this->table('pages');
        $pages->addColumn('code', 'string')            
            ->addColumn('title', 'string')
            ->addColumn('content', 'text')                        
            ->save();

        $products = $this->table('products');
        $products
            ->addColumn('cate_id', 'integer', ['limit' => 10,'null' => false])
            ->addColumn('feature', 'boolean', ['limit' => 100,'null' => true,'default' => null])
            ->addColumn('name', 'string', ['limit' => 100,'null' => true,'default' => null])
            ->addColumn('brand_name', ['limit' => 100,'null' => true,'default' => null])
            ->addColumn('description', ['limit' => 400,'null' => true,'default' => null])
            ->addColumn('image', 'string', ['limit' => 100,'null' => true,'default' => null])
            ->addColumn('thumbnail', 'string', ['limit' => 100,'null' => true,'default' => null])
            ->addColumn('price', 'integer', ['limit' => 10,'default' => 0])
            ->addColumn('status', 'boolean', ['default' => 1])
            ->addColumn('sale_off', 'integer', ['limit' => 1,'null' => false, 'default' => 0])
            ->addColumn('sale_off_date_start', 'date', ['limit' => 10,'null' => true])
            ->addColumn('sale_off_date_end', 'date', ['limit' => 10,'null' => true])
            ->addColumn('created', 'datetime')
            ->save();

        $banners = $this->table('banners');
        $banners
            ->addColumn('name', 'string', ['limit' => 100,'null' => true,'default' => null])
            ->addColumn('description', ['limit' => 100,'null' => true,'default' => null])
            ->addColumn('content', ['limit' => 400,'null' => true,'default' => null])
            ->addColumn('link', 'string', ['limit' => 400,'null' => true,'default' => null])
            ->addColumn('thumbnail', 'string', ['limit' => 100,'null' => true,'default' => null])
            ->addColumn('price', 'integer', ['limit' => 10,'default' => 0])
            ->addColumn('status', 'boolean', ['default' => 1])
            ->addColumn('sale_off', 'integer', ['limit' => 1,'null' => false, 'default' => 0])
            ->addColumn('sale_off_date_start', 'date', ['limit' => 10,'null' => true])
            ->addColumn('sale_off_date_end', 'date', ['limit' => 10,'null' => true])
            ->addColumn('created', 'datetime')
            ->save();
    }

    public function down()
    {
        $this->dropTable('users');
        $this->dropTable('user_auths');
        $this->dropTable('email_stacks');
        $this->dropTable('email_templates');
        $this->dropTable('menus');
    }
}