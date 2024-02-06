# What is mu-plugins folder?

## Context

functions.php is not the best place to keep custom code
you don't want access to our data to be reliant on a certain theme being activated, this is a better use for a plugin!

## Solution

You could use "must-use plugins" they live in their own folder, and you cannot deactivate these plugins, as long as these folders exist, these plugins will always be activated in the WP admin.
