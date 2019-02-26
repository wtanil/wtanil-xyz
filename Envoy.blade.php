@servers(['localhost' => '127.0.0.1'])

@setup
	$repository = 'git@gitlab.com:wtanil/main.git';
	$releases_dir = '/var/www/wtanil.xyz/html/app/releases';
	$app_dir = '/var/www/wtanil.xyz/html/app';
	$release = date('YmdHis');
	$new_release_dir = $releases_dir . '/' . $release;
@endsetup

@story('deploy')
	clone_repository
	run_composer
	update_symlinks
	update_permission
@endstory

@task('clone_repository')
	echo 'Cloning repository'
	[ -d {{ $releases_dir }} ] || mkdir {{ $releases_dir }}
	git clone --depth 1 {{ $repository }} {{ $new_release_dir }}
@endtask

@task('run_composer')
	echo "Starting deployment ({{ $release }})"
	cd {{ $new_release_dir }}
	composer install --prefer-dist --no-scripts -q -o
@endtask

@task('update_symlinks')
	echo "Linking storage directory"
	rm -rf {{ $new_release_dir }}/storage
	ln -nfs {{ $app_dir }}/storage {{ $new_release_dir }}/storage

	echo 'Linking .env file'
	ln -nfs {{ $app_dir }}/.env {{ $new_release_dir }}/.env

	echo 'Linking current release'
	ln -nfs {{ $new_release_dir }} {{ $app_dir }}/current
@endtask

@task('update_permission')
	echo "Updating bootstrap/cache permission"
	chgrp -R www-data {{ $app_dir }}/current/bootstrap/cache
        chmod -R 775 {{ $app_dir }}/current/bootstrap/cache
@endtask

