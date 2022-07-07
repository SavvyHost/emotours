# Emotours - Tour Agency

## how to push the project

1. unzip the project in a new directory
2. link the project with the remote version

```bash
git remote add origin http://github.com/aboodazmy/emotours.git
```

3. push the project

```bash
git push origin master
```

4. [install](#installation) the project
5. start [contributing](#contribution)

## Installation

1. install Laravel packages

```bash
# navigate to the project's directory
cd emotours
# install packages
composer install
```

2. link the storage

```bash
php artisan storage:link
```

3. Configure and Install the project

```bash
# clear cache
php artisan optimize:clear
php artisan serve
```

Now navigate to [http://localhost:8000](http://localhost:8000), and start the installation wizard

## Contribution

1. clone the repo

```bash
# change the link
git clone http://github.com/aboodazmy/emotours.git
```

2. [install](#installation) the project

3. create new branch for the tasks

```bash
git branch task-name
```

4. start edits

```bash
git checkout task-name
```

5. push your edits

```bash
# add edited files
git add .
git commit -m "commit message"
git push origin [master | main]
```
