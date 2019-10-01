# The name for the application, should only be things that can be in a directory name
set :application, 'wordcamp-seattle-2019'

# The repo URL
set :repo_url, '&#39;&#39;'

# Or use the line below to deploy via rsync
set :scm, :rsync

# Use a remote cache for git
set :deploy_via, :remote_cache

# Which logging formatter to use
set :format, :pretty

# Which logging level to use
set :log_level, :debug

# Whether to use sudo for commands
set :user_sudo, false

# Whether to use a pseudo-TTY
set :pty, true

# Number of release directories to keep
set :keep_releases, 3

# Add custom SSH config
set :ssh_options, {
  config: 'config/ssh_config'
}

# Platform
set :platform, "wordpress"

# rsync settings
set :rsync_options, %w[--links --recursive --chmod=Dug=rwx,Do=rx --perms --delete --delete-excluded --exclude=.git* --exclude=node_modules]
set :rsync_copy, "rsync --archive --acls --xattrs"
set :rsync_cache, "shared/deploy"

# allow for a flag to be passed that prevents staging the rsync target
if ENV['ignore_rsync_stage']
  set :rsync_stage, nil
else
  set :rsync_stage, 'tmp/deploy'
end

# install NPM modules and run gulp when building for deployment
Rake::Task["web:build"].enhance do
  Dir.chdir fetch(:rsync_stage) do
    system "npm", "install", "--loglevel silent", "--no-bin-links"
    system "npx gulp build"
  end
end

set :app_webroot, 'services/wordpress/public'
set :webroot, 'public'

set :linked_dirs, ["services/wordpress/public/wp-content/uploads","services/wordpress/public/wp-content/upgrade","services/wordpress/public/wp-content/wflogs"]
set :linked_files, []

set :wordpress_wpcfm, false