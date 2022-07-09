# Emotours - Tour Agency

## Installation

1. clone the project

```bash 
git clone https://github.com/SavvyHost/emotours.git
```

2. install Laravel packages

```bash
# navigate to the project's directory
cd emotours
# install packages
composer install
```

3. Configure and Install the project

```bash
php artisan serve
```

Now navigate to [http://localhost:8000](http://localhost:8000), and start the installation wizard

4. Remove cache

```bash
# clear cache
php artisan optimize:clear

```

## Contribution

1. clone the repo

```bash
# change the link
git clone https://github.com/SavvyHost/emotours.git
```

2. [install](#installation) the project

3. create new branch for the tasks

```bash
git branch task-name
```

4. switch to that branch

```bash
git checkout task-name
```

5. push your edits

```bash
# add edited files
git add .
git commit -m "commit message"
git push origin master
```

