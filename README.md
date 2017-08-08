# RaspberryPi Web Interface

### Installation
1. `curl -sSL https://raw.githubusercontent.com/olback/rpi-webint/master/rpi-webint.install | bash`

2. Edit `config.php`. <br>Set a password and a username.

<br>

### Found a bug?
If you find a bug please report it. You can do so by clicking [issues](https://github.com/olback/rpi-webint/issues) above.

<br>

### Things worth mentioning
1. The installation script adds the user 'www-data' to the sudoers file. Don't run your Raspberry on a public network.

2. The installation script will also create a new lighttpd config and replace the current one.

3. Packages that get installed during installation:<br>
`lighttpd git php5-cgi wiringpi`