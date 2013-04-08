#Authority-L4
## A simple and flexible authorization system for Laravel 4

##Installation
Add Authority to your composer.json file

	require : {
        'machuga/authority-l4' : 'dev-master'
    }

Add the Authority service provider to your app config

	//app/config/app.php
	'Machuga\AuthorityL4\AuthorityL4ServiceProvider',

**(optional)** Add the alias to your app config

	//app/config/app.php
	'Authority' => 'Machuga\AuthorityL4\Facades\Authority',

**(optional)** Publish the Authority Configuration File

	php artisan config:publish machuga/authority-l4

**(optional)** Run the Authority migrations

	php artisan migrate --package="machuga/authority-l4"

**(optional)** Add the following methods to your User Model

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