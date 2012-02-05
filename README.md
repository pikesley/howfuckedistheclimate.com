Install
=======

Copy `config/config.yaml-dummy` to `config/config.yaml`.

Create a MySQL database, GRANT ALL to a user, `cat sql/create.sql | mysql DBNAME` or similar. Then fill in the creds in `config/config.yaml`. There are some other things there you might want to configure, too.

You also need to do 

    git submodule init
    git submodule update

to get spyc. (Why doesn't git just handle this? Subversion handles this.)

Run `ruby/grab.rb` once, you might want to cron this.

