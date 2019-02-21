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
@endstory

@task('clone_repository')
	echo 'Cloning repository'
	[ -d {{ $releases_dir }} ] || mkdir {{ $releases_dir }}
	git clone --depth 1 {{ $repository }} {{ $new_release_dir }}
	cd {{ $releases_dir }}
	git reset --hard {{ $commit }}
@endtask

@task('run composer')
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

