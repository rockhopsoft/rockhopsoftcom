<!-- generated from resources/views/vendor/rockhopsoftcom/
    instruct/passbolt.blade.php -->

<h2 class="pT0 mT0">Create New Droplet<h2>
<p>
    Login into Digital Ocean and create a new Droplet.
</p>
<ul>
<li>New York or San Francisco
    <br /><br /></li>
<li>Change server size to smallest available ($6/month)
    <br /><br /></li>
<li>Search images in Marketplace for "passbolt" and select latest
    <br /><br /></li>
<li>Choose your SSH keys
    <br /><br /></li>
<li>Enable backups
    <br /><br /></li>
</ul>

<h4>Add DNS Records</h4>
<p>
    Add an A Record pointing your preferred
    subdomain to the new Droplet's IP address.
</p>

<h2 class="slBlueDark">Install Passbolt</h2>
<p>
First, you'll need to
<a href="https://help.passbolt.com/configure/https/ce/digital-ocean/auto.html"
    target="_blank">auto configure HTTPS with Let's Encrypt on Digital Ocean</a>.
</p>
<pre>$ ssh root@12.34.56.78

# nano /etc/nginx/sites-enabled/nginx-passbolt.conf</pre>
<p>
   Edit the nginx config file, enter your subdomain, and save the file:
</p>
<pre>server_name pass.yourdomain.com;</pre>
<p>
    Then run the install script. Just say no to resetting the SQL database.
    But say 'yes' or 'auto' to everything else, and enter your subdomain
    and an email address to request the SSL certificate:
</p>
<pre>sudo dpkg-reconfigure passbolt-ce-server
sudo systemctl reload nginx</pre>
<p>
    <a href="https://help.passbolt.com/hosting/install/ce/digital-ocean"
        target="_blank">Complete the installation</a>
    by browsing to your subdomain and configuring Passbolt.
</p>
<ul>
<li>Database config should be pre-loaded, just click Next</li>
<li>For the OpenPGP key, enter a server name, and rockhoppers@runbox.com</li>
<li>For email configuration...
    <ul>
    <li>Sender name: [Client] Passbolt</li>
    <li>Sender email: noreply@mail.office.rockhopsoft.com</li>
    <li>SMTP Host: smtp.mailgun.org</li>
    <li>Use TLS? Yes</li>
    <li>Port: 587</li>
    <li>Username: noreply@mail.office.rockhopsoft.com</li>
    <li>Password: [copy from
        <a href="https://help.mailgun.com/hc/en-us/articles/203380100-Where-Can-I-Find-My-API-Key-and-SMTP-Credentials-"
            target="_blank">Mailgun's SMTP credentials</a>]</li>
    </ul>
</li>
</ul>

<h4>Select a Admin Passphrase</h4>
<p>
    Choose strong passwords for your password manager.
    Ideally, it is strong, memorizable, and not used anywhere else online.
    <b>This passphrase needs to be written down</b> somewhere,
    physically and/or on your local hard drive.
</p>

<h4>Passbolt Administration Settings</h4>
<ul>
<li>Multi Factor Authentication
    <ul>
    <li>Time-based One Time Password: Enable</li>
    </ul>
</li>
<li>Email Notifications: disable some settings<br />
    <img src="/rockhopsoftcom/passbolt-settings-email-delivery.jpg"
        border="0" class="w100">
</li>
</ul>

<p>
    Keep the admin account separate from other accounts of real users.
    Create any initial users and groups as needed.
</p>