#Authority-L4
## A simple and flexible authorization system for Laravel 4

##Installation
Add Authority to your composer.json file

	require : {
        'machuga/authority' : 'dev-develop'
    }

Add the Authority service provider to your app config

	//app/config/app.php
	'Machuga\AuthorityL4\AuthorityL4ServiceProvider',

Add the alias to your app config **optional**

	//app/config/app.php
	'Authority' => 'Machuga\AuthorityL4\Facades\Authority',

Publish the Authority Configuration File **optional**

	php artisan config:publish machuga/authority-l4

Run the Authority migrations **optional**

	php artisan migrate --package="machuga/authority-l4"

Add the following methods to your User Model **optional**

	//app/models/User.php
	public function roles()
    {
        return $this->belongsToMany('Role');
    }

	public function hasRole($key)
	{
		foreach($this->roles as $role)
		{
			if($role->name == $key)
			{
				return true;
			}
		}
		return false;
	}

##Usage

	if( Authority::can('create', 'User') )
	{
		User::Create(array(
			'username' => 'someuser@test.com'
		));	
	}