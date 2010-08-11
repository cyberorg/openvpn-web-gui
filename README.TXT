OpenVPN Web GUI

This project is a port of the project at http://openvpn-web-gui.sourceforge.net.

This project is a Web interface to openvpn server. It shows the status
of VPN connections, and openvpn / openssl configuration. Plus, it provides
client certificate management. Project is being written completely on
PHP 5 with openssl and Smarty.

OVERVIEW

The current version supports only the following function:

a) view status of openvpn server. The status is being refreshed every
   60 seconds. If that is not happening, than openvpn server is not running.

b) view the list of connected peers. Peers are treated as users there, so
   we suggest that a peer's information has a name, e-mail and stuff.

c) view the basic configuration options of openvpn package.

d) view the list of all generated openssl certificates. That is the
   different part of a project and it works in cooperation with openssl.

e) from there it is possible to generate new certificate along with a
   private key and certificate request file. That part is still under
   construction.

The idea behind that project is to provide a handy tool to systems /
security / account administrator to maintain the openvpn server. There will
be some kind of authorization and authentication, allowin one group of
persons to see the statuses only while other group to make changes.

INSTALLATION

Use OpenVPN's easy-rsa scripts to get started. If you have an existing OpenVPN
installation using easy-rsa, things will work fine as long as the crt/crs/key
files use the Common Name. The original project this one is ported from did NOT
do this, and this was the main reason for the port. 

You need to touch the password.db file referenced in config.inc in order to store
passwords in the database. Also, you need to look for $ENV:: entries in OpenVPN's
openssl.cnf file. Replace them with the actual values from the vars script in the
easy-rsa directory. 

Next, there is a config.inc, which points to several directories and files,
needed for a project. They are:

 $config['Company_Name'] = 'Lake of Ontario';

(I hope that this example is not trade marked or registered :)
Use a name of your company of whatever represents your site.

 $config['openvpn']['folder'] = '/usr/local/etc/openvpn/server/';

The folder with configuration of your openvpn server. Used to reach the
configuration file (see next one) and the status file.

 $config['openvpn']['config'] = $config['openvpn']['folder'] .'openvpn.conf';

Here is it, the name of your openvpn server's configuration file. Later I
will made it possible to configure several servers (through several
configuation files)

 $config['openssl']['folder'] = '/usr/local/etc/openvpn/keys/';

The name of directory where the keys are stored. Actually, not always keys,
but the root of them, where serial and database files are kept.

 $config['openssl']['serial'] = $config['openssl']['folder'] .'serial';

The name of the serial file. Should be equival to one of openssl.cnf

 $config['openssl']['database'] = $config['openssl']['folder'] .'database.txt';

The name of the database. Should be equival to one of openssl.cnf. You know
what? I'll eliminate those two later by introducing the name of openssl.cnf
file :)

 $config['openssl']['default']['...']

Change new certificate defaults to what best suites you.

And, finally, the security information.

First, because the project HAS to read openssl and openvpn configuration,
give the www group (or what is your apache group) read right to:

 openssl.cnf
 $config['openvpn']['config']
 $config['openssl']['folder']
 $config['openvpn']['status']

The following files/dirs require rw access:

 $config['openssl']['serial']
 $config['openssl']['database']
 $config['openssl']['folder']

If you know how to make it more secure, let me know :)

PLUG-INS SUPPORT

The plug-ins should be placed into the subfolder of plugins folder. The
registration of each plug-in is being done from the project's config.inc file.
Plug-ins's config.inc declares the following files, of which the plug-in consists:

$config['Plugins']['pluginname']['Action']['Name']      = 'What goes into <A> in the top menu';
$config['Plugins']['pluginname']['Action']['Include']   = 'The main PHP file of the plug-in';
$config['Plugins']['pluginname']['Top Menu']['Label']   = 'What is the text part of <A> in the top menu';
$config['Plugins']['pluginname']['Top Menu']['Tooltip'] = 'What is the tooltip for this <A>';
$config['Plugins']['pluginname']['Top Menu']['Suffix']  = 'What is an optional suffix, adding into <A> after ?Action=$ActionName';
$config['Plugins']['pluginname']['Left']['Menu']        = 'The Smarty template for the left menu';
$config['Plugins']['pluginname']['Left']['Status']      = 'The Smarty template for the status window';

Review the supplied example of the simple system check plug-in, it will tell
you the rest of how is the plug-in plugs in :)

Oh, just remembered. the main config.inc allows you to supply your own 16x16
logo. Also you will need enter the real physical path to the plugins folder there.

And the last thing: Because of the Smarty design, there might be some caveats
in using extra templates in your plug-in. I had to change all action-*.tpl into
the file being included into page.tpl. An example in action.inc file of the
sample plug-in, shows how to use that page.tpl, if you want to keep the project's
decoration.

The final thing, just saw in my notes: If you are to get more variables from GET,
obtain them from your action.inc file, as far as include all your includes into there.
DO NOT modify the project's index.php file.

Ok. now I believe I've told you the all about the current version of a project.

HISTORY

08/11/2010 - 0.0.1
Initial check in to git. Completely functional on development box. Testing hasn't been
done on a clean install. 